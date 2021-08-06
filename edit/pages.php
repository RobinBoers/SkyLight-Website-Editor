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

        <button class="w3-right" onclick="window.location = 'newpage.php'">Add new page</button>

        <!-- Popup for success messages -->
        <?php 
            if(isset($_GET['success-deleted'])) { 
                echo '<p class="w3-container w3-left w3-text-green"> <b><i class="fa fa-check"></i> Page successfully deleted</b></p>'; 
            } elseif(isset($_GET['success-post'])) { 
                echo '<p class="w3-container w3-left w3-text-green"> <b><i class="fa fa-check"></i> Page successfully published</b></p>'; 
            } elseif(isset($_GET['success-update'])) { 
                echo '<p class="w3-container w3-left w3-text-green"> <b><i class="fa fa-check"></i> Page successfully updated</b></p>'; 
            }
        ?>

        <hr>

        <div class="w3-container">

            <ul>
                <?php
                    $file = "../content/pages.json";

                    $pagesExist = false;

                    if(file_exists($file) && filesize($file) > 0){
                        $handle = fopen($file, "a+");
                        $contents = fread($handle, filesize($file));
                        $pages = json_decode($contents);
                        fclose($handle);

                        foreach ($pages as $page){ 
                            $pagesExist = true;
                            
                            ?>
                                <li>
                                    <a href="updatepage.php?id=<?php echo $page->id; ?>">
                                        <?php echo $page->title; ?>
                                    </a>
                                    <a style='float:right;' href="scripts/deletepage.php?id=<?php echo $page->id; ?>">
                                        Delete
                                    </a>
                                </li>
                            <?php
                        }
                    }
                ?>
            </ul>
        </div>

        <!-- Only display last <hr> if there are pages.
                Othersise it would look weird -->
        <?php if($pagesExist === true) {
            ?><hr><?php
        } ?>

    <!-- End page content -->
    </div>

    <script src="components/sidebar.js"></script>
    <?php } ?>
</body>
</html>