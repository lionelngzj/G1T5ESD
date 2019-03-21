<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->
<?php
  session_start();
  if (isset($_POST["username"])) {
    // $response = file_get_contents($_SESSION["serviceurl"] + '');
    $response = '{"username": "admin", "hp": 99998888}';
    $restaurants = json_decode($response, true);
    
    $_SESSION["usertype"] = "consumer";
    $_SESSION["username"] = $restaurants["username"];
    
    header("Location: index.php", true, 301);
  }
?>

<div class="wrapper fadeInDown">
  <div id="registerformContent">
    <!-- Tabs Titles -->
    <title>BragDoof</title> 
    <!-- Icon -->
    <!-- <div class="fadeIn first"> -->
      <!-- <img src="img/lunch.jpg" id="icon" alt="User Icon" /> -->
    <!-- </div> -->

    <!-- Login Form -->
    <form>
  <div class="form-row container">
    <div class="form-group">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group col-md-6">
    <label for="inputName">Full Name</label>
    <input type="text" class="form-control" id="inputName" placeholder="Enter name here..">
  </div>
  <div class="form-group col-md-6">
    <label for="inputHp">HP Number</label>
    <input type="text" class="form-control" id="inputHp" placeholder="91231234">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="login.php">Log In</a>
    </div>

  </div>
</div>