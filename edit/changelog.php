<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/basetheme.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link href="../css/editor.css" rel="stylesheet" type="text/css">
    <title>Dashboard - SkyLight Website Editor</title>
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
                            <p>Made by <a href="https://github.com/RobinBoers" title="Github pagina van Robin Boers">Robin Boers</a></p>    
                        </center>

                    </footer>

                </div>
            </div>
            <?php
        }
        else {
            // Show dashboard (Thanks to W3.CSS for the template)
            ?>
                <button class="w3-hide-large w3-right w3-hover-none" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
                
                <!-- Sidebar/menu -->
                <nav class="w3-sidebar w3-collapse w3-light-grey" style="z-index:3;width:300px;" id="mySidebar"><br> <!-- w3-animate-left -->
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
                    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
                    <a href="index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Overview</a>
                    <a href="pages.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-clone"></i> Pages</a>
                    <a href="blogs.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-edit"></i>  Blog</a>
                    <a href="history.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
                    <a href="themes.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-paint-brush"></i>  Themes</a>
                    <a href="settings.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a>
                    <a href="about.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fas fa-info-circle fa-fw"></i>  About</a><br><br>
                </div>
                </nav>
                
                <!-- Overlay effect when opening sidebar on small screens -->
                <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

                <div class="w3-main" style="margin-left:300px;">

                <!-- Header -->
                <header class="w3-container" style="padding-top:22px">
                <h5><b><i class="fas fa-info-circle"></i> About</b></h5>
                </header>

                <div class="w3-container">
                    <!-- Changelog from github -->
                    <h3>What's new?</h3>
                    <p>
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
                        - custom logos (if you're theme supports it)<br>
                        Theme library is coming soon!<br>
                        Use on own risk!<br><hr>



                </div>
                
                <!-- End page content -->
                </div>

                <script>
                // Get the Sidebar
                var mySidebar = document.getElementById("mySidebar");

                // Get the DIV with overlay effect
                var overlayBg = document.getElementById("myOverlay");

                // Toggle between showing and hiding the sidebar, and add overlay effect
                function w3_open() {
                if (mySidebar.style.display === 'block') {
                    mySidebar.style.display = 'none';
                    overlayBg.style.display = "none";
                } else {
                    mySidebar.style.display = 'block';
                    overlayBg.style.display = "block";
                }
                }

                // Close the sidebar with the close button
                function w3_close() {
                mySidebar.style.display = "none";
                overlayBg.style.display = "none";
                }
                </script>
            <?php
        }
    ?>
</body>
</html>