<?php
    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
    mysqli_query($connection, "UPDATE adminlogintable SET status = 0 WHERE status = 1");
    header("Location: admin-login.php");
?>