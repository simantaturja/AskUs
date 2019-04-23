<?php
    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
    $query = mysqli_query($connection, "SELECT * from signuptable WHERE status = 1");
    $row = mysqli_fetch_assoc($query);
    $firstname1 = $row['firstname'];
    $lastname1 = $row['lastname'];
    $username = $row['username'];
    $email1 = $row['user_email'];
    $institute1 = $row['institute'];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel = "stylesheet" href = "vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>

    <?php include "headerContent.php";
    include "editprofileconnect.php"; ?>
    <div class = "container">
        <div class = "row">
            <div class = "col-md-3">

            </div>
            <div class = "col">
                <form method="post" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
                    <div class = "form-group mb-2">
                        <label>First Name</label>
                        <input id = "firstname" name = "firstname" class = "form-control" value = "<?php echo $firstname1; ?>"placeholder="Enter an username">
                        <span style = "color: red" class = "ml-1"> <?php echo $firstnameErr; ?></span>
                    </div>
                    <div class = "form-group mb-2">
                        <label>Last Name</label>
                        <input id = "lastname" name = "lastname" class = "form-control" value = "<?php echo $lastname1; ?>"placeholder="Enter an username">
                        <span style = "color: red" class = "ml-1"> <?php echo $lastnameErr; ?></span>
                    </div>
                    <div class = "form-group mb-2 disabled">
                        <label>Username</label>
                        <input id = "username" name = "username" class = "form-control" value = "<?php echo $username; ?>"placeholder="Enter an username">
                        <span style = "color: red" class = "ml-1"> <?php echo $nameErr; ?></span>
                    </div>
                    <div class = "form-group mb-2">
                        <label>Email</label>
                        <input id = "email" name = "email" class = "form-control" value = "<?php echo $email1; ?>"placeholder="Enter email address">
                        <span style="color: red" class="ml-1"> <?php echo $emailErr; ?></span>
                    </div>
                    <div class = "form-group mb-2">
                        <label>New Password</label>
                        <input type = "password" id = "password" name = "password" class = "form-control" value = "<?php echo $password ?>" placeholder="Enter password">
                        <br>
                        <span id = "confirmMessage" style = "color:red"> <?php echo $passwordErr; ?> </span>
                    </div>
                    <div class = "form-group mb-2">
                        <label>Confirm Password</label>
                        <input type = "password" id = "confirmpassword" name = "confirmpassword" class = "form-control" value = "<?php echo $confirmpassword ?>" placeholder="Re-Enter password">
                        <br>
                        <span id = "confirmMessage" style = "color:red"> <?php echo $passwordErr; ?> </span>
                        <br>
                    </div>
                    <div class = "form-group mb-2">
                        <label>Institute</label>
                        <input id = "institute" name = "institute" class = "form-control" value = "<?php echo $institute1; ?>"placeholder="Enter Institute Name">
                    </div>

                    <div class = "form-group float-right">
                        <button type="submit" class = "btn btn-primary"id = "editprofilebtn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php include "footer.php"; ?>
