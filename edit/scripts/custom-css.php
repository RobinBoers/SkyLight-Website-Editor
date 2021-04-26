<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['login'] === true){

    if(isset($_POST['css'])) {

        $newcss = $_POST['css'];

        echo $newcss;
        
        // Put custom css in the right file
        $fp = fopen("../../css/custom.css", 'w+');
        fwrite($fp, $newcss);
        fclose($fp);

        // Add to history log
        $history = fopen("../../content/history.html", 'a');
        fwrite($history, "<p><b>".date("l, j F Y")." - ".date("H:i")."</b> ".$_SESSION['name']." has updated Custom CSS Styling properties.</p>");
        fclose($history);

        header('Location: ../settings.php?success-css');
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