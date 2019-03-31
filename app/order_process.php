<?php
// Takes in values from (post?) the foods that were ordered by the customers

// 1 json session handling for the inputs needed for the microservice
// 1 json session handling the inputs needed for the display back to the customer.

$val = $_POST['fooditem'];

echo $val;
echo '<br>';
var_dump($val);


?>