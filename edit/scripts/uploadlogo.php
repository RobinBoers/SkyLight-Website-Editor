<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['login'] === true){

    $newFileName = "logo.jpg";
    $target_dir = "../../content/";
    $target_file = $target_dir . $newFileName;
    $uploadOk = 1;
    $logo = false;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $error = "#";

    // Check if image file is a actual image or fake image
    if(isset($_FILES["fileToUpload"])) {

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

        if($check !== false) {
            $uploadOk = 1;
        }   
        else {
            $error == "<br>Error: the uploaded file wasn't a image.<br>";
            $uploadOk = 0;
        }

    }

    if($check["mime"] !== "image/jpeg") {
        $error == "<br>Error: the image file you selected wasn't a valid JPG file.<br>";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $error == "<br>Error: you already have a logo. Please delete the old logo before uploading a new one.<br>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error, if true show the error message
    if ($uploadOk == 0) {
        echo $error;
        echo "<a href='../index.php'>Back</a>";
   
    } 

    // If everything is ok, try to upload the logo
    else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

            // Add to history log
            $history = fopen("../../content/history.html", 'a');
            fwrite($history, "<p><b>".date("l, j F Y")." - ".date("H:i")."</b> ".$_SESSION['name']." has uploaded a new logo</p>");
            fclose($history);

            header("Location: ../settings.php?success-logo-upload");

        } 
        
        else {
            echo "
                <br>Sorry, something went wrong while uploading your logo.<br> 
                Please try again.<br> 
                <a href='../index.php'>Back</a><br>
            ";
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