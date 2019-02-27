<?php

//ENVIRONMENT SETTINGS
define('ENVIRONMENT', 'PRODUCTION');

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
define('DATABASE_NAME', 'playr_shoppify');
define('DATABASE_USER', 'root');
define('DATABASE_PASSWORD', 'root');

// SFTP server configuration

define('SFTP_SERVER', '13.210.157.197');
define('SFTP_USERNAME', 'playertekftp');
define('SFTP_PASSWORD', 'p6e5VY0uMWgVE');
define('SFTP_PORT', 22);

//sftp FOLDER path

define('REMOTE_SALES_ORDER', '/mlnk/PRODUCTION/SO/');
define('REMOTE_INVENTORY', '/mlnk/PRODUCTION/INVSNAPSHOT/');
define('REMOTE_INVENTORY_DIRECTORY', '/PRODUCTION/INVSNAPSHOT');

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
define('REMOTE_SHIPMENT_PATH', '/mlnk/PRODUCTION/SHIPCON/');
define('REMOTE_SHIPMENT_DIRECTORY', '/PRODUCTION/SHIPCON');

//Shipment Notify Customer
define('SHIPMENT_NOTIFY_CUSTOMER', true);

//Store Management

$store = ['STORE_UK' => [
        'store_name' => 'playrsmartcoach-gb',
        'url' => 'playrsmartcoach.myshopify.com',
        'order_prefix' => 'PR11',
        'api_key' => 'a445a6bc87443df7f9a59d4ca7a8db26',
        'secret_key' => '2cb6b8b7cfcc0d69b0c74226dbd0f097',
        'location_id' => '5282136129',

    ],

    'STORE_US' => [
        'store_name' => 'playrsmartcoach-us',
        'url' => 'usplayrsmartcoach.myshopify.com',
        'order_prefix' => 'PR33',
        'api_key' => '766dd0e6f4b565146bcbd46503f8e234',
        'secret_key' => 'fdc97b6a8626b7120d8f71f547537f19',
        'location_id' => '9642803257',
    ],

    'STORE_EU' => [
        'store_name' => 'playrsmartcoach-eu',
        'url' => 'euplayrsmartcoach.myshopify.com',
        'order_prefix' => 'PR22',
        'api_key' => 'a34986eac01814417cdc0844c255e68a',
        'secret_key' => '9114a2787553db2d1e7339302e86b6ca',
        'location_id' => '7164067958',

        ],
        

   'STORE_SE' => [
        'store_name' => 'playrsmartcoach-se',
        'url' => 'sekplayrsmartcoach.myshopify.com',
        'order_prefix' => 'PR55',
        'api_key' => '32a1e5ba47511c32b338a05946eee4e3',
        'secret_key' => '29f71df55ceed57b9eee71a2ae8f2239',
         'location_id' => '13973979208',
    ],
       
];

$store_serialize = serialize($store);
define('STORE_LIST', $store_serialize);

define('STANDARD_SHIPPING', 'Standard Shipping');

?>
