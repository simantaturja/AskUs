<?php
    $connection = mysqli_connect('localhost', 'root', '' , 'my_db');
    $sqlQuery = "UPDATE signuptable SET status = 0 WHERE status = 1";
    $result = mysqli_query($connection, $sqlQuery);
    header("Location: index.php");
?>