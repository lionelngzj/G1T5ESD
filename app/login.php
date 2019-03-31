<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
  $_SESSION['serviceurl'] = 'LAPTOP-44J85PL7';
  session_start();
  if (isset($_POST["username"])) {
    $url = urlencode("http://" . "{$_SESSION["serviceurl"]}/login/{$_POST["username"]}&{$_POST["password"]}");
    $handle = get_headers(urldecode($url), 1);

    if ($handle[0] == "HTTP/1.1 500 Internal Server Error") {
      echo "error";
    } else {
      $response = file_get_contents(urldecode($url));
      $user = json_decode($response, true);
      $_SESSION['username'] = $user["username"];
      $_SESSION["name"] = $user["fullname"];
      $_SESSION["usertype"] = "user";
      header("Location: index.php");
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
    <form method="POST">
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