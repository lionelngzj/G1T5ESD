<?php
  // Start the session
  if (!isset($_SESSION["usertype"]) or $_SESSION["usertype"] == "guest") {
    $_SESSION["usertype"] = "guest";
    echo '
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="index.php">BragDoof</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link" style="float:right;" href="login.php">Login</a>
            </div>
          </div>
        </nav>
    ';
  // 
  } else {
    //CONSUMER or RESTAURANT nav bar -- to be edited
    echo '
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="index.php">BragDoof</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link" href="index.php">Home</a>
              <a class="nav-item nav-link" href="#">Orders</a>
              <a class="nav-item nav-link" style="float:right;" href="logout.php">Log Out</a>
            </div>
          </div>
        </nav>
    ';
  } 
?>

