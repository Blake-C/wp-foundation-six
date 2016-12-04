# WP Foundation Six Developer Framework

The WordPress Foundation 6 Developer Framework is meant to be a starting point for developers to create projects without having third party code/modules within their git repo. This project uses composer to install WordPress and default plugins as project dependencies. The base theme uses NPM to install dependencies, and Gulp as the build system. Gulp also uses [Babel](http://babeljs.io/) and [Webpack](https://webpack.github.io/) to transpile ES6 to ES5 so that you can use the latest [ECMAScript](https://en.wikipedia.org/wiki/ECMAScript) syntax.

## Requirements

- [Composer](https://getcomposer.org/)
- [Node](https://nodejs.org/)
- [NPM](https://www.npmjs.com/)
- [Bower](https://bower.io/)
- [Gulp](http://gulpjs.com/)
- [LAMP Stack](https://en.wikipedia.org/wiki/LAMP_(software_bundle))
	- [MAMP](https://www.mamp.info/en/)
	- [WAMP](http://www.wampserver.com/en/)
	- [AMPPS](http://www.ampps.com/)
	- [Vagrant](https://www.vagrantup.com/)
	- [Docker](https://www.docker.com/)
		- In the future I plan on working Docker into this project so that we have a portable LAMP stack

## Installation

Clone the project to your local machine to start a new project.

```
git clone --depth=1 --branch=master https://github.com/Blake-C/wp-foundation-six.git name-of-your-project
```

To start a new project cd into name-of-your-project and delete the .git directory. Then run a new git init.

```
cd name-of-your-project
rm -rf .git
git init
```

Commit the inital state of the project and push to the remote repo if one exists.

```
git add .
git commit -m "Initial Commit"
git push origin master
```

Now you can run ```composer install``` within your name-of-your-project directory. This will install WordPress into the wp directory and install plugins into the wp-content/plugins directory.

The following default plugins will be installed:
- wordpress-seo
- google-analytics-for-wordpress
- redirection
- regenerate-thumbnails
- akismet

Once composer has completed installing WordPress and the default Plugins, change directories to ```cd wp-content/themes/wp-foundation-six``` then you can run ```npm install```. This will install the node modules.

## Add/Remove composer packages/modules

To install new WordPress plugins you can use composer to install them so that when another developer downloods the project and runs the composer install command they will have the same WordPress plugins to match your own development environment.

Install existing packages in the composer.json file:

```
composer install
```

Add new composer package:

```
composer require wpackagist-plugin/name-of-plugin
```

All public WordPress plugins that are listed in the WordPress plugin directory can be installed using composer with the vendor name: ```wpackagist-plugin```. For a full list of public WordPress plugins that can be installed using composer please refer to [wpackagist.org](https://wpackagist.org/).

Remove composer package:

```
composer remove wpackagist-plugin/name-of-plugin
```

To update any composer packages that are set to a specific version use:

```
composer update
```

The default packages are installed using the most recent versions, you can change this if needed by uninstalling and reinstalled the package to set the version number. Otherwise you can open up the composer.json file and manually set the version number needed.

If you need to include premium plugins in your project that are not listed in the public WordPress plugin directory, then you can either host your own repo of premium plugins and include the path in the composer.json file as long as the project is private on GitHub or wherever you keep your shared code. Alternatively, you can just commit the premium plugin into the project, once again only if your project is private. If your project is not private to your team then do not keep premium plugins pathed or within the project. You will need to find a different means of storing/sharing premium plugins with your team. You will be subject to the terms and conditions of the premium plugins and your use of them.

## Working with JavaScript

This section is only relevant if you intend to use the built in wp-foundation-six base theme.

The base theme included in this project comes with the [Gulp](http://gulpjs.com/) task manager that will run a [Webpack](https://webpack.github.io/) task that will use [Babel](https://babeljs.io/) to transpile [ES2015](https://babeljs.io/docs/learn-es2015/) code. This means you can use the ES2015 ```import``` way of including modules into your project. 

jQuery has been set as a global script because of the use of third party WordPress plugins. Since we never know when a required WordPress plugin will need the use of jQuery we need to leave it in the global scope. When using jQuery within your custom scripts you do not need to ```import``` it in. You can use the ```$``` as you normally would. 

The scripts that run through the Gulp task will also be subject to [ESLint](http://eslint.org/) for code quality control. This is to keep the project scripts within a set standard for the development team and to catch any errors before the projects goes to production.

To require a new JavaScript package use [NPM](https://www.npmjs.com/) to install it:

```
npm install name-of-package --save
```

Or if you have [Yarn](https://www.npmjs.com/package/yarn) install:

```
yarn add name-of-package
```

If the NPM package uses ES2015 modular loaders then you can import the package using the name of the package. Otherwise you will need to path your import to the desired scripts file from within the node_modules directory.

```
import custom-name from name-of-package
```

or 

```
import '../../../node_modules/name-of-package/js/index.js';
```

Be sure to use ```../``` as many times as you nest directories within the theme_components/js directory.

If you need to add a new script file to be exported as a new bundle then create your file within the theme_components/js directory and add the name of your file to the scripts-list.js file within that same directory. This file has a const that is imported into the Webpack config as an object of exported bundles.

## Gulp Tasks

To compile the theme code you can run the ```gulp``` task. This will build the themes JavaScript, SCSS, and Images. The default ```gulp``` task does not persist and will stop once done.

To watch the files for changes as you develope you can run the ```gulp watch``` task. 

If you have a local development environment setup you can add your local domain as the proxy_target const at the top of the gulpfile.babel.js file. Then you can run ```gulp serve``` to start up the local dev server to have autoreload and style injection when developing in the browser.

When you are done building your theme you can run the ```gulp --build``` task. This will create a directory next to the build theme called ```wp-foundation-six-build``` this will only contain the files that should be added to the server. The node_modules, theme_components, and any dot files will that are only needed for development will not be included within the built theme. Once you upload the built theme to the server you can remove the -build from the end of the theme name so that you can FTP into it can you local theme so make updates.

If you want to clean up your development environment of built assets just run the ```gulp clean``` task to delete the built theme, and assets directory. 

There are a number of sub tasks that get initiated with the main tasks that can be run individually as needed. All tasks can be found in the gulpfile.babel.js file.

## Unit Test Data

If you need unit test data to work with you can download it from here:

- [Theme Unit Test Data](https://wpcom-themes.svn.automattic.com/demo/theme-unit-test-data.xml)
- [More info can be found here](https://codex.wordpress.org/Theme_Unit_Test)

## What Now?

- In the ```wp-content/themes/wp-foundation-six/style.css``` file you will need to update the theme name and other settings.
- Update your app icons using [Favicon Generator](http://realfavicongenerator.net/)
- Think about optimizing the load order of your scripts and how you might be able to combine files for fewer http requests.
- Carefully organize your [Sass](http://sass-lang.com/) so that other developers can understand your code.
- Read the [Foundation Documentation](http://foundation.zurb.com/sites/docs/)
- Read the [Sass Documentation](http://sass-lang.com/guide)
- Ask question and contribute ideas!

You can reach me at [@BlakeCerecero](https://twitter.com/BlakeCerecero) on Twitter.
