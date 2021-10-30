<?php

include("../functions/rmdir.php");

session_start();
if(isset($_SESSION['name']) && $_SESSION['login'] === true){

    // check if form is send
    if(isset($_FILES['zip_file'])) {  
        
        // if the zipfile name isn't empty, proceed
        if($_FILES['zip_file']['name'] != '')  {  

            // create variables
            $file_name = $_FILES['zip_file']['name'];  
            $array = explode(".", $file_name);  
            $ext = end($array);  

            // check if the file is a zipfile
            if($ext == 'zip')  {  

                // the upload location
                $customId = uniqid();
                $path = '../../content/themes/uploads/'.$customId.'/';  

                // Create path
                mkdir('../../content/themes');
                mkdir('../../content/themes/uploads');
                mkdir($path);

                // Get full file locations
                $location = $path . $file_name;  

                if(move_uploaded_file($_FILES['zip_file']['tmp_name'], $location))  {  

                    // unzip the files
                    $zip = new ZipArchive;  
                    if($zip->open($location))  {  
                        $zip->extractTo($path);  
                        $zip->close();  
                    }  

                    $files = scandir($path);  

                    foreach($files as $file)  {  

                        if($file == "theme.css") {

                            echo "> found theme.css<br>";

                            unlink("../../css/theme.css"); 
                            copy($path."/theme.css", "../../css/theme.css"); 
                            

                            echo "> replaced old theme.css<br>";
                       }

                       else if($file == "post.php") {

                            echo "> found post.php<br>";

                            unlink("../../post/post.php"); 
                            copy($path."/post.php", "../../post/post.php"); 
                        

                            echo "> replaced old post.php<br>";
                         }

                         else if($file == "page.php") {

                            echo "> found page.php<br>";

                            unlink("../../p/page.php"); 
                            copy($path."/page.php", "../../p/page.php"); 
                        

                            echo "> replaced old page.php<br>";
                         }

                         else if($file == "index.php") {

                            echo "> found index.php<br>";

                            unlink("../../index.php"); 
                            copy($path."/index.php", "../../index.php"); 
                        

                            echo "> replaced old index.php<br>";
                         }

                         else if($file == "blog.php") {

                            echo "> found blog.php<br>";

                            unlink("../../content/blog.php"); 
                            copy($path."/blog.php", "../../content/blog.php"); 
                        

                            echo "> replaced old blog.php<br>";
                         }

                         else if($file == "comments.php") {

                            echo "> found comments.php<br>";

                            unlink("../../content/comments.php"); 
                            copy($path."/comments.php", "../../content/comments.php"); 
                        

                            echo "> replaced old comments.php<br>";
                         }

                         else if($file == "menu.php") {

                            echo "> found menu.php<br>";

                            unlink("../../content/menu.php"); 
                            copy($path."/menu.php", "../../content/menu.php"); 
                        

                            echo "> replaced old menu.php<br>";
                         }

                         else if($file == "404.php") {

                            echo "> found 404.php<br>";

                            unlink("../../content/404.php"); 
                            copy($path."/404.php", "../../404.php"); 
                        

                            echo "> replaced old 404.php<br>";
                         }
                         
                         else if ($file == "." || $file == "..") {

                         }

                         else {

                            echo " > copying ".$file;
                            if (!file_exists("../../content/assets")) {
                                mkdir("../../content/assets");
                            }
                            copy($path."/".$file, "../../content/assets/".$file); 

                         }
                            
                    }  
                    
                    // delete zip file
                    unlink($location); 
                    
                    // // remove extract dir
                    deleteDirectory($path);

                    header("Location: ../themes.php?success");

                }  
            }  else {
                echo "not a zip";
            }
        }  else {
            echo "zip empty";
        }
    }  else {
        echo "didnt receive input";
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