<html>
<head>
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

<!-- Custom styles for this template -->
<link href="css/landing-page.min.css" rel="stylesheet">
</head>
<body>

<?php
    session_start();
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">BragDoof</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="../">Home</a>
                <a class="nav-item nav-link" style="float:right;" href="../logout.php">Log Out</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Payment Success!</h1>
            <p class="lead">Your payment of $<?php echo number_format($_SESSION["price"]/100,2, '.',''); ?> has been received.</p>
            <hr class="my-4">
            <p>Payment receipt will be sent to your email and you will receive a telegram notification when your order is ready.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="../" role="button">Back to home page</a>
            </p>
        </div>
</div>
</body>
</html>