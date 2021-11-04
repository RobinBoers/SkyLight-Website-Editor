<?php   

function view_counter() {

    global $pagename;

    if($pagename == "index") {
        $file = "content/views.php";
    } else {
        $file = "../content/views.php";
    }

    include $file;

    if(!isset($_SESSION['viewed']) || !$_SESSION['viewed']) {

        $_SESSION['viewed'] = true;

        $views = $views + 1;
        $fp = fopen($file, 'w+');

        fwrite($fp, "<?php
        \$views = ".$views.";
        ?>");

        fclose($fp);
    }
}

?>