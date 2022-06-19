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

        <div class="w3-row-padding w3-margin-bottom">
            <div class="w3-quarter">
                <div class="w3-container w3-red w3-padding-16 w3-card dashboard-section">
                <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3><?php include "../content/views.php"; echo $views; ?></h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Views</h4>
                </div>
            </div>
            <div class="w3-quarter">
                <div class="w3-container w3-blue w3-padding-16 w3-card dashboard-section">
                <div class="w3-left"><i class="fa fa-edit w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3><?php include "analytics/countblogs.php"; ?></h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Blogposts</h4>
                </div>
            </div>
            <div class="w3-quarter">
                <div class="w3-container w3-green w3-padding-16 w3-card dashboard-section">
                <div class="w3-left"><i class="fa fa-clone w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3><?php include "analytics/countpages.php"; ?></h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Pages</h4>
                </div>
            </div>
            <div class="w3-quarter">
                <div class="w3-container w3-deep-orange w3-padding-16 w3-card dashboard-section">
                <div class="w3-left"><i class="fas fa-comments w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3><?php include "analytics/countcomments.php"; ?></h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Comments</h4>
                </div>
            </div>
        </div>

        <hr>

        <!-- Quickstart Guide (see #5) -->
        <?php include "components/quickstart.php"; ?>

        <!-- Password Prompt (see also #5) -->
        <?php include "components/password-prompt.php"; ?>

        <div class="w3-container">
            <h5>Welcome</h5>
            <p>Welcome to your new website! This is SkyLight Website Editor. With this program you can manage your own website, without any programming knowlegde. You can use one of the few default themes, or create one yourself with with the powerfull theming API. Write blogposts and add pages, in just a few clicks.<br>And the best thing: its free and open-source!</p>
            <hr>
            <h5>Need help?</h5>
            <p>If you need help setting up SkyLight, installing themes and configuring stuff, check out the wiki.<br>
            It's located at the <a href="https://docs.geheimesite.nl/SkyLight-Website-Editor">GitHub repo</a>. If you have any other questions, feel free to email me at <a href="mailto:robin@geheimesite.nl">robin@geheimesite.nl</a> or add an issue over on Github.
            </p>
        </div>
        <hr>

        <!-- End page content -->
    </div>

    <script src="components/sidebar.js"></script>
    <script src="components/quickstart.js"></script>
    <script src="components/password-prompt.js"></script>

    <?php } ?>
</body>
</html>
