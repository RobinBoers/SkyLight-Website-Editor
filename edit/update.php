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

        <!-- Popup for success messages -->
        <?php 
            if(isset($_GET['success-delete'])) { 
                echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Page successfully deleted</b></p>'; 
            } elseif(isset($_GET['success-post'])) { 
                echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Page successfully published</b></p>'; 
            } elseif(isset($_GET['success-update'])) { 
                echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Page successfully updated</b></p>'; 
            }
        ?>

        <?php include "components/module-header.php"?>

                <div class="w3-container">

                    <!-- Popup update css successfull -->
                    <?php if(isset($_GET['success-updatecss'])) { 
                        echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Successfully updated css files.</b></p>'; 
                    }?>

                    <?php
                        // Get lastest version
                        $currentversion = file_get_contents('./update/version.txt', true);
                        $latestversion = file_get_contents('https://code.geheimesite.nl/package/SkyLight/latest.txt');

                        if($currentversion === $latestversion) {
                        
                            // Popup if install was successfull
                            if(isset($_GET['success'])) { 
                                echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Update successfully installed.</b></p>'; 
                            }

                        ?>

                        <p> You're running the latest version of SkyLight. </p>

                    <?php } elseif(strpos($currentversion, 'preview') !== false) { ?>
                        
                        <p class="w3-text-red">You are running a preview build of SkyLight. </p>

                        <p>It is not possible to update preview builds. They are for testing only. </p>

                    <?php }elseif(!file_exists('package.zip')) { ?>

                        <p>
                            Update to version <?php echo $latestversion; ?> available
                        </p>

                        <p>
                            Please make sure to backup your userdata before updating.<br>
                            Check out <a href="https://github.com/RobinBoers/SkyLight-Website-Editor/wiki/How-to-backup-your-userdata">this tutorial</a> to see how.
                        </p>

                        <p>
                            <a href="update/download-latest.php">Download the update</a>
                        </p>

                    <?php } else { ?>

                        <p>
                            Please make sure to backup your userdata before updating.<br>
                            Checkout <a hef="https://github.com/RobinBoers/SkyLight-Website-Editor/wiki/How-to-backup-your-userdata">this tutorial</a> to see how.
                        </p>

                        <p>
                            Update successfully downloaded.<br>
                            <a href="update/install-builder.php">Install the update</a>
                        </p>

                    <?php } ?>

                </div>
                
                <!-- End page content -->
                </div>

                <script src="components/sidebar.js"></script>
            <?php
        }
    ?>
</body>
</html>