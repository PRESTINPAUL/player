<?php

include 'xml_formatter.php';
include 'shopify_export.php';
include 'email_handler.php';
include_once 'global_config.php';
include_once 'Order.php';

// Variables used for processing/saving

try
{

        $xmlString = ""; // Used to get data from Shopify into script

        $file_name = '';

// Get XML data and read it into a string for use with SimpleXML

        $xmlData = fopen('php://input', 'rb');

        while (!feof($xmlData)) {$xmlString .= fread($xmlData, 4096);}
        fclose($xmlData);
        $order_connect = new Order();

// Save order XML in file in shopify_order_received  directory
        // This creates a file, write the xml  for every order

        $file_name = 'Shopify_order_' . gmdate('YmdHis') . '.xml';
        file_put_contents(HOST_ORDER_RECEIVED_PATH . $file_name, $xmlString);

//file_put_contents('shopify_order_received/'.$file_name, $xmlString);

// Create an object XmlFormatter class

        if (file_exists(HOST_ORDER_RECEIVED_PATH . $file_name)) {

                $xml_formatter = new XmlFormatter();

// Call xml2Array function to convert the given xml file to associative array.

                $order_array = $xml_formatter->xml2Array(HOST_ORDER_RECEIVED_PATH . $file_name);
                $order_connect->insertOrderLogs($order_array['name'], 'Processed incoming xml data');

//Check wether the received array is empty or not.

                if (!empty($order_array)) {

            //check this order number is already processed if so passing 200 response.
           $order_check_id = $order_array['name'];
           $order_check_id = substr($order_check_id,1);
                   $order_id_exsist = $order_connect->getOrderId($order_check_id);
                   if ($order_id_exsist) {
                                $order_connect->insertOrderLogs($order_array['name'],'Order already exist pass 200 response');
                                header('HTTP/1.0 200 OK');
                                exit();
                        }

                        // create XML from the Order Array using the function createXml().
                        //The function return the  name of the created file if it  generate xml successfully.

                        $order_data = $xml_formatter->createXml($order_array, $file_name);
                        $order_id = $order_array['id'];
                        $order_name = $order_array['name'];
                        //check the file exist in SHOPIFY_ORDER_RECEIVED Folder

                        $order_modified_xml = HOST_ORDER_UPLOAD_PATH . $order_data;
                        $order_connect->insertOrderLogs($order_name, 'Formatted Xml and saved to order upload directory');

                        if (file_exists($order_modified_xml)) {

                                // Create an Object for SFTP handler.

                                $sftp_handler = new SFTPHandler();

                                //Login to the SFTP Server

                                $sftp_connect = $sftp_handler->connect();
                                $order_connect->insertOrderLogs($order_name, 'Trying to connect SFTP server');

                                //Login to SFTP Server Successful
                                if ($sftp_connect) {
                                        $upload = $sftp_handler->uploadFile($order_data);
                                        if ($upload) { 
                                                $order_connect->insertOrderLogs($order_name, 'Successfully connected and uploaded to FTP location');
                                                //unlink(HOST_ORDER_RECEIVED_PATH . $file_name);
/*                                                              $email_handler = new EmailHandler('Sales Order Uploaded-' . $order_name, 'Sales order generation and uploading successfully completed. Order ID:' . $order_id . ' Order Name:' . $order_name);
                                                $send_mail=     $email_handler->sendMail();
                                                if($send_mail)
                                                        {
                                                         header('HTTP/1.0 200 OK');
                                                        exit();

                                                        }
*/
                                                $order_number = substr($order_name, 1);
						                        $order_connect->insertOrder($order_id, $order_number);
                                                $order_connect->insertOrderLogs($order_name, 'Inserted order details to DB');
                                                $email_handler = new EmailHandler('Sales Order Uploaded-' . $order_name, 'Sales order generation and uploading successfully completed. Order ID:' . $order_id . ' Order Name:' . $order_name);
                                                $send_mail=     $email_handler->sendMail();
                                                header('HTTP/1.0 200 OK');
                                                exit();
                                                //echo "File Upload Successful";
                                        } else {

                                                throw new Exception('Order Uploading Failed  for the order :' . $order_name . ' .File transfer failed for the  order  file  ' . HOST_ORDER_UPLOAD_PATH . $order_modified_xml);

                                        }

                                } else {

                                        throw new Exception('Unable to authenticate the SFTP server @ ' . gmdate('Y-m-d H:i:s') . 'Order file transfer failed for the  order ' . $order_name . ' located at ' . HOST_ORDER_UPLOAD_PATH . $order_modified_xml);

                                }

                        } else {

                                throw new Exception('Unable to process the order created at' . gmdate('Y-m-d H:i:s') . ' with order order number  ' . $order_name . ', file name :' . $file_name);

                        }

                } else {

                        throw new Exception('Unable to process the order created at' . gmdate('Y-m-d H:i:s') . ' with order order name ' . $file_name);

                }

        } else {

                throw new Exception('Unable to receive the order created at' . gmdate('Y-m-d H:i:s'));

        }

// Send success status to  Shopify that the order received successfully.

// If you want to tell Shopify to try sending the data again, i.e. something
        // failed with your processing and you want to try again later

} catch (Exception $e) {

        $msg = $e->getMessage();
        $email_handler = new EmailHandler('Sales Order Gneration Failed', $msg);
        $email_handler->sendMail();
        header('HTTP/1.0 400 Bad request');
        exit();

}

?>
