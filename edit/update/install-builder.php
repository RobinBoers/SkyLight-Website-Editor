<style>
/* Cool theme */
* {
    font-family:'Courier New',sans-serif;
    background-color:black;
    color:white;
}

</style>
<?php 
    session_start();
    if(isset($_SESSION['name']) && $_SESSION['login'] === true){

        // Get lastest version
        $version = file_get_contents('https://code.geheimesite.nl/package/SkyLight/latest.txt');
        echo '> Installing version '.$version.'<br>';
        echo '> Do not close this windows until install is completed<br>';
        
        $zip = new ZipArchive; 
        $filename = "package.zip";
        
        // Zip File Name 
        if ($zip->open($filename) === TRUE) { 
        
            // Unzip Path 
            $zip->extractTo('../../'); 
            echo $zip->extractTo('../../'); 
            $zip->close(); 
            echo '> Install successfull <br>'; 
            echo '> <a href="index.php">Back</a><br>'; 

        } else { 
            echo '> Install failed'; 
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
  