<?php
    $file = "../content/pages.json";
    $count = 0;

    if(file_exists($file) && filesize($file) > 0){
        $handle = fopen($file, "a+");
        $contents = fread($handle, filesize($file));
        $pages = json_decode($contents);
        fclose($handle);

        foreach ($pages as $page){ 

            $count = $count + 1;

        }
    }

    echo $count;
?>