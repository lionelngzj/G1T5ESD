<?php
session_start();
// Takes in values from (post?) the foods that were ordered by the customers

// 1 json session handling for the inputs needed for the microservice
// 1 json session handling the inputs needed for the display back to the customer.

$val = $_POST['fooditem'];
$nums = $_POST['form'];
echo '<br>';
echo "<br>";

$i=-1;
$arr = array();
$nums_new = array();
foreach($nums as $num){
    if ($num >0){
        array_push($nums_new,$num);
    }
}
?>
<?php
$order_price = 0;
foreach ($val as $item){
    $i++;
    $split = explode(',',$item);

    $split_spaced = str_replace('&nbsp',' ', $split);
    $input = array("foodname"=>$split_spaced[2],"quantity"=> $nums_new[$i],"unit_price"=>$split_spaced[3]);
    $order_price = $order_price+$split_spaced[3]*$nums_new[$i];
    $send_in = json_encode($input);
    array_push($arr,$send_in);
}
var_dump($arr);

$_SESSION['order_items'] = $arr;
echo"<br><br>";
echo($order_price);
$_SESSION['price']= $order_price;
header("Location: stripe_pay.php");
?>