<?php  
    session_start();
    if($_SESSION['login'] == true) {
        include("../../content/siteinformation.php");

        $sitetitle = $sitetitle;
        $footertext = $footertext;

        if(isset($_POST['footertext'])) {
            $footertext = $_POST['footertext'];
        }
        if(isset($_POST['sitetitle'])) {
            $sitetitle = $_POST['sitetitle'];
        }

        $fp = fopen("../../content/siteinformation.php", 'w+');
        fwrite($fp, "
        <?php
        \$sitetitle = '".$sitetitle."';
        \$footertext = '".$footertext."';
        ?>
        ");
        fclose($fp);

        header("Location: ../index.php");
    } else {
        echo "Je bent niet ingelogd";
    }
?>