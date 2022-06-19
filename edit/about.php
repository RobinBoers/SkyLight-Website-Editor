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
            <?php
                // Get lastest version
                $currentversion = file_get_contents('update/version.txt', true);
                $latestversion = file_get_contents('https://code.geheimesite.nl/package/SkyLight/latest.txt');
            ?>

            <p>
                SkyLight is a flexible website builder made with html5, css3, javascript and php. 
                It has support for third-party themes and it is highly customizable. Layout is made using W3.CSS
            </p>

            <?php if (strpos($currentversion, 'preview') !== false) { ?>

                <p class="w3-text-red">
                    You are running a preview build of SkyLight.<br>
                    If you encounter any bugs, please report them at <a target="_blank" href="https://github.com/RobinBoers/SkyLight-Website-Editor/issues">the bugtracker</a>.
                </p>

                <p>
                    <b>Version:</b> <?php echo $currentversion; ?>
                </p>

                <p>
                    <a href="changelog.php">View changelog</a>
                </p>

            <?php } elseif(strpos($currentversion, 'modded') !== false) { ?>

                <p class="w3-text-red">
                    Modded versions of SkyLight are not supported and will not receive updates<br>trough the online updater. <a target="_blank" href="https://docs.geheimesite.nl/SkyLight-Website-Editor/custom-version-strings.html">Why?</a>
                </p>

                <p>
                    <b>Version:</b> <?php echo $currentversion; ?>
                </p>

            <?php } elseif($currentversion === $latestversion) { ?>

                <p>
                    <b>Version:</b> <?php echo $currentversion; ?>
                </p>

                <p>
                    <a href="changelog.php">View changelog</a>
                </p>

            <?php } else { ?>

                <p class="w3-text-red">
                    You are not running the latest version of SkyLight.<br>
                    Update to the latest version for security patches and the newest features!<br>
                    <a href="https://code.geheimesite.nl/package/SkyLight/latest/changelog.html">Learn more...</a>
                </p>
                <p>
                    <b>Current version:</b> <?php echo $currentversion; ?><br>
                    <b>Latest version:</b> <?php echo $latestversion; ?>
                </p>
                <p>
                    <a href="update.php">Update now</a>
                </p>

            <?php } ?>

        </div>
    
    <!-- End page content -->
    </div>

    <script src="components/sidebar.js"></script>

    <?php } ?>
</body>
</html>