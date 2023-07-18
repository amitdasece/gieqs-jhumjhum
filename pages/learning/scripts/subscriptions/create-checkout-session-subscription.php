<?php
$openaccess = 1;

//$requiredUserLevel = 6;


error_reporting(E_ALL);
require_once '../../../../assets/includes/config.inc.php';

error_reporting(E_ALL);

require(BASE_URI . '/assets/scripts/interpretUserAccess.php');

$general = new general;
$users = new users;
$users->Load_from_key($userid);


error_reporting(E_ALL);

require_once(BASE_URI . '/assets/scripts/classes/assetManager.class.php');
$assetManager = new assetManager;

require_once(BASE_URI . '/assets/scripts/classes/userActivity.class.php');
$userActivity = new userActivity;

require_once(BASE_URI . '/assets/scripts/classes/userFunctions.class.php');
$userFunctions = new userFunctions;


require_once(BASE_URI . '/assets/scripts/classes/assets_paid.class.php');
$assets_paid = new assets_paid;



require_once(BASE_URI . '/assets/scripts/classes/subscriptions.class.php');
$subscription = new subscriptions;


require_once BASE_URI . "/vendor/autoload.php";
error_reporting(E_ALL);

spl_autoload_unregister ('class_loader');
error_reporting(E_ALL);

use Stripe\Stripe;

//CHANGE FOR STRIPE TEST

if ($stripe_status_live === true){

    require(BASE_URI . '/scripts/stripe_api.php'); 

}else{

    \Stripe\Stripe::setApiKey('sk_test_51IsKqwEBnLMnXjoguHzjHquozIjRT1Wt5OuLAQqxJvkUvX6DwMebWAPwgXsWaW35r5WXk1m6CuxtkY72I6QNLpH200No1l1SwU');
    $stripe = new \Stripe\StripeClient(
        'sk_test_51IsKqwEBnLMnXjoguHzjHquozIjRT1Wt5OuLAQqxJvkUvX6DwMebWAPwgXsWaW35r5WXk1m6CuxtkY72I6QNLpH200No1l1SwU'
      ); 
    

}


//require(BASE_URI . '/../scripts/stripe_api.php'); //turn back on for live

//test

//require(BASE_URI . '/../scripts/stripe_api.php');

error_reporting(E_ALL);

header('Content-Type: application/json');
error_reporting(E_ALL);
error_reporting(E_ALL);

$debug = false;

$data = json_decode(file_get_contents('php://input'), true);
//print_r($data);

function prorate(\Stripe\Subscription $subscription, $proration_time)
{
    $period_start = $subscription->current_period_start;
    $period_end = $subscription->current_period_end;
    $amount = $subscription->plan->amount;

    $period_length = $period_end - $period_start;

    $elapsed_since_start = $proration_time - $period_start;

    $refund = $amount - floor(($elapsed_since_start / $period_length) * $amount);

    return $refund > 0 ? (int) $refund : 0;
}

if (isset($data['subscription_id'])){

    $subscription_id = $data['subscription_id'];


}

if (isset($data['asset_id'])){

    $asset_id = $data['asset_id'];

    if ($debug){

        echo 'asset id set';
    }


}

//if both are set reject

if (isset($subscription_id) && isset($asset_id)){

    if ($debug){

        echo 'both subscription id and asset id set';
    }

    die();
}

if (!isset($subscription_id) && !isset($asset_id)){

    if ($debug){

        echo 'neither subscription id or asset id set';
    }

    die();
}




$YOUR_DOMAIN = BASE_URL;
//echo $YOUR_DOMAIN;
error_reporting(E_ALL);




