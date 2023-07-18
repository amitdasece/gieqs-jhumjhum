<?php

//require_once '../../../../assets/includes/config.inc.php';
require ('../assets/includes/config.inc.php');

error_reporting(E_ALL);

require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister ('class_loader');

$type = 1;


use Omnipay\Omnipay;
 
require_once(BASE_URI . '/assets/scripts/classes/general.class.php');
$general = new general;


$paypaldetails= $general->getSecretDetails(paypal);
// echo "<pre>";
// print_r($paypaldetails);
$paypal_client_id = $paypaldetails['paypal_client_id'];
$paypal_client_secret = $paypaldetails['paypal_client_secret'];
$paypal_client_username = $paypaldetails['paypal_client_username'];



define('CLIENT_ID', $paypal_client_id);
define('CLIENT_SECRET', $paypal_client_secret);
define('CLIENT_USERNAME', $paypal_client_username);


if ($type == 1){

 
define('PAYPAL_RETURN_URL', BASE_URL . '/pages/learning/scripts/subscriptions/success.php');
define('PAYPAL_CANCEL_URL', BASE_URL . '/pages/learning/scripts/subscriptions/cancel.php');
define('PAYPAL_CURRENCY', 'EUR'); // set your currency here
 
// Connect with the database 
/* $db = new mysqli('localhost', 'MYSQL_DB_USERNAME', 'MYSQL_DB_PASSWORD', 'MYSQL_DB_NAME'); 
 
if ($db->connect_errno) {
    die("Connect failed: ". $db->connect_error);
} */
 
$gateway = Omnipay::create('PayPal_Rest');
$gateway->setClientId(CLIENT_ID);
$gateway->setSecret(CLIENT_SECRET);
$gateway->setTestMode(false); //set it to 'false' when go live


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