<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
</head>
<body>
    <?php include "headerContent.php"; ?>
    <div class = "mb-5">
        <div class ="row">
            <div class = "col-md-6">

            </div>
            <div class = "col-md-6 pl-2 mt-5">
                <div class = "container">
                    <div class = "row">
                        <div class = "col-md-9">
                            <h4>Contact Us</h4>
                            <form action = "contactConnect.php" method = "POST">
                                <div class = "form-group mb-2">
                                    <label>Name</label>
                                    <input id = "name" name = "name" class = "form-control" placeholder="Enter your name">
                                </div>
                                <div class = "form-group mb-2">
                                    <label>Email</label>
                                    <input id = "email" name = "email" class = "form-control"placeholder="Enter your Email">
                                </div>
                                <div class = "form-group mb-2">
                                    <label>Message</label>
                                    <textarea class="form-control rounded-0" id="messageArea" name = "messageArea" rows="10"></textarea>
                                </div>
                                <button class = "btn btn btn-outline-success">Leave a Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php include "footer.php"; ?>