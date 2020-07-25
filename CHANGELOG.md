# Changelog

All notable changes to this project will be documented in this file.

## [#.#.#] - Next

### Changed

-   Moved stylelint config out of package.json and into .stylelintrc
-   Removed all third party plugins for WordPress from composer.json
-   Fixed wp-foundation-six plugin documentation notes
-   Changed prettier width to 120 and added prettierrc to root directory

### Added

-   Added new stylelint rules
-   Added stylelint-config-prettier npm package
-   Added detect browser npm package to add html class based on browser usage
-   Added editor class wrapper around editor styles to limit admin impact
-   Added es6 to .eslintrc.json env
-   Added Visual Studio Code Workspace config into theme and root of project
-   Added phpcs pathing for directories in VSCode

## [8.0.0] - Next

### Changed

-   Updated wp-foundation-six-php from v3.0.0 to v4.1.0
    -   Updated php from v7.3 to v7.4.6
    -   Updated xdebug from v2.7.0 to v2.9.6
-   Updated mariadb from v10.3.9 to v10.4.13
-   Updated wp-foundation-six-nginx from v1.0.0 to v2.0.0
    -   Updated nginx from 1.14.0-alpine to 1.17.8-alpine
-   Updated general-cli from v2.0.0 to v3.1.1
    -   Added automake to general-cli container so that gifsicle could build from source and run gulp images task
    -   Updated node from v12.14.1 to v12.18.0
    -   Updated WordPress-Coding-Standards from v2.2.0 to v2.3.0
    -   Updated the theme unit test data to pull in Gutenberg blocks
-   Updated composer packages
-   Updated node modules
-   Formatting changes occurred on docker-compose file from VSCode
-   Fixed a number of phpcs issues brought about because of phpcs/wpcs updates
-   Updated PHP cross-version compatibility php phpcs.xml to 7.4
-   Updated theme image styles to better match the Gutenberg classes
-   Updated sass lint node module
    -   Removed sass-lint
    -   Removed .sass-lint.yml file
    -   Removed gulp-sass-lint node module
    -   Added stylelint
    -   Added configurations for stylelint in package.json
    -   Added stylelintignore file
    -   Updated snyk node module
    -   Updated lint:sass task in gulpfile
    -   Updated foundation styles from 6.5.0 to 6.6.1
    -   Updated styles for stylelint node module

### Added

-   Added Query Monitor WordPress Plugin
    -   Added QM_ENABLE_CAPS_PANEL constant to wp-config.php
-   Added ignore for .cache & .code-workspace directories
-   Added local php.ini
-   Added independent images, fonts, and icons task to gulp

## [7.1.1] - 2019-06-09

### Changed

-   Updated node modules
-   Moved browser targets to package.json in the browserslist key
    -   This was done for both autoprefixer and @babel/preset-env

## [7.1.0] - 2019-06-08

### Changed

-   Turned off `<arg name="basepath" value="./"/>` in phpcs.xml to avoid the VSCode PHPCS plugin from missing code smells. Missed the root level and plugin phpcs.xml files.
    -   Until the plugin is fixed we have to remove `basepath`.
-   Removed root level phpcs.xml files.
-   Changed login_headertitle to login_headertext, login_headertitle has been deprecated.
    -   [https://developer.wordpress.org/reference/hooks/login_headertitle/](https://developer.wordpress.org/reference/hooks/login_headertitle/)
-   Updated composer modules

### Added

-   Added display block to main element to fix positioning issue in Internet Explorer 11

## [7.0.0] - 2019-03-24

### Changed

-   Updated wp-foundation-six-php to v3.0.0
    -   Updated PHP from v7.2 to v7.3 [release notes](http://php.net/releases/7_3_0.php)
    -   Updated xDebug to v2.7.0 [release notes](https://xdebug.org/updates.php)
    -   Reference the [PHP end of life chart](http://php.net/supported-versions.php)
-   Updated general-cli to v2.0.0
    -   Updated PHP from v7.2 to v7.3 [release notes](http://php.net/releases/7_3_0.php)
-   Updated composer packages
-   Updated npm modules
-   Turned off `<arg name="basepath" value="./"/>` in phpcs.xml to avoid the VSCode PHPCS plugin from missing code smells. The plugin is expecting the full path to the file being sniffed and having `basepath` in phpcs.xml breaks the file lookup.
    -   Until the plugin is fixed we have to remove `basepath`.
-   Turned off sass-lint indentation rule, it's being handled by Prettier
-   Reduced the number of named tasks in gulpfile
-   Used short jquery-migrate import in the `global-scripts.js` file
-   Removed the `content-formatting.php` function that was removing the auto paragraph functionality in core WordPress.
    -   This function turned off the `autop` and text formatting that WordPress would do by default. This was to allow us to nest short-codes with spaces and returns without having paragraph tags being created. This broke recently and has been causing trouble. I’ve decided to remove this to avoid future issues. You will have to place your short-codes directly next to each other.
-   Adjusted search form template to better associate search label and inputs
-   Adjusted default colors to pass accessibility contrast test
-   Adjusted template headings to have the correct HTML headers
-   Added missing search results meta description

### Added

-   Added .todo, .log, and .logs to the --build ignore list in `gulpfile.babel.js`
-   Added --skip_lint argument to gulp lint tasks
    -   This was added to speed up the ejection and build tasks. When working on the theme you are still expected to run the linting tasks, however, when building and ejecting this is not required.
    -   More specifically the phpcs and prettier tasks will be skipped. The eslint process is being handled by webpack and will not be skipped.
-   Added imageminMozjpeg, imageminGifsicle, and imageminSvgo npm modules to images task
    -   The images will be further optimized. If the current setting over optimize please look in the `gulpfile.babel.js` file at the theme level and adjust the image tasks setting to whichever best fits your needs
-   Added plumber to gulp images task to prevent errors from stopping task.
    -   In previous versions of the image task if an image caused this task to error out the watch and serve tasks would stop. This should not longer be the case.
-   Added feature checks in modernizr config
    -   See the `modernizr-config.json` file in the theme to see the additions
-   Added archive, index, and search post pagination.

## [6.1.0] - 2019-02-22

### Changed

-   Updated favi/app icons with only less legacy support
-   Removed the site description and title from header.php
-   Added rule to ESLint config to warn on console.logs in JavaScript files
-   Exposed docker mysql services port
-   Updated node modules
-   Updated composer packages

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
