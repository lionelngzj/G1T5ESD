<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
  $_SESSION['serviceurl'] = 'LAPTOP-44J85PL7';
  session_start();
  if (isset($_GET["username"])) {
    $uname = $_GET['username'];
    $pass = $_GET['password'];
    $link = "http://" . $_SESSION['serviceurl'] . ":8083/login?username=" .$uname. '&password='.$pass;

    $url = urlencode($link);
    $handle = get_headers(urldecode($url), 1);
    

    if ($handle[0] == 'HTTP/1.1 200 OK') {
      $link2 = "http://" . $_SESSION['serviceurl'] . ":8083/users?username=" . $uname;

      $url2 = urlencode($link2);
      $response2 = file_get_contents(urldecode($url2));
      $user_detailed = json_decode($response2, true);
      // var_dump($user_detailed);

      // $response2 = file_get_contents(urldecode($link2));
      // $response2 = json_decode($response2, true);
      $_SESSION['name']=$user_detailed['name'];
      $_SESSION['username']=$_GET["username"];
      $response = file_get_contents(urldecode($url));
      $user = json_decode($response, true);
      $_SESSION["usertype"] = "user";
      header("Location: index.php");
    }
    else{
        echo "error";
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