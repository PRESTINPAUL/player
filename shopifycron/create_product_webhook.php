<?php

include 'Product.php';

try
{
	$entityBody = file_get_contents('php://input');

	$product_array = json_decode($entityBody, true);

	if (is_array($product_array)) {

		$vendor = isset($product_array['vendor']) ? $product_array['vendor'] : '';

		foreach ($product_array['variants'] as $variant) {

			$variant_id = $variant['id'];
			$product_id = $variant['product_id'];
			$sku_id = $variant['sku'];
			$product = new Product();
			$add_product = $product->addProduct($product_id, $variant_id, $sku_id, $vendor);

		}

		header('HTTP/1.0 200 OK');
		exit();
	}

} catch (Exception $e) {
	header('HTTP/1.0 400 Bad request');
	exit();
}

?>
