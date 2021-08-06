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

        <!-- Popup for success messages -->
        <?php 
            if(isset($_GET['success-deleted'])) { 
                echo '<p class="w3-container w3-left w3-text-green"> <b><i class="fa fa-check"></i> Comment successfully deleted</b></p>'; 
            }
        ?>

        <hr>

        <div class="w3-container">

                <?php
                    $file = "../content/comments.json";

                    $commentsExist = false;

                    if(file_exists($file) && filesize($file) > 0) {

                        $handle = fopen($file, "a+");
                        $contents = fread($handle, filesize($file));
                        $comments = json_decode($contents);
                        fclose($handle);

                        foreach ($comments as $comment){ 
                            $commentsExist = true;
                            
                            ?>
                                <div class="w3-container">
                                    <a class="w3-right" href="scripts/deletecomment.php?id=<?php echo $comment->id; ?>">
                                        Delete
                                    </a>

                                    <h4>
                                        <?php echo $comment->name; ?>
                                    </h4>
                                    <span>
                                        <?php echo $comment->body; ?>
                                    </span>
                                </div>
                                <hr>
                            <?php
                        }
                    }
                ?>
        </div>

    <!-- End page content -->
    </div>

    <script src="components/sidebar.js"></script>
    <?php } ?>
</body>
</html>