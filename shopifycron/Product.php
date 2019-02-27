<?php

include_once 'mysqli_connection_class.php';
/**
 *
 */
class Product {

	private $table_name = 'products';

	var $prduct_array = array();

	function loadProduct() {

		try
		{
			$database = new DbHandler();
			$connection = $database->connect();

			if ($connection) {
				$result = $database->select('SELECT variant_id,sku_id,vendor FROM products');

				if ($result) {
					while ($row = $result->fetch_assoc()) {

						$this->prduct_array[$row['sku_id']][] = array($row['vendor'] => $row['variant_id']);

					}

					return true;
				}
				return false;
			} else {
				throw new Exception("Database Connection Error: Cant connect to database : Products@loadProdduct");

			}

		} catch (Exception $e) {

			throw $e;

		}

	}
	function getProductId($sku_id = null) {

		if (array_key_exists($sku_id, $this->prduct_array)) {

			return $this->prduct_array[$sku_id];
		}
		return NULL;
	}
	function unloadProduct() {
		$this->prduct_array = NULL;

	}

	public function addProduct($product_id, $variant_id, $sku_id, $vendor) {

		if (!empty($product_id) && !empty($variant_id) && !empty($sku_id) && !empty($vendor)) {

			$database = new DbHandler();

			$connection = $database->connect();

			if ($connection) {

				$query = "INSERT INTO products (`product_id`, `variant_id`,`sku_id`,`vendor`) VALUES ('" . $product_id . "', '" . $variant_id . "', '" . $sku_id . "' , '" . $vendor . "')";
				$result = $database->query($query);
				if ($result) {
					return true;
				}
				return false;
			}
			return false;

		}
		return false;

	}
	public function deleteProduct($product_id) {

		if (!empty($product_id)) {

			$database = new DbHandler();

			$connection = $database->connect();

			if ($connection) {

				$query = "DELETE FROM `products` WHERE `product_id` = '" . $product_id . "' ";
				$result = $database->query($query);
				if ($result) {
					return true;

				}
				return false;

			}

		}
		return false;
	}

}

?>
