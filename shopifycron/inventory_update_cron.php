<?php
//set_time_limit(0);
//ini_set('max_execution_time', 200);
include_once 'email_handler.php';
include 'shopify_import.php';
include 'Product.php';
include_once 'global_config.php';

try {

	$inventory = new Inventory();
	//$inventory_file = $inventory->downloadInventory();
	$inventory_file = '/var/www/html/playr/shopifycron/ML_INV_SNAPSHOT_2018-09-28T030401.xml';
	if (!empty($inventory_file)) {

		$inventory_array = $inventory->parseXMl('/var/www/html/playr/shopifycron/ML_INV_SNAPSHOT_2018-09-28T030401.xml');
		if (!empty($inventory_array) && isset($inventory_array['INVENTORY'])) {
			//load product to the memory
			$product = new Product();
			//$product->saveLiveProducts();
			$load_product = $product->loadProduct();

			if ($load_product) {

            

				foreach ($inventory_array['INVENTORY'] as $inventory_data) {


                  


					if (isset($inventory_data['SUBINVENTORY']) && $inventory_data['SUBINVENTORY'] == 'ON-HAND') {

                          

						if (!empty($inventory_data['PRODUCTID'])) {


							$product_variant_array = $product->getProductId($inventory_data['PRODUCTID']);




							if (!empty($product_variant_array)) {


                        


								//call inventory API

								$response = $inventory->updateInventory($product_variant_array, intval($inventory_data['QTYONHAND']));

								
							}
						}
					}
				}
				$product->unloadProduct();
				//unlink(HOST_INVENTORY_PATH . $inventory_file);
				//$inventory->deleteInventory($inventory_file);

				$email_handler = new EmailHandler('Inventory Updated', 'An Update to Product inventory is made @' . gmdate('Y-m-d H:i:s'));
				$email_handler->sendMail();

			} else {
				throw new Exception("Product Loading Failed : No product details available in the product table");
			}
		} else {
			throw new Exception("Empty data received after  Inventory xml file parsing");
		}

	} else {
		throw new Exception("Inventory file download failed or no files available");
	}
} catch (Exception $e) {
	$msg = $e->getMessage();
	echo $msg;
	// use wordwrap() if lines are longer than 70 characters
	//$msg = wordwrap($msg, 70);

	// send email
	$email_handler = new EmailHandler('Inventory Update Cron Failed', $msg . ' @ ' . gmdate('Y-m-d H:i:s'));
	$email_handler->sendMail();
	throw $e;
}

?>
