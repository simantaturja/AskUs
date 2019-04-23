<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta charset="x-iso-8859-11">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home Q/A </title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link rel = "stylesheet" href="css/main.css">

</head>

<body>

    <!-- Navigation -->
    <?php include "headerContent.php" ?>

    <!-- headCover -->
    <header class="headCover text-white text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h1 class="mb-5"><?php echo $rowResult['quote']; ?></h1>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form method = "get" action = "search.php">
                        <div class="form-row">
                            <div class="col-12 col-md-9 mb-2 mb-md-0">
                                <input name = "searchField" type="text" class="form-control form-control-lg" placeholder="Search Questions, Keywords...">
                            </div>
                            <div class="col-12 col-md-3">
                                <button style = "background-color: darkblue" type="submit" class="btn btn-block btn-lg btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>


    <div class = "mt-5 mb-5">
        <div class = "row">
            <div class = "col-md-3 text-center">
                <table class = "table">
                    <thead>
                        <tr>
                            <th scope = "col">
                                <h4><small>Blog Post's Categories</small></h4>
                            </th>
                        </tr>
                    </thead>
                </table>
                <ul class = "list-group">
                    <li class = "list-group-item"><a href = "category.php?cat=technology">Technology</a></li>
                    <li class = "list-group-item"><a href = "category.php?cat=web">Web</a></li>
                    <li class = "list-group-item"><a href = "category.php?cat=culture">Culture</a></li>
                    <li class = "list-group-item"><a href = "category.php?cat=science">Science</a></li>
                    <li class = "list-group-item"><a href = "category.php?cat=technology">Technology</a></li>
                    <li class = "list-group-item"><a href = "category.php?cat=web">Web</a></li>
                    <li class = "list-group-item"><a href = "category.php?cat=culture">Culture</a></li>
                    <li class = "list-group-item"><a href = "category.php?cat=science">Science</a></li>
                    <li class = "list-group-item"><a href = "category.php?cat=technology">Technology</a></li>
                    <li class = "list-group-item"><a href = "category.php?cat=web">Web</a></li>
                    <li class = "list-group-item"><a href = "category.php?cat=culture">Culture</a></li>
                    <li class = "list-group-item"><a href = "category.php?cat=science">Science</a></li>
                </ul>
            </div>
            <div class = "col-md-7">
                <div class = "container">
                    <div class = "row">
                        <div class = "col">
                            <table class = "table">
                                <thead>
                                <tr>
                                    <th scope = "col">
                                        <small><ul class="nav nav-pills ml-3" id = "questiontab" role = "tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active"  href="#latest" id = "latesttab" role = "tab" data-toggle = "tab" aria-controls="latest" aria-selected="true">Latest</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#votes" id = "votestab" role = "tab" data-toggle = "tab" aria-controls="votes" aria-selected="false">Votes</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#unanswered" id = "unansweredtab" role = "tab" data-toggle = "tab" aria-controls="unanswered" aria-selected="true">Unanswered</a>
                                            </li>
                                        </ul></small>
                                    </th>
                                </tr>
                                </thead>
                            </table>

                            <div class = "tab-content m-1" id = questiontabcontent>
                                <div id="latest" class="container tab-pane active"><br>
                                    <div class="list-group pagination pagination-lg">
                                        <?php
                                        $uri = $_SERVER['REQUEST_URI'];
                                        $page = 0;
                                        if ( $uri != "/qa/index.php" && $uri != "/qa/") {
                                            $page = $_GET['page'];
                                        }
                                        if ( $page == 0 || $page == 1 ) {
                                            $page = 0;
                                        }
                                        else {
                                            $page = ( $page * 8 ) - 8;
                                        }
                                        $connection = mysqli_connect('localhost', 'root', '', 'my_db');
                                        $sqlquery = "SELECT * from questions WHERE showhide = 'shown' ORDER BY id DESC LIMIT $page, 8";
                                        $result = mysqli_query($connection, $sqlquery);
