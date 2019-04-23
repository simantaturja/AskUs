<?php
//    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
//    $sqlQuery = "INSERT into category(question, genre) VALUES('Who designed ?', 'web')";
//    mysqli_query($connection, $sqlQuery);
//?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel = "stylesheet" href = "css/main.css">
    <link rel = "stylesheet" href = "vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php include "headerContent.php" ?>
<div class = "container mt-4">
    <div class = "row">
        <div class = "col">
            <div class = "list-group">
                <?php
                    $tag = $_GET['tag'];
                    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
                    $sqlQuery = "SELECT * from tagstable WHERE genre = '$tag'";
                    $resultSQL = mysqli_query($connection, $sqlQuery);
                    while ( $resultSQLRow = mysqli_fetch_assoc($resultSQL) ):
                ?>
                    <?php $url = str_replace(' ', '_', $resultSQLRow['question']); ?>
                    <li class = "list-group-item">
                        <div class = "row">
                            <div class = "col-md-8">
                                <div class="d-flex w-100 justify-content-between">
                                    <a href="questionContent.php?url=<?php echo $url ?>"><h5 class="mb-1 mt-2" id = "questionhead"><?php echo $resultSQLRow['question']; ?></h5></a>
                                </div>
                                <?php
                                $question = $resultSQLRow['question'];
                                $sqlCommand2 = "SELECT * from tagstable WHERE question = '$question'";
                                $resultTags = mysqli_query($connection, $sqlCommand2);
                                while ( $resultTagsRow = mysqli_fetch_assoc($resultTags) ):
                                    ?>
                                    <span class="badge badge-pill badge-secondary"><a class = "text-white" href="tags.php?tag=<?php echo $resultTagsRow['genre']; ?>"><?php echo $resultTagsRow['genre']; ?></a></span>
                                <?php endwhile; ?>
                            </div>
                            <div class="col-md-4">
                                <?php
                                $sql = "SELECT * from questions WHERE question='$question'";
                                $result = mysqli_query($connection, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $askedBy = $row['askedBy']; ?>
                                <small class="float-right">Asked by <?php echo $askedBy; ?></small><br>

                                <div class = "float-right ml-4">
                                    <h5><span class="badge badge-warning badge-pill"><?php echo $row['answered'] ?></span></h5>
                                    <small>Answers</small>
                                </div>
                                <div class = "float-right">
                                    <h5><span class="badge badge-primary badge-pill">
                                                                        <?php echo $row['votes']   ?>
                                                                     </span></h5>
                                    <small>Votes</small>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>


