<?php

include 'email_handler.php';
include_once 'global_config.php';

$email_handler = new EmailHandler('Sales Order Gneration ', 'Test Mail');
$email_handler->sendMail();
?>