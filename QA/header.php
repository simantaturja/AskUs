
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home Q/A </title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src = "js/index.js"></script>

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link rel = "stylesheet" href="css/main.css">

</head>

<body>
<?php include "headerConnect.php" ?>
<!-- Navigation -->
<nav class="navbar navbar-light bg-light static-top">
    <div class="container">
        <a class="navbar-brand" href="index.php"><?php echo $rowResult['title'] ?></a>
        <div class = "row">
            <a class="btn btn-primary mr-4" href="signin.php">Sign In</a>
            <a class="btn btn-danger" href="askquestion.php">Ask Question</a>
        </div>
    </div>
</nav>



<script src="vendor/bootstrap/js/bootstrap.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
