<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!-- to check- which db is  restaurant login data stored. Should/can we send this restaurant info to another page for processing?-->
<?php
  session_start();
  if (isset($_POST["username"])) {
      $_SESSION["usertype"] = "restaurant";
      $_SESSION["rid"] = 1;
      header("Location: index.php");
    }
?>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <title>BragDoof</title>
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="img/lunch.jpg" id="icon" alt="User Icon" />
      <br>
      <strong>Restaurant Login</strong>
    </div>

    <!-- Login Form -->
    <form method="POST">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Restaurant Username">
      <input type="password" id="login" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">

    </form>

    <!-- Register -->
    <div id="formFooter">
      <a class="underlineHover" href="register.php">Sign Up!</a>
    </div>

  </div>
</div>