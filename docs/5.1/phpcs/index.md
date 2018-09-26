---
layout: page
title: PHP CodeSniffers
permalink: /docs/5.1/phpcs
version: 5.1
order: 10
---

PHP CodeSniffers (PHPCS) is a tool for styling and sniffing your PHP code against rulesets that have been specified in the phpcs.xml file that has been added to the wp-foundation-six theme.

[Read more about why and how it should be used](https://stackoverflow.com/questions/982333/how-useful-is-php-codesniffer-code-standards-enforcement-in-general/5985349#5985349)

**Documentation:**
- [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)
- [WordPress-Coding-Standards](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards)
- [PHPCompatibility](https://github.com/PHPCompatibility/PHPCompatibility)

Refer to the above documentation and Google for setting up these tools on your local machine and text editor. For the purposes of this documentation I will focus on how to use these tools on the command line with this project.

## PHPCS

To run the code sniffers without installing them on your machine run `composer install` from within the public_html directory. If you do not have composer installed on your machine you can use the general-cli docker container and run `composer install` from there. Refer to the Docker part of this documentation for instructions on how to use [Docker](/docs/5.1/docker).

You will have access to PHPCS from within the theme directory using `gulp phpcs`. This will run PHPCS on all PHP files in the theme directory. I'm using gulp to alias the command to the correct directory where PHPCS is installed. If you need to run PHPCS on a single file add the files path to the end of the same command; `gulp phpcs -f header.php` or `gulp phpcs -f template-parts/content.php`. PHPCS must be ran from the root of the theme directory.

FYI, if you have phpcs installed globally on your machine you will not have to worry about the `-f` in the command. `-f` is only there to pass the file into the gulp task to be added as an argument to the main phpcs command. Running phpcs globally is as simple as running `phpcs` or `phpcs header.php`.

**gulp phpcs output on all files with no errors:**

```bash
gulp phpcs
[22:07:19] Failed to load external module @babel/register
[22:07:19] Requiring external module babel-register
[22:07:20] Using gulpfile ~/Downloads/wp-foundation-six-development/public_html/wp-content/themes/wp-foundation-six/gulpfile.babel.js
[22:07:20] Starting 'phpcs'...
[22:07:20] ../../../vendor/bin/phpcs --standard=phpcs.xml --colors
................................................... 51 / 51 (100%)


Time: 7.19 secs; Memory: 14Mb

[22:07:28] Finished 'phpcs' after 7.31 s
```

**gulp phpcs output from single file with errors:**

```bash
gulp phpcs
[22:06:31] Failed to load external module @babel/register
[22:06:31] Requiring external module babel-register
[22:06:32] Using gulpfile ~/Downloads/wp-foundation-six-development/public_html/wp-content/themes/wp-foundation-six/gulpfile.babel.js
[22:06:32] Starting 'phpcs'...
[22:06:32] ../../../vendor/bin/phpcs --standard=phpcs.xml --colors
....................................E.............. 51 / 51 (100%)



FILE: header.php
------------------------------------------------------------------------------------------------------------------------------------
FOUND 2 ERRORS AFFECTING 1 LINE
------------------------------------------------------------------------------------------------------------------------------------
 113 | ERROR | [x] Expected 1 spaces after opening bracket; 0 found (PEAR.Functions.FunctionCallSignature.SpaceAfterOpenBracket)
 113 | ERROR | [x] Expected 1 spaces before closing bracket; 0 found (PEAR.Functions.FunctionCallSignature.SpaceBeforeCloseBracket)
------------------------------------------------------------------------------------------------------------------------------------
PHPCBF CAN FIX THE 2 MARKED SNIFF VIOLATIONS AUTOMATICALLY
------------------------------------------------------------------------------------------------------------------------------------

Time: 6.98 secs; Memory: 14Mb

[22:06:39] Finished 'phpcs' after 7.13 s
```

## PHPCBF

You also get access to PHPCBF which can auto fix some issues for you without you acting upon the files. To run PHPCBF run `gulp phpfix` or `gulp phpfix -f header.php`. I would strongly suggest that if you have multiple files, you run this command on them one at a time and review the results before committing your code back to the repo.

**gulp phpfix -f header.php output from fixing errors**

```bash
gulp phpfix -f header.php
[22:09:39] Failed to load external module @babel/register
[22:09:39] Requiring external module babel-register
[22:09:40] Using gulpfile ~/Downloads/wp-foundation-six-development/public_html/wp-content/themes/wp-foundation-six/gulpfile.babel.js
[22:09:41] Starting 'phpfix'...
[22:09:41] ../../../vendor/bin/phpcbf --standard=phpcs.xml --colors header.php
F 1 / 1 (100%)



PHPCBF RESULT SUMMARY
----------------------------------------------------------------------
FILE                                                  FIXED  REMAINING
----------------------------------------------------------------------
header.php                                            2      0
----------------------------------------------------------------------
A TOTAL OF 2 ERRORS WERE FIXED IN 1 FILE
----------------------------------------------------------------------

Time: 626ms; Memory: 12Mb


[22:09:41] Finished 'phpfix' after 762 ms
```

---

## Author Notes

**Currently used versions:**
- PHP CodeSniffer: "3.3.0",
- WP Coding Standards: "0.14.1"
- PHP Compatibility: "8.1.0"

**Install locations**
- Local Machine
	- Used with text editor/IDE
- Within the Docker general-cli container
	- Used on command line in docker
- Project composer.json
	- Used with gulp commands within project on local machine
