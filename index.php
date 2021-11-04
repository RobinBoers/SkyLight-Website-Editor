<!DOCTYPE html>
<html lang="<?= $sitelanguage ?>">
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
        include "content/themedocs.php";

        $pagename = basename(__FILE__, ".php");

        view_counter();
    ?>
    <title><?php echo "Home - " . $sitetitle; ?></title>
</head>
<body>
    
    <header class="pageheader">
        <h1 class="title"><?php echo $sitetitle; ?></h1>
        <?php if(file_exists($root_path."/content/logo.jpg")) {
            echo '<img src="'.$root_path.'/content/logo.jpg" class="logo">';
        } ?>
        <nav>
            <?php include "content/menu.php"; ?>
        </nav>
    </header>
    <main>
        <?php include "content/blog.php"; ?>
    </main>
    <footer>
        <p><?php echo $footertext; ?></p>
    </footer>            
</body>
</html>