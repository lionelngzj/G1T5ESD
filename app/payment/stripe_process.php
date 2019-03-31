<?php
session_start();
require_once('vendor/autoload.php');?>

<?php
\Stripe\Stripe::setApiKey("sk_test_2UKTtMy0XHm9qJrcjWVxDz4Q000nYPPT9Q");
$_SESSION['price'] =$_SESSION['price']*100;
echo $_POST["email"];

$charge = \Stripe\Charge::create([
    "amount" => $_SESSION['price'], //todo- take the charge from first one
    "currency" => "sgd",
    "source" => $_POST["stripeToken"],
    "description" => "Charge for " + $_POST["email"]
  ]);

if ( $charge->{'status'} == 'succeeded'){
    $_SESSION ['amount'] = $charge->{'amount'};
    header("Location: payment_success.php");
}
//   if "status": "succeeded"
//   show clear
//   else
//   redirect back?

  
?>