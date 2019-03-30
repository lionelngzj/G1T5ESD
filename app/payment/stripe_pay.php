<?php session_start();

 require_once('/vendor/autoload.php'); ?>
<?php
$_SESSION["price"] = 199600;

$stripe = [
  "secret_key"      => "sk_test_2UKTtMy0XHm9qJrcjWVxDz4Q000nYPPT9Q",
  "publishable_key" => "pk_test_zN727Q6RajDbfDgtHnEgtyhV00d58C6obv",
];

\Stripe\Stripe::setApiKey($stripe['secret_key']);
// ui

?>
<?php
  // Start the session
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















?>
<?php
// this is where the credit card info tat we need is

// Start the session
  session_start();
     
?>
<html>

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
        <h3>Food only for our Doofers</h3>
        <p class="bannertext">Prepared with love by our partner restaurants.</p>
    </div>
</div>
<br>
<div style="margin-left: 20px;">

</div>

                </tr>
            </thead>
            <tbody>
    <?php

    ?>
            </tbody>
        </table>
    </div>
</body>

<script>
    $('#table-restaurant td').click(function() {
        var restaurantID = $(this).parent("tr").data('how');
        window.location.href= ("restaurant.php?" + "restaurant=" + restaurantID);
    });
</script>

</html>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zepto/1.2.0/zepto.min.js"></script>

<form id="payment-form" action="stripe_process.php" method="POST">
  <input type="email" name="email">
  <input type="text" name="name">

  <div id="card-element"></div>
  <div id="card-errors"></div>

  <button id="payment" type="submit">Pay Now</button>
</form>

<script>
var stripe = Stripe('<?php echo $stripe['publishable_key']; ?>')
var elements = stripe.elements()

var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

function stripeTokenHandler(token) {
  var form = document.getElementById('payment-form');

  var hiddenInput = $('input[name="stripeToken"]')
  if (hiddenInput.length === 0) {
    var hiddenInput = document.createElement('input');

    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
  } else {
    hiddenInput.val(token.id)
  }
  

  // Submit the form
  form.submit();
}

card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

$("#payment-form").on('submit', function(e) {
  e.preventDefault()

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
})
</script>

<style>
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}

</style>
<!--
later style yourself ah