<?php
$connection = mysqli_connect('localhost', 'root', '', 'my_db');
$sqlQuery = "SELECT * from adminlogintable WHERE status = 1";
$sqlResult = mysqli_query($connection, $sqlQuery);
if ( !mysqli_fetch_assoc($sqlResult) ) {
    header("Location: admin-login.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel = "stylesheet" href = "vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php include "admin_navbar.php"; ?>
    <div class = "row">
        <div class = "col-md-2">
            <?php include "admin_sidebar.php"; ?>
        </div>
        <div class = "col-md-10">
            <?php
                $queryResult = mysqli_query($connection, "SELECT * FROM signuptable");
            ?>
            <table class="table text-center">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Blocked</th>
                    <th>Block User</th>
                    <th>Unblock User</th>
                </tr>
                </thead>
                <tbody>
                <?php while( $rowResult = mysqli_fetch_assoc($queryResult) ): ?>
                <tr>
                    <td><?php echo $rowResult['firstname']; ?></td>
                    <td><?php echo $rowResult['lastname']; ?></td>
                    <td><?php echo $rowResult['username']; ?></td>
                    <td><?php echo $rowResult['user_email']; ?></td>
                    <td><?php echo $rowResult['user_password']; ?></td>
                    <td><?php echo $rowResult['removed'] ?></td>
                    <td><a href = "blockUser.php?user=<?php echo $rowResult['username']; ?>"><button type = "submit" class = "btn btn-danger">Block</button></td>
                    <td><a href = "unblockUser.php?user=<?php echo $rowResult['username']; ?>"><button type = "submit" class = "btn btn-warning">Unblock</button></td>
                </tr>

                <?php  endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
