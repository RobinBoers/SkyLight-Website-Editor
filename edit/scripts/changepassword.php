<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['login'] === true){

    if($_POST['changepass']) {

        $pswd = $_POST['pswd'];
        $newpswd = password_hash($_POST['newpswd'], PASSWORD_BCRYPT);

        $password = file_get_contents('../password.txt', true);
        if(password_verify($pswd, $password)) {
            $fp = fopen("../password.txt", 'w+');
            fwrite($fp, $newpswd);
            fclose($fp);

            header("Location: ../settings.php");
        } else {

            echo("
            <p class='error'>
                Wrong password.<br>
                <a href='../index.php'>Try again</a>
            </p>");

        }
        
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