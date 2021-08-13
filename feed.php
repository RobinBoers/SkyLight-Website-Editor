<?php

header("Content-Type: text/xml; charset='utf-8'");
print("<?xml version='1.0' encoding='UTF-8' ?>");

include "content/siteinformation.php"

?>

<rss version="2.0">
    <channel>
        <title><?= $sitetitle ?></title>
        <description><?= $sitedescription ?></description>
        <link><?= $_SERVER['SERVER_NAME'].$root_path ?></link>
        <copyright><?= $footertext ?></copyright>
        <language><?= $sitelanguage ?></language>
        <image>
            <url><?= $_SERVER['SERVER_NAME'].$root_path."/content/logo.jpg" ?></url>
            <title><?= $sitetitle ?></title>
            <link><?= $_SERVER['SERVER_NAME'].$root_path ?></link>
            <description><?= $sitedescription ?></description>
            <width>48</width>
            <height>48</height>
        </image>

        <?php

            $file = "content/blog.json";

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
                        <item>
                            <title><?= $blog->title ?></title>
                            <description>
                                <?php
                                
                                    echo preg_replace('/\<(img|br)([^>]*)(?<!\/)>/', '<\1\2/>', $blog->text);

                                ?>
                            </description>
                            <link><?= $_SERVER['SERVER_NAME'].$root_path.$blog->link ?></link>
                            <comments><?= $_SERVER['SERVER_NAME'].$root_path.$blog->link."#comments" ?></comments>
                            <pubDate><?= $blog->datum ?></pubDate>
                        </item>
                        <?php
                    }
                    
                }
            }
        ?>

    </channel>
</rss>