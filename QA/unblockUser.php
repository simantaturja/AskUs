<?php
$connection = mysqli_connect('localhost', 'root', '', 'my_db');
$sqlQuery = "SELECT * from adminlogintable WHERE status = 1";
$sqlResult = mysqli_query($connection, $sqlQuery);
if ( !mysqli_fetch_assoc($sqlResult) ) {
    header("Location: admin-login.php");
}
?>

<?php
$username = $_GET['user'];
mysqli_query($connection, "UPDATE signuptable SET removed = 'no' WHERE username = '$username'");
header("Location: adminUsers.php");
?>
