<?php

include 'xml_formatter.php';
include 'curl_http_client.php';
include_once 'global_config.php';
include 'shopify_export.php';

class Inventory {

	function updateInventory($variant_array = null, $quantity = null) {

		if (!empty($variant_array) && !empty($quantity)) {

			//Updating to all stores
			#STORE_LIST contain list of preconfigured stores

			$store_array = unserialize(STORE_LIST);
			foreach ($store_array as $store) {

				if (isset($store['api_key']) && isset($store['secret_key'])) {

					//check the prodcut exist in the given store

					foreach ($variant_array as $variant) {

						if (isset($variant[$store['store_name']]) && !empty($variant[$store['store_name']])) {

							$curl = new Curl_HTTP_Client;

							$val_to_pass = []; 

							$inventory_id_url = "https://" . $store['api_key'] . ":" . $store['secret_key'] . "@" . $store['url'] . "/admin/variants/" . $variant[$store['store_name']] . ".json";
							$inven_respose = $curl->send_post_data($inventory_id_url,$val_to_pass,null,10,'GET');
							$inven_respose = json_decode($inven_respose);
							$inventory_id_res = $inven_respose->variant->inventory_item_id;
							if(!empty($inventory_id_res)){

								$inventory_update = "https://" . $store['api_key'] . ":" . $store['secret_key'] . "@" . $store['url'] . "/admin/inventory_levels/set.json";

								$post_data = array('location_id' => $store['location_id'], 'inventory_item_id' =>$inventory_id_res, 'available'=> $quantity);

								$post_data =  json_encode($post_data);
								if(!empty($post_data)){
									$response = $curl->update_inventory_curl($inventory_update, $post_data, null, 10, 'POST');
								}

							}

						}
					}

				}

			}
			return true;

		}
		return false;

	}

	function downloadInventory() {

		$handler = new SFTPHandler();
		$handler->connect();
		$file = $handler->downloadFile();
		if ($file === false || $file === null) {
			return false;
		} else {
			return $file;
		}

	}

	function deleteInventory($file) {

		$handler = new SFTPHandler();
		$connection = $handler->connect();
		if ($connection) {
			$handler->deleteFile(REMOTE_INVENTORY . $file);
			return true;
		}
		return false;

	}

	function parseXMl($file_name) {

		$xml_handler = new XmlFormatter();
		$inventory_update = $xml_handler->xml2Array($file_name);
		if (is_array($inventory_update)) {
			return $inventory_update;
		}
		return NULL;

	}

}

?>
