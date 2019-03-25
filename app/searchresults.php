<?php
  // Start the session
  session_start();
  if (!isset($_GET["postal"])) {
    header("Location: index.php", true, 301);
  }
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
  <!-- Call to Action -->
    <div class="container">
    <h3 class="h3">Search result...</h3>
    <p class="lead">
    Currently at <?php echo $_GET["postal"];?></p>
        <div id="container-restaurants"></div>
        <table class="table table-hover" id="table-restaurant">
            <thead>
                <tr>
                    <th scope="col">Restaurant</th>
                    <th scope="col">Address</th>
                    <th scope="col">Distance</th>
                </tr>
            </thead>
            <tbody>
    <?php
        $postalcode = $_GET["postal"];
        // $response = file_get_contents($_SESSION["serviceurl"] + '');
        // $restaurants = json_decode($response);

        $restaurants = [[1, "Odette", "1 St Andrew's Rd #01-04"],[2, "BAKALAKI Greek Taverna", "3 Seng Poh Rd #02-03"]];
        foreach ($restaurants as $restaurant) {
            echo '<tr data-how="' . $restaurant[0] . '">';
            echo "<td>{$restaurant[1]}</td>";
            echo "<td>{$restaurant[2]}</td>";
            echo "</tr>";
        }
    ?>
            </tbody>
        </table>
    </div>
</body>

<script>
    $('#table-restaurant td').click(function() {
        var restaurantID = $(this).parent("tr").data('how');
        window.open(("restaurant.php?" + "restaurant=" + restaurantID), '_blank');
    });
</script>

</html>