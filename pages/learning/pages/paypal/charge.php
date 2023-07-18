<?php
require_once '../../../../assets/includes/config.inc.php';
error_reporting(E_ALL);
require_once 'config.php';
 
if (isset($_POST['submit'])) {
 
    try {
        $response = $gateway->purchase(array(
            'amount' => $_POST['amount'],
            'currency' => PAYPAL_CURRENCY,
            'returnUrl' => PAYPAL_RETURN_URL,
            'cancelUrl' => PAYPAL_CANCEL_URL,
            /* {
                "intent": "sale",
                "payer": {
                    "payment_method": "paypal"
                },
                "redirect_urls": {
                    "return_url": "http://<return url>",
                    "cancel_url": "http://<cancle url>"
                },
                "transactions": [
                    {
                        "amount": {
                            "total": "8.00",
                            "currency": "USD",
                            "details": {
                                "subtotal": "6.00",
                                "tax": "1.00",
                                "shipping": "1.00"
                            }
                        },
                        "description": "This is payment description.",
                        "item_list": { 
                            "items":[
                                {
                                    "quantity":"3", 
                                    "name":"Hat", 
                                    "price":"2.00",  
                                    "sku":"product12345", 
                                    "currency":"USD"
                                }
                            ]
                        }
                    }
                ]
            } */
            
        ))->send();
 
        if ($response->isRedirect()) {
            $response->redirect(); // this will automatically forward the customer
        } else {
            // not successful
            echo $response->getMessage();
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}