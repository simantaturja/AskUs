<?php
    $connection = mysqli_connect('localhost', 'root', '' , 'my_db');
    $sqlQuery = "SELECT * from signuptable WHERE status = 1";
    $result = mysqli_query($connection, $sqlQuery);
    $row = mysqli_fetch_assoc($result);

    $myResult = mysqli_query($connection, "SELECT * from qatheme");
    $rowResult = mysqli_fetch_assoc($myResult);

    if ( $row["status"] == 1 ) {
        include "headerProfile.php";
    }
    else {
        include "header.php";
    }
?>