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
        $oldercontent = file_get_contents("../content/blog.json");
        $blogs = json_decode($oldercontent);
        
        // Merge old and new bloga
        array_unshift($blogs, $blog);
        
        // Put updated array in the blogposts file
        $fp = fopen("../content/blog.json", 'w+');
        fwrite($fp, json_encode($blogs));
        fclose($fp);
        
        // Get blogpost template
        $fp = fopen("../post/template.php", 'w+');
        $template = file_get_contents($fp);
        fclose($fp);

        // Create blogpost file
        $fp = fopen("../post/".$id.".php", 'a');
        fwrite($fp, $template);
        fclose($fp);
        
        // Update history
        $history = fopen("../content/history.html", 'a');
        fwrite($history, "<p><b>".$_SESSION['name']."</b> heeft op <b>".date("l, j F Y")."</b> een bericht geplaatst met de naam: <b>".stripslashes(htmlspecialchars($title))."</b>");
        fclose($history);
    } 
    else if(isset($_POST['update'])) {

        // Get data from editor
        $text = $_POST['posttext-edit'];
        $id = $_POST['id'];
        $datum = date("l, j F Y");
        $auteur = $_SESSION['name'];
        
        $contents = file_get_contents("../content/blog.json");
        $oldblogs = json_decode($contents);
        
        $newblogs = array();
        
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
        $fp = fopen("../content/blog.json", 'w+');
        fwrite($fp, json_encode($newblogs));
        fclose($fp);
        header('Location: ../index.php');
    }
}
else {

    // Show error if user isn't logged in
    echo("
    <p class='error'>
        Login requierd.<br>
        <a href='index.php'>Sign In</a>
    </p>
    ");
}
?>
