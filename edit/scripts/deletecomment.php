<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['login'] === true){

    if(isset($_GET['id'])) {

        // Get data from editor
        $id = $_GET['id'];
        
        // Get all comments
        $contents = file_get_contents("../../content/comments.json");
        $oldcomments = json_decode($contents);
        
        // Create new array
        $newcomments = array();
        $text = "";

        // Overwrite array with new post
        foreach ($oldcomments as $comment){
            if($comment->id === (int)$id) {
                // do nothing, so it won't go into the new file
                $text = $comment->body;
            }
            else {
                array_push($newcomments, $comment); 
            }
        } 
        
        // Put updated data in comments file
        $fp = fopen("../../content/comments.json", 'w+');
        fwrite($fp, json_encode($newcomments));
        fclose($fp);

        // Add to history log
        $history = fopen("../../content/history.html", 'a');
        fwrite($history, "<p><b>".date("l, j F Y")." - ".date("H:i")."</b> ".$_SESSION['name']." has deleted the comment: ".$text."</p>");
        fclose($history);

        header('Location: ../comments.php?success-deleted');
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