<?php

namespace Payment;
use Omnipay\Omnipay;
class Payment

{

   /**

    * @return mixed

    */

   public function gateway()

   {

       $gateway = Omnipay::create('PayPal_Express');

       $gateway->setUsername("sb-loq7j3495363@business.example.com");
       $gateway->setPassword("ATTpVXIKeShNleQJzA017PMZuFSblDyUnAcxn_6CwRBbWmrvVEOeYyeBXTDPErk5dhZdgiXDpJ1y5sOW");
       $gateway->setSignature("EMxLr5ZSukpa1mA0S6MYgQxjY0YMMifCIIOeTJqKSeyUzBvURiatEpTU_pQgpkCZmfLrZh1vo4T_edR8");
       $gateway->setTestMode(true);
       return $gateway;

   }

   /**

    * @param array $parameters

    * @return mixed

    */

   public function purchase(array $parameters)

   {

       $response = $this->gateway()
           ->purchase($parameters)
           ->send();

       return $response;

   }

   /**

    * @param array $parameters

    */

   public function complete(array $parameters)

   {

       $response = $this->gateway()
           ->completePurchase($parameters)
           ->send();

       return $response;
   }

   /**

    * @param $amount

    */

   public function formatAmount($amount)

   {
       return number_format($amount, 2, '.', '');
   }

   /**

    * @param $order

    */

   public function getCancelUrl($order = "")

   {
       return $this->route('http://www.gieqs.com/pages/learning/pages/paypal/cancel.php', $order);
   }

   /**

    * @param $order

    */

   public function getReturnUrl($order = "")

   {

       return $this->route('http://www.gieqs.com/pages/learning/pages/paypal/return.php', $order);
   }

   public function route($name, $params)

   {
       return $name; // ya change hua hai
   }
}