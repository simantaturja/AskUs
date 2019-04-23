<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel = "stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php include "headerContent.php" ?>
<?php include "otherProfileInfo.php" ?>
<div class="container mt-5">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3"><?php echo $name ?>'s Profile</h5>
                    <div class="row">
                        <div class="col">
                            <h6>Institute</h6>
                            <p>
                                <?php echo $institute; ?>
                            </p>
                            <h4 class = "mt-3">
                                <span class="badge badge-warning mb-3"><i class="fa fa-user"></i>Questions</span><span class="badge badge-warning mb-3 ml-1 mr-2"><?php echo $questions; ?></span>
                                <span class="badge badge-success mb-3"><i class="fa fa-user"></i>Answers</span><span class="badge badge-success mb-3 ml-1"><?php echo $answers; ?></span> <br>
                            </h4>
                        </div>
                        <div class="col-md-12">
                            <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Questions</h5>
                            <table class="table table-sm table-hover table-striped">
                                <?php
                                $askedResult = mysqli_query($connection, "SELECT * from questions WHERE askedBy = '$username'");
                                ?>
                                <tbody>
                                <?php while ( $rowRes = mysqli_fetch_assoc($askedResult) ): ?>
                                    <tr>
                                        <td>
                                            <strong>Q.</strong> <a href="questionContent.php?url=<?php echo $rowRes['url']; ?>"><?php echo $rowRes['question']; ?></a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
                </div>


            </div>
        </div>
        <div class="col-lg-4 order-lg-1 text-center">
            <div class = "mb-3">
                <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar">
                <h6 class="mt-2"><?php echo $name; ?></h6>
            </div>
            <div class = "mt-3">
                <h4 class = "mt-3">
                    <?php
                        $mResult = mysqli_query($connection, "SELECT * from signuptable WHERE status = 1");
                        $rowMResult = mysqli_fetch_assoc($mResult);
                        $follow = $rowMResult['username'];
                        $myResult = mysqli_query($connection, "SELECT * from followtable WHERE username = '$username' AND followedby ='$follow'");
                        if ( mysqli_fetch_assoc($myResult) ):
                    ?>
                    <a href = "follow.php?user=<?php echo $username; ?>" class = "btn btn-outline-primary"><span class = "fa fa-user"></span>Unfollow</a>
                    <?php
                    elseif ( !mysqli_fetch_assoc($myResult) ):
                    ?>
                    <a href = "follow.php?user=<?php echo $username; ?>" class = "btn btn-outline-primary"><span class = "fa fa-user"></span>Follow</a>
                    <?php endif; ?>
                </h4>
                <div class = "mt-3">
                    <h4 class = "mt-3">
                        <span class="badge badge-primary mb-3"><i class="fa fa-user"></i>Followers</span><span class="badge badge-primary mb-3 ml-1"><?php echo $follower; ?></span><br>
                        <span class="badge badge-danger mb-3"><i class="fa fa-user"></i>Following</span><span class="badge badge-danger mb-3 ml-1"><?php echo $following; ?></span><br>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


