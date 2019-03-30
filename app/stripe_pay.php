<?php session_start();

 require_once('payment/vendor/autoload.php'); ?>
<?php
// handle the price here. Send money over
$_SESSION["price"] = 199600;

//Session here to take in order info from previous page. json it. TO change after page finalised.
$_SESSION['order_items'] = '[
  {
    "foodname": "Bacon Aglio Olio",
    "quantity": 3,
    "unit_price": 6.5
  },
  {
    "foodname": "Chicken Sausage Cream Pasta",
    "quantity": 1,
    "unit_price": 6.5
  }]';

  $stripe = [
  "secret_key"      => "sk_test_2UKTtMy0XHm9qJrcjWVxDz4Q000nYPPT9Q",
  "publishable_key" => "pk_test_zN727Q6RajDbfDgtHnEgtyhV00d58C6obv",
];

\Stripe\Stripe::setApiKey($stripe['secret_key']);
// ui

?>
<html>
<?php
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
           echo "Checkout";
          ?>
        </h3>
    </div>
</div>
<br>
<div style="margin-left: 20px;">

</body>

<?php
// this is where the credit card info tat we need is

?>
<html>

<head>
<br>
    <title>BragDoof</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/search-page.css">

    <?php include 'header.php';     ?>

<br>
 <font size = '+1'> <strong> Basket</strong> <br></font><?php  ?>

<?php

$items = json_decode($_SESSION['order_items'], true);
$iter = 0;

?>
<html>
<table style="width:100%">
<tr style="background-color:brown;color:white;"><td width = 1>No.</td><td >Item</td><td >Qty.</td> <td> Price</td></tr>
</html>

<!-- This is where orders put into table -->
<?php
foreach ($items as $item){
  $iter = $iter+1;
  echo '<tr><td width = 1>'.$iter.'</td><td>'.$item["foodname"].'</td><td>'. $item['quantity'].'</td><td>'.$item["unit_price"]*$item["quantity"], '</td></tr>';
}
?>

<table>
</head>

<body>


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
<br> 
<div style = "font-family:helvetica;"><font size=+1>
&nbsp &nbsp &nbsp &nbsp &nbsp If you're happy with your order, key in your credit card details here.<br>
&nbsp &nbsp &nbsp &nbsp &nbsp Otherwise, just press the <strong>back</strong> button on your browser!
</font>
</div>

<form id="payment-form" action="stripe_process.php" method="POST">
  <input type="email" name="email" placeholder = "Email">    
  <input type="text" name="name" placeholder = 'Name'>

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

<div class="banner1 banner2 align-middle">
    <div class="py-2 LegacyBanner-c1d55d67f9fe06fd">
        <h3>Food only for our Doofers</h3>
        <p class="bannertext">Prepared with love by our partner restaurants.</p>
    </div>
</div>
<br>
<div style="margin-left: 20px;">

<style>
table, th, td {
  border: 0 solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
}
</style>