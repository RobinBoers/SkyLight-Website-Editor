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
            $id = $_GET['id'];

            $contents = file_get_contents("../content/blog.json");
            $blogs = json_decode($contents);

            foreach ($blogs as $blog){
                if($blog->id === $id) {
                    $title = $blog->title;
                    $text = $blog->text;
                }
            } 

        ?>

        <h2 class="title"><?php echo $title; ?></h2>

    </div>

            <!-- Include stylesheet for Quill -->
            <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

            <!-- Create the editor container for Quill -->
            <div id="editor">
                <?php
                    echo $text;
                ?>
            </div>

            <!-- Include the Quill library -->
            <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <div class="w3-container"><br>

        <button onclick="submit_update()">Update</button>

    </div>
    <hr>

    <form style="display:none !important;" class="form" action="scripts/update-postblog.php" method="post">
        <input id="content" type="text" name="posttext-edit">
        <input id="id" type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <input type=hidden name=update value=update>
        <input type="submit">
    </form>


    <!-- End page content -->
    </div>

    <script src="components/sidebar.js"></script>
    <script src="components/quill.js"></script>
    <?php } ?>
</body>
</html>