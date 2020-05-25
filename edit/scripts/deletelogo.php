<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['login'] === true){

// Clear logo file
$fp = fopen("../../content/logo.php", 'w+');
fwrite($fp, " ");
fclose($fp);

// delete the file
unlink('../../images/uploads/logo.jpg');

// Add to history log
$history = fopen("../../content/history.html", 'a');
fwrite($history, "<p><b>".date("l, j F Y")." - ".date("H:i")."</b> ".$_SESSION['name']." has deleted the logo</p>");
fclose($history);

header("Location: ../index.php");

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