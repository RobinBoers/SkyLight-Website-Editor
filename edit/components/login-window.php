
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
?>