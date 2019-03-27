<?php
// creation of a charge
require_once ('vendor/autoload.php');
\Stripe\Stripe::setApiKey("sk_test_2UKTtMy0XHm9qJrcjWVxDz4Q000nYPPT9Q");

$customer = \Stripe\Customer::create([
    "email" => "paying.user@example.com",
    "source" => "src_18eYalAHEMiOZZp1l9ZTjSU0",
  ]);
  
$c = \Stripe\Charge::create([
  "amount" => 2000,
  "currency" => "sgd",
  "customer" => $customer, // obtained with Stripe.js
  "description" => "Charge for Big Boss Lionel Ng"
]);

var_dump($c);

?>