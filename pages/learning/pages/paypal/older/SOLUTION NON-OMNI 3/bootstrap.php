<?php

require_once '../../../../assets/includes/config.inc.php';


error_reporting(E_ALL);

require_once BASE_URI . "/vendor/autoload.php";
spl_autoload_unregister ('class_loader');

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = true;

// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
    'client_id' => 'AbVwB5fRY3YvZFItT0hM5X3f3FWsH5Ef-3_xNwQQD6ALukAEKlYLcm-mewKT8JOJwZEa_MjOoPvKEvHH',
    'client_secret' => 'EITrFDMGJ23myVn_xy3r2Ole0POzFv2SjzTzANFxfs1_eRji32M2RC9SktzWVXo3HW1og-odvo857gy_',
    'return_url' => BASE_URL . '/pages/learning/pages/paypal/older/success.php',
    'cancel_url' => BASE_URL . '/pages/learning/pages/paypal/payment-cancelled.html'
];

// Database settings. Change these for your database configuration.
/* $dbConfig = [
    'host' => 'localhost',
    'username' => 'user',
    'password' => 'secret',
    'name' => 'example_database'
]; */

$apiContext = getApiContext($paypalConfig['client_id'], $paypalConfig['client_secret'], $enableSandbox);

/**
 * Set up a connection to the API
 *
 * @param string $clientId
 * @param string $clientSecret
 * @param bool   $enableSandbox Sandbox mode toggle, true for test payments
 * @return \PayPal\Rest\ApiContext
 */
function getApiContext($clientId, $clientSecret, $enableSandbox = false)
{
    $apiContext = new ApiContext(
        new OAuthTokenCredential($clientId, $clientSecret)
    );

    $apiContext->setConfig([
        'mode' => $enableSandbox ? 'sandbox' : 'live'
    ]);

    return $apiContext;
}
