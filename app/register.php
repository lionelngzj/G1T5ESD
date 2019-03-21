<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->
<?php
  session_start();

?>

<!-- Login page -->
<div id="formFooter">
<a class="underlineHover" href="login.php">Back to Log In Page</a>
</div>

<div class="wrapper fadeInDown">
  <div id="registerformContent">
  <!-- Tabs Titles -->
    <title>BragDoof</title> 
  <!-- Icon -->
  <div class="fadeIn first">
    <img src="img/lunch.jpg" width="5%" id="icon" alt="User Icon" />
  </div>
  <!-- Login Form -->
    <form method="POST">
      <div class="form-group">
        <label for="inputEmail">Email</label><br>
        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="inputPassword4">Password</label>
        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
      </div>
      <div class="form-row container">
        <div class="form-group col-md-6">
          <label for="inputName">Full Name</label>
          <input type="text" class="form-control" id="inputName" placeholder="Enter name here..">
        </div>
        <div class="form-group col-md-6">
          <label for="inputHp">HP Number</label>
          <input type="text" class="form-control" id="inputHp" placeholder="91231234">
        </div>
      </div>
      <input type="submit" class="fadeIn fourth" value="Register">
    </form>



  </div>
</div>