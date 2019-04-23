<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'my_db';
$connection = mysqli_connect($host, $username, $password, $db);
if ( $connection ) echo "Connected!!!";
if ( isset ( $_POST['loginbtn']) ) {
    echo " HELLO ";
    $email = $_POST['username'];
    $pass = $_POST['password'];
    $pass = md5($pass);
    $sql = "INSERT INTO users(email, password) VALUES('$email', '$pass')";
    mysqli_query($connection, $sql);
    echo "$email";
}
?>