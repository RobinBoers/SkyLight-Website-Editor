<?php

// Load the password
$password = file_get_contents('./password.txt', true);
session_start();
 
if(isset($_POST['login'])){

    $pswd = $_POST['password'];

    if($_POST['name'] != "" && password_verify($pswd, $password)){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
        $_SESSION['login'] = true;
        echo "<br><br><b style='font-size:70px;font-family:sans-serif;'>YESSSSS</b>";
        header("Location: index.php");
    }
    else {
        echo "<br><br><b style='font-size:70px;font-family:sans-serif;'>:(</b>";
        header("Location: index.php?wrongpass");
    }
}
if(isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
}
?>