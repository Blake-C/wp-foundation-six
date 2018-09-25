---
layout: page
title: Database
permalink: /docs/5.1/database
version: 5.1
order: 6
---

To access phpmyadmin go to `http://localhost:8000` after starting the docker services/containers and login with the following credentials.

- Server: mysql
- Username: root
- Password: root

This will log you into the phpmyadmin browser interface. When adding or creating a database be sure to set the site url in the options table to serve core WordPress from `/wp`, the home url will stay at the root level `/`. When you start up docker it will generate a new database called wp_foundation_six, this is what is setup to be used in the `./public_html/wp-config.php` file.
