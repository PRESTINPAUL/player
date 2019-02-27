<?php
include 'Product.php';

try
{
	$entityBody = file_get_contents('php://input');

	$product_data = json_decode($entityBody, true);
error_log(print_r($product_data['id'],true));

	if (isset($product_data) && !empty($product_data['id'])) {

		$product_id =preg_replace('~[\r\n]+~', '', $product_data['id']);


		$product = new Product();
		$delete_product = $product->deleteProduct($product_id);
		if ($delete_product) {
			header('HTTP/1.0 200 OK');
			exit();

		}

		header('HTTP/1.0 400 Bad request');
		exit();
	} else {
		//data not received

		header('HTTP/1.0 400 Bad request');
		exit();
	}

} catch (Exception $e) {
	header('HTTP/1.0 400 Bad request');
	exit();
}

?>

