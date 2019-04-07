<?php
session_start();
$price = $_SESSION["price"]/100;
echo "Your payment of $". $price." has been confirmed";
echo"<br>";
echo"Payment details will be sent to your email and you will receive a telegram notification when your order is ready.";
echo"<br>";
echo"You may now safely close this window";


?>