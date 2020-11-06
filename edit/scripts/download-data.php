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

        // Get file information
        $filename = 'data.zip';
        echo '> content type: '.mime_content_type($filename);

        // Check if file exists
        if (file_exists($filename)) {
            // Correct headers
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="'.basename($filename).'"');
            header('Content-Length: '.filesize($filename));

            // Download file
            flush();
            readfile($filename);

            // Delete file
            unlink($filename);
        
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