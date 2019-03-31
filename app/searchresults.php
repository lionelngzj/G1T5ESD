<?php
  // Start the session- to remove
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
        $link = "http://" . $_SESSION['serviceurl'] . ":8080/restaurants/Singapore%20" . ($_GET['postal']) . "&AIzaSyABsb0wlw9itDK8XGaWz2hoCeXmg0pb7ww";

        $url = urlencode($link);
        $handle = get_headers(urldecode($url), 1);
    
        if ($handle[0] == "HTTP/1.1 500 Internal Server Error") {
            echo "error";
      } else {
            $response = file_get_contents(urldecode($url));
            $response = json_decode($response, true);
            $restaurants = $response["restaurants"];
            $length = count($restaurants);
            $rest_working=array();
            $index=-1;
            for($i=0;$i<$length;$i++){
                $dist = $restaurants[$i]['distance'];
                $push = array($i=>$dist);
                $rest_working=array_merge($rest_working,$push);
            }

            asort($rest_working);
            $restaurants_copy = $restaurants;
            $restaurants=array();
            $keys_asc = array_keys($rest_working);
            foreach($keys_asc as $key){
                array_push($restaurants,$restaurants_copy[$key]);
            }
            // asort($rest2);
            // var_dump($rest2);
            for($i=0;$i<$length;$i++) {
                $rid = $restaurants[$i]['rid'];
                $name = $restaurants[$i]['name'];
                $dist = $restaurants[$i]['distance'];
                $add = $restaurants[$i]['street'];
                echo '<tr data-how="' . $rid . '">';
                echo '<td>' . $name . '</td>';
                echo '<td>' . $add . '</td>';
                echo '<td>' . $dist . '</td>';
                echo "</tr>";    
            }

        }
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