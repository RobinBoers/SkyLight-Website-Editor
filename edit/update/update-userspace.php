<?php

// Userspace is everything outside the $root_path/edit/ directory.
// Sometimes it is needed to create files there, like when comments were introduced.
// This scripts checks if the files introduced in later updates and located in userspace
// exist and creates them if needed.

// Comments.php

if(!file_exists("../../content/comments.php")) {

    // Get content of comments.php from master branch at GitHub
    $content = file_get_contents('https://raw.githubusercontent.com/RobinBoers/SkyLight-Website-Editor/master/content/comments.php');

    $myfile = fopen("../../content/comments.json", "w") or die("> Unable to create comments.php!<br>");
    fwrite($myfile, $content);
    fclose($myfile);
}

// Comments.json

if(!file_exists("../../content/comments.json")) {

    // Get content of comments.json from master branch at GitHub
    // This is only an example comment, but it is nice to have
    $content = file_get_contents('https://raw.githubusercontent.com/RobinBoers/SkyLight-Website-Editor/master/content/comments.json');

    $myfile = fopen("../../content/comments.json", "w") or die("> Unable to create comments.json!<br>");
    fwrite($myfile, $content);
    fclose($myfile);
}

// Siteinformation.php
// This file is only updated.
// In v0.04.1 there were two new properties
// added that need to be created.

include "../../content/siteinformation.php";

if(!isset($sitedescription)) {
    $sitedescription = "Lorem Ispum Dolor Sit Amet";
}

if(!isset($sitelanguage)) {
    $sitelanguage = "en-us";
}

$fp = fopen("../../content/siteinformation.php", 'w+');
fwrite($fp, "
<?php
\$sitetitle = '".$sitetitle."';
\$sitelanguage = '".$sitelanguage."';
\$sitedescription = '".$sitedescription."';
\$footertext = '".$footertext."';
\$root_path = '".$root_path."';
?>
");
fclose($fp);

// Feed.php

if(!file_exists("../../feed.php")) {

    // Get content of feed.php from master branch at GitHub
    $content = file_get_contents('https://raw.githubusercontent.com/RobinBoers/SkyLight-Website-Editor/master/feed.php');

    $myfile = fopen("../../feed.php", "w") or die("> Unable to create comments.json!<br>");
    fwrite($myfile, $content);
    fclose($myfile);
}

// Editor.css and basetheme.css

include "./update-css.php";