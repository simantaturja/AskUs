<?php
    $question = $_GET["url"];
    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
    $sqlQuery1 = "SELECT * from questions WHERE url = '$question'";
    $resultQuery = mysqli_query($connection, $sqlQuery1);
    $resultRow = mysqli_fetch_assoc($resultQuery);
    $question1 = $resultRow['question'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="x-iso-8859-11">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $question1; ?></title>
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel = "stylesheet" href = "vendor/bootstrap/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "css/main.css";
</head>
<body>
    <?php include "headerContent.php"; ?>
    <div>
        <div class = "container mt-5 mb-5">
            <?php
                $query1 = mysqli_query($connection, "SELECT askedBy from questions WHERE question = '$question'");
                $query2 = mysqli_query($connection, "SELECT username from signuptable WHERE status = 1");
                $rowQuery1 = mysqli_fetch_assoc($query1);
                $rowQuery2 = mysqli_fetch_assoc($query2);
                if ( $rowQuery1['askedBy'] == $rowQuery2['username'] ):
            ?>
                <div class = "row">
                    <div class = "col-md-9">
                        <a class = "float-right" href = "#">Edit</a>
                    </div>
                </div>
            <?php endif; ?>
            <div class = "row">
                <div class = "col-md-9">
                    <div class = "card">
                        <div class = "card-body">
                            <h3>Q. <?php echo $question1; ?></h3>
    <!--                    </div>-->
    <!--                    <div class = "card-body mt-3 borderP">-->
                            <?php
                                $sql = "SELECT * from signuptable WHERE status = 1";
                                $sqlQueryOk = mysqli_query($connection, $sql);
                                $sqlQueryResult = mysqli_fetch_assoc($sqlQueryOk);
                                $usernameResult = $sqlQueryResult['username'];
                                $sqlQuery = "SELECT * from questions WHERE question = '$question1'";
                                $result = mysqli_query($connection, $sqlQuery);
                                $row = mysqli_fetch_assoc($result);
                                echo $row['description'];
                                $searchQuestion = "SELECT * from questionanswer WHERE question = '$question1'";
                                $result2 = mysqli_query($connection, $searchQuestion);
                            ?>
                        </div>
                        <?php
                            $upVotedQuestion = "SELECT * from voted WHERE question = '$question1' and username = '$usernameResult'";
                            $voteResult = mysqli_query($connection, $upVotedQuestion);
                            $voteRow = mysqli_fetch_assoc($voteResult);
                            $upvoted = $voteRow['upvoted'];
                            $downvoted = $voteRow['downvoted'];
                            if ( $downvoted % 2 == 0 && $upvoted % 2 == 0 ):
                            ?>
                            <div class = "card-footer" style = "background-color: white;">
                            <a href = "votedQuestionDown.php?id=<?php echo $question; ?>" class = "float-right ml-2"><span class = "fa fa-thumbs-o-down"></span>Down Vote</a>
                            <a href = "votedQuestionUp.php?id=<?php echo $question; ?>" class = "float-right"><span class = "fa fa-thumbs-o-up"></span>Up Vote</a>
                            </div>
                            <?php endif;
                            if ( $upvoted % 2 != 0 ):
                            ?>
                        <div style = "background-color: white;" class = "card-footer">
                            <a href = "votedQuestionDown.php?id=<?php echo $question; ?>" class = "float-right ml-2"><span class = "fa fa-thumbs-o-down"></span>Down Vote</a>
                            <a href = "votedQuestionUp.php?id=<?php echo $question; ?>" class = "float-right"><span class = "fa fa-thumbs-up"></span>Up Vote</a>
                        </div>
                        <?php endif;
                            if ( $downvoted % 2 != 0 ):
                        ?>
                        <div class = "card-footer" style = "background-color: white;">
                            <a href = "votedQuestionDown.php?id=<?php echo $question; ?>" class = "float-right ml-2"><span class = "fa fa-thumbs-down"></span>Down Vote</a>
                            <a href = "votedQuestionUp.php?id=<?php echo $question; ?>" class = "float-right"><span class = "fa fa-thumbs-o-up"></span>Up Vote</a>
                        </div>
                        <?php endif; ?>

                    </div>

                    <div><small class = "float-right">Asked by <a href = "profile.php?user=<?php echo $row['askedBy']; ?>"><?php echo $row['askedBy']; ?></a></small></div>
                    <h4 class = "mt-5">Answers</h4>
                    <div>
                        <?php
                            while ( $row2 = mysqli_fetch_assoc($result2 ) ):
                        ?>
                            <div class = "card">
                                <div class = "card-body mt-1">
                                    <div class = "container">
                                        <div class = "row">
                                            <div class = "col-md-3">
                                                <img src="images/anonymouspic.png"><br>
                                                <a href = "profile.php?user=<?php echo $row2['username'] ?>"><?php echo $row2['name']; ?></a>
                                            </div>
                                            <div class = "col float-left justify-content-center">
                                                <p class = "fontC"><?php echo $row2['answer']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style = "background-color: whitesmoke" class = "card-footer">
                                    <a href = "votedAnswer.php" class = "float-right ml-2"><span class = "fa fa-thumbs-o-down"></span>Down Vote</a>
                                    <a href = "votedAnswer.php" class = "float-right"><span class = "fa fa-thumbs-o-up"></span>Up Vote</a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <div style = "background-color: white;" class = "mt-4">
                        <?php $q = str_replace(' ', '_', $question);
                        ?>
                        <form method="get" action = "addAnswer.php">
                            <div class = "form-group">
                                <textarea class = "text-hide" name="question2"><?php echo $question; ?></textarea>
                                <label for="addQuestionContentArea">Add an answer</label>
                                <textarea class="form-control rounded-0" id = "addanswerarea" name = "addanswerarea" rows="10"></textarea>
                            </div>
                            <div class = "form-group">
                            </div>
                            <div class = "form-group">
                                <button type = "submit" id = "addanswerbtn" name = "addanswerbtn" class = "mt-2 btn btn btn-outline-success float-right">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>

                <div class = "col-md-2 mtagsquestioncontent">
                    <table class = "table">
                        <thead>
                        <tr>
                            <th scope = "col">
                                <h4><small>Tags</small></h4>
                            </th>
                        </tr>
                        </thead>
                    </table>
                    <?php
                    $tagResult = mysqli_query($connection, "SELECT DISTINCT genre from tagstable");
                    while ( $row2 = mysqli_fetch_assoc($tagResult) ):
                        ?>
                        <small><a href = "tags.php?tag=<?php echo $row2['genre']; ?>"><?php echo $row2['genre']; ?></a></small><br>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
include "footer.php";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES);
    return $data;
}
function test_input2($data) {
    $specialChar = "'\'/[\\'^£$%*()}{@#~><>,|=_+¬-]/\'";
    $length2 = strlen($specialChar);
    $length = strlen($data);
    $answer = "";
    for ( $i = 0; $i < $length; $i++ ) {
        $f = 0;
        if ( $data[$i] == '&' ) {
            $answer = $answer."and";
            continue;
        }
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