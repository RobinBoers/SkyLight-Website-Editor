<?php 
    $pagename = basename(__FILE__, ".php");
    $BlogId = basename(__FILE__, ".php");

    $contents = file_get_contents("../content/blog.json");
    $blogs = json_decode($contents);

    foreach ($blogs as $blog){
        if($blog->id === $BlogId) {
            $pagetitle = $blog->title;
            $content = $blog->text;
            $auteur = $blog->auteur;
            $tags = $blog->tags;
            $taglink = $blog->taglink;
            $link = $blog->link;
            $id = $blog->id;
        } else {
            echo "Er werkt iets niet...";
        }
    } 

    include("../content/views.php");
    $views = $views + 1; //echo $views;
    $fp = fopen("../content/views.php", 'w+');
    fwrite($fp, "
    <?php
    \$views = ".$views.";
    ?>
    ");
    fclose($fp);

    include "post.php";
?>