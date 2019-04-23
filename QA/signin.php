<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <script src = "vendor/bootstrap/js/bootstrap.min.js"></script>
    <link rel = "stylesheet" href="css/signup.css">


</head>
<body>
<?php include "headerContent.php" ?>
<?php include "signinconnect.php" ?>

<div class="container mt-5">
    <div class = "row justify-content-center tf">
        <div class = "col-md-6">
            <div class = "card">
<!--                <div class = "card-header"></div>-->
                <div class = "card-body">
                    <form method="post" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
                        <div class = "form-group mb-2">
                            <label>Username</label>
                            <input id = "username" name = "username" class = "form-control" value = "<?php echo $name; ?>"placeholder="Username">
                        </div>
                        <div class = "form-group mb-2">
                            <label>Password</label>
                            <input type = "password" id = "password" name = "password" class = "form-control" value = "<?php echo $password ?>" placeholder="Password">
                            <br>
                            <span id = "confirmMessage" style = "color:red"> <?php echo $passwordErr; ?> </span>
                        </div>

                        <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="remembermecheck" name = "agreecheck">
                            <label class="custom-control-label" for="customCheck1">Remember me</label>
                        </div>

                        <div class = "form-group">
                            <button type="submit" class = "btn btn-primary"id = "signinbtn" name = "signinbtn">Sign In</button>
                            <a href = "signin.php">Forget Password?</a>
                            <br>
                            <a href = "signup.php">Don't have an account? Sign Up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>




