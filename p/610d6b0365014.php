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
            // echo "Something went wrong...";
        }
    } 

    include "../content/siteinformation.php";
    include "../content/themedocs.php";

    view_counter();

    include "page.php";
?>