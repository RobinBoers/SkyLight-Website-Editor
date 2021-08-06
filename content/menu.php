<ul>
    <li><a href="/">Home</a></li>
    <?php    
    session_start();

    if($pagename == "index") {
        $file = "content/pages.json";
        $fullView = false;
    } else {
        $file = "../content/pages.json";
        $fullView = true;
    }
    

    if(file_exists($file) && filesize($file) > 0){
        $handle = fopen($file, "a+");
        $contents = fread($handle, filesize($file));
        $pages = json_decode($contents);
        fclose($handle);
        
        
        foreach ($pages as $page){
            echo "<li><a href='".$page->link."'>".$page->title."</a></li>";
        }
            
    }
    else {
        // echo "Menu not available";
    }
?>
</ul>