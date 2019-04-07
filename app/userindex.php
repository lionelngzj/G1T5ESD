  <!-- Masthead -->
  <header class="masthead text-white text-center" style="background-image: url('img/food_main.jpg')";>
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1>Welcome back,</h1>
          <h3 class="mb-5"><?php 
           $link = "http://" . $_SESSION['serviceurl'] . ":8083/users?username=" . $_SESSION['username'];
           $response = file_get_contents(urldecode($link));
           $response = json_decode($response, true);
            echo ($response['name']);
          ?>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form method="GET" action="searchresults.php">
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="text" name="postal" class="form-control form-control-lg" placeholder="Enter your postal code...">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary" >Submit!</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>