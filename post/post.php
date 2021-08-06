<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../css/basetheme.css" rel="stylesheet" type="text/css">
    <link href="../css/theme.css" rel="stylesheet" type="text/css">
    <link href="../css/custom.css" rel="stylesheet">
    <?php 
        include "../content/siteinformation.php";
    ?>
    <title><?php echo $pagetitle . " - " . $sitetitle; ?></title>
</head>
<body>
    <header>
        <h1><a href="/index.php"><?php echo $sitetitle; ?></a></h1>
        <nav>
            <?php include "../content/menu.php"; ?>
        </nav>
    </header>
    <main>
        <h2><?php echo $pagetitle; ?></h2>
        <p>By <?php echo $auteur; ?></p>
        <div class="postcontent"><?php echo $content; ?></div>
        <a href="<?php echo $taglink; ?>"><?php echo $tags; ?></a>
        <h2>More posts</h2>
        <?php include "../content/blog.php"; ?>
    </main>
    <footer>
        <p><?php echo $footertext; ?></p>
    </footer>            
</body>
</html>
