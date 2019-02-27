<?php

include_once 'global_config.php';
include_once 'Order.php';

/**
 *
 */
class XmlFormatter {

	public function createXml($order = null, $host_file = null) {

		if (is_array($order) && !empty($order)) {

			$eu_iso = array(
				'AT' => 'Austria',
				'BE' => 'Belgium',
				'BG' => 'Bulgaria',
				'HR' => 'Croatia',
				'CY' => 'Cyprus',
				'CZ' => 'Czech Republic',
				'DK' => 'Denmark',
				'EE' => 'Estonia',
				'FI' => 'Finland',
				'FR' => 'France',
				'DE' => 'Germany',
				'GR' => 'Greece',
				'HU' => 'Hungary',
				'IE' => 'Ireland',
				'IT' => 'Italy',
				'LV' => 'Latvia',
				'LT' => 'Lithuania',
				'LU' => 'Luxembourg',
				'MT' => 'Malta',
				'NL' => 'Netherlands',
				'PL' => 'Poland',
				'PT' => 'Portugal',
				'RO' => 'Romania',
				'SK' => 'Slovakia',
				'SI' => 'Slovenia',
				'ES' => 'Spain',
				'SE' => 'Sweden',
				'GB' => 'United Kingdom');
			$ddp_country_list = array('US', 'AU', 'us', 'au');

                        //Country list to popup region field
                        $state_include_list = array('US', 'AU', 'CA', 'NZ');

			try
			{

				$shipment_type = '';
				$partner_number = '';
				$ml_partner = '';
				$shipping_lines = '';
				//getting order values
				if (ENVIRONMENT == 'DEVELOPMENT') {
					$partner_number = '16307';
					$ml_partner = '201095';
				} else {
					$partner_number = '16307';
					$ml_partner = '201095';
				}

				$order_name = $order['name'];
				$order_prefix = substr($order_name, 1);
				$order_number = $order_prefix;
				$order_line_item = $order['line-items'];

				$shipping_info = $order['shipping-address'];
				$billing_info = $order['billing-address'];

				if (isset($order['shipping-lines'])) {

					$shipping_lines = $order['shipping-lines'];
				}

				//set shipping type

				$shipping_country_iso = $shipping_info['country-code'];

				//Delivery duity paid is only for AUstralia and USA

				if (in_array($shipping_country_iso, $ddp_country_list)) {

					$delivery_type = 'DDP';
				} else {

					$delivery_type = 'DAP';
				}

				//Set Shiping Type from user Input

				$shiping_line_code = '';

				$shipping_country = $shipping_info['country'];

				//Checking the coutry ISO is in EU Country List
				if (array_key_exists($shipping_country_iso, $eu_iso) OR in_array($shipping_country, $eu_iso)) {

					//Checking the Shipping Lines array
					if (!empty($shipping_lines)) {

						$shiping_line_code = isset($shipping_lines['shipping-line']['title']) ? $shipping_lines['shipping-line']['title'] : '';
						//Checking the value of customer input for Shipping Type
						if(strpos($shiping_line_code, STANDARD_SHIPPING) !== false) {    
							$shipment_type = 'STD';
						} else {
							$shipment_type = 'EXP';
						}

					} else {

						$shipment_type = 'STD';
					}

				} else {

					$shipment_type = 'EXP';

				}

				//creating xml
				$dom = new DOMDocument('1.0');
				$dom->formatOutput = true;

				$root = $dom->createElement('Order');

				$root->setAttributeNS('http://www.w3.org/2001/XMLSchema-instance',
					'xsd:schemaLocation', 'http://www.w3.org/2001/XMLSchema');
				$dom->appendChild($root);

				$ControlArea = $dom->createElement('ControlArea');
				$root->appendChild($ControlArea);

				$ControlArea->appendChild($dom->createElement('Message', 'ML_SO_IN'));
				$ControlArea->appendChild($dom->createElement('Sender', 'CATAPULTDROP'));
				$ControlArea->appendChild($dom->createElement('Receiver', $partner_number));
				$ControlArea->appendChild($dom->createElement('CustomerOrder', $order_number));

				$DateTime = $dom->createElement('DateTime');
				$ControlArea->appendChild($DateTime);
				$DateTime->appendChild($dom->createElement('Year', gmdate('Y')));
				$DateTime->appendChild($dom->createElement('Month', gmdate('m')));
				$DateTime->appendChild($dom->createElement('Day', gmdate('d')));
				$DateTime->appendChild($dom->createElement('Time', gmdate('His')));

				$OrderHeader = $dom->createElement('OrderHeader');
				$root->appendChild($OrderHeader);

				$OrderHeader->appendChild($dom->createElement('Action', 'CREATE'));
				$OrderHeader->appendChild($dom->createElement('Location', '3220'));
				$OrderHeader->appendChild($dom->createElement('SalesOrg', '2220'));
				$OrderHeader->appendChild($dom->createElement('Division', '00'));
				$OrderHeader->appendChild($dom->createElement('DistChannel', '00'));
				$OrderHeader->appendChild($dom->createElement('DealID', 'CATPLT_FF'));
				$OrderHeader->appendChild($dom->createElement('Class', 'B2C'));
				$OrderHeader->appendChild($dom->createElement('Type', 'ZSTD'));
				$OrderHeader->appendChild($dom->createElement('CustomerOrder', $order_number));
				$OrderHeader->appendChild($dom->createElement('ThirdFreightAcct'));
				$OrderHeader->appendChild($dom->createElement('EndCustomerVAT'));
				$OrderHeader->appendChild($dom->createElement('Language'));
				$OrderHeader->appendChild($dom->createElement('YourRef1'));
				$OrderHeader->appendChild($dom->createElement('YourRef2'));
				$OrderHeader->appendChild($dom->createElement('Incoterm1', $delivery_type));
				$OrderHeader->appendChild($dom->createElement('Incoterm2', '.'));

				$OrderHeader->appendChild($dom->createElement('PartialDelv'));
				$OrderHeader->appendChild($dom->createElement('BillingOption'));
				$OrderHeader->appendChild($dom->createElement('ShipType', $shipment_type));
				$OrderHeader->appendChild($dom->createElement('NotesNoTag'));
				$OrderHeader->appendChild($dom->createElement('NotesWithTag'));

				$HeadDateTime = $dom->createElement('HeadDateTime');
				$OrderHeader->appendChild($HeadDateTime);

				$HeadDateTime->appendChild($dom->createElement('DateType', 'REQSHIPDATE'));
				$HeadDateTime->appendChild($dom->createElement('Year', gmdate('Y')));
				$HeadDateTime->appendChild($dom->createElement('Month', gmdate('m')));
				$HeadDateTime->appendChild($dom->createElement('Day', gmdate('d')));
				$HeadDateTime->appendChild($dom->createElement('Time', gmdate('His')));

				if (!empty($shipping_info)) {

					$email = is_string($order['customer']['email']) ? $order['customer']['email'] : '';

					$first_name = is_string($shipping_info['first-name']) ? $shipping_info['first-name'] : '';
					$last_name = is_string($shipping_info['last-name']) ? $shipping_info['last-name'] : '';
					$address = is_string($shipping_info['address1']) ? $shipping_info['address1'] : '';
					$city = is_string($shipping_info['city']) ? $shipping_info['city'] : '';
					$postal_code = is_string($shipping_info['zip']) ? $shipping_info['zip'] : '';
					$country = is_string($shipping_info['country-code']) ? $shipping_info['country-code'] : '';
					$phone = is_string($shipping_info['phone']) ? $shipping_info['phone'] : '';
					$state = is_string($shipping_info['province-code']) ? $shipping_info['province-code'] : '';

					$Partner = $dom->createElement('Partner');
					$OrderHeader->appendChild($Partner);

					$Partner->appendChild($dom->createElement('PartnerType', 'WE'));
					$Partner->appendChild($dom->createElement('CustPartner'));
					$Partner->appendChild($dom->createElement('MLPartner', $ml_partner));

					$Partner->appendChild($dom->createElement('Name', $first_name . ' ' . $last_name));

					$Partner->appendChild($dom->createElement('Company'));
					$Partner->appendChild($dom->createElement('AddrLine1', $address));
					$Partner->appendChild($dom->createElement('AddrLine2'));
					$Partner->appendChild($dom->createElement('AddrLine3'));

					$Partner->appendChild($dom->createElement('AddrLine4'));
					$Partner->appendChild($dom->createElement('AddrLine5'));
					$Partner->appendChild($dom->createElement('City', $city));
					//$Partner->appendChild($dom->createElement('State', $state));
		    			//Value in Region field only for only US, CA, AU, NZ.

			                    if (in_array($country, $state_include_list)) {
                        			$Partner->appendChild($dom->createElement('State', $state));
			                    } else {
                        			$Partner->appendChild($dom->createElement('State'));
			                    }

					$Partner->appendChild($dom->createElement('PostalCode', $postal_code));
					$Partner->appendChild($dom->createElement('Country', $country));
					$Partner->appendChild($dom->createElement('Email', $email));
					$Partner->appendChild($dom->createElement('Phone', $phone));

				}

				//Adding Billing information

				if (!empty($billing_info)) {

					$email = is_string($order['customer']['email']) ? $order['customer']['email'] : '';

					$first_name = is_string($billing_info['first-name']) ? $billing_info['first-name'] : '';
					$last_name = is_string($billing_info['last-name']) ? $billing_info['last-name'] : '';

					//$company = $shipping_info['company'] ?: '';
					$address = is_string($billing_info['address1']) ? $billing_info['address1'] : '';
					$city = is_string($billing_info['city']) ? $billing_info['city'] : '';
					$postal_code = is_string($billing_info['zip']) ? $billing_info['zip'] : '';
					$country = is_string($billing_info['country-code']) ? $billing_info['country-code'] : '';
					$phone = is_string($billing_info['phone']) ? $billing_info['phone'] : '';
					$state = is_string($shipping_info['province-code']) ? $shipping_info['province-code'] : '';

					$Partner = $dom->createElement('Partner');
					$OrderHeader->appendChild($Partner);

					$Partner->appendChild($dom->createElement('PartnerType', 'ZB'));
					$Partner->appendChild($dom->createElement('CustPartner'));
					$Partner->appendChild($dom->createElement('MLPartner', $ml_partner));

					$Partner->appendChild($dom->createElement('Name', $first_name . ' ' . $last_name));

					$Partner->appendChild($dom->createElement('Company'));
					$Partner->appendChild($dom->createElement('AddrLine1', $address));
					$Partner->appendChild($dom->createElement('AddrLine2'));
					$Partner->appendChild($dom->createElement('AddrLine3'));

					$Partner->appendChild($dom->createElement('AddrLine4'));
					$Partner->appendChild($dom->createElement('AddrLine5'));
					$Partner->appendChild($dom->createElement('City', $city));
					//Value in Region field only for US, CA, AU, NZ.
                                        if (in_array($country, $state_include_list)) {
                                            $Partner->appendChild($dom->createElement('State', $state));
			                } else {
                        		    $Partner->appendChild($dom->createElement('State'));
			                }	
					
					$Partner->appendChild($dom->createElement('PostalCode', $postal_code));
					$Partner->appendChild($dom->createElement('Country', $country));
					$Partner->appendChild($dom->createElement('Email', $email));
					$Partner->appendChild($dom->createElement('Phone', $phone));

				}
				//end of Biling information

				if (!empty($order_line_item)) {

//Handling  Single item in the order array
					if (isset($order_line_item['line-item']['sku'])) {

						$item = $order_line_item['line-item'];

						$sku = is_string($item['sku']) ? $item['sku'] : '';
						$variant_id = is_string($item['id']) ? $item['id'] : '';
						$quantity = is_string($item['quantity']) ? $item['quantity'] : '';
						$item_price = is_string($item['price']) ? $item['price'] : '';
						$currency = is_string($order['currency']) ? $order['currency'] : '';
						$order_note = is_string($item['name']) ? $item['name'] : '';

						$OrderDetail = $dom->createElement('OrderDetail');
						$root->appendChild($OrderDetail);

						$OrderDetail->appendChild($dom->createElement('Action', 'CREATE'));
						$OrderDetail->appendChild($dom->createElement('CustItemNo', 1));
						$OrderDetail->appendChild($dom->createElement('InventoryPart', $sku));
						$OrderDetail->appendChild($dom->createElement('AltPartNo'));
						$OrderDetail->appendChild($dom->createElement('BatchNo'));
						$OrderDetail->appendChild($dom->createElement('StorageLoc'));
						$OrderDetail->appendChild($dom->createElement('ItemDateTime'));
						$OrderDetail->appendChild($dom->createElement('ItemYourRef1'));
						$OrderDetail->appendChild($dom->createElement('ItemYourRef2'));
						$OrderDetail->appendChild($dom->createElement('ItemYourRef2Line'));
						$OrderDetail->appendChild($dom->createElement('Quantity', $quantity));
						$OrderDetail->appendChild($dom->createElement('UOM', 'EA'));

						$Price = $dom->createElement('Price');
						$OrderDetail->appendChild($Price);

						$Price->appendChild($dom->createElement('Type', 'ZPRO'));
						$Price->appendChild($dom->createElement('Amount', $item_price));
						$Price->appendChild($dom->createElement('Currency', $currency));

						$Price_zexp = $dom->createElement('Price');
						$OrderDetail->appendChild($Price_zexp);

						$Price_zexp->appendChild($dom->createElement('Type', 'ZEXP'));
						$Price_zexp->appendChild($dom->createElement('Amount', $item_price));
						$Price_zexp->appendChild($dom->createElement('Currency', $currency));

						$ItemNotesNoTag = $dom->createElement('ItemNotesNoTag');
						$OrderDetail->appendChild($ItemNotesNoTag);

						$ItemNotesNoTag->appendChild($dom->createElement('NoteID', 'ZI07'));
						$ItemNotesNoTag->appendChild($dom->createElement('NoteLine', $order_note));

					} else {

						// Handling  Mulitple items
						$i = 1;
						foreach ($order_line_item['line-item'] as $item) {

							if (isset($item['sku']) && !empty($item['sku'])) {

								$sku = is_string($item['sku']) ? $item['sku'] : '';
								$variant_id = is_string($item['id']) ? $item['id'] : '';
								$quantity = is_string($item['quantity']) ? $item['quantity'] : '';
								$item_price = is_string($item['price']) ? $item['price'] : '';
								$currency = is_string($order['currency']) ? $order['currency'] : '';
								$order_note = is_string($item['name']) ? $item['name'] : '';
								$OrderDetail = $dom->createElement('OrderDetail');
								$root->appendChild($OrderDetail);

								$OrderDetail->appendChild($dom->createElement('Action', 'CREATE'));
								$OrderDetail->appendChild($dom->createElement('CustItemNo', $i));
								$OrderDetail->appendChild($dom->createElement('InventoryPart', $sku));
								$OrderDetail->appendChild($dom->createElement('AltPartNo'));
								$OrderDetail->appendChild($dom->createElement('BatchNo'));
								$OrderDetail->appendChild($dom->createElement('StorageLoc'));
								$OrderDetail->appendChild($dom->createElement('ItemDateTime'));
								$OrderDetail->appendChild($dom->createElement('ItemYourRef1'));
								$OrderDetail->appendChild($dom->createElement('ItemYourRef2'));
								$OrderDetail->appendChild($dom->createElement('ItemYourRef2Line'));
								$OrderDetail->appendChild($dom->createElement('Quantity', $quantity));
								$OrderDetail->appendChild($dom->createElement('UOM', 'EA'));

								$Price = $dom->createElement('Price');
								$OrderDetail->appendChild($Price);

								$Price->appendChild($dom->createElement('Type', 'ZPRO'));
								$Price->appendChild($dom->createElement('Amount', $item_price));
								$Price->appendChild($dom->createElement('Currency', $currency));

								$Price_zexp = $dom->createElement('Price');
								$OrderDetail->appendChild($Price_zexp);

								$Price_zexp->appendChild($dom->createElement('Type', 'ZEXP'));
								$Price_zexp->appendChild($dom->createElement('Amount', $item_price));
								$Price_zexp->appendChild($dom->createElement('Currency', $currency));

								$ItemNotesNoTag = $dom->createElement('ItemNotesNoTag');
								$OrderDetail->appendChild($ItemNotesNoTag);

								$ItemNotesNoTag->appendChild($dom->createElement('NoteID', 'ZI07'));
								$ItemNotesNoTag->appendChild($dom->createElement('NoteLine', $order_note));
							} //sku
							$i++;

						} //foreach
					}
				} //not empty
				//echo '<xmp>'. $dom->saveXML() .'</xmp>';
				$file_name = "ML_SalesOrder_" . gmdate('YmdHis') . ".xml";

				if ($dom->save(HOST_ORDER_UPLOAD_PATH . $file_name)) {

					//chmod(HOST_ORDER_UPLOAD_PATH.$file_name, 0777);
					//Unlinking the host order received file

					//unlink(HOST_ORDER_RECEIVED_PATH . $host_file);

					//saving order number- order name mapping into order table

					//$order_obj = new Order();
					//$order_obj->insertOrder($order['id'], $order_number);
					return $file_name;

				} else {
					throw new Exception("Sales Order XML creation & saving failed :xml_formatter@createXML Order Number:" . $order_number . " Order ID: " . $order['id']);

				}

			} catch (Exception $e) {

				throw $e;
			}

		}
		return NULL;
	}

	function xml2Array($filename) {

		//Load XML File
		try
		{
			$xml_file = simplexml_load_file($filename, "SimpleXMLElement", LIBXML_NOCDATA);

			// Convert XML File to Json formatted data

			$json_format = json_encode($xml_file);

			//Convert Json to Array

			$formatted_array = json_decode($json_format, TRUE);

// Return the Formatted array if it is a valid array else send null
			if (is_array($formatted_array)) {
				return $formatted_array;
			}
			return NULL;
		} catch (Exception $e) {
			return NULL;
		}

	}

}

?>
