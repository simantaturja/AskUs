<?php
    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['messageArea'];

    mysqli_query($connection, "INSERT INTO contact(name, email, message) VALUES('$name', '$email', '$message')");
    header("Location: contactUs.php");
?>