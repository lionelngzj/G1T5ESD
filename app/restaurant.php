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
        <p class="bannertext" id="address"><?php echo ($restaurant[3] . $restaurant[4]);?></p>
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
            echo "<td>{$food[3]}</td>";
            echo '<td><input type="number" name="points" step="1" min="1" value="1"></td>';
            echo "</tr>";
        }
    ?>
          </tbody>
      </table>
      <button style="float:right" type="button" class="btn btn-success" <?php if (!isset($_SESSION["username"])) {echo "disabled";}?>>Check Out</button>
  </div>
</body>
<script src="./src/bootstrap-input-spinner.js"></script>
<script>
    $("input[type='number']").inputSpinner()
</script>
<!-- <script>
    // $('#table-restaurant td').click(function() {
    //     var restaurantID = $(this).parent("tr").data('how');
    //     window.open(("restaurant.php?" + "restaurant=" + restaurantID), '_blank');
    // });
</script> -->

</html>