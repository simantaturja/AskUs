<?php
    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
    $sqlQuery = "SELECT * from adminlogintable WHERE status = 1";
    $sqlResult = mysqli_query($connection, $sqlQuery);
    if ( !mysqli_fetch_assoc($sqlResult) ) {
        header("Location: admin-login.php");
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel = "stylesheet" href = "vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <?php include "admin_navbar.php"; ?>
    <div>
        <div class = "row">
            <div class = "col-md-2">
                <?php include "admin_sidebar.php"; ?>
            </div>
        </div>
    </div>
</body>
</html>
