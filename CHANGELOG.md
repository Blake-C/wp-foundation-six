# Changelog

All notable changes to this project will be documented in this file.

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
-   Ran Prettier on all SCSS fils
    -   Needed a `// prettier-ignore` line above `// sass-lint:disable-line no-ids` to prevent the ignore line from dropping to the next line.
        -   You'll have to watch out for this in the future when using Prettier and disabling a single line with sass-lint. The comment needs to remain on the same line; to do this and use Prettier we need the prettier-ignore line above the sass-lint line.
        -   This change was made to the \_generic-styles.scss file.
-   On some markdown files Prettier can make a mess of things if you have long links. For this reason the README.md in the sass directory has a new line: `<!-- prettier-ignore -->`, to prevent Prettier from messing up the formatting.
-   In the sass-lint.yml file, the setting for brace-style has been changed.
