<?php
// define variables and set to empty values
$firstname = "";
$lastname = "";
$name = $email = $password = $confirmpassword = $institute = "";
$firstnameErr = $lastnameErr = $nameErr = $emailErr = $passwordErr = $agreeErr = "";
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
        $checkQuery = "SELECT * from signuptable where username = '$name'";
        $checkExistence = mysqli_query($connection, $checkQuery);
        $row = mysqli_fetch_assoc($checkExistence);
        if ( $row["username"] == $name ) {
            $nameErr = "username already taken";
            $okname = 1;
        }
        if ($okname == 0 && !preg_match("/^[a-zA-Z0-9]*$/",$name)) {
            $nameErr = "Only letters and numerical digits are allowed";
            $okname = 1;
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $okemail = 1;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $okemail = 1;
        }
        $checkQuery = "SELECT * from signuptable where user_email = '$email'";
        $checkExistence = mysqli_query($connection, $checkQuery);
        $row = mysqli_fetch_assoc($checkExistence);
        if ( $row["user_email"] == $email ) {
            $emailErr = "Email already exists";
            $okemail = 1;
        }
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        $okpassword = 1;
    }
    if ( empty($_POST["confirmpassword"])) {
        $passwordErr = "Password is required";
        $okpassword = 1;
    } else {
        $confirmpassword = test_input($_POST["confirmpassword"]);
        if ( $password != $confirmpassword ) {
            $passwordErr = "Password do not match!";
            $okpassword = 1;
        } else {
            $okpassword = 0;
        }
    }
    $institue = $_POST["institute"];
    if ( !isset($_POST["agreecheck"]) ) {
//        $agreeErr = "You must agree with our terms and condition before signing up";
//    }  else {
        if ( $okname == 0 && $okemail == 0 && $okpassword == 0 ) {
            $password = md5($password);
            $sqlInsert = "INSERT INTO signuptable(firstname, lastname, username,user_email,user_password,activationcode, status, institute)
                            VALUES('$firstname', '$lastname','$name', '$email', '$password', 0, 1, '$institue')";
            mysqli_query($connection, $sqlInsert);

            header('Location: index.php');
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