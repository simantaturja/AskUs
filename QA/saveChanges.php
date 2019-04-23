<?php
    $connection = mysqli_connect('localhost', 'root', '', 'my_db');
    $title = $_POST['title'];
    $email = $_POST['email'];
    $quote = $_POST['quote'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $linkedin = $_POST['linkedin'];
    $googleplus = $_POST['googleplus'];
    echo $title;
    mysqli_query($connection, "UPDATE qatheme SET title = '$title', email = '$email', quote = '$quote',
                  address = '$address', phone = '$phone', facebook = '$facebook', twitter = '$twitter'
                 ,googleplus = '$googleplus', linkedin = '$linkedin'");
    header("Location: qa_themes.php");
?>