<?php

//require_once '../../../../assets/includes/config.inc.php';


error_reporting(E_ALL);

require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister ('class_loader');

$type = 1;


use Omnipay\Omnipay;
 
define('CLIENT_ID', 'ARPNCITw1vQblZmydQjxGvbr3WcR5ILF7n1AjiaR9KJDwLaSsZlrMDDru3yW4K1QFgspGhokiGCjjm5Y');
define('CLIENT_SECRET', 'EK4ouLT93-nrGFwnAZ42ah4lqo_ShD5HpPRX9Ilr7ahIc6pkLBUi_gyxSzLCJoCP-08pv4Z7f3J0MCjV');
define('CLIENT_USERNAME', 'sb-noomn3535571@business.example.com');


if ($type == 1){

 
define('PAYPAL_RETURN_URL', BASE_URL . '/pages/learning/pages/paypal/success.php');
define('PAYPAL_CANCEL_URL', BASE_URL . '/pages/learning/pages/paypal/cancel.php');
define('PAYPAL_CURRENCY', 'EUR'); // set your currency here
 
// Connect with the database 
/* $db = new mysqli('localhost', 'MYSQL_DB_USERNAME', 'MYSQL_DB_PASSWORD', 'MYSQL_DB_NAME'); 
 
if ($db->connect_errno) {
    die("Connect failed: ". $db->connect_error);
} */
 
$gateway = Omnipay::create('PayPal_Rest');
$gateway->setClientId(CLIENT_ID);
$gateway->setSecret(CLIENT_SECRET);
$gateway->setTestMode(true); //set it to 'false' when go live


}else{

    define('PAYPAL_RETURN_URL', BASE_URL . '/pages/learning/pages/paypal/success.php');
    define('PAYPAL_CANCEL_URL', BASE_URL . '/pages/learning/pages/paypal/cancel.php');
    define('PAYPAL_CURRENCY', 'EUR'); // set your currency here
     
    // Connect with the database 
    /* $db = new mysqli('localhost', 'MYSQL_DB_USERNAME', 'MYSQL_DB_PASSWORD', 'MYSQL_DB_NAME'); 
     
    if ($db->connect_errno) {
        die("Connect failed: ". $db->connect_error);
    } */
     
    $gateway = Omnipay::create('PayPal_Express');
    $gateway->setUsername(CLIENT_USERNAME);
    $gateway->setPassword(CLIENT_ID);
    $gateway->setSignature(CLIENT_SECRET);
    $gateway->setTestMode(true); //set it to 'false' when go live

}