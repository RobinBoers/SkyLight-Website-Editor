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
        $filename = 'theme-backup.zip';

        if(file_exists($filename)) {
            $overwrite = ZIPARCHIVE::OVERWRITE;
        } else {
            $overwrite = ZIPARCHIVE::CREATE;
        }

        // Check for premissions
        if ($zip->open($filename, $overwrite)!==TRUE) {
            exit("> cannot open <$filename>\n");
        }

        $uploads_path = realpath('../../content/assets');
        $uploads = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($uploads_path),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($uploads as $name => $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                $zip->addFile($filePath, basename($filePath));
            }
        }

        // Add files to the zip file
        $zip->addFile('../../content/blog.php', 'blog.php');
        $zip->addFile('../../content/comments.php', 'comments.php');
        $zip->addFile('../../index.php', 'index.php');
        $zip->addFile('../../content/menu.php', 'menu.php');
        $zip->addFile('../../post/post.php', 'post.php');
        $zip->addFile('../../p/page.php', 'page.php');
        $zip->addFile('../../css/theme.css', 'theme.css');
        $zip->addFile('../../404.php', '404.php');

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