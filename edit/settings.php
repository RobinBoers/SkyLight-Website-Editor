<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "components/module-head.php";
        include "../content/siteinformation.php";
    ?>

    <?php $pagename = basename(__FILE__); ?>
</head>
<body>
    <?php include "components/login-window.php"; ?>

    <?php if($_SESSION['login'] === true) { ?>
    <?php include "components/sidebar.php"; ?>

    <div class="w3-main module-content">

        <?php include "components/module-header.php"?>

        <!-- Popup if restore was successfull -->
        <?php if(isset($_GET['success-restore'])) { 
            echo '<p class="w3-container w3-left w3-text-green"> <b><i class="fa fa-check"></i> Userdata successfully restored.</b></p>'; 
        }?>

        <!-- Popup if logo upload was successfull -->
            <?php if(isset($_GET['success-logo-upload'])) { 
            echo '<p class="w3-container w3-left w3-text-green"> <b><i class="fa fa-check"></i> Logo successfully uploaded.</b></p>'; 
        }?>

        <!-- Popup if logo deletion was successfull -->
        <?php if(isset($_GET['success-logo-delete'])) { 
            echo '<p class="w3-container w3-left w3-text-green"> <b><i class="fa fa-check"></i> Logo successfully deleted.</b></p>'; 
        }?>

        <!-- Popup if password change was successfull -->
        <?php if(isset($_GET['success-passchange'])) { 
            echo '<p class="w3-container w3-left w3-text-green"> <b><i class="fa fa-check"></i> Password changed successfully.</b></p>'; 
        }?>

        <!-- Popup if user enterd wrong password (password change) -->
        <?php if(isset($_GET['error-passchange'])) { 
            echo '<p class="w3-container w3-left w3-text-red"> <b><i class="fa fa-times"></i> Wrong password</b></p>'; 
        }?>

        <!-- Popup if site information was changed successfull -->
        <?php if(isset($_GET['success-siteinfo'])) { 
            echo '<p class="w3-container w3-left w3-text-green"> <b><i class="fa fa-check"></i> Site information updated successfully.</b></p>'; 
        }?>

        <!-- Popup if custom css was successfull -->
        <?php if(isset($_GET['success-css'])) { 
            echo '<p class="w3-container w3-left w3-text-green"> <b><i class="fa fa-check"></i> Custom CSS Styling successfully updated.</b></p>'; 
        }?>

        <hr>

        <div class="w3-container settings">

            <h5 id="general"><b><i class="fas fa-users-cog"></i> General</b></h5>
            <form action="scripts/update-siteinformation.php" method="post">
                <label for="sitetitle">Site title</label>
                <input name="sitetitle" type="text" value="<?= $sitetitle ?>" placeholder="Enter new site title...">
                <input name="enter" type="submit" value="OK">
            </form>
            <form action="scripts/update-siteinformation.php" method="post">
                <label for="descript">Description</label>
                <textarea name="descript" placeholder="Enter new description..."><?= $sitedescription ?></textarea>
                <input name="enter" type="submit" value="OK">
            </form>
            <form action="scripts/update-siteinformation.php" method="post">
                <label for="lang">Site language</label>
                <select id="langlist" name="lang"></select>
                <input name="enter" type="submit" value="OK">
            </form>
            <form action="scripts/update-siteinformation.php" method="post">
                <label for="footertext">Footer text</label>
                <input name="footertext" type="text"  value="<?= $footertext ?>" placeholder="Enter new footer text...">
                <input name="enter" type="submit" value="OK">
            </form>
            <hr>
            <h5 id="security"><b><i class="fa fa-lock"></i> Security</b></h5>
            <form action="scripts/changepassword.php" method="post">
                <label for="pswd">Old password</label> <input name="pswd" type="password" placeholder="Type old password..."><br>
                <label for="newpswd">New password</label> <input name="newpswd" type="password" placeholder="Type new password..."><input name="changepass" type="submit" value="OK">
                
            </form>
            <hr>
            <h5 id="logo"><b><i class="fa fa-image"></i> Logo</b></h5>
            <form class="inline-form" action="scripts/uploadlogo.php" method="post" enctype= "multipart/form-data" id="logo-form">
                <input style="display:none" accept="image/jpeg" required type="file" name="fileToUpload" id="logo-upload">
                <input type="button" onclick="uploadFile('logo')" value="Upload new logo">
            </form>
            <form class="inline-form" action="scripts/deletelogo.php" method="post">
                <input type="submit" value="Delete logo" name="deletelogo">
            </form>
            <hr>
            <h5 id="data"><b><i class="fa fa-archive"></i> Data</b></h5>
            <form class="inline-form" action="scripts/backup-data.php" method="post" enctype= "multipart/form-data">
                <input type="submit" value="Backup userdata" name="submit">
            </form>
            <form class="inline-form" action="scripts/restore-data.php" enctype="multipart/form-data" method="post" id="data-form">
                <input style="display:none" type="file" name="zip_file" id="data-upload">
                <input type="button"  onclick="uploadFile('data')" value="Restore userdata">
            </form>
            <hr>
            <h5 id="custom-css"><b><i class="fa fa-paint-brush"></i> Custom CSS Styling</b></h5>
            <form action="scripts/custom-css.php" method="post" enctype= "multipart/form-data">
                <textarea name="css"><?php if(file_get_contents('../css/custom.css')) {echo file_get_contents('../css/custom.css');} ?></textarea><br>
                <input type="submit" value="OK" name="submit"><br>
            </form>
            <hr>
            <h5 id="optional-updates"><b><i class="fa fa-download"></i> Optional updates</b></h5>
            <p>
                <a href="scripts/updatefiles.php?css">Update optional css files</a>
            </p>
            <hr>
            <h5 id="advanced"><b><i class="far fa-window-restore"></i> Advanced</b></h5>
            <form action="scripts/update-siteinformation.php" method="post">
                <label for="root_path">Installation directory</label>
                <input name="root_path" type="text" placeholder="Enter new path...">
                <input name="enter" type="submit" value="OK">
            </form>
        </div>
        <hr>

    <!-- End page content -->
    </div>

    <script src="components/sidebar.js"></script>
    <script src="components/settings.js.php"></script>
    <?php } ?>
</body>
</html>