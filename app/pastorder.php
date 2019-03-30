<?php
  // Start the session
  session_start();
?>

<html>
<?php
$var = '{
  "orderid": 2,
  "username": "yuxin",
  "restaurant": "BAKALAKI Greek Taverna",
  "date": "2019-03-17T15:40:00+08:00",
  "status": "ready",
  "paymentreceipt": "#1777-6433",
  "total_amount": 13,
  "order_items": [
    {
      "foodname": "Bacon Aglio Olio",
      "quantity": 1
    },
    {
      "foodname": "Chicken Sausage Cream Pasta",
      "quantity": 1
    }
  ]
}';
echo strlen("T15:40:00+08:00");
echo $var;
echo "<br>";
echo "<br>";
$decoded = json_decode($var);
echo "<br>";
echo "<br>";
echo "hi, order id is :".$decoded->orderid."<br>";
echo "order belonged to :".$decoded->username."<br>";
echo "from: ".$decoded->restaurant."<br>";
$dat = substr ( $decoded->date , 0,-15 );
echo "date ordered:".$dat."<br>";
echo "total price:".$decoded->total_amount."<br>";
echo "You ordered:";
foreach ($decoded->order_items as $item){
  // var_dump ($item)."<br>";
  echo ($item->foodname)."  ".($item->quantity)."<br>";
}
?>
<head>
  <title>BragDoof</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/search-page.css">

  <?php include 'header.php';     ?>
</head>

<body>
<div class="banner1 banner2 align-middle">
    <div class="py-2 LegacyBanner-c1d55d67f9fe06fd">
        <h3 id="rest-name">
          <?php
           echo "Hi";
          ?>
        </h3>
    </div>
</div>
<br>
<div style="margin-left: 20px;">

</div>
  <!-- Call to Action -->
    <div class="container">
    <p class="lead">Order</p>
      <div id="container-restaurants"></div>
      <table class="table table-hover" id="table-restaurant">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope= "col">Name</th>
            <th scope= "col">Restaurant</th>
            <th scope="col">Dish</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Subtotal</th>
            <th scope= "col">Date</th>
          </tr>
        </thead>
        <tbody>
    <?php
        
        // $response = file_get_contents($_SESSION["serviceurl"] + '');
        // $menu = json_decode($response);

        $menu = [[1, 1, "Eggs Benedict", 10.90, "Food"],[1, 2, "Club Sandwich", 7.90, "Food"],[1, 3, "Cheesy Omelette", 8.90, "Food"],[1, 4, "Milk Toast", 5.50, "Food"]];
        
        
    ?>
          </tbody>
      </table>
      <br>
      <hr>
        
</div>
</body>