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

    $question = $_GET["id"];
    $sqlQuery1 = "SELECT * from questions WHERE url = '$question'";
    $resultQuery = mysqli_query($connection, $sqlQuery1);
    $resultRow = mysqli_fetch_assoc($resultQuery);
    $question = $resultRow['question'];
    $description = $resultRow['description'];

    $query1 = mysqli_query($connection, "SELECT askedBy from questions WHERE question = '$question'");
    $query2 = mysqli_query($connection, "SELECT username from signuptable WHERE status = 1");
    $rowQuery1 = mysqli_fetch_assoc($query1);
    $rowQuery2 = mysqli_fetch_assoc($query2);
    if ( $rowQuery1['askedBy'] != $rowQuery2['username'] ):
        header("Location: questionContent.php");
    else:
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

            <form id="loginForm" method="POST" action = "editquestiondb.php">
                <div class="form-group">
                    <label for="email" class="control-label">Question Title</label>
                    <input type="text" class="form-control" name="headertext" value="<?php echo $question; ?>" required="" title="Question Title">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label for="addQuestionContentArea">Question Content</label>
                    <textarea value = "<?php echo $description; ?>" class="form-control rounded-0" id="addquestioncontentarea" name = "addquestioncontentarea" rows="10"></textarea>
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
<?php endif; ?>
<?php
include "footer.php";
function test_input2($data) {
    $specialChar = "'\'/[\\'^ £$%&*()}{@#~?><>,|=_+¬-]/\'";
    $length2 = strlen($specialChar);
    $length = strlen($data);
    $answer = "";
    for ( $i = 0; $i < $length; $i++ ) {
        $f = 0;
        for ( $j = 0; $j < $length2; $j++ ) {
            if ( $data[$i] == $specialChar[$j] ) {
                $f = 1;
                break;
            }
        }
        if ( $f == 0 ) {
            $answer = $answer.$data[$i];
        }
    }
    return $answer;
}
?>
