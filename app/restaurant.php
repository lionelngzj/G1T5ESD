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
            $linkl = "http://" . $_SESSION['serviceurl'] . "/restaurant" . "?rid=" .  $restaurantID;
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
            $restaurantID = $_GET["restaurant"];
            $link = "http://" . $_SESSION['serviceurl'] . "/menu" . "/" .  $restaurantID;
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
                  echo '<tr data-how="' . $fid . '">';
                  echo '<td style="float:right"><input type="checkbox"></td>';
                  echo '<td>' . $name . '</td>';
                  echo "<td>$" . number_format((float)$price, 2, '.', '') ."</td>";
                  echo '<td><input class="qty-input" type="number" data-target="#subtotal-' . $fid . '" name="points" step="1" min="0" value="0" data-amount="' . $price . '"></td>';
                  echo '<td><span style="text-align: center" class="input-group-text" id="subtotal-' . $fid . '">$0.00</span></td>';
                  echo "</tr>";    
              }
  
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