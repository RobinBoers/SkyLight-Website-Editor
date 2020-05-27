<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['login'] === true){

    if(isset($_POST['id'])) {

        // Get data from editor
        $id = $_POST['id'];
        
        // Get older blogs
        $contents = file_get_contents("../../content/blog.json");
        $oldblogs = json_decode($contents);
        
        // Create new array
        $newblogs = array();
        
        // Overwrite array with new post
        foreach ($oldblogs as $blog){
            if($blog->id === $id) {
                
            }
            else {
                array_push($newblogs, $blog); 
            }
        } 
        
        // Put updated data in blogposts file
        $fp = fopen("../../content/blog.json", 'w+');
        fwrite($fp, json_encode($newblogs));
        fclose($fp);

        // Add to history log
        $history = fopen("../../content/history.html", 'a');
        fwrite($history, "<p><b>".date("l, j F Y")." - ".date("H:i")."</b> ".$_SESSION['name']." has deleted the blogpost ".$title."</p>");
        fclose($history);

        header('Location: ../index.php');
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