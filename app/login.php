<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
  session_start();
  if (isset($_GET["username"])) {
    $uname = $_GET['username'];
    $pass = $_GET['password'];
    $link = "http://" . $_SESSION['serviceurl'] . ":8083/login?username=" .$uname. '&password='.$pass;

    $response = file_get_contents(urldecode($link));
    $response = json_decode($response, true);
    $status = ($response['status']);

    if ($status == 1) {
      $_SESSION['username'] = $uname;
      $_SESSION["usertype"] = "user";
      header('Location: index.php');
    } else {
      echo "Invalid login credentials";
    }
    
  }
?>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <title>BragDoof</title>
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="img/lunch.jpg" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="GET">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="username">
      <input type="password" id="login" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
      <a href="restaurantlogin.php">Click here to login as a Restaurant Partner</a>

    </form>

    <!-- Register -->
    <div id="formFooter">
      <a class="underlineHover" href="register.php">Sign Up!</a>
    </div>

  </div>
</div>