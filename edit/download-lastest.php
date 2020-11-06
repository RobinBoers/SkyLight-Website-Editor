<style>
* {font-family:'Courier New',sans-serif;background-color:black;color:white;}
</style>
<?php 
  
  // Get lastest version
  $version = file_get_contents('https://code.geheimesite.nl/package/SkyLight/lastest.txt');
  echo $version;

  // Initialize a file URL to the variable 
  $url = 'https://github.com/RobinBoers/SkyLight-Website-Editor/releases/download/'.$version.'/package.zip'; 
  
  // Set destination 
  $file_name = '../content/uploads/package.zip'; 
     
  // Use file_get_contents() function to get the file 
  // from url and use file_put_contents() function to 
  if(file_put_contents( $file_name,file_get_contents($url))) { 
      // Debug message
      echo "> Downloaded lastest version<br>"; 
  } 
  else { 
      // Debug message
      echo "File downloading failed."; 
  } 
    
  ?> 
  