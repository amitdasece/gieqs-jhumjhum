<?php
// This example sets up an endpoint using the Slim framework.
// Watch this video to get started: https://youtu.be/sGcNPFX1Ph4.

$openaccess = 1;

//$requiredUserLevel = 6;

error_reporting(E_ALL);
require_once '../../../assets/includes/config.inc.php';

$location = BASE_URL . '/index.php';


$debug = false;

require_once BASE_URI . "/vendor/autoload.php";

spl_autoload_unregister ('class_loader');
error_reporting(E_ALL);

use Slim\Http\Request;
use Slim\Http\Response;
use Stripe\Stripe;
error_reporting(E_ALL);


$app = new \Slim\App;
error_reporting(E_ALL);

$app->add(function ($request, $response, $next) {
  \Stripe\Stripe::setApiKey('sk_test_51IsKqwEBnLMnXjoguHzjHquozIjRT1Wt5OuLAQqxJvkUvX6DwMebWAPwgXsWaW35r5WXk1m6CuxtkY72I6QNLpH200No1l1SwU');
  return $next($request, $response);
});

$app->post('/create-checkout-session', function (Request $request, Response $response) {
  $session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
      'price_data' => [
        'currency' => 'usd',
        'product_data' => [
          'name' => 'T-shirt',
        ],
        'unit_amount' => 2000,
      ],
      'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'https://example.com/success',
    'cancel_url' => 'https://example.com/cancel',
  ]);

  return $response->withJson([ 'id' => $session->id ])->withStatus(200);
});

$app->run();