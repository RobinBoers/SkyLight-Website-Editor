<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['login'] === true){

    if($_POST['changepass']) {

        $pswd = $_POST['pswd'];
        $newpswd = $_POST['newpswd'];

        include "../password.php";
        if($pswd === $password) {
            $fp = fopen("../password.php", 'w+');
            fwrite($fp, "
            <?php
            \$password = '".$newpswd."';
            ?>
            ");
            fclose($fp);
        }
        
    }

    header("Location: ../settings.php");

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