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
            
            <p>Theme support is finally here!</p>
            <p>
                To activate a theme, download one of the ones below or find third-party ones,<br>
                and import the ZiP files with the uploadbutton below.
            </p>

            <form method="post" action="scripts/uploadtheme.php" enctype="multipart/form-data">

                <label>Select zip file</label>  
                <input type="file" name="zip_file">
                <input type="submit" name="submit" value="Upload">  

            </form> 
            <iframe src="https://robinboers.github.io/SkyLight-themelibrary/" width="100%" height="500px" style="border:0px solid white;" title="Theme Library"></iframe> 
        </div>
                
    <!-- End page content -->
    </div>

    <script src="components/sidebar.js"></script>
    <?php } ?>
</body>
</html>