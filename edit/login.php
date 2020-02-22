<?php

// Laadt het wachtwoord
include("password.php");

session_start();
 
if(isset($_POST['login'])){
    if($_POST['name'] != "" && $_POST['password'] === $password){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
        $_SESSION['login'] = true;
        header("Location: index.php");
    }
    else {
        header("Location: index.php?wrongpass");
    }
}
if(isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
}
?>