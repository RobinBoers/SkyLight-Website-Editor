<?php
if($pagename == "index") {
    $file = "content/blog.json";
    $fullView = false;
} else {
    $file = "../content/blog.json";
    $fullView = true;
}

if(file_exists($file) && filesize($file) > 0){
    $handle = fopen($file, "a+");
    $contents = fread($handle, filesize($file));
    $blogs = json_decode($contents);
    fclose($handle);

    $postnum = 0;    
    
    foreach ($blogs as $blog){
            if($fullView == true && $blog->id == $pagename) { echo ''; } else {
                if($postnum !== 0) {
                    echo "<hr>";
                }

                $postnum += 1;
            ?>
            <article class="post">
                <h3 class="post-title"><a href="<?= $root_path.$blog->link ?>"><?= $blog->title ?></a></h3>
                <p class="clearfix">posted by: <b><?= $blog->auteur ?></b> at <b><?= $blog->datum ?></b>, Tags: <a href="<?php echo $root_path.$blog->taglink; ?>"><b><?= $blog->tags ?></b></a></p>
                <div class="clearfix blogtext postcontent">
                    <?php
                        $text = $blog->text;
                        $text = substr($text, 0, 500);
                        $text = substr($text, 0, strrpos($text, ' ')) . " ..."; 
                        echo(nl2br($text))
                    ?>
                </div>
            </article>
            <?php
        }
        
    }
} else {
    echo "Something went wrong...";
}
?>
