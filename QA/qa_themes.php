<?php
    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
    if (isset($_POST['insert']) ) {
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $query = "INSERT into headerimages(name) VALUES ('$file')";
        if ( mysqli_query($connection, $query)) {
            echo '<script>alert("Inserted");</script>';
        }
    }

    $queryR = mysqli_query($connection, "SELECT * from qatheme");
    $rowQueryR = mysqli_fetch_assoc($queryR);
    $title = $rowQueryR['title'];
    $quote = $rowQueryR['quote'];
    $email = $rowQueryR['email'];
    $address = $rowQueryR['address'];
    $phone = $rowQueryR['phone'];
    $facebook = $rowQueryR['facebook'];
    $twitter = $rowQueryR['twitter'];
    $googleplus = $rowQueryR['googleplus'];
    $linkedin = $rowQueryR['linkedin'];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QA Themes Admin</title>
    <link rel = "stylesheet" href = "vendor/bootstrap/css/bootstrap.min.css">
    <script src = "vendor/jquery/jquery.min.js"></script>
</head>
<body>
    <?php include "admin_navbar.php"; ?>
    <div>
        <div class = "row">
            <div class = "col-md-2">
                <?php include "admin_sidebar.php"; ?>
            </div>
            <div class = "mt-5 col text-center">
                <h2>Edit Info</h2>
                <div class = "container">
                    <div class = "row">
                        <div class = "col-md-1">

                        </div>
                        <div class = "col">
                            <form method = "post" action = "saveChanges.php">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title" name = "title" value="<?php echo $title; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name = "email" value="<?php echo $email; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Quote</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="quote" name = "quote" value="<?php echo $quote; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="address" name = "address" value="<?php echo $address; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="phone" name = "phone" value="<?php echo $phone; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Facebook</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name = "facebook" id="facebook" value="<?php echo $facebook; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Twitter</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name = "twitter" id="title" value="<?php echo $twitter; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Google Plus</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name = "googleplus" id="googleplus" value="<?php echo $googleplus; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Linkedin</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"name = "linkedin" id="linkedin" value="<?php echo $linkedin; ?>">
                                    </div>
                                </div>
                                <div class="form-group row float-right">
                                    <button type = "submit" class = "btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function(){
        $('#insert'.click(function(){
            var image_name = $('#image').val();
            if ( image_name == '' ) {
                alert("Please select image");
                return false;
            }
            else {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if ( jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    alert("Invalid Image File");
                    $('#image').val('');
                    return false;
                }
            }
        }));
    });
</script>