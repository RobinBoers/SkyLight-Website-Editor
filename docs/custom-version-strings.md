# Why won't the online updates work with custom version strings?

When SkyLight checks for updates it compares the local version string (in `/edit/updates/version.txt`) to an online one (hosted at `https://code.geheimesite.nl/package/SkyLight/latest.txt`). If the strings match it means the software is up to date. If they do not match it can mean 2 things: outdated software or an preview build. If the local version string includes "preview" SkyLight knows it is a preview build (the version string for the preview build of v0.03.1-beta is v0.03.1-preview) and will do nothing. If it doesnt include "preview" it means the software is outdated and needs to be updated. 

You can probably see why custom version strings would be a problem. If the string isnt an exact match with the online one, SkyLight thinks it needs to update. If you want to prevent this from happening you can (starting with version v0.03.1-beta) include the word "modded" in the version string. SkyLight will ignore updates if it finds "modded" in the version string.

Another way to prevent this is to host your own online server for the updates (if you for example want to fork the project). This way SkyLight will compare the version string to that online one and update from that server.
