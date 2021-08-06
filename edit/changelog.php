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
            <!-- Changelog from github -->
            <h3>What's new?</h3>
            <p>
                <b>v0.04-beta</b> This release of SkyLight introduces comments.<br>It also has a completely rewritten backend UI that is more modular and easier to maintain.<hr>
                <b>v0.03.1-beta</b> This patch fixes some grammar mistakes in the UI and reorganizes the settings panel.<br>I also added an option to add custom CSS styling trought the settings panel (if the theme supports it).<br>It is recommended to download the optional CSS updates from the settings panel to prevent visual bugs in the editor.<hr>
                <b>v0.03-beta</b> This release of SkyLight introduces the online updater,<br>which can check for updates and install them at a click of a button.<br>
                I also finally implemented the theme library.<br>And there's now an easy way to backup userdata.<br><hr>
                <b>v0.02.1-beta</b> This patch fixes the bug that could cause code-injection, <br>
                and passwords are now hashed, and not stored as plain text.<br><hr>
                <b>v0.02-beta</b> Almost a month ago, I released the first beta of SkyLight Website Builder!<br>I worked a lot on it since then and added these features:<br>
                - Theme support<br>
                - Second default theme<br>
                - Menu support<br>
                - Wiki (for help and tutorials)<br>
                - Fixed bugs in pages module<br>
                - About tab (for version information)<br>
                Use on own risk!<br><hr>
                <b>v0.01-beta</b> I've been working on this project for over a few months now, <br>
                and I'm really exited to announce that it is almost done.<br>
                Features in this release:<br>
                - blogging<br>
                - static pages<br>
                - custom themes<br>
                - custom logos (if your theme supports it)<br>
                Theme library is coming soon!<br>
                Use on own risk!<br><hr>
        </div>
        
        <!-- End page content -->
    </div>

    <script src="components/sidebar.js"></script>
    <?php } ?>
</body>
</html>