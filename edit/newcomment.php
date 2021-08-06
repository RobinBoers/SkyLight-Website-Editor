<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "components/module-head.php";
    ?>

    <?php $pagename = basename(__FILE__); ?>
</head>
<body>

    <?php if(isset($_GET['post_id'])) { ?>
    <div class="w3-main module-content">

        <?php include "components/module-header.php"?>

        <div class="w3-container">

            <form action="scripts/add-comment.php" method="post">
                <label for="name">Username</label>
                <input required id="name" type="text" name="name">
                <label for="text">Comment</label>
                <textarea required id="text"name="text"></textarea>
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