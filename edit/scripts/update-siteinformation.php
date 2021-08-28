<?php  
    session_start();
    if($_SESSION['login'] == true) {
        include("../../content/siteinformation.php");
        
        if(isset($_POST['footertext'])) {
            $footertext = $_POST['footertext'];
        }
        if(isset($_POST['sitetitle'])) {
            $sitetitle = $_POST['sitetitle'];
        }
        if(isset($_POST['root_path'])) {
            $root_path = $_POST['root_path'];
        }
        if(isset($_POST['descript'])) {
            $sitedescription = $_POST['descript'];
        }
        if(isset($_POST['descript'])) {
            $sitedescription = $_POST['descript'];
        }
        if(isset($_POST['lang'])) {
            $sitelanguage = $_POST['lang'];
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

        header("Location: ../settings.php?success-siteinfo");
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