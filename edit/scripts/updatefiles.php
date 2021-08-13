<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['login'] === true){
    
    // Update css files
    if(isset($_GET['css'])) {

        $redirect = true;
        include "../update/update-css.php";

    } else {
        echo "Something went wrong";
    }
}   
else {

    // Show error if user isn't logged in
    echo("
    <p class='error'>
        Login requierd.<br>
        <a href='../index.php'>Sign In</a>
    </p>
    ");
}
?>
