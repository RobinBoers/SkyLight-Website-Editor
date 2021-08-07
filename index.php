<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/basetheme.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <style>
    </style>
    <?php 
        include "content/siteinformation.php";

        include("content/views.php");
        $views = $views + 1; //echo $views;
        $fp = fopen("content/views.php", 'w+');
        fwrite($fp, "
        <?php
        \$views = ".$views.";
        ?>
        ");
        fclose($fp);

        $pagename = basename(__FILE__, ".php");
    ?>
    <title><?php echo "Home - " . $sitetitle; ?></title>
</head>
<body>
    
    <header>
        <h1><?php echo $sitetitle; ?></h1>
        <nav>
            <?php include "content/menu.php"; ?>
        </nav>
    </header>
    <main>
        <h2>Blog</h2>
        <?php include "content/blog.php"; ?>
    </main>
    <footer>
        <p><?php echo $footertext; ?></p>
    </footer>            
</body>
</html>