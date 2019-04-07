<?php
  session_start();
  unset($_SESSION["usertype"]);
  unset($_SESSION["username"]);
  unset($_SESSION["rid"]);
  unset($_SESSION["price"]);
  header("Location: index.php", true, 301);
?>