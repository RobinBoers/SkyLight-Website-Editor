<?php
    $file = "../content/blog.json";
    $count = 0;

    if(file_exists($file) && filesize($file) > 0){
        $handle = fopen($file, "a+");
        $contents = fread($handle, filesize($file));
        $blogs = json_decode($contents);
        fclose($handle);

        foreach ($blogs as $blog){ 

            $count = $count + 1;

        }
    }

    echo $count;
?>