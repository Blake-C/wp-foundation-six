# Changelog

All notable changes to this project will be documented in this file.

## [#.#.#] - Next

### Changed

-   Updated favi/app icons with only less legacy support

### Added

## [6.0.1] - 2019-02-13

### Changed

-   Updated node_modules

## [6.0.0] - 2019-02-01

### Changed

-   Removed webpackConfig variable from gulp file
    -   This was left over from when webpack-stream was being used
-   Fixed formatting of foundation-settings scripts file
-   Fixed new phpcs issues that came from phpcs plugin upgrades
-   Updated squizlabs/php_codesniffer to 3.3.2
-   Updated phpcompatibility/php-compatibility to 9.0.0
-   Updated wp-coding-standards/wpcs to 1.1.0
-   Updated core composer packages
-   Updated digitalblake/general-cli to 0.3.0
-   Updated digitalblake/wp-foundation-six-php to 2.1.1
-   Updated digitalblake/wp-foundation-six-nginx to 1.0.0
-   Updated digitalblake/general-cli to 1.0.0
-   Updated theme npm modules
-   Updated gulp from v3 to v4
    -   Updated the gulpfile to support v4
-   Updated foundation to 6.5.0 from 6.4.3
-   Updated project to use node 10.15.0
-   Updated node_modules

### Added

-   Added config for markdown at 4 spaces rather than tabs
-   Added phpcs and phpcbf to serve, watch, and build gulp tasks
-   Added NGINX support for SSL and HTTP2
-   Added gulp serve --https argument
-   Added ldap php module to wp-foundation-six-php docker image

## [5.1.5] - 2018-10-01

### Changed

-   Updated excludes in babel loader in webpack config
    -   exclude: /node_modules(?!\/foundation-sites)/
    -   exclude: /node_modules/
-   Switched out all babel packages for @babel name scoped packages
-   Switched all "env" to "@babel/preset-env"

## [5.1.4] - 2018-10-01

### Changed

-   Changed gulp prettier tasks log level to warn
-   Updated gulp scripts tasks to use gulp-shell
-   Updated webpack config to only output assets and errors
-   Renamed modernizr output file as modernizr.js
-   Removed webpack-stream npm package
-   Removed modernizr-webpack-plugin npm package
-   Removed webpack config for modernizr
-   Fixed issue with webpack not writing to the build directory

### Added

-   Added modernizr-config.json files for modernizr settings
-   Added gulp-shell task for building modernizr from npm source

## [5.1.3] - 2018-09-25

### Changed

-   Updated General CLI from v0.1.2 to v0.2.0
-   Updated composer php require version to v7 from v5.6
-   Updated NPM packages
-   Updated Composer packages
-   Updated README file with new documentation home

### Added

-   Added color setting to phpcs.xml in theme
-   Added new gulp task for prettier in theme
-   Added new gulp task for phpcs and phpcbf in theme
    -   gulp phpcs -f header.php
    -   gulp phpfix -f header.php
-   Added gulp-shell to assist in running Prettier and PHPCS through gulp
-   Added composer packages for phpcs tooling
    -   phpcodesniffer-composer-installer
    -   squizlabs/php_codesniffer
    -   phpcompatibility/php-compatibility
    -   wp-coding-standards/wpcs

## [5.1.2] - 2018-08-28

### Changed

-   Added new configs for Prettier
    -   "arrowParens": "avoid"
    -   "bracketSpacing": true
    -   "jsxBracketSameLine": false

## [5.1.1] - 2018-08-26

### Changed

-   Changed `$table_prefix` back to `wp_`
-   Hot fix for the general cli (v0.1.2) container regrading the table_prefix replacement line in the wp-init shell functions

## [5.1.0] - 2018-08-26

### Added

-   Added phpcs.xml to root of project for global files

### Changed

-   Updated wp-foundation-six-php:1.0.0 to wp-foundation-six-php:2.0.0
-   Updated mariadb:10.1.20 to mariadb:10.3.9
-   Updated composer packages
-   Cleaned up formatting of wp-config.php file
-   Moved changelog.md from theme directory to root project directory

## [5.0.0] - 2018-08-25

### Added

-   Integrated Prettier
    -   eslint-config-prettier npm package
        -   Turns off eslint all rules that are unnecessary or might conflict with Prettier.
    -   eslint-plugin-prettier npm package
        -   Runs Prettier as an ESLint rule and reports differences as individual ESLint issues.
    -   prettier npm package
        -   Prettier is an opinionated code formatter. It enforces a consistent style by parsing your code and re-printing it with its own rules that take the maximum line length into account, wrapping code when necessary.
    -   Prettier ignore file
    -   Prettier configurations file

### Changed

-   .eslintrc
    -   Simplified rules, many were already set in the recommended standards.
    -   Added Prettier configurations.
    -   Set ecmaVersion to v8.
-   gulpfile.babel.js
    -   Formatting changes for Prettier.
    -   Updated ignores list on copy task for the new Prettier config files.
-   Ran Prettier on all JavaScript files
-   Ran Prettier on all SCSS files
    -   Needed a `// prettier-ignore` line above `// sass-lint:disable-line no-ids` to prevent the ignore line from dropping to the next line.
        -   You'll have to watch out for this in the future when using Prettier and disabling a single line with sass-lint. The comment needs to remain on the same line; to do this and use Prettier we need the prettier-ignore line above the sass-lint line.
        -   This change was made to the \_generic-styles.scss file.
-   On some markdown files Prettier can make a mess of things if you have long links. For this reason the README.md in the sass directory has a new line: `<!-- prettier-ignore -->`, to prevent Prettier from messing up the formatting.
-   In the sass-lint.yml file, the setting for brace-style has been changed.
