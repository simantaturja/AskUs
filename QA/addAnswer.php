<?php
    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
    $searchUser = "SELECT * from signuptable WHERE status = 1";
    $resultUser = mysqli_query($connection, $searchUser);
    $user = mysqli_fetch_assoc($resultUser);
    $username = $user['username'];
    $name = $user['firstname']." ".$user['lastname'];

    $answers = $user['answers'];
    $answers = $answers + 1;

    if ( isset($_GET['addanswerbtn']) ) {
        $question2 = $_GET["question2"];
        $question2 = str_replace('_', ' ', $question2);
        $answer = $_GET["addanswerarea"];
        $insertAnswer = "INSERT into questionanswer(question, answer, name, username) VALUES('$question2','$answer', '$name', '$username')";
        $result = mysqli_query($connection, $insertAnswer);
        $searchQuestion = "SELECT * from questions WHERE question = '$question2'";
        $searchQuestionResult = mysqli_query($connection, $searchQuestion);
        $searchQuestionRow = mysqli_fetch_assoc($searchQuestionResult);
        $searchQuestionRow['answered'] = $searchQuestionRow['answered'] + 1;
        $updateAnsweredQuestion = $searchQuestionRow['answered'];

        $updateInTable = "UPDATE questions SET answered = '$updateAnsweredQuestion' WHERE question = '$question2'";
        mysqli_query($connection, $updateInTable);

        $updateAnswer = "UPDATE signuptable SET answers = '$answers' WHERE username = '$username'";
        $updateResult = mysqli_query($connection, $updateAnswer);
        $question2 = str_replace(' ', '_', $question2);

        $link = "Location: questionContent.php?url=".$question2;
        header($link);
    }
?>