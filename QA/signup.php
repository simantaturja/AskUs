<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <script src = "vendor/bootstrap/js/bootstrap.min.js"></script>
    <link rel = "stylesheet" href="css/signup.css">


</head>
<body>
<?php include "headerContent.php" ?>
<?php include "signupconnect.php" ?>
<div class="container mt-5">
    <div class = "row justify-content-center tf">
        <div class = "col-md-6">
            <div class = "card">
                <div class = "card-header"></div>

                <div class = "card-body">
                    <form method="post" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
                        <div class = "form-group mb-2">
                            <label>First Name</label>
                            <input id = "firstname" name = "firstname" class = "form-control" value = "<?php echo $firstname; ?>"placeholder="Enter an username">
                            <span style = "color: red" class = "ml-1"> <?php echo $firstnameErr; ?></span>
                        </div>
                        <div class = "form-group mb-2">
                            <label>Last Name</label>
                            <input id = "lastname" name = "lastname" class = "form-control" value = "<?php echo $lastname; ?>"placeholder="Enter an username">
                            <span style = "color: red" class = "ml-1"> <?php echo $lastnameErr; ?></span>
                        </div>
                        <div class = "form-group mb-2">
                            <label>Username</label>
                            <input id = "username" name = "username" class = "form-control" value = "<?php echo $name; ?>"placeholder="Enter an username">
                            <span style = "color: red" class = "ml-1"> <?php echo $nameErr; ?></span>
                        </div>
                        <div class = "form-group mb-2">
                            <label>Email</label>
                            <input id = "email" name = "email" class = "form-control" value = "<?php echo $email ?>"placeholder="Enter email address">
                            <span style="color: red" class="ml-1"> <?php echo $emailErr; ?></span>
                        </div>
                        <div class = "form-group mb-2">
                            <label>Password</label>
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
                            <input id = "institute" name = "institute" class = "form-control" value = "<?php echo $institute ?>"placeholder="Enter Institute Name">
                        </div>
                        <div class="custom-control custom-checkbox mb-2">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="">Agree with terms and conditions
                            </label>
                            <span style = "color:red"> <?php echo $agreeErr; ?></span>
                        </div>

                        <div class = "form-group">
                            <button type="submit" class = "btn btn-primary"id = "signupbtn">Sign Up</button>
                            <br><br>
                            <a href = "signin.php">Already have an account? Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>