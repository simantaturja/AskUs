<?php
    $username = $_GET['user'];
    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
    $sqlQuery = "SELECT * from signuptable WHERE username = '$username'";
    $resultUser = mysqli_query($connection, $sqlQuery);
    $userInfo = mysqli_fetch_assoc($resultUser);
    $name = $userInfo['firstname']." ".$userInfo['lastname'];
    $institute = $userInfo['institute'];
    $following = $userInfo["following"];
    $follower = $userInfo["followers"];
    $questions = $userInfo["questions"];
    $answers = $userInfo["answers"];
?>