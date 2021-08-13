<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['login'] === true){

    // Delete the file
    unlink('../../content/logo.jpg');

    // Add to history log
    $history = fopen("../../content/history.html", 'a');
    fwrite($history, "<p><b>".date("l, j F Y")." - ".date("H:i")."</b> ".$_SESSION['name']." has deleted the logo</p>");
    fclose($history);

    header("Location: ../settings.php?success-logo-delete");

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