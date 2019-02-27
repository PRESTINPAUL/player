<?php

include 'curl_http_client.php';
include_once 'global_config.php';
include_once 'Product.php';
$store_array = unserialize(STORE_LIST);

foreach ($store_array as $store) {

	$url = "https://" . $store['api_key'] . ":" . $store['secret_key'] . "@" . $store['url'] . "/admin/products.json";

	$curl = new Curl_HTTP_Client;
	$respose = $curl->send_post_data($url, null, null, 10, 'GET');

	$product_array = json_decode($respose, true);

	if (is_array($product_array)) {

		foreach ($product_array['products'] as $products) {
			# code...
			$vendor = isset($products['vendor']) ? $products['vendor'] : '';

			foreach ($products['variants'] as $variant) {

				if (!empty($variant['sku'])) {
					$variant_id = $variant['id'];
					$product_id = $variant['product_id'];
					$sku_id = $variant['sku'];
					$product = new Product();
					$add_product = $product->addProduct($product_id, $variant_id, $sku_id, $vendor);

				}

			}

		}

	}
}

?>
