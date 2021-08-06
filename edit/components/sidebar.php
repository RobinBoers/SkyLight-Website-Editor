<button class="w3-hide-large w3-left" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    
<nav class="w3-sidebar w3-collapse w3-light-grey" style="z-index:3;width:300px;" id="mySidebar"><br>

    <!-- The close button and the <hr> below it are only
         displayed on mobile devices -->
    <div class="w3-hide-large">

        <div class="w3-bar-block editor-nav">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
        </div>

        <hr>
    </div>

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

        <?php
            require "functions/get-modules.php";
            $modules = get_modules();

            foreach ($modules as $module){
                if($module->in_menu === true) {
                     if($module->filename === $pagename) { 

                        ?>
                            <a href="#" class="w3-bar-item w3-button w3-padding w3-blue">
                                <i class="<?php echo $module->icon; ?>"></i>  <?php echo $module->name; ?>
                            </a>
                        <?php

                    } else {

                        ?>
                            <a href="<?php echo $module->filename; ?>" class="w3-bar-item w3-button w3-padding">
                                <i class="<?php echo $module->icon; ?>"></i>  <?php echo $module->name; ?>
                            </a>
                        <?php

                    }
                }    
            }
        ?>
        
        <br><br>

    </div>

</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>