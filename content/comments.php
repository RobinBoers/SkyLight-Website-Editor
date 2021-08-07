<?php
if($pagename == "index") {
    $file = "content/comments.json";
    $fullView = false;
} else {
    $file = "../content/comments.json";
    $fullView = true;
}

if(file_exists($file) && filesize($file) > 0){
    $handle = fopen($file, "a+");
    $contents = fread($handle, filesize($file));
    $comments = json_decode($contents);
    fclose($handle);

    $commentsnum = 0;    
    
    foreach ($comments as $comment){
        if($comment->post_id == $pagename) { 
            if($commentsnum !== 0) {
                echo "<hr>";
            }

            $commentsnum += 1;

            ?>
            <article class="comment">
                <h4><?= $comment->name ?></h4>
                <div class="clearfix commentcontent">
                    <?php
                        echo(nl2br($comment->body))
                    ?>
                </div>
            </article>
            <?php

        }
        
    }

    ?><hr>
    
        <!-- New comment button -->
        <a href="<?php echo $root_path ?>/edit/newcomment.php?post_id=<?php echo $pagename ?>">Write new comment...</a>

    <?php

} else {
    echo "Something went wrong...";
}
?>
