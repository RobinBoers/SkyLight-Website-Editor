<?php

if(file_exists($file) && filesize($file) > 0){

    $password = file_get_contents('./password.txt', true);
    $version = file_get_contents('update/version.txt', true);

    if(password_verify("root", $password) && strpos($version, 'preview') === false) {
        
        ?>

            <div class="w3-container w3-red w3-text-dark-red w3-padding w3-margin w3-card password-prompt w3-padding-16 dashboard-section">

                <h3><b>Change your password!</b></h3>
                <p>You haven't changed your password yet. This is a big vulnerability. Change it as soon as possible!</p>

                <button class="w3-button w3-white" onclick="settings()">Open Security settings</button>

            </div>

            <hr>

        <?php

    }
    
} else {
    echo "<p class='w3-container'>Something went wrong while loading the quickstart guide...</p>";
    echo "<hr>";
}

?>