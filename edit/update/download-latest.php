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
        echo '> Downloading version '.$version.'<br>';

        // Initialize a file URL to the variable 
        $url = 'https://github.com/RobinBoers/SkyLight-Website-Editor/releases/download/'.$version.'/package.zip'; 
        
        // Set destination 
        $file_name = '../content/uploads/package.zip'; 
            
        // Use file_get_contents() function to get the file 
        // from url and use file_put_contents() function to 
        if(file_put_contents( $file_name,file_get_contents($url))) { 
            // Debug message
            echo '> Comleted downloading version '.$version.'<br>';
        } 
        else { 
            // Debug message
            echo '> Failed downloading version '.$version.'<br>'; 
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
  