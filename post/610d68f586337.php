<?php 
    $BlogId = basename(__FILE__, ".php");

    $contents = file_get_contents("../content/blog.json");
    $blogs = json_decode($contents);

    foreach ($blogs as $blog){
        if($blog->id === $BlogId) {
            $pagetitle = $blog->title;
            $content = $blog->text;
            $auteur = $blog->auteur;
            $date = $blog->datum;
            $tags = $blog->tags;
            $taglink = $blog->taglink;
            $link = $blog->link;
            $id = $blog->id;
        } else {
            // echo "Something went wrong...";
        }
    } 

    include "../content/siteinformation.php";
    include "../content/themedocs.php";

    view_counter();

    include "post.php";
?>