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
                    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-cog fa-fw"></i>  Settings</a>
                    <a href="about.php" class="w3-bar-item w3-button w3-padding"><i class="fas fa-info-circle fa-fw"></i>  About</a><br><br>
                </div>
                </nav>
                
                <!-- Overlay effect when opening sidebar on small screens -->
                <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

                <div class="w3-main" style="margin-left:300px;">

                <!-- Header -->
                <header class="w3-container" style="padding-top:22px">
                <h5><b><i class="fa fa-cog"></i> Settings</b></h5>
                </header>

                <div class="w3-container">

                    <!-- Popup if restore was successfull -->
                    <?php if(isset($_GET['success-restore'])) { 
                        echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Userdata successfully restored.</b></p>'; 
                    }?>

                    <!-- Popup if logo upload was successfull -->
                     <?php if(isset($_GET['success-logo-upload'])) { 
                        echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Logo successfully uploaded.</b></p>'; 
                    }?>

                    <!-- Popup if logo deletion was successfull -->
                    <?php if(isset($_GET['success-logo-delete'])) { 
                        echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Logo successfully deleted.</b></p>'; 
                    }?>

                    <!-- Popup if password change was successfull -->
                    <?php if(isset($_GET['success-passchange'])) { 
                        echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Password changed successfully.</b></p>'; 
                    }?>

                    <!-- Popup if user enterd wrong password (password change) -->
                    <?php if(isset($_GET['error-passchange'])) { 
                        echo '<p class="w3-text-red"> <b><i class="fa fa-times"></i> Wrong password</b></p>'; 
                    }?>

                    <!-- Popup if password change was successfull -->
                    <?php if(isset($_GET['success-siteinfo'])) { 
                        echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Site Inforamtion updated successfully.</b></p>'; 
                    }?>

                    <!-- Popup if custom css was successfull -->
                    <?php if(isset($_GET['success-css'])) { 
                        echo '<p class="w3-text-green"> <b><i class="fa fa-check"></i> Custom CSS Styling successfully updated.</b></p>'; 
                    }?>

                    <h5>Site information</h5>
                    <form action="scripts/update-siteinformation.php" method="post">
                        <label for="sitetitle">Site title</label>
                        <input name="sitetitle" type="text" placeholder="Enter new site title...">
                        <input name="enter" type="submit" value="OK">
                    </form>
                    <form action="scripts/update-siteinformation.php" method="post">
                        <label for="footertext">Footer text</label>
                        <input name="footertext" type="text" placeholder="Enter new footer text...">
                        <input name="enter" type="submit" value="OK">
                    </form>
                    <hr>
                    <h5><b><i class="fa fa-lock"></i> Security</b></h5>
                    <h5>Change password</h5>
                    <form action="scripts/changepassword.php" method="post">
                        <label for="pswd">Old password</label> <input name="pswd" type="password" placeholder="Type old password..."><br>
                        <label for="newpswd">New password</label> <input name="newpswd" type="password" placeholder="Type new password..."><input name="changepass" type="submit" value="OK">
                        
                    </form>
                    <hr>
                    <h5><b><i class="fa fa-image"></i> Logo</b></h5><br>
                    <form action="scripts/uploadlogo.php" method="post" enctype= "multipart/form-data">
                        <input required type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Upload new logo" name="submit"><br>
                    </form><br>
                    <form action="scripts/deletelogo.php" method="post">
                        <input type="submit" value="Delete logo" name="deletelogo"><br>
                    </form>
                    <hr>
                    <h5><b><i class="fa fa-archive"></i> Data</b></h5><br>
                    <form action="scripts/backup-data.php" method="post" enctype= "multipart/form-data">
                        <input type="submit" value="Backup userdata" name="submit"><br>
                    </form><br>
                    <form action="scripts/restore-data.php"  enctype="multipart/form-data" method="post">
                        <input type="file" name="zip_file">
                        <input type="submit" value="Restore userdata" name="submit"><br>
                    </form>
                    <hr>
                    <h5><b><i class="fa fa-paint-brush"></i> Custom CSS Styling</b></h5><br>
                    <form action="scripts/custom-css.php" method="post" enctype= "multipart/form-data">
                        <textarea name="css"><?php if(file_get_contents('../css/custom.css')) {echo file_get_contents('../css/custom.css');} ?></textarea><br>
                        <input type="submit" value="OK" name="submit"><br>
                    </form>
                    <hr>
                    <h5><b><i class="fa fa-download"></i> Optional updates</b></h5><br>
                    <p>
                        <a href="scripts/updatefiles.php?css">Update optional css files</a>
                    </p>
                </div>
                <hr>


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