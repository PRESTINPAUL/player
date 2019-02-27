<?php

include 'mysqli_connection_class.php';
/**
 *
 */
class Order {

	private $table_name = 'orders';

	function getOrderId($order_number = null) {

		if (!empty($order_number)) {

			$database = new DbHandler();

			$connection = $database->connect();

			if ($connection) {
				$query = "SELECT order_id FROM  orders WHERE order_number='" . $order_number . "' LIMIT 1 ";
				$result = $database->query($query);
				if ($result) {

					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							if (isset($row['order_id'])) {
								return intval($row['order_id']);
							}
						}
					} else {
						return false;
					}

				}
				return false;
			}
			return false;
		}

		return NULL;
	}

	public function insertOrder($order_id, $order_number) {

		if (!empty($order_id) && !empty($order_number)) {

			try
			{
				$database = new DbHandler();
				$connection = $database->connect();
				if ($connection) {

					$query = "INSERT INTO orders (`order_id`, `order_number`) VALUES ('" . $order_id . "', '" . $order_number . "')";

					$result = $database->query($query);
					if ($result) {

						return true;

					} else {
						throw new Exception("Order Insertion Failed Order.php@insertOrder : Failed to insert order details to orders table , Order ID :" . $order_id . " Order Number :" . $order_number);
					}

				} else {
					throw new Exception("Database Connection Failed Order.php@insertOrder: Failed to insert order details to orders table , Order ID :" . $order_id . " Order Number :" . $order_number);
				}

			} catch (Exception $e) {
				throw $e;

			}

		}
		return false;

	}
	public function deleteOrder($order_number) {

		if (!empty($order_number)) {

			$database = new DbHandler();

			$connection = $database->connect();

			if ($connection) {

				$query = "DELETE FROM `orders` WHERE `order_number` = '" . $order_number . "' ";
				$result = $database->query($query);
				if ($result) {
					return true;

				}
				return false;

			}

		}
		return false;
	}

    public function insertOrderLogs($order_number, $order_log_status) {

                if (!empty($order_number)) {

                        try
                        {
                                $database = new DbHandler();
                                $connection = $database->connect();
                                if ($connection) {
                    $log_time = gmdate('Y-m-d H:i:s');
                    $order_number_converted = substr($order_number, 1); //removing # from order number
                                        $query = "INSERT INTO Shopify_webhook_log (`order_number`,`log_time` ,
`log_status`) VALUES ('". $order_number_converted . "', '" . $log_time . "', '" . $order_log_status . "')";

                                        $result = $database->query($query);
                                        if ($result) {

                                                return true;

                                        } else {
                                                throw new Exception("Order loging Failed Order.php@insertOrder : Failed to insert order loging details to Shopify_webhook_log table , Order ID :" . $order_id . " Order Number :" . $order_number);
                                        }

                                } else {
                                        throw new Exception("Database Connection Failed Order.php@orderlogging: Failed to insert log details to Shopify_webhook_log table , Order ID :" . $order_id . " Order Number :" . $order_number);
                                }

                         } catch (Exception $e) {
                                throw $e;

                        }

                }
                return false;

        }

}

?>
