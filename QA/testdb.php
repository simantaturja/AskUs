<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'my_db';
$connection = mysqli_connect( $host, $user, $pass, $db );
if ( $connection )  echo " Connected ! ";
if ( isset($_POST['btn'] ) ) {
    $question = 'How linux was built?';
    $votes = 2;
    $isLatest = 1;
    $isAnswered = 0;
    $sqlinsert = "INSERT INTO questionstable(questions, votes, isLatest, isAnswered)
                  VALUES( '$question','$votes','$isLatest','isAnswered')";
    mysqli_query($connection, $sqlinsert);
}
?>