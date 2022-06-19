# Installation Guide

This guide shows you how to install Skylight.

## What do you need?

You will need four things: 

- A domain
- A webserver capable of running PHP
- The latest SkyLight package
- A FTP program like [FileZilla](https://filezilla-project.org/)

If you're searching for a good place to get a domain and webserver, check out [bHosted](https://www.bhosted.nl?ref=97f4c4a4b13e269e12cfd4f0352ba527).  
They offer great webhosting for an affordable price.

**NOTE: SkyLight is written for PHP 7. It will not work in PHP 8. I found that out the hard way because I accidentally updated XAMPP. Make sure the PHP version of your server is set to PHP 7**

## Installation

### Stable

Download SkyLight from GitHub. You can find the latest stable release here:  
<https://github.com/RobinBoers/SkyLight-Website-Editor/releases>

**NOTE: Download `Source code (zip)` and not `package.zip`, because `package.zip` is for online updating only and doesn't work on its own!**

Unzip the zip file you downloaded and upload it to the root folder. The location of this folder is different per hosting provider. Mine is `public_html`, located at _/domains/yourdomain.com/public_html/_   
You can also upload to subdirectories if you want to have SkyLight installed at _yourdomain.com/blog_ for example.

### Developer preview

If you want to run a developer preview build, git clone from master:

```
git clone https://github.com/RobinBoers/SkyLight-Website-Editor
```  

## Setup

After installation there are a few important things to do:

### Login and change the password

This step is quite simple. The option to change the password is located in the settings panel in the "Security" section. 

You can log in at **yourdomain.com/login** or **yourdomain.com/subdirectory/login** if you installed SkyLight in a subdirectory. The default password is `root`. It can be used with any username, because I haven't added, and do not plan on adding accounts. The username you enter will appear under the posts and comments you make but has no other effect.

### Change installation directory

**NOTE: This step is only required if you installed SkyLight in a subdirectory.**

**ALSO NOTE: When using a developer preview (aka cloning from master) the installation directory will already be set (for my local environment) and needs to be changed before doing anything else!**

Go to the settings panel and scroll down to the "Advanced" section. Here, you will find the option "Installation directory".  
If you installed SkyLight in **yourdomain.com/blog**, you need to change this value to `/blog`. If you installed it at **yourdomain.com/news/blog**, you need to change it to `/news/blog`. Make sure to do this correctly, because otherwise, the site will not function correctly.

### Enter site information

You can change the:

- Title
- Description
- Footer text (Copyright stuff)
- Site language

and other stuff at the settings panel in the "General" section.

### Download a theme

The default theme is named Simple. In older versions, it was Ugly Blue (the debugging theme) and that is because it is quite UGLY (and also blue). If you want to change this, you can download new themes from the Theme Picker in the themes panel.

[Browse themes](https://robinboers.github.io/SkyLight-themelibrary/)

### Create some content

Now it is time to add some content to your beautiful website. There are some example posts and comments on your new site that teach you exactly how to do this, but here's  a short summary:

> To post a new blogpost, go the the blog panel and click "Compose new post"  
> To post a new page, go the the pages panel and click "Add new page"  
> To Moderate comments, go to the comments panel and click delete on the comments you don't want to be displayed on your posts
