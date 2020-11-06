<?php

// Load the password
$password = file_get_contents('./password.txt', true);
session_start();
 
if(isset($_POST['login'])){

    // Get password from userinput
    $pswd = $_POST['password'];

    if($_POST['name'] != "" && password_verify($pswd, $password)){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
        $_SESSION['login'] = true;

        // Debug message
        echo "<br><br><b style='font-size:70px;font-family:sans-serif;'>YESSSSS</b>";

        // Redirect
        header("Location: index.php");
    }
    else {
        // Debug message
        echo "<br><br><b style='font-size:70px;font-family:sans-serif;'>:(</b>";

        // Redirect
        header("Location: index.php?wrongpass");
    }
}
if(isset($_GET['logout'])) {

    // When logging out
    session_unset();
    session_destroy();

    // Redirect
    header("Location: index.php");
}
?>