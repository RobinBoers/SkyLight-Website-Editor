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
                echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Post successfully deleted</b></p>'; 
            } elseif(isset($_GET['success-post'])) { 
                echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Post successfully published</b></p>'; 
            } elseif(isset($_GET['success-update'])) { 
                echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Post successfully updated</b></p>'; 
            }
        ?>

        <?php include "components/module-header.php"?>

        <button class="w3-right" onclick="window.location = 'newpost.php'">Compose new post</button>

        <hr>

        <div class="w3-container">

            <ul>
                <?php
                    $file = "../content/blog.json";

                    $postsExist = false;

                    if(file_exists($file) && filesize($file) > 0) {

                        $handle = fopen($file, "a+");
                        $contents = fread($handle, filesize($file));
                        $blogs = json_decode($contents);
                        fclose($handle);

                        foreach ($blogs as $blog){ 
                            $postsExist = true;
                            
                            ?>
                                <li>
                                    <a class="w3-left" href="updatepost.php?id=<?php echo $blog->id; ?>">
                                        <?php echo $blog->title; ?>
                                    </a>
                                    
                                    <a class="w3-right" href="scripts/deletepost.php?id=<?php echo $blog->id; ?>">
                                        Delete
                                    </a>
                                </li>
                            <?php
                        }
                    }
                ?>
            </ul>
        </div>

        <!-- Only display last <hr> if there are posts.
                Othersise it would look weird -->
        <?php if($postsExist === true) {
            ?><hr><?php
        } ?>

    <!-- End page content -->
    </div>

    <script src="components/sidebar.js"></script>
    <?php } ?>
</body>
</html>