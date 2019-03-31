<body>
  <!-- Call to Action -->
    <div class="container">
    <h1>Welcome back,</h1>
          <h3 class="mb-5" id='restaurantname'>
            <?php
                $link = "http://" . $_SESSION['serviceurl'] . ":8080/restaurant?rid=" . $_SESSION['rid'];
                $response = file_get_contents($link);
                $response = json_decode($response, true);
                
                echo($response["name"]);
                // var_dump($response);
            ?>
          </h3>

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


            // to add microservice to change order status
            echo "</tr>";
        }
    ?>
          </tbody>
      </table>
</div>
<script>

</script>

</html>