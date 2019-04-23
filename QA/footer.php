<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel = "stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
<!--    <link rel = "stylesheet" href = "vendor/bootstrap/css/mdb.css">-->
<!--    <link rel = "stylesheet" href = "vendor/bootstrap/css/mdb.min.css">-->
</head>
<body>
<!-- Footer -->
<!-- Footer -->
<footer class="page-footer font-small">
    <div style="background-color: darkblue;">
        <div class="container">
            <div class="row py-4 d-flex align-items-center">
                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                    <h6 class="mb-0" style = "color: white">Get connected with us on social networks!</h6>
                </div>
                <div class="col-md-6 col-lg-7 text-center text-md-right" style="color:white">
                    <a href = "<?php echo $rowResult['facebook']; ?>" class="fb-ic text-white"><i class="fa fa-facebook white-text mr-4"> </i></a>
                    <a href = "<?php echo $rowResult['twitter']; ?>" class="tw-ic text-white"><i class="fa fa-twitter white-text mr-4"> </i></a>
                    <a href = "<?php echo $rowResult['googleplus']; ?>" class="gplus-ic text-white"><i class="fa fa-google-plus white-text mr-4"> </i></a>
                    <a href = "<?php echo $rowResult['linkedin']; ?>" class="li-ic text-white"><i class="fa fa-linkedin white-text mr-4"> </i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container text-center text-md-left mt-5">
        <div class="row mt-3">
            <div class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">QA</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p><?php echo $rowResult['about']; ?></p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                <hr class="deep-purple mb-4 mt-0 d-inline-block" style="width: 60px;">
                <p><a href="contactUs.php">Contact Us</a></p>
                <p><a href="#">Join Our community</a></p>
                <p><a href="#!">Help</a></p>

            </div>
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                <hr class="deep-purple mb-4 mt-0 d-inline-block" style="width: 60px;">
                <p><i class="fa fa-home mr-3"></i> <?php echo $rowResult['address']; ?></p>
                <p><i class="fa fa-envelope mr-3"></i> <?php echo $rowResult['email']; ?></p>
                <p><i class="fa fa-phone mr-3"></i> <?php echo $rowResult['phone']; ?></p>
                <p><i class="fa fa-phone mr-3"></i> +8801521330194</p>

            </div>
        </div>
    </div>
    <div style ="background-color: darkblue" class = "mt-4">
        <div class="footer-copyright text-center py-3 text-white">&copy;
            <a class = "text-white" href="index.php"> QA.com</a>
        </div>
    </div>

</footer>
<!-- Footer -->
</body>
</html>