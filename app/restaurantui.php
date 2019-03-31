<?php
  // Start the session
  session_start();
  $_SESSION["serviceurl"] = "DESKTOP-GCHVM5D:8080";
?>
<!doctype html>
<html lang='en'>

<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BragDoof</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">
  <?php include 'header.php'; ?>
</head>

<body>
  <!-- Call to Action -->
    <div class="container">
    <p class="lead">Pending Orders</p>
      <div id="container-orders"></div>
      <table class="table table-hover" id="table-orders">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Order Details</th>
            <th scope="col">Order Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
    <?php

        $orders = [[1, ["1 x a","2 x b"], "Pending"],[2, ["1 x c", "2 x Club Sandwich"], "Pending"],[3, ["1 x c", "2 x Club Sandwich"], "Pending"],[4, ["1 x c", "2 x Club Sandwich"], "Pending"]];
        
        foreach ($orders as $order) {
            echo '<tr>';
            echo "<td>$order[0]</td>";
            echo "<td>";
            foreach ($order[1] as $item) {
              echo "$item<br>";
            }
            echo "</td>";
            echo "<td>$order[2]</td>";
            echo '<td><button type="button" class="btn btn-success" data-toggle="button" class="button1">Ready for Collection</button>';

            // to add microservice to change ordr status
            echo "</tr>";
        }
    ?>
        <style>
          .button1 {background-color: blue;} 
          /* Why does this not change the color properly??? */
        </style>
          </tbody>
      </table>
</div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>


</html>