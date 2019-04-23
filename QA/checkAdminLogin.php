<?php
    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sqlQuery = mysqli_query($connection, "SELECT * from adminlogintable WHERE username = '$username'");
    $row = mysqli_fetch_assoc($sqlQuery);

    if ( $password == $row['password'] ) {
        mysqli_query($connection, "UPDATE adminlogintable SET status = 1 WHERE username = '$username'");
        header("Location: admin.php");
    }
    else {
        header("Location: admin-login.php");
    }

?>