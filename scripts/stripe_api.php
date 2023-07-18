<?php

require ('../assets/includes/config.inc.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once(BASE_URI . '/assets/scripts/classes/general.class.php');
$general = new general;
require_once(BASE_URI . '/assets/scripts/classes/users.class.php');
$users = new users;

$stripedetails= $general->getSecretDetails(stripe);

// echo $stripedetails['stripe_secret_key'];
// exit;
\Stripe\Stripe::setApiKey($stripedetails['stripe_secret_key']);
$stripe = new \Stripe\StripeClient(
    $stripedetails['stripe_secret_key']
  );

