# WP Foundation Six Developer Framework

The WordPress Foundation 6 Developer Framework is meant to be a starting point for developers to create projects without having third party code/modules within their git repo. This project uses [Composer](https://getcomposer.org/) to install [WordPress](https://wordpress.org/) and default plugins as project dependencies. The base theme uses [NPM](https://www.npmjs.com/) to install script dependencies, and [Gulp](http://gulpjs.com/) as the build system. Gulp also uses [Babel](http://babeljs.io/) and [Webpack](https://webpack.github.io/) to transpile ES6/ES2015 to ES5 so that you can use the latest [ECMAScript](https://en.wikipedia.org/wiki/ECMAScript) syntax.

## TL;DR

### Setup

-   `git clone https://github.com/Blake-C/wp-foundation-six.git your-project-name`
-   `cd your-project-name`
-   `rm -rf .git`
-   `git init && git add -A`
-   `git commit -m "Initial Commit"`
-   `docker-compose up -d`
-   `docker container list -a` - get the id (############) of the general-cli container
-   `docker exec -it ############ zsh`

From here you have two options, auto or manual.

### Auto

-   `wp-init` - while in the general-cli container
    -   You can find the [script definition here](https://github.com/Blake-C/general-cli/blob/master/custom-scripts/global-scripts.zsh#L54).

### Manual Steps

-   `composer install`
-   `composer update`
-   `cd wp-content/themes/wp-foundation-six/`
-   `npm install`
-   `gulp`

## Access the database

-   site will load under [http://localhost](http://localhost)
    -   database under [http://localhost:8000](http://localhost:8000)
        -   server: mysql
        -   user: root
        -   password: root

## Importing

This process assume you've setup a site using wp-foundation-six and now need to move a production site into your local install fresh.

-   `git clone your-project-name.git`
-   `cd your-project-name`
-   `docker-compose up -d`
-   `docker container list -a` - get the id (############) of the general-cli container
-   `docker exec -it ############ zsh`
-   Move your plugins and uploads directories into /wp_content
    -   Replace the theme directory as well if not using wp-foundation-six
-   Upload database into the wp_foundation_six database
    -   Database under [http://localhost:8000](http://localhost:8000)
    -   Make sure you have docker exec'd into the `general-cli` container
        -   `wp search-replace https://production.com http://localhost --precise --all-tables`
            -   Use the same URL in the wp_options table under siteurl
        -   `wp option update siteurl 'http://localhost/wp'`
            -   Core WordPress is installed under the wp directory by composer so we need to point the site root to this location
        -   Site will load under [http://localhost](http://localhost)
-   In the terminal change directories into the wp-foundation-six theme
    -   `npm install`
    -   `gulp`

### Import Troubleshooting

-   If `wp search-replace` fails try temporarily renaming your plugins directory and try again.
-   If you receive php warnings try disabling plugins you don't need while working locally.
    -   wp-rocket
    -   wordfence
    -   any caching plugins
    -   any security plugins
    -   mailing plugins
-   If the install WordPress interface appears, make sure the `siteurl` was updated in the `wp_options` table.
    -   `siteurl` should be `http://localhost/wp`
-   If your database is not found or your site does not load make sure the `wp-config.php` file has the default values for the project.
    -   `define( 'DB_NAME', 'wp_foundation_six' );`
    -   `define( 'DB_USER', 'root' );`
    -   `define( 'DB_PASSWORD', 'root' );`
    -   `define( 'DB_HOST', 'mysql' );`
    -   The `$table_prefix` will be unique for each site, use what is on your database tables. For instance the `wp_options` table might be `ahja_options`. `ahja_` would be your `$table_prefix`.
-   If your database does not import check the size of you database and make sure the phpmyadmin environment variable `UPLOAD_LIMIT` is high enough in the `docker-compose.yml` file.
    -   By default it's 300M.

## When done

-   `exit`
-   `docker-compose down`

## Project Documentation

[https://blake-c.github.io/wp-foundation-six/](https://blake-c.github.io/wp-foundation-six/)

Checkout the [changelog](https://github.com/Blake-C/wp-foundation-six/blob/master/CHANGELOG.md) for details on recent updates.
