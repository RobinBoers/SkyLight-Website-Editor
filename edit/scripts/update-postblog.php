<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['login'] === true){
    
    // Add a post
    if(isset($_POST['post'])) {

        // Get data from editor
        $title = $_POST['title'];
        $text = $_POST['text'];
        $tags = $_POST['tags'];
        $datum = date("l, j F Y");
        $auteur = $_SESSION['name'];
        $id = uniqid();
        
        // Create an array
        $blog = array("id" => $id, "title" => $title, "text" => $text, "tags" => $tags, "taglink" => "/search.php?tags=".$tags, "link" => "/post/".$id.".php", "auteur" => $auteur, "datum" => $datum);
        
        // Get the older posts
        $oldercontent = file_get_contents("../../content/blog.json");
        $blogs = json_decode($oldercontent);
        
        // Merge old and new bloga
        array_unshift($blogs, $blog);
        
        // Put updated array in the blogposts file
        $fp = fopen("../../content/blog.json", 'w+');
        fwrite($fp, json_encode($blogs));
        fclose($fp);
        
        // Get blogpost template
        $template = file_get_contents("../../post/template.php");

        // Create blogpost file
        $fp = fopen("../../post/".$id.".php", 'a');
        fwrite($fp, $template);
        fclose($fp);

        // Add to history log
        $history = fopen("../../content/history.html", 'a');
        fwrite($history, "<p><b>".date("l, j F Y")." - ".date("H:i")."</b> ".$_SESSION['name']." has published the blogpost ".$title."</p>");
        fclose($history);

        header("Location: ../blogs.php?success-post");
    } 

    // Update a post
    else if(isset($_POST['update'])) {

        // Get data from editor
        $text = $_POST['posttext-edit'];
        $id = $_POST['id'];
        $datum = date("l, j F Y");
        $auteur = $_SESSION['name'];
        
        // Get older blogs
        $contents = file_get_contents("../../content/blog.json");
        $oldblogs = json_decode($contents);
        
        // Create new array
        $newblogs = array();
        
        // Overwrite array with new post
        foreach ($oldblogs as $blog){
            if($blog->id === $id) {
                $title = $blog->title;
                $tags = $blog->tags;
                $taglink = $blog->taglink;
                $link = $blog->link;
                $Nid = $blog->id;
                $newblog = array("id" => $Nid, "title" => $title, "text" => $text, "auteur" => $auteur, "datum" => $datum, "tags" => $tags, "taglink" => $taglink, "link" => $link);
                array_push($newblogs, $newblog); 
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
        fwrite($history, "<p><b>".date("l, j F Y")." - ".date("H:i")."</b> ".$_SESSION['name']." has updated the blogpost ".$title."</p>");
        fclose($history);

        header('Location: ../blogs.php?success-update');
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
