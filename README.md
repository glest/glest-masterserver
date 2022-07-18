
========================================================================================

ARCHIVED
========
This project is no longer maintained. If you would like to contact about this, please find us on **[Discord](https://discord.gg/es3EyBB)**.

========================================================================================

**This repo contains the code for the [Glest master server](https://glest.dreamhosters.com/).**

## Docs for testing and installing the code that runs the master server

[Glest](https://glest.io) is a libre software cross
platform real-time strategy game.

> Master server does the following:
> * publish game hosts (when a user decides to host)
> * list hosted games (HTML, CSV, JSON output)
> * list recently hosted gamed (HTML output)
> * list available game mods (CSV output)
> * provide a version check for game installations

 * The [Glest organization](https://github.com/Glest) on GitHub

This master server does the following:
· publish game hosts (when a user decides to host)
· list hosted games (HTML, CSV, JSON output)
· list recently hosted gamed (HTML output) - this code is currently disabled
· list available game mods (CSV output)
· provide a version check for game installations

It uses a standard PHP/MySQL setup to achieve this. When instances of Glest
engine based games publish their game information, they do so by pushing it to
this web server in regular intervals. Stale entries are removed when the next
client requests the list. When game instances retrieve the list of hosted games
or available game mods, they do so by pulling this information from the server.
Game and master server communicate using HTTP. The client sends requests by
HTTP GET passing along URL parameters while the server responds in a CSV format
or single field plain text. The version check is currently implemented as plain
text files (which use symbolic links for deduplication purposes) on the server.
This may be replaced by a single configurable PHP script in the future.

The Glest Team hosts a live copy of this code at
  https://glest.dreamhosters.com/
Please do not use this instance for your tests, but set up a copy of your own.

# Installation

1. Setup a web server with PHP and a MySQL database server.
   Sucessfully tested configurations (on Debian GNU/Linux 6 and 7):
   · Apache 2.2 + mod_php 5.3.3
   · Nginx 1.2.1 + fastcgi + PHP-FPM 5.4.4
   · MySQL Community Server/Edition 5.1 (Oracle)
   · MySQL Server 5.5 (Percona)

2. Create a new MySQL database and a user who has has all standard permissions
   to work on this database after authentication.
   Example:
   CREATE DATABASE `glest-master`;
   CREATE USER `glest-master`@`localhost` IDENTIFIED BY 'secret password';
   GRANT ALL ON `glest-master`.* TO `glest-master`@`localhost`;
   FLUSH PRIVILEGES;

3. Copy all files (you can omit INSTALL and install/) to your webserver and
   edit config.php to reflect the MySQL connection parameters and game title;
   also replace the images in images/ by some which match your game title.

4. Connect the new user to the new database, then execute the SQL statments in
   install/scheme_mysql.sql.
   Example:
   mysql -u glest-master -p glest-master < install/scheme_mysql.sql

   Depending on your web host, you may need to alter the above command slightly.
   Example:
   mysql -u db_USER -p -h mysql.glest.dreamhosters.com glest_game < install/scheme_mysql.sql

5. Set up the webserver to allow access to, and set up PHP to execute, the
   PHP files you placed on your webserver. Practically you may want to create
   a new "VirtualHost"/"Server" and make sure it points to where you placed
   the files and can run PHP.

To test and use this server with your Glest engine based game, configure
the "Masterserver" property in glestuser.ini (if it's Glest) or glest.ini
(if it's a different game).

To add mods to the game mod menu, edit the database contents using your
favorite MySQL editor or develop a web based frontend to do so. In the latter
case, please let us know about it and try to use a compatible license.
