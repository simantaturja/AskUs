<?php
    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
    $sqlSearch = "SELECT * from signuptable WHERE status = 1";
    $sqlResult = mysqli_query($connection, $sqlSearch);
    $sqlUser = mysqli_fetch_assoc($sqlResult);
    $user = mysqli_escape_string($connection,$sqlUser['username']);
    $questions = $sqlUser['questions'];
    $questions = $questions + 1;
    $sqlUpdateQuestion = "UPDATE signuptable SET questions = '$questions' WHERE status = 1";


    if ( isset($_POST['addquestionbtn']) ) {
        mysqli_query($connection, $sqlUpdateQuestion);
        $question = $_POST['headertext'];

        $queryExistence = mysqli_query($connection, "SELECT question from questions WHERE question = '$question'");
        if ( mysqli_fetch_assoc($queryExistence) ) {

        }


        //$ques = test_input($question);
        //$url = test_input2($question);
        $url = $question;
        $ques = $question;
        $url = str_replace(' ', '_', $url);
        $content = mysqli_escape_string($connection, $_POST['addquestioncontentarea']);
        echo $content;
        $votes = 0;
        $latest = 1;
        $answered = 0;
        $sql = "INSERT INTO questions(question, url, votes, latest, answered, description, askedBy, showhide)
                VALUES('$ques', '$url','$votes', '$latest', '$answered', '$content', '$user', 'shown')";
        $resultInsert = mysqli_query($connection, $sql);
        $tags = $_POST['tagsText'];
        $length = strlen($tags);
        $txt = "";
        $genre="";
        for ( $i = 0; $i < $length; $i++ ) {
            if ( $tags[$i] == ',' ) {
                $genre = $txt;
                $txt ="";
                $sqlCommand = "INSERT into tagstable(question, genre) VALUES('$ques','$genre')";
                mysqli_query($connection, $sqlCommand);
            }
            else {
                $txt = $txt.$tags[$i];
            }
        }
        if ( $txt != "" ) {
            $genre = $txt;
            $txt = "";
            $sqlCommand = "INSERT into tagstable(question, genre) VALUES('$ques','$genre')";
            mysqli_query($connection, $sqlCommand);
        }


        header("Location: index.php");
    }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES);
    return $data;
}
function test_input2($data) {
    $specialChar = "'\'/[\\'^£$%*()}{@#~><>,|=_+¬-]/\'";
    $length2 = strlen($specialChar);
    $length = strlen($data);
    $answer = "";
    for ( $i = 0; $i < $length; $i++ ) {
        $f = 0;
        if ( $data[$i] == '&' ) {
            $answer = $answer."and";
            continue;
        }
        for ( $j = 0; $j < $length2; $j++ ) {
            if ( $data[$i] == $specialChar[$j] ) {
                $f = 1;
                break;
            }
        }
        if ( $f == 0 ) {
            $answer = $answer.$data[$i];
        }
    }
    return $answer;
}
?>
?>
