# How to create custom themes

Do you want to create custom themes for SkyLight website builder?  
See the documentation below:

## Downloading the basetheme

You will need some knowledge of html and php.  
Start by downloading the basetheme from [github.com/RobinBoers/SkyLight-basetheme](https://github.com/RobinBoers/SkyLight-basetheme)

## Editing the files

You can edit the files to your liking. Just make sure you don't remove this part:

```
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
```

Imports site info (the title, description, language and footer), counts views and gets the pagename (which is used in blog.php and comments.php for example)

### Creating a custom homepage

So you downloaded the files, and you don't know what to do with them. Well you have to see it like this: it are just html documents, but on the places you want to have the title, you don't typ the title, but this: `<?php echo $sitetitle; ?>` as long as you have the snippet above in your `<head>` you'll be fine, and the editor will fill it in for you.  
If you want to show the footertext, type this: `<?php echo $footertext; ?>`
If you want to make a section for the most recent blogposts, type this: `<?php include "content/blog.php"; ?>`.  
If you want to insert a menu (in the header) you can use: `<?php include "content/menu.php"; ?>`. 

If you want to display a logo (if there is a logo uploaded), it is saved under `$root_path/content/logo.jpg`. The variable variable `$root_path` is the installation directory. If you create links to other pages or files, always use `$root_path`. The snippet to insert a logo would be:

```
<img src="<?php echo $root_path ?>/content/logo.jpg" class="logo">
```


For now these four snippets are the only things available. More content will be added over time, and when it is available it will be listed on this page.

### Creating a custom pages

It works exactly the same for custom pages. But on pages you can also show the pagetitle, and the pagecontent. The snippets are shown below.<br>
For the pagetitle: `<?php echo $pagetitle; ?>`  
For the page content: `<?php echo $content; ?>`

### Creating custom pages for blogposts

The same story for custom blogpost pages. For this type of page you can use 8 different snippets. The new snippets are shown below (again).  
For the author: `<?php echo $auteur; ?>` (sorry, language is dutch at this one)  
For the tags: `<?php echo $tags; ?>`  
For the date (published): `<?php echo $datum; ?>` (also dutch...)  
For the comments: `<?php include "../content/comments.php" ?>`   
To display other posts (excludes the current post by default): `<?php include "../content/blog.php" ?>`

### Creating a custom stylesheet

Your CSS can be placed in theme.css

### Other files

Other files will automaticly be uploaded to content/uploads

## Zipping and uploading your theme

When you've edited the files, and you like your new theme it is time to zip your files, and upload them into SkyLight website builder. So when you've zipped your files, go to SkyLight website builder, and click on the tab themes. The click "select files" and choose your zipped folder. Then click upload, and enjoy your new theme!
