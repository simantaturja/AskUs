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
                    <?php $cat = $_GET['cat'];
                        $connection = mysqli_connect('localhost', 'root', '', 'my_db');
                        $sqlquery = "SELECT * from questions WHERE category = '$cat' ORDER BY id DESC";
                        $result = mysqli_query($connection, $sqlquery);
                        while ( $row = mysqli_fetch_assoc($result) ):
                    ?>
                    <?php $url = str_replace(' ', '_', $row["question"]) ?>
                    <a href="questionContent.php?url=<?php echo $row['url']; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class = "container-fluid">
                            <div class = "row">
                                <div class = "col-md-8">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1" id = "questionhead"><?php echo $row['question'] ?></h5>
                                    </div>
                                </div>
                                <div class = "col-md-4">
                                    <?php $askedBy = $row['askedBy']; ?>
                                    <small class="float-right">Asked by <?php echo $askedBy; ?></small><br>
                                    <h4 class = "float-right"><span class="badge badge-primary badge-pill ml-4">
                                                                    <?php echo $row['votes']   ?>
                                                                 </span>
                                        <span class="badge badge-primary badge-pill ml-4"><?php echo $row['answered'] ?></span>
                                    </h4>
                                </div>
                            </div>

                        </div>
                    </a>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>