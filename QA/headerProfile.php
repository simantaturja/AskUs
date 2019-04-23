
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home Q/A </title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link rel = "stylesheet" href="css/main.css">

</head>

<body>
    <?php include "headerConnect.php" ?>
<!-- Navigation -->
<nav class="navbar static-top mb-2">
    <div class="container">
        <a class="navbar-brand" href="index.php"><?php echo $rowResult['title']; ?></a>
        <div class = "row">
            <!-- Example single danger button -->
            <div class="btn-group mr-4">
                <a href = "userprofile.php" class = "m-2"> <?php echo $name; ?> </a>
                <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="editprofile.php">Edit Profile</a>
                    <a class="dropdown-item" href="logout.php">Log Out</a>
                </div>
            </div>
            <a class="btn btn-danger mtagsquestioncontent" href="askquestion.php">Ask Question</a>
        </div>
    </div>
</nav>



<script src="vendor/bootstrap/js/bootstrap.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
