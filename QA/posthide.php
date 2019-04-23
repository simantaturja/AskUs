<?php
    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
    $postid = $_GET['postid'];
    mysqli_query($connection, "UPDATE questions SET showhide = 'hidden' WHERE id = '$postid'");
    header("Location: posts.php");
?>