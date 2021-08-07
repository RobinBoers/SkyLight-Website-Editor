<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "components/module-head.php";
    ?>

    <?php $pagename = basename(__FILE__); ?>
</head>
<body>

    <?php
        session_start();

        // Set the session the first time to false
        if(!isset($_SESSION['login'])) {
            $_SESSION['login'] = false;
        } 
    ?>

    <?php if(isset($_GET['post_id'])) { ?>
    <div class="w3-main module-content">

        <?php include "components/module-header.php"?>

        <div class="w3-container">

            <form action="scripts/add-comment.php" method="post">

                <!-- If the user is logged into the admin panel,
                     use the name used to login to the admin panel. 
                     Otherwise, let the user choose a name. -->

                <?php if($_SESSION['login'] === true) { ?>

                    <p>Logged in as: <?php echo $_SESSION['name'] ?></p>
                    <input required id="name" type="hidden" name="name" value="<?php echo $_SESSION['name']; ?>">

                <?php } else { ?>

                    <label for="name">Username</label>
                    <input required id="name" type="text" name="name">

                <?php } ?>

                <label for="text">Comment</label>
                <textarea required id="text"name="text"></textarea>

                <!-- Post ID, was send trough the URI. For example: edit/newcomment.php?post_id=123456 -->
                <input required id="post_id" type="hidden" name="post_id" value="<?php echo $_GET['post_id']; ?>">

                <input type="submit" value="Publish">
            </form>

        </div>
        <hr>

    <!-- End page content -->
    </div>

    <script src="components/quill.js"></script>

    <?php } ?>
</body>
</html>