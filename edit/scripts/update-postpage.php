<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['login'] === true){
    
    // Add a page
    if(isset($_POST['post'])) {

        // Get data from editor
        $title = $_POST['title'];
        $text = $_POST['text'];
        $id = uniqid();
        
        // Create an array
        $page = array("id" => $id, "title" => $title, "text" => $text, "link" => "/p/".$id.".php");
        
        // Get the older pages
        $oldercontent = file_get_contents("../../content/pages.json");
        $pages = json_decode($oldercontent);
        
        // Merge old and new pages
        array_unshift($pages, $page);
        
        // Put updated array in the pages file
        $fp = fopen("../../content/pages.json", 'w+');
        fwrite($fp, json_encode($pages));
        fclose($fp);
        
        // Get page template
        $template = file_get_contents("../../p/template.php");

        // Create page file
        $fp = fopen("../../p/".$id.".php", 'a');
        fwrite($fp, $template);
        fclose($fp);

        // Add to history log
        $history = fopen("../../content/history.html", 'a');
        fwrite($history, "<p><b>".date("l, j F Y")." - ".date("H:i")."</b> ".$_SESSION['name']." has added this page: ".$title."</p>");
        fclose($history);

        header("Location: ../pages.php?success-post");
    } 

    // Update a post
    else if(isset($_POST['update'])) {

        // Get data from editor
        $text = $_POST['pagetext-edit'];
        $id = $_POST['id'];
        
        // Get older blogs
        $contents = file_get_contents("../../content/pages.json");
        $oldpages = json_decode($contents);
        
        // Create new array
        $newpages = array();
        
        // Overwrite array with new post
        foreach ($oldpages as $page){
            if($page->id === $id) {
                $title = $page->title;
                $link = $page->link;
                $Nid = $page->id;
                $newpage = array("id" => $Nid, "title" => $title, "text" => $text, "link" => $link);
                array_push($newpages, $newpage); 
            }
            else {
                array_push($newpages, $page); 
            }
        } 
        
        // Put updated data in blogposts file
        $fp = fopen("../../content/pages.json", 'w+');
        fwrite($fp, json_encode($newpages));
        fclose($fp);

        // Add to history log
        $history = fopen("../../content/history.html", 'a');
        fwrite($history, "<p><b>".date("l, j F Y")." - ".date("H:i")."</b> ".$_SESSION['name']." has updated this page: ".$title."</p>");
        fclose($history);

        header('Location: ../pages.php?success-update');
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
