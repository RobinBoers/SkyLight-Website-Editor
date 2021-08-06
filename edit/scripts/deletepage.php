<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['login'] === true){

    if(isset($_GET['id'])) {

        // Get data from editor
        $id = $_GET['id'];
        
        // Get older blogs
        $contents = file_get_contents("../../content/pages.json");
        $oldpages = json_decode($contents);
        
        // Create new array
        $newpages = array();
        $title = "";
        
        // Overwrite array with new post
        foreach ($oldpages as $page){
            if($page->id === $id) {
                // do nothing, so it won't go into the new file
                $title == $page->title;
            }
            else {
                array_push($newpages, $page); 
            }
        } 

        unlink("../../p/".$id.".php");
        
        // Put updated data in blogposts file
        $fp = fopen("../../content/pages.json", 'w+');
        fwrite($fp, json_encode($newpages));
        fclose($fp);

        // Add to history log
        $history = fopen("../../content/history.html", 'a');
        fwrite($history, "<p><b>".date("l, j F Y")." - ".date("H:i")."</b> ".$_SESSION['name']." has deleted the page ".$title."</p>");
        fclose($history);

        header('Location: ../pages.php?success-deleted');
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