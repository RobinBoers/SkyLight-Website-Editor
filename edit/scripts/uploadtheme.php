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
                $path = '../../content/themes/uploads/'.$customId;  
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

                            echo "found theme.css<br>";

                            unlink("../../css/theme.css"); 
                            copy($path."/theme.css", "../../css/theme.css"); 
                            

                            echo "replaced old theme.css<br>";
                       }

                       else if($file == "post.php") {

                            echo "found post.php<br>";

                            unlink("../../post/post.php"); 
                            copy($path."/post.php", "../../post/post.php"); 
                        

                            echo "replaced old post.php<br>";
                         }

                         else if($file == "page.php") {

                            echo "found page.php<br>";

                            unlink("../../p/page.php"); 
                            copy($path."/page.php", "../../p/page.php"); 
                        

                            echo "replaced old page.php<br>";
                         }

                         else if($file == "index.php") {

                            echo "found index.php<br>";

                            unlink("../../index.php"); 
                            copy($path."/index.php", "../../index.php"); 
                        

                            echo "replaced old index.php<br>";
                         }

                         else if($file == "blog.php") {

                            echo "found blog.php<br>";

                            unlink("../../content/blog.php"); 
                            copy($path."/blog.php", "../../content/blog.php"); 
                        

                            echo "replaced old blog.php<br>";
                         }
                         
                         else if ($file == "." || $file == "..") {

                         }

                         else {

                             echo "copying ".$file;
                             copy($path."/".$file, "../../content/uploads/".$file); 

                         }
                            
                    }  
                    
                    // delete zip file
                    unlink($location); 
                    
                    // // remove extract dir
                    // rmdir($path . $name);  

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