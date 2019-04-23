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
    <?php include "profileInfoFetch.php";
   ?>
    <?php
        //upload
        if( isset($POST))
    ?>
    <div class="container mt-5">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">
                    <div class="" id="profile">
                        <h5 class="mb-3">User Profile <small><a href = "editprofile.php">Edit</a></small></h5>
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
                                            <strong>Q.</strong> <a href="questionContent.php?url=<?php echo $rowRes['url']; ?>"><?php echo $rowRes['question']; ?></a><span class = "float-right">hide</span>
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
            <div class="col-lg-4 order-lg-1 text-center">
                <div class = "mb-3">
<!--                    <form>-->
                    <img src="images/uploads/<?php echo $image; ?>" height = 150px width = 150px class="img-circle mx-auto img-fluid img-circle d-block" alt="avatar">
                    <h6 class="mt-2"><?php echo $name; ?></h6>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <input class = "ml-5 mb-2 mt-2 custom-file" type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Upload Image" name="submit">
                    </form>
<!--                    <label class="custom-file">-->
<!--                        <input type="file" name = "upload" id = "upload" class="custom-file-input">-->
<!--                        <span class="custom-file-control  btn btn-outline-primary">Choose file</span> <br>-->
<!--                    </label>-->
<!--                    </form>-->
                </div>
                <div class = "mt-3">
                    <h4 class = "mt-3">
                        <span class="badge badge-primary mb-3"><i class="fa fa-user"></i>Followers</span><span class="badge badge-primary mb-3 ml-1"><?php echo $follower; ?></span><br>
                        <span class="badge badge-danger mb-3"><i class="fa fa-user"></i>Following</span><span class="badge badge-danger mb-3 ml-1"><?php echo $following; ?></span><br>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


