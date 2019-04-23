<?php
    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
    $sql1 = "SELECT * from signuptable WHERE status = 1";
    $question = $_GET['id'];
    $result = mysqli_query($connection, $sql1);
    $userRow = mysqli_fetch_assoc($result);
    $username1 = $userRow['username'];
    $ques = str_replace('_', ' ', $question);

    $sqlSample = " SELECT * from voted WHERE question = '$ques' AND username = '$username1' ";
    $sqlSampleQuery = mysqli_query($connection, $sqlSample);
    $upvoted = "";
    if (!$sqlSampleResult = mysqli_fetch_assoc($sqlSampleQuery) ) {
        $upvoted1 = 0;
        $downvoted1 = 0;
        echo "HELLO WORLD";
        $sqlSam = "INSERT into voted(username, question, upvoted, downvoted) VALUES('$username1','$ques', '$upvoted1', '$downvoted1')";
        mysqli_query($connection, $sqlSam);
    }
    $sqlSample = "SELECT * from voted WHERE question = '$ques' AND username = '$username1'";
    $sqlSampleQuery = mysqli_query($connection, $sqlSample);
    $sqlSampleResult = mysqli_fetch_assoc($sqlSampleQuery);
    $upvoted = $sqlSampleResult['upvoted'] + 1;

    $sql2 = "UPDATE voted SET upvoted = '$upvoted' WHERE username = '$username1' AND question = '$ques'";
    mysqli_query($connection, $sql2);


    $getVotesFromQuestions = "SELECT * from questions WHERE question = '$ques'";
    $getVotesFromQuestionsResult = mysqli_query($connection, $getVotesFromQuestions);
    $getVotesFromQuestionsRow = mysqli_fetch_assoc($getVotesFromQuestionsResult);

    $questionContent = "Location: questionContent.php?url=".$getVotesFromQuestionsRow['url'];
    header($questionContent);
?>


