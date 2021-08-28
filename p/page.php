<!DOCTYPE html>
<html lang="<?= $sitelanguage ?>">
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
        <?php if(file_exists($root_path."/content/logo.jpg")) {
            echo '<img src="'.$root_path.'/content/logo.jpg" class="logo">';
        } ?>
        <nav>
            <?php include "../content/menu.php"; ?>
        </nav>
    </header>
    <main>
        <h2><?php echo $pagetitle; ?></h2>
        <div class="postcontent"><?php echo $content; ?></div>
    </main>
    <footer>
        <p><?php echo $footertext; ?></p>
    </footer>            
</body>
</html>
