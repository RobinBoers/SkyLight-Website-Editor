<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['login'] === true){
    
    // Update css files
    if(isset($_GET['css'])) {

        // Initialize a file URL to the variable 
        $basetheme_uri = 'https://code.geheimesite.nl/package/SkyLight/latest/basetheme.css'; 
        $editor_uri = 'https://code.geheimesite.nl/package/SkyLight/latest/editor.css'; 

        // Set destination 
        $basetheme_dest = '../../css/basetheme.css'; 
        $editor_dest = '../../css/editor.css';

        if(file_put_contents($basetheme_dest,file_get_contents($basetheme_uri))) { 
            echo "Downloaded basetheme.css<br>";
        }
        if(file_put_contents($editor_dest,file_get_contents($editor_uri))) { 
            echo "Downloaded editor.css<br>";
        }

        header("Location: ../update/index.php?success-updatecss");

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
