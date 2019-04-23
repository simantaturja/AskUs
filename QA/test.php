<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" href = "css/test.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>
<body>
<br>



<div class="container">
    <h2>Toggleable Tabs</h2>
    <br>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1">Menu 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">


        <div id="home" class="container tab-pane active"><br>
            <div class="list-group">
                <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
                    $sqlquery = "SELECT * from questions ORDER BY id DESC";
                    $result = mysqli_query($connection, $sqlquery);
                    while ( $row = mysqli_fetch_assoc($result) ):
                ?>
                <a href="sam.php?id=<?php echo $row['question']; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class = "container-fluid">
                        <div class = "row">
                            <div class = "col-md-8">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1" id = "questionhead"><?php echo $row['question'] ?></h5>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                <small>Donec id elit non mi porta.</small>
                            </div>
                            <div class = "col-md-4">
                                <small>3 days ago</small><br>
                                <h3><span class="badge badge-primary badge-pill ml-4">
                                        <?php echo $row['votes']   ?>
                                    </span>
                                    <span class="badge badge-primary badge-pill ml-4">14</span>
                                    <span class="badge badge-primary badge-pill ml-4">14</span>

                                </h3>

                            </div>
                        </div>

                    </div>

                </a>

                <?php endwhile; ?>

            </div>
        </div>





        <div id="menu1" class="container tab-pane fade"><br>
            <h3>Menu 1</h3>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div id="menu2" class="container tab-pane fade"><br>
            <h3>Menu 2</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
        </div>
    </div>
</div>

<button id = 'btn' type = "button" formaction="testdb.php">Button</button>




</body>
</html>
