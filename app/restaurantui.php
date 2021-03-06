<body>
  <!-- Call to Action -->
    <div class="container">
    <h1>Welcome back,</h1>
          <h4 class="mb-5" id='restaurantname'>
            <?php
                $link = "http://" . $_SESSION['serviceurl'] . ":8080/restaurant?rid=" . $_SESSION['rid'];
                $response = file_get_contents($link);
                $response = json_decode($response, true);
                
                echo($response["name"]);
            ?>
          </h4>

    <p class="lead">Pending Orders</p>
      <div id="container-orders"></div>

      <?php
                     
      $link = "http://" . $_SESSION['serviceurl'] . ":8081/restaurantorder?rid=" . $_SESSION['rid'];
      $response = file_get_contents($link);
      $response = json_decode($response, true);
      if (empty($response)) {
        echo "There are no pending orders!";
      } else {
        echo '
        <table class="table table-hover" id="table-orders">
        <thead>
          <tr>
            <th scope="col">OrderID</th>
            <th scope="col">Order Status</th>
            <th scope="col">Food</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>';
        
        $orders = $response['Order'];
        // var_dump($orders);

        foreach ($orders as $order) {
          echo '<tr data-how="' . $order['orderid'] . '">';
          echo "<td>{$order['orderid']}</td>";         
          echo "<td id='status-" . $order["orderid"] . "'>{$order['status']}</td>";

          $items = $order['order_items'];

          echo "<td>";
          foreach ($items as $item) {
            echo $item['foodname'] . " x " . $item['quantity'] . "<br>";
          }
            echo "</td>";
            echo '<td><form class="ready-form" data-id="' . $order["orderid"] . '">
                  <input type="submit" id="btn-' . $order["orderid"] . '" class="btn btn-success" value="Ready for collection">
                  </td></form>';
            echo  '</tr>';
        }

        echo '
        </tbody>
        </table>';
      }

    ?>

</div>
      </body>

</html>