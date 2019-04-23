<?php
$target_dir = "images/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$connection = mysqli_connect('localhost', 'root', '', 'my_db');
$result = mysqli_query($connection, "SELECT * from signuptable WHERE status  = 1");
$rowResult1 = mysqli_fetch_assoc($result);
$username12 = $rowResult1['username'];
$uploadOk = 1;
if(isset($_POST["submit"])) {
    $img = $_FILES["fileToUpload"]["name"];
    echo $username12;
    mysqli_query($connection, "UPDATE signuptable SET image = '$img' WHERE username = '$username12'");
    $uploadOk = 1;
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
        echo "Successfully UPLOADED<br>";
        header("Location: userprofile.php");
    }

}
?>