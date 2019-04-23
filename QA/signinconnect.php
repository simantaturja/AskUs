<?php
// define variables and set to empty values
$nameErr = $passwordErr = "";
$name = $password = "";
$okname = $okemail = $okpassword = 0;
$removed = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
    if (empty($_POST["username"])) {
        $nameErr = "username is required";
    } else {
        $name = test_input($_POST["username"]);
        $checkQuery = "SELECT * from signuptable where username = '$name'";
        $checkExistence = mysqli_query($connection, $checkQuery);
        $row = mysqli_fetch_assoc($checkExistence);
        if ( $row["username"] == $name ) {
            $okname = 0;
        } else {
            if ( $row["username"] != $name ) {
                $okname = 1;
            }
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
        $okpassword = 1;
    } else {
        $password = test_input($_POST["password"]);
        $matchPass = "SELECT * from signuptable where username = '$name'";
        $checkExistence = mysqli_query($connection, $matchPass);
        $row = mysqli_fetch_assoc($checkExistence);
        if ( $row["user_password"] == ($password) ) {
            $okpassword = 0;
        }
        else {
            $okpassword = 1;
        }
    }
    echo $name;
    if ( isset($_POST["signinbtn"]) ) {
        if ( $okname == 0 && $okpassword == 0 ) {
            $removed = $row['removed'];
            if ( $removed == "yes" ) {
                header("Location:signin.php");
            }
            $updateStatus = "UPDATE signuptable SET status = 0 WHERE username <> '$name'";
            mysqli_query($connection, $updateStatus);
            $updateStatus = "UPDATE signuptable SET status = 1 WHERE username = '$name'";
            mysqli_query($connection, $updateStatus);
            header('Location: index.php');
            exit();
        }
        else {
            $passwordErr = "Username/Password do not match";
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