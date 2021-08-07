<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['login'] === true) {

    $fp = fopen("../quickstart.txt", 'w+');
    fwrite($fp, "done");
    fclose($fp);

    header("Location: ../index.php");

}
?>