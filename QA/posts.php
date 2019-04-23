<?php
$connection = mysqli_connect('localhost', 'root', '', 'my_db');
$sqlQuery = "SELECT * from adminlogintable WHERE status = 1";
$sqlResult = mysqli_query($connection, $sqlQuery);
if ( !mysqli_fetch_assoc($sqlResult) ) {
    header("Location: admin-login.php");
}
$sqlQuery = "SELECT * from signuptable WHERE status = 1";
$result = mysqli_query($connection, $sqlQuery);
$row = mysqli_fetch_assoc($result);
$username = $row['username'];
$name = $row["firstname"]." ".$row["lastname"];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Posts Panel</title>
</head>
<body>
<?php include "admin_navbar.php"; ?>
<div>
    <div class = "row">
        <div class = "col-md-2">
            <?php include "admin_sidebar.php"; ?>
        </div>
        <div class = "col">
            <div id="latest" class="container tab-pane active"><br>
                <div class="list-group pagination pagination-lg">
                    <?php
                    $uri = $_SERVER['REQUEST_URI'];
                    $page = 0;
                    if ( $uri != "/qa/posts.php" && $uri != "/qa/") {
                        $page = $_GET['page'];
                    }
                    if ( $page == 0 || $page == 1 ) {
                        $page = 0;
                    }
                    else {
                        $page = ( $page * 8 ) - 8;
                    }
                    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
                    $sqlquery = "SELECT * from questions ORDER BY id DESC LIMIT $page, 8";
                    $result = mysqli_query($connection, $sqlquery);
                    $numOfRows = mysqli_num_rows($result);
                    while ($row = mysqli_fetch_assoc($result)):
                        ?>
                        <?php
                        $url = str_replace(' ', '_', $row["question"]);
                        $url = test_input($url);?>
                        <li class="list-group-item list-group-item-action flex-column align-items-start">
                            <!--                                            <a href="questionContent.php?id=--><?php //echo $url; ?><!--" class="list-group-item list-group-item-action flex-column align-items-start">-->
                            <div class = "container-fluid">
                                <div class = "row">
                                    <div class = "col-md-6">
                                        <div class="d-flex w-100 justify-content-between">
                                            <a href="questionContent.php?url=<?php echo $row['url']; ?>"><h5 class="mb-1 mt-2" id = "questionhead"><?php echo $row['question'] ?></h5></a>
                                        </div>
                                        <?php
                                        $question = $row['question'];
                                        $sqlCommand2 = "SELECT * from tagstable WHERE question = '$question'";
                                        $resultTags = mysqli_query($connection, $sqlCommand2);
                                        while ( $resultTagsRow = mysqli_fetch_assoc($resultTags) ):
                                            ?>
                                            <span class="badge badge-pill badge-secondary"><a class = "text-white" href="tags.php?tag=<?php echo $resultTagsRow['genre']; ?>"><?php echo $resultTagsRow['genre']; ?></a></span>
                                        <?php endwhile; ?>
                                        <!--                                                            <p class="mb-1">-->
                                        <!--                                                                --><?php //$question = $row['question'];
                                        //                                                                $sqlQuery1 = "SELECT * from questions WHERE question = '$question'";
                                        //                                                                $result1 = mysqli_query($connection, $sqlQuery1);
                                        //                                                                $row1 = mysqli_fetch_assoc($result1);
                                        //                                                                echo $row1['description'];
                                        //                                                                ?>
                                        <!--                                                            </p>-->
                                    </div>
                                    <div class = "col-md-3">
                                        <?php $askedBy = $row['askedBy'];
                                        if ( $askedBy == $username ):
                                            ?>
                                            <small class="float-right">Asked by <a href = "userprofile.php"><?php echo $askedBy; ?></a></small><br>
                                        <?php endif;
                                        if ( $askedBy != $username ):
                                            ?>
                                            <small class="float-right">Asked by <a href = "profile.php?user=<?php echo $askedBy; ?>"><?php echo $askedBy; ?></a></small><br>
                                        <?php
                                        endif;
                                        ?>

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

                                    <div class = "col-md-3 float-right">
                                        <?php if ( $row['showhide'] == "shown" ): ?>
                                        <a><button class = "btn btn-warning disabled">Show</button></a>
                                        <a href = "posthide.php?postid=<?php echo $row['id']; ?>"><button class = "btn btn-danger">Hide</button></a>

                                        <?php elseif ( $row['showhide'] == "hidden" ): ?>
                                            <a href = "postshow.php?postid=<?php echo $row['id']; ?>"><button class = "btn btn-warning">Show</button></a>
                                            <a><button class = "btn btn-danger disabled">Hide</button></a>
                                        <?php else: ?>
                                        <a href = "postshow.php?postid=<?php echo $row['id']; ?>"><h2></h2><button class = "btn btn-warning">Show</button></a>
                                        <a href = "posthide.php?postid=<?php echo $row['id']; ?>"><button class = "btn btn-danger">Hide</button></a>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                        </li>
                    <?php endwhile; ?>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php
                    $result2 = mysqli_query($connection, "SELECT * from questions");
                    $numOfRows2 = mysqli_num_rows($result2);
                    $n = $numOfRows2 / 8;
                    $n = ceil( $n );
                    for ($i = 1; $i <= $n; $i++):
                        ?>
                        <li class="page-item"><a class="page-link" href="posts.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </div>
</body>
</html>
<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES);
    return $data;
}
?>