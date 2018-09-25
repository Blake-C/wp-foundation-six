---
layout: page
title: PHP CodeSniffers
permalink: /docs/5.1/phpcs
version: 5.1
order: 10
---

PHP CodeSniffers (PHPCS) is a tool for linting your PHP code against rulesets that have been specified in the phpcs.xml file that has been added to the wp-foundation-six theme.

**Documentation:**
- [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)
- [WordPress-Coding-Standards](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards)
- [PHPCompatibility](https://github.com/PHPCompatibility/PHPCompatibility)

Refer to the above documentation for setting up these tools on your local machine and text editor. For the purposes on this documentation I will focus on how to use these tools on the command line with this project.

## PHPCS

To run the code sniffers without installing them on your machine run `composer install` from within the public_html directory. If you do not have composer installed on your machine you can use the general-cli docker container and run `composer install` from there. Refer to the Docker part of this documentation for instructions on how to use [Docker](/docs/5.1/docker).

You will have access to PHPCS from with the theme directory using `npm run phpcs`. This will run PHPCS on all PHP file in the theme directory. I'm using npm to alias the command to the correct directory where PHPCS is installed. If you need to run PHPCS on a single file add the files path to the end of the same command; `npm run phpcs header.php` or `npm run phpcs template/parts/content.php`. PHPCS must be ran from the root of the theme directory.

**npm run phpcs output on all files with no errors:**
```bash
npm run phpcs

> wp-foundation-six@0.0.0 phpcs /Users/bcerecero/Downloads/wp-foundation-six-development/public_html/wp-content/themes/wp-foundation-six
> ../../../vendor/bin/phpcs --standard=phpcs.xml --colors

................................................... 51 / 51 (100%)
```

**npm run phpcs ran on a single file with error:**
```bash
npm run phpcs header.php

> wp-foundation-six@0.0.0 phpcs /Users/bcerecero/Downloads/wp-foundation-six-development/public_html/wp-content/themes/wp-foundation-six
> ../../../vendor/bin/phpcs --standard=phpcs.xml --colors "header.php"

E 1 / 1 (100%)



FILE: header.php
------------------------------------------------------------------------------------------------------------------------------------
FOUND 2 ERRORS AFFECTING 1 LINE
------------------------------------------------------------------------------------------------------------------------------------
 113 | ERROR | [x] Expected 1 spaces after opening bracket; 0 found (PEAR.Functions.FunctionCallSignature.SpaceAfterOpenBracket)
 113 | ERROR | [x] Expected 1 spaces before closing bracket; 0 found (PEAR.Functions.FunctionCallSignature.SpaceBeforeCloseBracket)
------------------------------------------------------------------------------------------------------------------------------------
PHPCBF CAN FIX THE 2 MARKED SNIFF VIOLATIONS AUTOMATICALLY
------------------------------------------------------------------------------------------------------------------------------------

Time: 278ms; Memory: 12Mb
```

## PHPCBF

You also get access to PHPCBF which can auto fix some issues for you without you acting upon the files. To run PHPCBF run `npm run phpfix` or `npm run phpfix header.php`. I would strongly suggest that if you have multiple files, you run this command on them one at a time and review the results before committing your code back to the repo.

**npm run phpfix ran fixing errors**

```bash
npm run phpfix header.php

> wp-foundation-six@0.0.0 phpfix /Users/bcerecero/Downloads/wp-foundation-six-development/public_html/wp-content/themes/wp-foundation-six
> ../../../vendor/bin/phpcbf --standard=phpcs.xml --colors "header.php"

F 1 / 1 (100%)



PHPCBF RESULT SUMMARY
----------------------------------------------------------------------
FILE                                                  FIXED  REMAINING
----------------------------------------------------------------------
header.php                                            2      0
----------------------------------------------------------------------
A TOTAL OF 2 ERRORS WERE FIXED IN 1 FILE
----------------------------------------------------------------------

Time: 698ms; Memory: 12Mb
```
