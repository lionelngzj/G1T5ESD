<?php
session_start();
echo $_SESSION["price"];
echo "SUCCESS YAY";
echo"<br>";

$amt = $_SESSION['amount']/100;
echo "Payment of $".$amt. " completed"; 
$service_url = "https://api.telegram.org/bot800605180:AAHLqS6II36W7tFLnP54L5EeSSEQ5p-eQQA/sendMessage?chat_id=157884892&text=chinese";

// to do db and whatever else here

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

<script>
    $(window).on('load', function() {
    // code here
        $.get($service_url)
    });
</script>