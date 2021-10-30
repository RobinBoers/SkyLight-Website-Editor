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
    <title><?php echo "Page not found" . $sitetitle; ?></title>
</head>
<body>
    <main>
        <h1>Whoops!</h1>
        <p>Something went wrong. The page you tried to access isn't available (anymore). Go back to the homepage: <a href="<?php echo $root_path ?>">Back to homepage</a></p> 
    </main>         
</body>
</html>