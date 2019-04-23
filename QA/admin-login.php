
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Sign In</title>
    <link rel = "stylesheet" href = "vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class = "container mt-5 text-center">
        <div class = "row">
            <div class = "col-md-4"></div>
            <div class = "col-md-4">
                <div class = "mb-2">
                    <h2><a href = "index.php">QA</a></h2>
                </div>
                <form method = "post" action = "checkAdminLogin.php">
                    <div class = "form-group">
                        <label><strong>Username</strong></label>
                        <input class = "form-control" type = "text" name = "username" id="username">
                    </div>
                    <div class = "form-group">
                        <label><strong>Password</strong></label>
                        <input class = "form-control" type = "password" name = "password" id = "password">
                    </div>
                    <button type = "submit" class = "btn btn-success">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>