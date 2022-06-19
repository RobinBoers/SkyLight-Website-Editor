# How to push an update

To push an update to all Skylight instances follow these steps:

## Update the source code

Make the changes you need to make.

## Update version string 

Update the version string in `/edit/update/version.txt` to the newer version.

## Package your changes

Create a zip file with the contents of the `/edit/` directory. This directory contains all the files for the builder to function properly. Other files can be updated separately in the settings panel, but they are optional. Off course, you do not include the `password.txt` file, as that would reset the passwords on all SkyLight instances. It is important to call the file `package.zip`. The contents of the zip should be at the root level of the zip file.

## Create a changelog

Replace the old changelog with a new one and upload it to `https://code.geheimesite.nl/package/SkyLight/latest/changelog.html`. SkyLight will link to that page when showing users the update message.

## Create a GitHub release

Create a GitHub release and upload the packaged files (`/edit/*`) named package.zip as one of the assets for that release. SkyLight will pull these and overwrite the old core files.

## Update the online version string

SkyLight uses a textfile hosted at `https://code.geheimesite.nl/package/SkyLight/latest.txt` to check if it is at the latest version. Update this file to the new version string, and all the SkyLight instances will tell the users to update (all users = only me :D )
