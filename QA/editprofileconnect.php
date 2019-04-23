<?php
// define variables and set to empty values
$firstnameErr = $lastnameErr = $nameErr = $emailErr = $passwordErr = $agreeErr = "";
$firstname = $lastname = $name = $email = $password = $confirmpassword = $agree = $institute =  "";
$okname = $okemail = $okpassword = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
    if ( empty($_POST["firstname"])) {
        $firstnameErr = "First Name is Required";
    }
    else {
        $firstname = $_POST["firstname"];
    }
    if ( empty($_POST["lastname"])) {
        $lastnameErr  = "Last Name is required";
    }
    else {
        $lastname = $_POST["lastname"];
    }
    if (empty($_POST["username"])) {
        $nameErr = "username is required";
    } else {
        $name = test_input($_POST["username"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $okemail = 1;
    } else {
        $email = test_input($_POST["email"]);
    }
    if (empty($_POST["password"])) {
        $password = $password1;
    } else {
        $password = test_input($_POST["password"]);
        $okpassword = 1;
    }

    $institute = $_POST["institute"];
    if ( !isset($_POST["agreecheck"]) ) {
//        $agreeErr = "You must agree with our terms and condition before signing up";
//    }  else {
        if ( $okname == 0 && $okemail == 0 && $okpassword == 0 ) {
            $password = md5($password);
            $sqlInsert = "UPDATE signuptable SET firstname = '$firstname', lastname = '$lastname', user_email='$email', user_password = '$password', institute = '$institute' WHERE username = '$username'";
            mysqli_query($connection, $sqlInsert);

            header('Location: userprofile.php');
            exit();
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>