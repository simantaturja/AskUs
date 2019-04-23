<?php
    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
    $sqlSearch = "SELECT * from signuptable WHERE status = 1";
    $sqlSearchResult = mysqli_query($connection, $sqlSearch);
    $userRow = mysqli_fetch_assoc($sqlSearchResult);
    if ( $userRow['status'] == 1 ) {
    }
    else {
        header("Location: signinfirst.php");
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <?php include "headerContent.php" ?>
    <div class = "container mt-5 mb-5">
        <div class = "row">
            <div class = "col-md-3">

            </div>
            <div class = "col-md-7">
                <form id="loginForm" method="POST" action = "add_question.php">
                    <div class="form-group">
                        <label for="email" class="control-label">Question Title</label>
                        <input type="text" class="form-control" name="headertext" value="" required="" title="Question Title">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="addQuestionContentArea">Question Content</label>
                        <textarea class="form-control rounded-0" id="addquestioncontentarea" name = "addquestioncontentarea" rows="10"></textarea>
                    </div>
                    <div class = "form-group">
                        <label for = "tagsArea">Tags(For Several tags, use ,(comma) as separators)</label>
                        <input type = "text" class = "form-control" name = "tagsText" value="" required="" title="Tags">
                    </div>
                    <button type="submit" name = "addquestionbtn" class="btn btn-success btn-block">Submit</button>
                </form>
            </div>
            <div class = "col-md-2">

            </div>
        </div>
    </div>

</body>
</html>
<?php
include "footer.php";
