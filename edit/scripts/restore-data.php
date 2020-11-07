<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['login'] === true){

    // check if form is send
    if(isset($_POST["submit"])) {  

        // if the zipfile name isn't empty, proceed
        if($_FILES['zip_file']['name'] != '')  {  

            // create variables
            $file_name = $_FILES['zip_file']['name'];  
            $array = explode(".", $file_name);  
            $name = $array[0];  
            $ext = $array[1];  

            // check if the file is a zipfile
            if($ext == 'zip')  {  

                // the upload location
                $customId = uniqid();
                $path = '../../content/uploads/tmp/data/'.$customId;  
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

                        if($file == "blog.json") {

                            echo "> found blog.json<br>";

                            unlink("../../content/blog.json"); 
                            copy($path."/blog.json", "../../content/blog.json"); 
                            

                            echo "> replaced old blog.json<br>";
                       }

                       else if($file == "history.html") {

                            echo "> found history.html<br>";

                            unlink("../../content/history.html"); 
                            copy($path."/history.html", "../../content/history.html"); 
                        

                            echo "> replaced old post.php<br>";
                         }

                         else if($file == "logo.php") {

                            echo "> found logo.php<br>";

                            unlink("../../content/logo.php"); 
                            copy($path."/logo.php", "../../content/logo.php"); 
                        

                            echo "> replaced old logo.php<br>";
                         }

                         else if($file == "menu.php") {

                            echo "> found menu.php<br>";

                            unlink("../../content/menu.php"); 
                            copy($path."/menu.php", "../../content/menu.php"); 
                        

                            echo "> replaced old menu.php<br>";
                         }

                         else if($file == "pages.json") {

                            echo "> found pages.json<br>";

                            unlink("../../content/pages.json"); 
                            copy($path."/pages.json", "../../content/pages.json"); 
                        

                            echo "> replaced old pages.json<br>";
                         }

                         else if($file == "siteinformation.php") {

                            echo "> found siteinformation.php<br>";

                            unlink("../../content/siteinformation.php"); 
                            copy($path."/siteinformation.php", "../../content/siteinformation.php"); 
                        

                            echo "> replaced old siteinformation.php<br>";
                         }

                         else if($file == "views.php") {

                            echo "> found views.php<br>";

                            unlink("../../content/views.php"); 
                            copy($path."/views.php", "../../content/views.php"); 
                        

                            echo "> replaced old views.php<br>";
                         }

                         else if($file == "password.txt") {

                            echo "> found password.txt<br>";

                            unlink("../password.txt"); 
                            copy($path."/password.txt", "../password.txt"); 
                        

                            echo "> replaced old password.txt<br>";
                         }
                         
                         else if ($file == "." || $file == "..") {

                         }

                         else {

                             echo " > copying ".$file;
                             copy($path."/".$file, "../../content/uploads/".$file); 

                         }
                            
                    }  
                    
                    // delete zip file
                    unlink($location); 
                    
                    // // remove extract dir
                    // rmdir($path . $name);  

                    header("Location: ../themes.php?success");

                }  
            }  
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