<?php
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
        <h3 id="rest-name">
          <?php
            $restaurantID = $_GET["restaurant"];
            // $response = file_get_contents($_SESSION["serviceurl"] + '');
            // $restaurant = json_decode($response);
            $restaurant = [1, "Odette", 91234567,"1 St Andrew's Rd", '#01-04', 178957];
            echo $restaurant[1];
          ?>
        </h3>
        <p class="bannertext" id="address"><?php echo ($restaurant[3] . " " . $restaurant[4]);?></p>
    </div>
</div>
<br>
<div style="margin-left: 20px;">

</div>
  <!-- Call to Action -->
    <div class="container">
    <p class="lead">Menu</p>
      <div id="container-restaurants"></div>
      <table class="table table-hover" id="table-restaurant">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Dish</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Subtotal</th>
          </tr>
        </thead>
        <tbody>
    <?php
        
        // $response = file_get_contents($_SESSION["serviceurl"] + '');
        // $menu = json_decode($response);

        $menu = [[1, 1, "Eggs Benedict", 10.90, "Food"],[1, 2, "Club Sandwich", 7.90, "Food"],[1, 3, "Cheesy Omelette", 8.90, "Food"],[1, 4, "Milk Toast", 5.50, "Food"]];
        
        foreach ($menu as $food) {
            echo '<tr data-how="' .$food[1] . '">';
            echo '<td style="float:right"><input type="checkbox"></td>';
            echo "<td>{$food[2]}</td>";
            echo "<td>$" . number_format((float)$food[3], 2, '.', '') ."</td>";
            echo '<td><input class="qty-input" type="number" data-target="#subtotal-' . $food[1] . '" name="points" step="1" min="0" value="0" data-amount="' . $food[3] . '"></td>';
            echo '<td><span style="text-align: center" class="input-group-text" id="subtotal-' . $food[1] . '">$0.00</span></td>';
            echo "</tr>";
        }
    ?>
          </tbody>
      </table>
      <br>
      <hr>
        <div style="float:right" class="checkout">
          <p class="lead" >Total amount payable:</p><span style="text-align: center" class="input-group-text" id="total">$0.00</span>
          <?php
          if (!isset($_SESSION["name"]))
            echo '<br><span class="badge badge-warning">Please login to start ordering</span>';
          ?>
          <button style="float:right; margin-top:10px; margin-bottom:10px;" type="button" class="btn btn-success" <?php if (!isset($_SESSION["username"])) {echo "disabled";}?>>Check Out</button>
        </div>
</div>
</body>
<script src="./src/bootstrap-input-spinner.js"></script>
<script>
  $('.qty-input').on('change', function() {
    var amount = $(this).data('amount')
    var target = $(this).data('target')
    var quantity = $(this).val()

    var total = parseFloat(amount * quantity).toFixed(2);
    
    // var before = target.val();
    // var difference = total - before;
    // alert(difference);
    $(target).html(`$${total}`)
    $(target).html(`$${total}`)
  })

   $('.input-group-text').on('change', function() {
    this.value = parseFloat(this.value).toFixed(2);
  })

  $("input[type='number']").inputSpinner()
</script>

</html>