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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <p><a href="../index.php">&larr; Terug</a></p>
                <h1>
                    <!-- laadicon -->
                    <img alt="loading..." src="../images/editor/loading.svg" height="30px">&nbsp;
                    SkyLight Website Editor
                </h1>   

                <!-- Login form -->

                <div id="loginform">
                    <form action="login.php" method="post">
                        <label for="name">Sign in:</label><br><br>
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
                
                <!-- De footer -->
                
                <ul class="nav">
                    Made by <a href="https://github.com/RobinBoers" title="Github pagina van Robin Boers">Robin Boers</a>
                </ul>
            <?php
        }
        else {
            // Show dashboard (Thanks to W3.CSS for the template)
            ?>
                <button class="w3-hide-large w3-hover-none" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
                
                <!-- Sidebar/menu -->
                <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
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
                <div class="w3-bar-block">
                    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
                    <a href="index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Overview</a>
                    <a href="pages.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-clone"></i> Pages</a>
                    <a href="blogs.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-edit"></i>  Blog</a>
                    <a href="history.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
                    <a href="settings.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
                </div>
                </nav>
                
                <!-- Overlay effect when opening sidebar on small screens -->
                <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

                <div class="w3-main" style="margin-left:300px;margin-top:43px;">

                <!-- Header -->
                <header class="w3-container" style="padding-top:22px">
                <h5><b><i class="fa fa-edit"></i> Update page</b></h5>
                </header>

                <div class="w3-container">

                    <?php
                        $id = $_GET['id'];

                        $contents = file_get_contents("../content/pages.json");
                        $pages = json_decode($contents);

                        foreach ($pages as $page){
                            if($page->id === $id) {
                                $title = $page->title;
                                $text = $page->text;
                            }
                        } 

                    ?>

                    <h2 class="title"><?php echo $title; ?></h2>

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

                    <br>

                    <button onclick="submit()">Update</button>

                </div>
                <hr>

            	<form style="display:none !important;" class="form" action="scripts/update-postpage.php" method="post">
                    <input id="content" type="text" name="pagetext-edit">
                    <input id="id" type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <input type=hidden name=update value=update>
                    <input type="submit">
                </form>


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
                <!-- Initialize Quill editor -->
                <script>

                    var quill = new Quill('#editor', {
                        modules: {
                            toolbar: [
                            [{ header: [1, 2, false] }],
                            ['bold', 'italic', 'underline'],
                            ['image', 'blockquote', 'link'],
                            ['code-block'],
                            [{ list: 'ordered' }, { list: 'bullet' }]
                            ]
                        },
                        placeholder: 'Add new text to update blogpost',
                        theme: 'snow'  // or 'bubble'
                    });
                    
                    function submit() {
                        document.querySelector("#content").value = document.querySelector(".ql-editor").innerHTML;

                        document.querySelector(".form").submit();
                    }
                </script>
            <?php
        }
    ?>
</body>
</html>