<?php
  session_start();
  unset($_SESSION["usertype"]);
  unset($_SESSION["username"]);
  header("Location: index.php", true, 301);
?>