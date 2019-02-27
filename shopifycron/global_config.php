<?php

//ENVIRONMENT SETTINGS
define('ENVIRONMENT', 'DEVELOPMENT');

//File path settings

//Application Base Path
define('BASE_PATH', realpath(dirname(__FILE__)));

//Storing Order details from Shopify Webhook in  xml format
define('HOST_ORDER_RECEIVED_PATH', BASE_PATH . '/shopify_order_received/');

//Temprary Storage path for formatted orders ready to upload to ModulLink
define('HOST_ORDER_UPLOAD_PATH', BASE_PATH . '/order_upload/');

//Temprary storage path for receiving inventory update.
define('HOST_INVENTORY_PATH', BASE_PATH . '/inventory/');

// Database configuration

define('DATABASE_SERVER', 'localhost');
define('DATABASE_NAME', 'playr_shoppify_qa');
define('DATABASE_USER', 'root');
define('DATABASE_PASSWORD', 'root');

// SFTP server configuration

define('SFTP_SERVER', '13.210.157.197');
define('SFTP_USERNAME', 'playertekftp');
define('SFTP_PASSWORD', 'p6e5VY0uMWgVE');
define('SFTP_PORT', 22);

//sftp FOLDER path

define('REMOTE_SALES_ORDER', '/mlnk/TEST/SO/');
define('REMOTE_INVENTORY', '/mlnk/TEST/INVSNAPSHOT/');
define('REMOTE_INVENTORY_DIRECTORY', '/TEST/INVSNAPSHOT');

//email Configuration settngs
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_USER_NAME', 'catapultsportsforga@gmail.com');
define('SMTP_PASSWORD', 'cat@*pult%sp0rt!');
define('SMTP_SEND_FROM', 'catapultsportsforga@gmail.com');
define('SMTP_RECEIVER', 'prestin@qburst.com');
define('SMTP_ATTACHMENT_PATH', '');
define('SMTP_SENDER_NAME', 'PLAYR');

//Inventory Xml Node values

define('INVENTORY_TAG', 'INVENTORY');
define('SUB_INVENTORY_TAG', 'SUBINVENTORY');
define('INVENTORY_ON_HAND', 'ON-HAND');
define('PRODUCT_ID', 'PRODUCTID');
define('IVENTORY_QUANTITY_COUNT', 'QTYONHAND');

define('HOST_SHIPMENT_PATH', BASE_PATH . '/shipment_update/');
define('REMOTE_SHIPMENT_PATH', '/mlnk/TEST/SHIPCON/');
define('REMOTE_SHIPMENT_DIRECTORY', '/TEST/SHIPCON');

//Shipment Notify Customer
define('SHIPMENT_NOTIFY_CUSTOMER', true);

//Store Management

$store = [
	'STORE_QA' => [
        'store_name' => 'playr-qa',
        'url' => 'playrsmartcoach-qa.myshopify.com',
        'order_prefix' => 'PR00',
        'api_key' => '1bd3b56ec1bd3f76c21dd149fa17f5f7',
        'secret_key' => '9f786eff11b96bca71139bef0e4aa7a2',
        'location_id' => '14674460770',

    ],
    'STORE_PLAYERTEK' => [
        'store_name' => 'PlayerTek Australia',
        'url' => 'playertek-qa.myshopify.com',
        'order_prefix' => 'TESTAU',
        'api_key' => 'c1c1539b508ce535332c90b18a802441',
        'secret_key' => 'ae6d9469fe51a4ed0455766db3b02389',
        'location_id' => '4771479616',
    ],
];

$store_serialize = serialize($store);
define('STORE_LIST', $store_serialize);

define('STANDARD_SHIPPING', 'Standard Shipping');

?>
