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
        $zip->addFile('../../content/blog.json', 'blog.json');
        $zip->addFile('../../content/pages.json', 'pages.json');
        $zip->addFile('../../content/siteinformation.php', 'siteinformation.php');
        $zip->addFile('../../content/views.php', 'views.php');
        $zip->addFile('../../content/menu.php', 'menu.php');
        $zip->addFile('../../content/logo.php', 'logo.php');
        $zip->addFile('../../content/history.html', 'history.html');
        $zip->addFile('../password.txt', 'password.txt');

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
        echo "> done: <a href='download-data.php'>download</a><br>";

        // All files are added, so close the zip file.
        $zip->close();

        // Check if successful
        return file_exists($filename);

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