if (isset($subscription_id)){


    //because this is a renewal
    if ($subscription->Return_row($subscription_id)){
    
        $subscription->Load_from_key($subscription_id);
    
        //if subscription exists
    
        //check the user id is the same as the logged in user
    
        $subscriptionUser = $subscription->getuser_id();
        $activeUser = $userid;
    
        if ($subscriptionUser != $activeUser){
    
            //active user is not the user that owns the subscription
    
            echo 'Permissions Error.  Active user is not the subscription owner';
            die();
    
        }
    
    
        //old subscription
        $subscription_to_return = array();
    
        $subscription_to_return['asset_name'] = $assetManager->getAssetName($subscription_id);
        $subscription_to_return['asset_type'] = $assetManager->getAssetTypeText($assetManager->getAssetType($subscription_id));
        $subscription_to_return['asset_id'] = $assetManager->getAssetid($subscription_id);
    
        $assets_paid->Load_from_key($subscription_to_return['asset_id']);
    
        $subscription_to_return['cost'] = $assets_paid->getcost();
        $subscription_to_return['description'] = $assets_paid->getdescription();
        $subscription_to_return['renew_frequency'] = $assets_paid->getrenew_frequency();
    
        $subscription_to_return['user_id'] = $subscription->getuser_id();
        $subscription_to_return['expiry_date'] = $subscription->getexpiry_date();
    
        //if the old subscription is expired make inactive
    
        $current_date = new DateTime('now', new DateTimeZone('UTC'));
    
        $active = $assetManager->isSubscriptionActive($subscription_id, $current_date, $debug);
    
        if (!$active){
    
            $subscription->setactive('0');
            $subscription->prepareStatementPDOUpdate();
    
    
        }
    
    
    
    
    
        //new subscription
        //ADD THE RENEW FREQUENCY TO THE OLD EXPIRY DATE
        //START DATE NOW
    
        $current_date = new DateTime('now', new DateTimeZone('UTC'));
    
        $current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s');
    
        if ($active){ // if the subscription is still active use the expiry date
    
          $end_date = new DateTime($subscription_to_return['expiry_date'], new DateTimeZone('UTC'));
    
        }else{  //otherwise use the current date
    
            $end_date = new DateTime('now', new DateTimeZone('UTC'));
    
    
        }
    
        $interval = 'P' . $subscription_to_return['renew_frequency'] . 'M';
    
        $end_date->add(new DateInterval($interval));
        
        $end_date_sqltimestamp = date_format($end_date, 'Y-m-d H:i:s');
    
    
        $subscription->New_subscriptions($userid, $subscription_to_return['asset_id'], $current_date_sqltimestamp, $end_date_sqltimestamp, '0', '0', NULL);
    
        $newSubscriptionid = $subscription->prepareStatementPDO();
    
    
        //echo json_encode($subscription_to_return);
        //echo $subscription->getexpiry_date();
    
    
        //json encode the result
    
        //need the description
        //need the cost from subtable
        //need to check that it is ending soon
        //need to set renewal date for new subscription the number of days remaining +

        $stripe_cost = intval($subscription_to_return['cost']) * 100;

        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
              'price_data' => [
                'currency' => 'eur',
                'unit_amount' => $stripe_cost,
                'product_data' => [
                  'name' => $subscription_to_return['asset_name'],
/*                   'images' => ["https://i.imgur.com/EHyR2nP.png"], */
                ],
              ],
              'quantity' => 1,
            ]],
            'payment_intent_data'=>[
                'metadata' => [
                    'subscription_id' => $newSubscriptionid, 
                    
                ],
            ],

            'mode' => 'payment',
            'success_url' => $YOUR_DOMAIN . '/pages/learning/scripts/subscriptions/success_stripe.php?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => $YOUR_DOMAIN . $data['currentPage'] . '&action=register',
          ]);
          
          //print_r($checkout_session);
          
          echo json_encode(['id' => $checkout_session->id]);
    
        
    
    
    
    }else{
    
        if ($debug){
        echo 'Subscription does not exist';
        }
    }
    
    }
    
    if (isset($asset_id)){
    
    //get the required asset data
    
    //old subscription
    $subscription_to_return = array();
    
    $assets_paid->Load_from_key($asset_id);
    
    
    $subscription_to_return['asset_name'] = $assets_paid->getname();
    $subscription_to_return['asset_type'] = $assetManager->getAssetTypeText($assets_paid->getasset_type());
    $subscription_to_return['asset_id'] = $assets_paid->getid();
    
    $subscription_to_return['cost'] = $assets_paid->getcost();
    $subscription_to_return['description'] = $assets_paid->getdescription();
    $subscription_to_return['renew_frequency'] = $assets_paid->getrenew_frequency();
    
    $subscription_to_return['user_id'] = $userid;

    //print_r($data);
    //die();

    //deal with any previous subscription

    if ($data['alreadyHasSiteWide'] == 'true'){


        if ($debug){

            echo 'Detected already having site wide';

        }

        $alreadyHasSiteWide = true;
                //get the subscription object of the sitewide subscription

        $sitewidesubscriptonid = $assetManager->getSiteWideSubscription($userid, false);

                
        

    
    }else{

        $alreadyHasSiteWide = false;

        $sitewidesubscriptonid = null;



    }        

    
    //make a new subscription
    
    //new subscription
        //ADD THE RENEW FREQUENCY TO THE DATE TODAY PLUS COURSE DATE
    
    
    
        //START DATE NOW
    
        $current_date = new DateTime('now', new DateTimeZone('UTC'));
    
        $current_date_sqltimestamp = date_format($current_date, 'Y-m-d H:i:s');
    
        if ($users->gettimezone()){
    
            $timezone = $users->gettimezone();
    
        }else{
    
            $timezone = 'UTC';
        }
    
        if (isset($_POST['course_date'])){
    
            $course_date = new DateTime($_POST['course_date'], new DateTimeZone('UTC'));
    
            //$end_start_calculate_date = new DateTime($_POST['course_date'], new DateTimeZone('UTC'));
    
            if ($current_date >= $course_date){
    
                $end_start_calculate_date = new DateTime('now', new DateTimeZone('UTC'));
    
            }else{
    
    
                $end_start_calculate_date = $course_date;
    
            }
    
        }else{
    
            $end_start_calculate_date = new DateTime('now', new DateTimeZone('UTC'));
            
        }

        $asset_numbers_pro_subscriptions = [

            1 => 4,
            2 => 5,
            3 => 6,



        ];

        $asset_numbers_premium_subscriptions = [

            1 => 18,
            2 => 19,
            3 => 20,

        ];

    
        if (in_array($asset_id, $asset_numbers_pro_subscriptions)){

            $freeTrial = $userFunctions->hadFreeTrial($userid, 1);
            $subscription_type = 1; //standard


        }elseif (in_array($asset_id, $asset_numbers_premium_subscriptions)){

            $freeTrial = $userFunctions->hadFreeTrial($userid, 2);
            $subscription_type = 2; //pro



        }
       

        //$end_date = new DateTime($subscription_to_return['expiry_date'], new DateTimeZone('UTC'));
    
        $interval = 'P' . $subscription_to_return['renew_frequency'] . 'M';
    
        $end_start_calculate_date->add(new DateInterval($interval));

        $trial_start_calculate_date = new DateTime('now', new DateTimeZone('UTC'));

        $trial_start_calculate_date->add(new DateInterval('P15D'));

        
        $end_date_sqltimestamp = date_format($end_start_calculate_date, 'Y-m-d H:i:s');

        $end_trial_sqltimestamp = date_format($trial_start_calculate_date, 'Y-m-d H:i:s');


        if ($freeTrial){

            //previous free trial , so standard subscription

            $subscription->New_subscriptions($userid, $subscription_to_return['asset_id'], $current_date_sqltimestamp, $end_date_sqltimestamp, '0', '1', NULL);


        }else{


            $subscription->New_subscriptions($userid, $subscription_to_return['asset_id'], $current_date_sqltimestamp, $end_trial_sqltimestamp, '0', '1', NULL);


        }
    
    
        $newSubscriptionid = $subscription->prepareStatementPDO();


        $stripe_cost = intval($subscription_to_return['cost']) * 100;

        //define price ids

         //CHANGE FOR STRIPE TEST

         if ($stripe_status_live === true){

            $price_ids = [ //LIVE IDS

                4 => 'price_1JOoydEBnLMnXjogS1fT7ER3', //standard physician
                5 => 'price_1JOoyXEBnLMnXjogdHnORQax', //stadard trainee
                6 => 'price_1JOoyREBnLMnXjogrMaWao2s', //standard med student
                18 => 'price_1JOoyLEBnLMnXjogM0ioYe7v', //pro physician
                19 => 'price_1JOoyFEBnLMnXjogRi3Jrar5', //pro trainee
                20 => 'price_1JOoy7EBnLMnXjogJ9SlsNXR', //pro nursing / med student
    
            ];
        
        }else{
        
            
        $price_ids = [ //TEST IDS

            4 => 'price_1J4L5VEBnLMnXjogxxBLou9m',
            5 => 'price_1J4L6OEBnLMnXjoggMg7Ymsy', 
            6 => 'price_1J4L6mEBnLMnXjogBjucbv2D',
            18 => 'price_1J4L7sEBnLMnXjogh6swTZC0',
            19 => 'price_1J4L8MEBnLMnXjogcOAEH9mA',
            20 => 'price_1J4L8lEBnLMnXjogp3NBfYTD',

        ];
            
        
        }

        //CHANGE_TEST_TO_LIVE_STRIPE


       

        //had a free trial previously?


        if ($freeTrial){

            //user had free trial before

            //echo 'Already HAd free Trial';


            $checkout_session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                  'price' => $price_ids[$asset_id],
                  'quantity' => 1,
                ]],
                'metadata' => [
                    'subscription_id' => $newSubscriptionid,
                    'subscription_type' => $subscription_type,
                    'free_trial' => false,
                    'alreadyHasSiteWide' => $alreadyHasSiteWide,
                    'oldSubscriptionid' => $sitewidesubscriptonid,

    
                ],
                'subscription_data' => [
                    'metadata' => [
                        'subscription_id' => $newSubscriptionid,
                        'subscription_type' => $subscription_type,
                        'free_trial' => false,
                        'alreadyHasSiteWide' => $alreadyHasSiteWide,
                        'oldSubscriptionid' => $sitewidesubscriptonid,
                    ]
                
                ],
                'mode' => 'subscription',
                'success_url' => $YOUR_DOMAIN . '/pages/learning/scripts/subscriptions/success_stripe.php?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => $YOUR_DOMAIN . $data['currentPage'],
              ]);


        }else{

            //allow free trial

            //and record

            if ($debug){

            echo 'had no free trial';
            echo 'tell Stripe';

            }


            $checkout_session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                  'price' => $price_ids[$asset_id],
                  'quantity' => 1,
                ]],
                'metadata' => [
                    'subscription_id' => $newSubscriptionid,
                    'subscription_type' => $subscription_type,
                    'free_trial' => true,
                    'alreadyHasSiteWide' => $alreadyHasSiteWide,
                    'oldSubscriptionid' => $sitewidesubscriptonid,

    
                ],
                'mode' => 'subscription',
                'success_url' => $YOUR_DOMAIN . '/pages/learning/scripts/subscriptions/success_stripe.php?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => $YOUR_DOMAIN . $data['currentPage'],
                'subscription_data' => [
                    'trial_end' => date_format($trial_start_calculate_date, 'U'),
                    'metadata' => [
                        'subscription_id' => $newSubscriptionid,
                        'subscription_type' => $subscription_type,
                        'free_trial' => true,
                        'alreadyHasSiteWide' => $alreadyHasSiteWide,
                        'oldSubscriptionid' => $sitewidesubscriptonid,
                    ]
                
                ],
              ]);


        }

    
    
        
          
          //print_r($checkout_session);
          
          echo json_encode(['id' => $checkout_session->id]);

          //'description' => $subscription_to_return['asset_name'],


        
    
    
    }else{
    
        if ($debug){
            echo 'Asset does not exist';
            }
    }
    







 