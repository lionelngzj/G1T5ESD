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
            $linkl = "http://" . $_SESSION['serviceurl'] . ":8080/restaurant" . "?rid=" .  $restaurantID;
            $urll = urlencode($linkl);
            $handle = get_headers(urldecode($urll), 1);
        
            if ($handle[0] == "HTTP/1.1 500 Internal Server Error") {
                echo "error";
          } else {
                $response = file_get_contents(urldecode($urll));
                $response = json_decode($response, true);
                $restaurants = $response;
                $rid = $restaurants['rid'];
                $name = $restaurants['name'];
                $add = $restaurants['street'];
                echo $name;
            }  
          ?>
        </h3>
        <p class="bannertext" id="address"><?php echo ($add . " " . $restaurants['unit']);?></p>
    </div>
</div>
<br>
<div style="margin-left: 20px;">

</div>
  <!-- Call to Action, formatting for the table headers here -->
    <div class="container">
    <p class="lead">Menu</p>
      <div id="container-restaurants"></div>
      <form method='POST' action ='order_process.php'>
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
            $restaurantID = $_GET["restaurant"];
            $link = "http://" . $_SESSION['serviceurl'] . ":8080/menu" . "/" .  $restaurantID;
            $url = urlencode($link);
            $handle = get_headers(urldecode($url), 1);
            if ($handle[0] == "HTTP/1.1 500 Internal Server Error") {
              echo "error";
        } else {
              $response = file_get_contents(urldecode($url));
              $response = json_decode($response, true);
              $menu = $response['menus'];
              $length = count($menu);
              for($i=0;$i<$length;$i++) {
                  $rid = $menu[$i]['rid'];
                  $fid = $menu[$i]['fid'];
                  $name = $menu[$i]['name'];
                  $price = $menu[$i]['unit_price'];
                  $w_name = str_replace(' ','&nbsp',$name);
                  $tok = $rid.','.$fid.','.$w_name.','.$price;
                  echo '<tr data-how="' . $fid . '">';
                  
                  echo '<td style="float:right"><p hidden><input type="checkbox" name = "fooditem[]" id="checkbox-' . $fid . '"value = '.($tok).'></p></td>';
                  // echo '<td style="float:right"><p hidden><input type="checkbox" visibility:"hidden" name = "fooditem" value = '.$tok.' checked></p></td>';

                  echo '<td>' . $name . '</td>';
                  echo "<td>$" . number_format((float)$price, 2, '.', '') ."</td>";
                  echo '<td><input class="qty-input" type="number" data-target="#subtotal-' . $fid . '" data-id="' . $fid . '" name="form[]" step="1" min="0" value="0" data-amount="' . $price . '"></td>';
                  echo '<td id="subtotal-' . $fid . '" class="subtotal" data-total="0">$0.00</td>';
                  echo "</tr>";    
              }

          }
    ?>
          </tbody>
      </table>
      <button style="float:right; margin-top:10px; margin-bottom:10px;" type="submit" class="btn btn-success" >Check Out</button>'

      <br>
      <hr>
        <div style="float:right" class="checkout">
          <p class="lead" >Total amount payable:</p><h4 id="total">$0.00</h4>
          <?php
          if (!isset($_SESSION["username"]))
            echo '<br><span class="badge badge-warning">Please login to start ordering</span>';
          ?>
        </div>
</div>
</body>
<script src="./src/bootstrap-input-spinner.js"></script>
<script>
  $('.qty-input').on('change', function() {
    var amount = $(this).data('amount')
    var target = $(this).data('target')
    var quantity = $(this).val()
    var id = $(this).data('id')

    if (quantity >= 1) {
      document.getElementById("checkbox-" + id).checked = true;
    } else {
      document.getElementById("checkbox-" + id).checked = false;
    }
    

    var total = parseFloat(amount * quantity).toFixed(2);
    $(target).html(`$${total}`).data('total', total) // store in data

    var alltotal = Array.from($('.subtotal'))
      .map(el => parseFloat($(el).data('total')))
      .reduce((total, next) => total + next)

    $('#total').html(`$${alltotal.toFixed(2)}`)
  })
  /// you need to call the code below, copy paste where you need this
  // you want to call this code on submit, 
  Array.from($('.qty-input:visible')).map(function(el) {
    return {
      id: $(el).data('id'),
      quantity: parseInt($(el).val()),
      price: $(el).data('price')
    }
  }).filter(function(obj) {
    return obj.quantity != 0
  })

  $("input[type='number']").inputSpinner()
</script>

</html>