<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "components/head.php";
    ?>
</head>
<body>
    <?php
        session_start();

         // Set the session the first time to false
         if(!isset($_SESSION['login'])) {
            $_SESSION['login'] = false;
        }

        // Check if the user is logged in
        if($_SESSION['login'] == false) {

            // Show login screen
            ?>
            <div class="login-main">
                <div class="login-main-inner">

                    <!-- The header -->

                    <header class="login-header">

                        <p><a href="../index.php">&larr; Back</a></p>

                    </header>   

                    <!-- Login form -->

                    <main class="login-form" id="loginform">
                        <div class="login-form-inner">

                            <h2>Sign in</h2>

                            <form action="login.php" method="post">
                                <input required class="inlogveld" type="text" name="name" id="name" /><br>
                                <input required class="inlogveld" type="password" name="password" id="password" /><br>
                                <input type="hidden" name="login" value="true"> <!-- Because  I also use login.php for logout, I tell the script I want to login -->
                                <input type="submit" name="enter" id="enter" value="Ok" /><br>

                                <?php

                                    // If the users typed the wrong password, he will get a warning
                                    if(isset($_GET['wrongpass'])) {
                                        ?>
                                            <p class="red">Password was wrong, try again</p>
                                        <?php
                                    }
                                ?>
                            </form>

                        </div>
                    </main>
                    
                    <!-- The footer -->

                    <footer class="login-footer">

                        <center>
                            <p>Made by <a href="https://github.com/RobinBoers" >Robin Boers</a></p>    
                        </center>

                    </footer>

                </div>
            </div>
            <?php
        }
        else {
            // Show dashboard (Thanks to W3.CSS for the template)
            ?>
                <button class="w3-hide-large w3-left w3-hover-none" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
                
                <!-- Sidebar/menu -->
                <nav class="w3-sidebar w3-collapse w3-light-grey" style="z-index:3;width:300px;" id="mySidebar"><br> <!-- w3-animate-left -->

                <div class="w3-bar-block editor-nav w3-hide-large">
                    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
                </div>

                <hr class="w3-hide-large">

                <div class="w3-container w3-row">
                    <div class="w3-col s4">
                    <img src="https://www.geheimesite.nl/images/nindo/profiel.png" class="w3-circle w3-margin-right" style="width:46px">
                    </div>
                    <div class="w3-col s8 w3-bar">
                    <span>Welcome, <strong><?php echo $_SESSION['name']; ?></strong></span><br>
                    <a href='../index.php'>&larr; Back</a> |
                    <a href="login.php?logout">Logout</a>
                    </div>
                </div>
                <hr>
                <div class="w3-container">
                    <h5>Dashboard</h5>
                </div>
                <div class="w3-bar-block editor-nav">
                    <a href="index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Overview</a>
                    <a href="pages.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-clone"></i> Pages</a>
                    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-edit"></i>  Blog</a>
                    <a href="history.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
                    <a href="themes.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-paint-brush"></i>  Themes</a>
                    <a href="settings.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a>
                    <a href="about.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-info-circle fa-fw"></i>  About</a><br><br>
                </div>
                </nav>
                
                <!-- Overlay effect when opening sidebar on small screens -->
                <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

                <div class="w3-main" style="margin-left:300px;">

                <!-- Header -->
                <header class="w3-container" style="padding-top:22px">
                <h5><b><i class="fa fa-edit"></i> Blog</b></h5>

                <!-- Popup if post was deleted succesfully -->
                <?php if(isset($_GET['success-delete'])) { 
                        echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Post successfully deleted</b></p>'; 
                    }?>

                    <!-- Popup if post was published successfully -->
                    <?php if(isset($_GET['success-post'])) { 
                        echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Post successfully published</b></p>'; 
                    }?>

                    <!-- Popup if post was updates successfully -->
                    <?php if(isset($_GET['success-update'])) { 
                        echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Post successfully updated</b></p>'; 
                }?>

                <br>
                <button onclick="window.location = 'newpost.php'">Compose new post</button>
                </header>

                <hr>

                <div class="w3-container">

                    <ul>
                        <?php
                            $file = "../content/blog.json";

                            $postsExist = false;

                            if(file_exists($file) && filesize($file) > 0) {
                                $postsExist = true;

                                $handle = fopen($file, "a+");
                                $contents = fread($handle, filesize($file));
                                $blogs = json_decode($contents);
                                fclose($handle);

                                foreach ($blogs as $blog){ ?>
                                    <li><a class="w3-left" href="updatepost.php?id=<?php echo $blog->id; ?>"><?php echo $blog->title; ?></a><a class="w3-right" href="scripts/deletepost.php?id=<?php echo $blog->id; ?>">Delete</a></li>
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
            <?php
        }
    ?>
</body>
</html>