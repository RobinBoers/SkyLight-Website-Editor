<?php

    // Get data from editor
    $name = $_POST['name'];
    $body = $_POST['text'];
    $post_id = $_POST['post_id'];
    $id = uniqid();

    // Create an array
    $comment = array("id" => $id, "name" => $name, "body" => $body, "post_id" => $post_id);

    // Get the older comments
    $oldercontent = file_get_contents("../../content/comments.json");
    $comments = json_decode($oldercontent);

    // Merge old and new comments into
    // a single array
    array_unshift($comments, $comment);

    // Put updated array in the comments db file
    $fp = fopen("../../content/comments.json", 'w+');
    fwrite($fp, json_encode($comments));
    fclose($fp);

    // Add to history log
    $history = fopen("../../content/history.html", 'a');
    fwrite($history, "<p><b>".date("l, j F Y")." - ".date("H:i")."</b> new comment from ".$name."!</p>");
    fclose($history);

    header("Location: ../../post/".$post_id.".php");
?>