<style>
/* Cool theme */
* {
    font-family:'Courier New',sans-serif;
    background-color:black;
    color:white;
}

</style>
<?php 
    session_start();
    if(isset($_SESSION['name']) && $_SESSION['login'] === true){

        $zip = new ZipArchive();
        $filename = 'data.zip';

        if(file_exists($filename)) {
            $overwrite = ZIPARCHIVE::OVERWRITE;
        } else {
            $overwrite = ZIPARCHIVE::CREATE;
        }

        // Check for premissions
        if ($zip->open($filename, $overwrite)!==TRUE) {
            exit("> cannot open <$filename>\n");
        }

        // Add files to the zip file
        $zip->addFile('../../content/blog.json', 'content/blog.json');
        $zip->addFile('../../content/pages.json', 'content/pages.json');
        $zip->addFile('../../content/siteinformation.php', 'content/siteinformation.php');
        $zip->addFile('../../content/views.php', 'content/views.php');
        $zip->addFile('../../content/menu.php', 'content/menu.php');
        $zip->addFile('../../content/logo.php', 'content/logo.php');
        $zip->addFile('../../content/history.html', 'content/history.html');
        $zip->addFile('../password.txt', 'edit/password.txt');

        // Add pages directory
        if ($handle = opendir('../../p/'))
        {
            while (false !== ($entry = readdir($handle)))
            {
                if ($entry != "." && $entry != "..")
                {
                    $zip->addFile('../../p/'.$entry, 'p/'.$entry);
                }
            }
            closedir($handle);
        }

        // // Add images directory
        // if ($handle = opendir('../../images/') && is_dir_empty('../../images/'))
        // {
        //     while (false !== ($entry = readdir($handle)))
        //     {
        //         if ($entry != "." && $entry != "..")
        //         {
        //             $zip->addFile('../../images/'.$entry, 'images/'.$entry);
        //         }
        //     }
        //     closedir($handle);
        // }

        // Add post directory
        if ($handle = opendir('../../post/'))
        {
            while (false !== ($entry = readdir($handle)))
            {
                if ($entry != "." && $entry != "..")
                {
                    $zip->addFile('../../post/'.$entry, 'post/'.$entry);
                }
            }
            closedir($handle);
        }

        // Debug messages
        echo "> numfiles: " . $zip->numFiles . "<br>";
        echo "> status: " . $zip->status . "<br>";
        // echo "> done: <a href='download-data.php'>download</a><br>";

        // All files are added, so close the zip file.
        $zip->close();

        // Get file information
        echo '> content type: '.mime_content_type($filename);

        // Check if file exists
        if (file_exists($filename)) {

            // Fix for not working in explorer
            ob_clean();
            ob_end_flush();

            // Correct headers
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="'.basename($filename).'"');
            header('Content-Length: '.filesize($filename));

            // Download file
            flush();
            readfile($filename);

            // Delete file
            unlink($filename);
            exit;
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