//                                        $numOfRows = mysqli_num_rows($result);
                                        while ($row = mysqli_fetch_assoc($result)):
                                            ?>
                                            <?php
                                            $url = str_replace(' ', '_', $row["question"]);
                                            $url = test_input($url);?>
                                            <li class="list-group-item list-group-item-action flex-column align-items-start">
<!--                                            <a href="questionContent.php?id=--><?php //echo $url; ?><!--" class="list-group-item list-group-item-action flex-column align-items-start">-->
                                                <div class = "container-fluid">
                                                    <div class = "row">
                                                        <div class = "col-md-8">
<!--                                                            <div class="d-flex w-100 justify-content-between">-->
                                                                <a href="questionContent.php?url=<?php echo $row['url']; ?>"><h5 class="mb-1 mt-2" id = "questionhead"><?php echo $row['question'] ?></h5></a>
<!--                                                            </div>-->
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
                                                        <div class = "col-md-4">
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
                                                    </div>

                                                </div>
                                            </li>
                                        <?php endwhile; ?>
                                    </div>
                                </div>

<!--                                Votes-->
                                <div id="votes" class="container tab-pane"><br>
                                    <div class="list-group pagination pagination-lg">
                                        <?php
                                        $uri = $_SERVER['REQUEST_URI'];
                                        $page = 0;
                                        if ( $uri != "/qa/index.php" && $uri != "/qa/") {
                                            $page = $_GET['page'];
                                        }
                                        if ( $page == 0 || $page == 1 ) {
                                            $page = 0;
                                        }
                                        else {
                                            $page = ( $page * 8 ) - 8;
                                        }
                                        $connection = mysqli_connect('localhost', 'root', '', 'my_db');
                                        $sqlquery = "SELECT * from questions WHERE showhide = 'shown' ORDER BY votes DESC LIMIT $page, 8";
                                        $result = mysqli_query($connection, $sqlquery);
                                        $numOfRows = mysqli_num_rows($result);
                                        while ($row = mysqli_fetch_assoc($result)):
                                            ?>
                                            <?php
                                            $url = str_replace(' ', '_', $row["question"]);
                                            $url = test_input($url);?>
                                            <li  class="list-group-item list-group-item-action flex-column align-items-start">
                                                <!--                                            <a href="questionContent.php?id=--><?php //echo $url; ?><!--" class="list-group-item list-group-item-action flex-column align-items-start">-->
                                                <div class = "container-fluid">
                                                    <div class = "row">
                                                        <div class = "col-md-8">
                                                            <div class="d-flex w-100 justify-content-between">
                                                                <a href ="questionContent.php?url=<?php echo $url; ?>"><h5 class="mb-1 mt-2" id = "questionhead"><?php echo $row['question'] ?></h5></a>
                                                            </div>
                                                            <!--                                                            <p class="mb-1">-->
                                                            <!--                                                                --><?php //$question = $row['question'];
                                                            //                                                                $sqlQuery1 = "SELECT * from questions WHERE question = '$question'";
                                                            //                                                                $result1 = mysqli_query($connection, $sqlQuery1);
                                                            //                                                                $row1 = mysqli_fetch_assoc($result1);
                                                            //                                                                echo $row1['description'];
                                                            //                                                                ?>
                                                            <!--                                                            </p>-->
                                                        </div>
                                                        <div class = "col-md-4">
                                                            <?php $askedBy = $row['askedBy']; ?>
                                                            <small class="float-right">Asked by <?php echo $askedBy; ?></small><br>
                                                            <h4 class = "float-right"><span class="badge badge-primary badge-pill ml-4">
                                                                    <?php echo $row['votes']   ?>
                                                                 </span>
                                                                <span class="badge badge-warning badge-pill ml-4"><?php echo $row['answered'] ?></span>
                                                            </h4>
                                                        </div>
                                                    </div>

                                                </div>
                                            </li>
                                        <?php endwhile; ?>
                                    </div>
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
                                    <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                    <?php endfor; ?>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
            <div class = "col-md-2 text-center">
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


</body>

</html>
<?php include "footer.php"; ?>
<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES);
    return $data;
}
?>