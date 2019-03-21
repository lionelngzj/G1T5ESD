<?php session_start();

 require_once('/vendor/autoload.php'); ?>
<?php
$_SESSION["price"] = 199600;

$stripe = [
  "secret_key"      => "sk_test_2UKTtMy0XHm9qJrcjWVxDz4Q000nYPPT9Q",
  "publishable_key" => "pk_test_zN727Q6RajDbfDgtHnEgtyhV00d58C6obv",
];

\Stripe\Stripe::setApiKey($stripe['secret_key']);


?>

<script src="https://js.stripe.com/v3/"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zepto/1.2.0/zepto.min.js"></script>

<form id="payment-form" action="test4.php" method="POST">
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