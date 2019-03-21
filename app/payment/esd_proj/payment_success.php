<?php
session_start();
echo $_SESSION["price"];
echo "SUCCESS YAY";
echo"<br>";

$amt = $_SESSION['amount']/100;
echo "Payment of $".$amt. " completed"; 
// to do db and whatever else here

?>