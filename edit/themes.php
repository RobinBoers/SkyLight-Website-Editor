<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "components/module-head.php";
    ?>

    <?php $pagename = basename(__FILE__); ?>
</head>
<body>
    <?php include "components/login-window.php"; ?>

    <?php if($_SESSION['login'] === true) { ?>
    <?php include "components/sidebar.php"; ?>

    <div class="w3-main module-content">

        <?php include "components/module-header.php"?>

        <div class="w3-container">

            <!-- Popup if install was successfull -->
            <?php if(isset($_GET['success'])) { 
                echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Theme successfully installed.</b></p>'; 
            }?>
            
            <p>
                To activate a theme, download one of the ones below or find third-party ones,<br>
                and import the ZiP files with the uploadbutton below.
            </p>

            <form class="inline-form" action="scripts/uploadtheme.php" method="post" enctype= "multipart/form-data" id="theme-form">
                <input style="display:none" required type="file" name="zip_file" id="theme-upload">
                <input type="button" onclick="uploadFile()" value="Upload theme">
            </form>

            <form class="inline-form" action="scripts/backup-theme.php" method="post" enctype= "multipart/form-data">
                <input type="submit" value="Export theme" name="submit">
            </form>

            <iframe src="https://robinboers.github.io/SkyLight-themelibrary/" width="100%" height="500px" style="border:0px solid white;" title="Theme Library"></iframe> 
        </div>
                
    <!-- End page content -->
    </div>

    <script src="components/sidebar.js"></script>
    <script src="components/themes.js"></script>
    <?php } ?>
</body>
</html>