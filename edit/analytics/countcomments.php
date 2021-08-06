<?php
    $file = "../content/comments.json";
    $count = 0;

    if(file_exists($file) && filesize($file) > 0){
        $handle = fopen($file, "a+");
        $contents = fread($handle, filesize($file));
        $comments = json_decode($contents);
        fclose($handle);

        foreach ($comments as $comment){ 

            $count = $count + 1;

        }
    }

    echo $count;
?>