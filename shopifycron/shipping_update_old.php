<?php

include_once 'global_config.php';
include 'shopify_export.php';
include_once 'xml_formatter.php';
include_once 'curl_http_client.php';
include_once 'email_handler.php';
include_once 'Order.php';

try
{
	$sftp_handler = new SFTPHandler();
//Login to the SFTP Server
	$sftp_connect = $sftp_handler->connect();

	if (!$sftp_connect) {

		//throwing new SFTP connecton exception.
		throw new Exception("SFTP Connection Failed : Failed to connect SFTP server at this moment - " . gmdate('Y-m-d H:i:s'));

	}

	$shipping_array = $sftp_handler->listShipping();
	if (empty($shipping_array)) {

		//NO shipment files present , cancelling the cron job
		echo "No files to process, cron job exiting...";

		$email_handler = new EmailHandler('Shipment Fulfillment: No files to process', 'There are no shipment files exist in the server. Crone job exiting  @ ' . gmdate('Y-m-d H:i:s'));
		$email_handler->sendMail();

		exit();
	}

	$file_name = 'ML_ShipConfirm_0000000103875905_2018-09-19T091437.xml';
	$error_files = '';
	$success_files = '';

	//foreach ($shipping_array as $file_name) {

		$file_data = $sftp_handler->getFile($file_name);
		$formatted_array = call_user_func('formatArray', $file_data);

		if (!empty($formatted_array)) {

			//get all line-item id's

			$data = array();

			//get order id

			$order_id = isset($formatted_array['ControlArea']['CustomerOrder']) ? $formatted_array['ControlArea']['CustomerOrder'] : NULL;

			//get tracking number

			$tracking_number = isset($formatted_array['Shipment']['CarrierDetail']['TrackingNumber']) ? $formatted_array['Shipment']['CarrierDetail']['TrackingNumber'] : NULL;

			//get shipment partner

			$tracking_company = isset($formatted_array['Shipment']['Ship_via']) ? $formatted_array['Shipment']['Ship_via'] : NULL;

			$fullfillment_data = array("fulfillment" => array("tracking_number" => $tracking_number, "tracking_company" => $tracking_company, "notify_customer" => true));

			$respose = call_user_func('createFulfillment', $order_id, $fullfillment_data);
			if (!empty($respose)) {

				$response_data = json_decode($respose, true);

				if (isset($response_data['fulfillment']) && $response_data['fulfillment']['status'] == "success") {

					//unlink the file name from SFTP server
					$success_files .= "File Name :" . $file_name . "| Order ID " . $order_id . "| Tracking Number : " . $tracking_number . "     ,  ";

					$sftp_handler->deleteFile(REMOTE_SHIPMENT_PATH . $file_name);

				} else {

					$error_files .= "File Name :" . $file_name . "| Order ID " . $order_id . "| Tracking Number : " . $tracking_number . " Error : " . $response_data['errors'] . "  ,";

				}

			} else {

				//NULL response from the Fulfillment  API call

				$error_files .= "File Name :" . $file_name . "| Order ID " . $order_id . "| Tracking Number : " . $tracking_number . " Error : NULL response received from the Fulfillment API ,";

			}

		} else {
			//XML Parsing error

			$error_files .= "File Name :" . $file_name . " Error : XML Parsing Error . Failed to parse xml file from the SFTP serve ,";
		}

	//}

	#cron complete
	#send cron status
	#exit
	echo "Cron job completed";

	$email_handler = new EmailHandler('Shipment Fulfillment Cron Completed ', "Success File List :" . $success_files . '_ & _Failed File List : ' . $error_files);
	$email_handler->sendMail();
	exit();

} catch (Exception $e) {

	$msg = $e->getMessage();
	echo $msg;

	$email_handler = new EmailHandler('Fulfillment  Update Cron Failed', $msg . ' @ ' . gmdate('Y-m-d H:i:s'));
	$email_handler->sendMail();
	exit();

}

function createFulfillment($id, $post_data) {

	if (!empty($post_data) && !empty($id)) {

		//get order id from order number

		$order = new Order();
		$order_id = $order->getOrderId($id);

		if (!$order_id) {

			return NULL;

		}

		$order_prefix = substr($id, 0, 4);

		$api_key = '';
		$api_secret = '';
		$url = '';
		$store_array = unserialize(STORE_LIST);
		foreach ($store_array as $store) {

			#getting the API and Secret key for the store

			if ($store['order_prefix'] == $order_prefix) {
				$api_key = $store['api_key'];
				$api_secret = $store['secret_key'];
				$url = $store['url'];
				$location_id = $store['location_id'];

			}
		}
		if (!empty($api_key) && !empty($api_secret)) {
            
            $post_data['fulfillment']['location_id'] = $location_id;
			$curl = new Curl_HTTP_Client;
			
			$fullfillment_url = "https://" . $api_key . ":" . $api_secret . "@" . $url . "/admin/orders/" . $order_id . "/fulfillments.json";

			$respose = $curl->send_post_data($fullfillment_url, $post_data, null, 10, 'POST');

			return $respose;

		}

		return NULL;

	}
	return NULL;
}

function formatArray($xml_string) {
	if (!empty($xml_string)) {

		$xml = simplexml_load_string($xml_string);

		$json_format = json_encode($xml);

		$formatted_array = json_decode($json_format, TRUE);

		return $formatted_array;

	}
	return NULL;

}
?>
