<?php
  // Start the session
  session_start();
  if (!isset($_SESSION["serviceurl"])) {

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
                    <th scope="col">Category</th>
                    <th scope="col">Ratings</th>
                </tr>
            </thead>
            <tbody>
    <?php
        $postalcode = $_GET["postal"];
        // $response = file_get_contents($_SESSION["serviceurl"] + '');
        // $restaurants = json_decode($response);

        $restaurants = [["KFC", "Western", 4],["McDonald", "Western", 2], ["Tze Char", "Chinese", 5]];
        foreach ($restaurants as $restaurant) {
            echo "<tr>";
            foreach ($restaurant as $col)
            echo "<td>{$col}</td>";
            echo "</tr>";
        }
    ?>
            </tbody>
        </table>
    </div>

</body>

</html>