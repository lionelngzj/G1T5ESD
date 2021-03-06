<?php
  // Start the session
  session_start();
  $_SESSION["serviceurl"] = "DESKTOP-HJ9Q2AV";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BragDoof</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">
  <?php include 'header.php'; ?>
</head>

<body>
<?php 
  if ($_SESSION["usertype"] == "guest") {
    include 'guestindex.html'; 
  } elseif ($_SESSION["usertype"] == "user") {
    include 'userindex.php';
  } else {
    include 'restaurantui.php';
  }

  include 'footer.html';
?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    $(".ready-form").on("submit", function(e) {
      e.preventDefault()
      var id = $(this).data('id')
      
      let data = {"status":"ready"}
      $.ajax({
          type: 'PATCH',
          url: 'http://DESKTOP-HJ9Q2AV:8081/update/' + id,
          contentType: 'application/json',
          data: JSON.stringify(data), // access in body
      }).done(function () {
        alert("successfully updated order " + id + " to ready to collect")
        var btn = document.getElementById("btn-" + id)
        btn.disabled = true;
        
        var status = document.getElementById("status-" + id)
        status.innerHTML = "ready"
      })
    })
</script>
</body>
</html>
