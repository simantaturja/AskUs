<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet" href = vendor/bootstrap/css/bootstrap.min.css>

    <title>Search Result</title>
</head>
<body>
    <?php include "headerContent.php"; ?>
    <div class = "container mt-5">
        <div class = "row">
            <div class = "col">
                <div class="list-group">
                    <?php
                        $searchText = $_GET['searchField'];
//                        $searchText = str_replace('+', ' ', $searchText);
                        $connection = mysqli_connect('localhost', 'root', '', 'my_db');
                        $sqlSearch = "SELECT distinct question, url from questions WHERE question like '%$searchText%'";
                        $result = mysqli_query($connection, $sqlSearch);
                        while ( $rowSet = mysqli_fetch_assoc($result) ):
                        ?>
                        <?php $url = $rowSet['url']; ?>
                        <a href="questionContent.php?url=<?php echo $url; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                            <?php echo $rowSet['question']; ?>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
