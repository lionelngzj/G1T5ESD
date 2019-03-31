<?php
session_start();
echo $_SESSION["price"];
echo "SUCCESS YAY";
echo"<br>";
//to change
// $_SESSION['username'] = 'shawnlee95';
var_dump($_SESSION['username']);
var_dump($_SESSION['price']);


$amt = $_SESSION['amount']/100;
echo "Payment of $".$amt. " completed"; 
// $service_url = "https://api.telegram.org/bot800605180:AAHLqS6II36W7tFLnP54L5EeSSEQ5p-eQQA/sendMessage?chat_id=157884892&text=chinese";

// to do db and whatever else here 
//add order to db thru add order microservice

var_dump($_SESSION['order_items']);
var_dump($_SESSION['order_full']);
$full_order = $_SESSION['order_full'];
$service_url = "http://" . $_SESSION['serviceurl'] . ":8081/order2";
$full_order=json_decode($full_order[0]);
$food = array( array(
    "fid"=> $full_order->fid,
    "quantity"=> $full_order->quantity)
);
$data = array('username' => $_SESSION['username'],
'rid' =>$full_order->rid,
'paymentreceipt' => $_SESSION['receipt_url'],
'total_amount' => $amt,
'order_items_v2' =>  $food
);

// $url = $service_url;

$ch = curl_init($service_url);

//The JSON data.
$jsonData = $data;
//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
curl_setopt($ch, CURLOPT_POST, 1);

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

//Execute the request
$result = curl_exec($ch);
$context  = stream_context_create($options);
var_dump($context);



?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

<script>
    $(window).on('load', function() {
    // code here
        $.get($service_url)
    });
</script>