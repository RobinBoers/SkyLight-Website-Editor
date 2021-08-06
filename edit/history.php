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

        <div class="w3-container w3-padding-16">
            <iframe style='width:100%;border:none;' src="../content/history.html">
        </div>
        
        <!-- End page content -->
    </div>

    <script src="components/sidebar.js"></script>
    <?php } ?>
</body>
</html>