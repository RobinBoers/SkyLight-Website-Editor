<?php 
    $pagename = basename(__FILE__, ".php");
    $PageId = basename(__FILE__, ".php");

    $contents = file_get_contents("../content/pages.json");
    $pages = json_decode($contents);

    foreach ($pages as $page){
        if($page->id === $PageId) {
            $pagetitle = $page->title;
            $content = $page->text;
            $link = $page->link;
            $id = $page->id;
        } else {
            // echo "Er werkt iets niet...";
        }
    } 

    include("../content/views.php");
    $views = $views + 1; 
    //echo $views;
    $fp = fopen("../content/views.php", 'w+');
    fwrite($fp, "
    <?php
    \$views = ".$views.";
    ?>
    ");
    fclose($fp);

    include "page.php";
?>