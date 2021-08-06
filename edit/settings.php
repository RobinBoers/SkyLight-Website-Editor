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

            <!-- Popup if restore was successfull -->
            <?php if(isset($_GET['success-restore'])) { 
                echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Userdata successfully restored.</b></p>'; 
            }?>

            <!-- Popup if logo upload was successfull -->
                <?php if(isset($_GET['success-logo-upload'])) { 
                echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Logo successfully uploaded.</b></p>'; 
            }?>

            <!-- Popup if logo deletion was successfull -->
            <?php if(isset($_GET['success-logo-delete'])) { 
                echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Logo successfully deleted.</b></p>'; 
            }?>

            <!-- Popup if password change was successfull -->
            <?php if(isset($_GET['success-passchange'])) { 
                echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Password changed successfully.</b></p>'; 
            }?>

            <!-- Popup if user enterd wrong password (password change) -->
            <?php if(isset($_GET['error-passchange'])) { 
                echo '<p class="w3-text-red"> <b><i class="fa fa-times"></i> Wrong password</b></p>'; 
            }?>

            <!-- Popup if password change was successfull -->
            <?php if(isset($_GET['success-siteinfo'])) { 
                echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Site Inforamtion updated successfully.</b></p>'; 
            }?>

            <!-- Popup if custom css was successfull -->
            <?php if(isset($_GET['success-css'])) { 
                echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Custom CSS Styling successfully updated.</b></p>'; 
            }?>

            <h5>Site information</h5>
            <form action="scripts/update-siteinformation.php" method="post">
                <label for="sitetitle">Site title</label>
                <input name="sitetitle" type="text" placeholder="Enter new site title...">
                <input name="enter" type="submit" value="OK">
            </form>
            <form action="scripts/update-siteinformation.php" method="post">
                <label for="footertext">Footer text</label>
                <input name="footertext" type="text" placeholder="Enter new footer text...">
                <input name="enter" type="submit" value="OK">
            </form>
            <hr>
            <h5><b><i class="fa fa-lock"></i> Security</b></h5>
            <h5>Change password</h5>
            <form action="scripts/changepassword.php" method="post">
                <label for="pswd">Old password</label> <input name="pswd" type="password" placeholder="Type old password..."><br>
                <label for="newpswd">New password</label> <input name="newpswd" type="password" placeholder="Type new password..."><input name="changepass" type="submit" value="OK">
                
            </form>
            <hr>
            <h5><b><i class="fa fa-image"></i> Logo</b></h5><br>
            <form action="scripts/uploadlogo.php" method="post" enctype= "multipart/form-data">
                <input required type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload new logo" name="submit"><br>
            </form><br>
            <form action="scripts/deletelogo.php" method="post">
                <input type="submit" value="Delete logo" name="deletelogo"><br>
            </form>
            <hr>
            <h5><b><i class="fa fa-archive"></i> Data</b></h5><br>
            <form action="scripts/backup-data.php" method="post" enctype= "multipart/form-data">
                <input type="submit" value="Backup userdata" name="submit"><br>
            </form><br>
            <form action="scripts/restore-data.php"  enctype="multipart/form-data" method="post">
                <input type="file" name="zip_file">
                <input type="submit" value="Restore userdata" name="submit"><br>
            </form>
            <hr>
            <h5><b><i class="fa fa-paint-brush"></i> Custom CSS Styling</b></h5><br>
            <form action="scripts/custom-css.php" method="post" enctype= "multipart/form-data">
                <textarea name="css"><?php if(file_get_contents('../css/custom.css')) {echo file_get_contents('../css/custom.css');} ?></textarea><br>
                <input type="submit" value="OK" name="submit"><br>
            </form>
            <hr>
            <h5><b><i class="fa fa-download"></i> Optional updates</b></h5><br>
            <p>
                <a href="scripts/updatefiles.php?css">Update optional css files</a>
            </p>
        </div>
        <hr>

    <!-- End page content -->
    </div>

    <script src="components/sidebar.js"></script>
    <?php } ?>
</body>
</html>