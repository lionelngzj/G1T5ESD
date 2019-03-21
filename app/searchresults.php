<?php
  // Start the session
  session_start();
  if (!isset($_GET["postal"])) {
    header("Location: index.php", true, 301);
  }
?>
<html>
<style>
    table#table-restaurant {
    border-collapse: collapse;   
    }   
    #table-restaurant td:hover {
        cursor: pointer;
    }
</style>

<head>
    <title>BragDoof</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
        if ($_SESSION["usertype"] == "guest") {
            echo '<nav class="navbar navbar-light bg-light static-top">
                    <div class="container">
                    <a class="navbar-brand" href="index.php">BragDoof</a>
                    <a class="btn btn-primary" href="#">Sign In</a>
                </div>
                </nav>';
        } elseif ($_SESSION["usertype"] == "driver"){
            header("index.php");
        } else {
            //CONSUMER nav bar
        }
    ?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Your search results...</h1>
            <p class="lead">The top 10 nearest restaurants are...</p>
        </div>
    </div>    
   
    <div class="container">
        <div id="container-restaurants"></div>
        <table class="table table-hover" id="table-restaurant">
            <thead>
                <tr>
                    <th scope="col">Restaurant</th>
                    <th scope="col">Address</th>
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
        alert($(this).parent("tr").data('how'));
        window.open(("restaurant.php?" + "restaurant=" + restaurantID), '_blank');
    });
</script>

</html>