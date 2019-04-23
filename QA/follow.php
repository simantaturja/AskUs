<?php
    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
    $sqlQueryFirst = "SELECT * from signuptable WHERE status = 1";
    $sqlQueryFirstResult = mysqli_query($connection, $sqlQueryFirst);
    $sqlQueryFirstResultRow = mysqli_fetch_assoc($sqlQueryFirstResult);
    $followedBy = $sqlQueryFirstResultRow['username'];

    $username = $_GET['user'];

    $sqlQuery = "SELECT * from followtable WHERE username = '$username' AND followedby = '$followedBy'";
    $sqlQueryResult = mysqli_query($connection, $sqlQuery);
    if ( !$row = mysqli_fetch_assoc($sqlQueryResult) ) {
        echo "HELLO";
        $sqlQueryTemp = "INSERT into followtable(username, followedby)
                          VALUES('$username', '$followedBy')";
        mysqli_query($connection, $sqlQueryTemp);
        mysqli_query($connection, "INSERT into followtable(username, following) VALUES('$followedBy','$username')");

        $res1 = mysqli_query($connection, "SELECT * from signuptable WHERE username ='$username'");
        $resRow = mysqli_fetch_assoc($res1);
        $followers = $resRow['followers'];
        echo $followers;
        $followers = $followers + 1;
        mysqli_query($connection, "UPDATE signuptable SET followers = '$followers' WHERE username = '$username'");
        $following = $sqlQueryFirstResultRow['following'];
        $following = $following + 1;
        mysqli_query($connection, "UPDATE signuptable SET following = '$following' WHERE username = '$followedBy'");
    }
    else {
        $row = mysqli_fetch_assoc($sqlQueryResult);
        $sqlDeleteQuery = "DELETE from followtable WHERE username = '$username' AND followedby = '$followedBy'";
        mysqli_query($connection, $sqlDeleteQuery);
        mysqli_query($connection, "DELETE from followtable WHERE username='$followedBy' AND following='$username'");
        $res1 = mysqli_query($connection, "SELECT * from signuptable WHERE username='$username'");
        $resRow = mysqli_fetch_assoc($res1);
        $followers = $resRow['followers'];
        $followers = $followers - 1;
        mysqli_query($connection, "UPDATE signuptable SET followers = '$followers' WHERE username = '$username'");
        $following = $sqlQueryFirstResultRow['following'];
        $following = $following - 1;
        mysqli_query($connection, "UPDATE signuptable SET following = '$following' WHERE username = '$followedBy'");
    }
    $content = "Location: profile.php?user=".$username;
    header($content);
?>