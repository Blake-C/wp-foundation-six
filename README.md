# WP Foundation Six Developer Framework

The WordPress Foundation 6 Developer Framework is meant to be a starting point for developers to create projects without having third party code/modules within their git repo. This project uses [Composer](https://getcomposer.org/) to install [WordPress](https://wordpress.org/) and default plugins as project dependencies. The base theme uses [NPM](https://www.npmjs.com/) to install script dependencies, and [Gulp](http://gulpjs.com/) as the build system. Gulp also uses [Babel](http://babeljs.io/) and [Webpack](https://webpack.github.io/) to transpile ES6/ES2015 to ES5 so that you can use the latest [ECMAScript](https://en.wikipedia.org/wiki/ECMAScript) syntax.

## TLDR

Starting up:
- `git clone git@github.com:Blake-C/wp-foundation-six.git your-project-name`
- `cd your-project-name`
- `docker-compose up -d`
- `docker container list -a`
- get the id (############) of the general-cli container
- `docker exec -it ############ zsh`
- `composer install`
- `composer update`
- `cd wp-content/themes/wp-foundation-six/`
- `yarn`
- `gulp`
- site will load under http://localhost
- database under http://localhost:8000
	- server: mysql
	- user: root
	- password: root

When done:
- `exit`
- `docker-compose down`

## Global Requirements

- [Composer](https://getcomposer.org/)
- [Node](https://nodejs.org/)
	- [NPM](https://www.npmjs.com/)
		- [Gulp](http://gulpjs.com/)
- [LAMP/LEMP Stack](https://en.wikipedia.org/wiki/LAMP_(software_bundle))
	- [Docker](https://www.docker.com/)

When using Docker there is a service/container named digitalblake/general-cli with Composer, Node, NPM, and Gulp. If you plan to use Docker you don't need to have those tools installed on your machine, you'll be able to run the commands inside the General CLI container.

## Installation

Clone the project to your local machine to start a new project.

```sh
git clone --depth=1 https://github.com/Blake-C/wp-foundation-six.git name-of-your-project
```

To start a new project cd into name-of-your-project and delete the .git directory. Then run a new git init.

```sh
cd name-of-your-project
rm -r .git
git init
```

Commit the inital state of the project and push to the remote repo if one exists.

```sh
git add .
git commit -m "Initial Commit"
git push origin master
```

## Docker

WP Foundation Six Developer Framework uses docker for it's server stack, if you use MAMP, XAMP, WAMP, or AMPPS just set your project directory to start under the public_html directory. DO NOT use these docker services/containers in a production environment, these are only meant to support a development workflow.

The ```./docker-compose.yml``` contains the instructions for creating 5 services/containers that will be used as your LEMP stack. Once you install [Docker](https://www.docker.com/) on your host machine run the following command to start the services/containers.

```sh
docker-compose up -d
```

Use the following command to list the all services/containers

```sh
docker container list -a
```

To stop and remove all Docker services/containers

```sh
docker-compose down
```

The default URL for this project will be served under ```http://localhost```, to access phpmyadmin go to ```http://localhost:8000```. I have included one service/container that will allow you to run all the command line tools needed to start up the project. After running ```docker container list -a```, you'll see a service with the image named digitalblake/general-cli. Take the ID for this service/container and run the following command:

```sh
docker exec -it put_the_id_here zsh
```

This will take you into the service/container using ZSH and will give you access to vim, git, Composer, NPM, Bower, WP-CLI, Yarn, and Gulp. This way you don't have to install these CLI tools on your host machine. WARNING: You will be running under root when in this container, never use ```rm -rf``` and be mindful of what you are doing.

## Useful Docker Tips

I usually add the following to my ```~/.bash_profile``` or ```~/.zshrc``` file depending on what system I am using. These functions and alias's are meant to help me quickly run the commands that I use most often with Docker. They might help you as well:

```sh
# Docker Commands
alias dps="docker container list -a --format \"table {{.ID}}\t{{.Image}}\t{{.Status}}\t{{.Ports}}\""
alias dimg="docker image list"
alias dup="docker-compose up -d"
alias ddown="docker-compose down"

# This command is not particularly for this project,
# but it shows the flexibility of docker containers
# to be used in different circumstances
dockit() {
	docker run --rm -it -v $PWD:/var/www/public_html digitalblake/general-cli:0.0.0 zsh
}
```

### General CLI Container Scripts

Along with these useful docker commands that you can add to your host machine, the `general-cli` container has several shell scripts to help you with your WordPress development.

```sh
# When in the general-cli container, running wp-init will setup the project
# without you having to go through the installation process manually.
# wp-init will first run composer install to be sure core WordPress is installed
# then ask you for the basic WordPress setup questions for user, password, email,
# and site name. With that information the script will begin to build the theme
# with npm and gulp then use wp-cli to setup the WordPress database.
#
# It is important to note that this is only for the initial setup of the project.
wp-init

# This command is very basic, it will download the WordPress Theme Unit Test data
# to an xml file, install the import tool and import the data all in one command
# so that you do not need to go out and get the data and import it manually.
wp-theme-unit-data

# A very useful command, wp-db-export will export the data base and ask you for
# the destination address so that it can run a search-replace on the database
# for the next environment the database will be used in. When it asks you for the
# address and you leave it empty, the script will skip the search-replace and will
# export the database to the data/backup directory.
wp-db-export

# When you are done with local development and ready to move the site to production
# you an use the wp-eject command to create a fresh install of WordPress and have it
# copy over your wp-content directory, build the theme, and provide a zip of all this
# ready to be uploaded to production.
wp-eject
```

## MySQL - Databases

To access phpmyadmin go to ```http://localhost:8000``` after starting the docker services/containers and login with the following credentials.

- Server: mysql
- Username: root
- Password: root

This will log you into the phpmyadmin browser interface. When adding or creating a database be sure to set the site url in the options table to serve core WordPress from ```/wp```, the home url will stay at the root level ```/```. When you start up docker it will generate a new database called wp_foundation_six, this is what is setup to be used in the ```./public_html/local-config.php``` file.

## Composer

Now you can run ```composer install``` then ```composer update``` within your ```./public_html directory```. This will install WordPress into the ```./public_html/wp``` directory and install plugins into the ```./public_html/wp-content/plugins``` directory.

The following default plugins will be installed:
- [wordpress-seo](https://wordpress.org/plugins/wordpress-seo/)
- [google-analytics-for-wordpress](https://wordpress.org/plugins/google-analytics-for-wordpress/)
- [redirection](https://wordpress.org/plugins/redirection/)
- [regenerate-thumbnails](https://wordpress.org/plugins/regenerate-thumbnails/)
- [akismet](https://wordpress.org/plugins/akismet/)

Once composer has completed installing WordPress and the default Plugins, change directories to ```cd public_html/wp-content/themes/wp-foundation-six``` then you can run ```npm install```. This will install the node modules so that Gulp can run its tasks. Jump down to the Gulp Tasks section to learn more about the tasks.

## Add/Remove composer packages/modules

To install new WordPress plugins you can use composer to install them so that when another developer downloads the project and runs the composer install command they will have the same WordPress plugins to match your own development environment.

Install existing packages in the composer.json file:

```sh
composer install
```

Add new composer package:

```sh
composer require wpackagist-plugin/name-of-plugin
```

All public WordPress plugins that are listed in the WordPress plugin directory can be installed using composer with the vendor name: ```wpackagist-plugin```. For a full list of public WordPress plugins that can be installed using composer please refer to [wpackagist.org](https://wpackagist.org/).

Remove composer package:

```sh
composer remove wpackagist-plugin/name-of-plugin
```

To update any composer packages that are set to a specific version use:

```sh
composer update
```

The default packages are installed using the most recent versions, you can change this if needed by uninstalling and reinstalled the package to set the version number. Otherwise you can open up the composer.json file and manually set the version number needed.

If you need to include premium plugins in your project that are not listed in the public WordPress plugin directory, then you can either host your own repo of premium plugins and include the path in the composer.json file as long as the project is private on GitHub or wherever you keep your shared code. Alternatively, you can just commit the premium plugins into the project, once again only if your project is private. If your project is not private, do not keep premium plugins in your project repo. You will need to find a different means of storing/sharing premium plugins with your team. You will be subject to the terms and conditions of the premium plugins and your use of them.

## Working with JavaScript

This section is only relevant if you intend to use the built in wp-foundation-six base theme.

The base theme includes the [Gulp](http://gulpjs.com/) task manager that will run a [Webpack](https://webpack.github.io/) task that will use [Babel](https://babeljs.io/) to transpile [ES6/ES2015](https://babeljs.io/docs/learn-es2015/) into ES5. This means you can use ES2015 ```import``` to include modules into your project.

jQuery has been set as a global script for third party WordPress plugins. Since we never know when a WordPress plugin will require jQuery we need to leave it in the global/window scope. When using jQuery within your custom scripts you do not need to ```import``` it in, you can use the ```$``` as you normally would.

The scripts that run through the Gulp tasks will also be subject to [ESLint](http://eslint.org/) for code quality control. This is to keep the project scripts within a set standard for the development team and to catch any errors before the projects goes to production.

To require a new JavaScript package use [NPM](https://www.npmjs.com/) to install it:

```sh
npm install name-of-package --save
```

Or if you have [Yarn](https://www.npmjs.com/package/yarn) installed:

```sh
yarn add name-of-package
```

If the NPM package uses ES2015 module loaders then you can import the package using the name of the package. Otherwise you will need to path your import to the desired script file from within the node_modules directory.

```js
import 'custom-name' from 'name-of-package'
```

or

```js
import '../../../node_modules/name-of-package/js/index.js';
```

Be sure to use ```../``` as many times as you nest directories within the ```theme_components/js``` directory.

If you need to add a new script file to be exported as a new bundle then create your file within the theme_components/js directory and add the name of your file to the scripts-list.js file within that same directory. This file has a const that is imported into the Webpack config as an object of exported bundles.

```js
const scripts_list = {
	'global-scripts': './theme_components/js/global-scripts.js',
	'my-new-scripts': './theme_components/js/my-new-scripts.js'
}
```

## Gulp Tasks

To compile the theme code you can run the ```gulp``` task. This will build the themes JavaScript, SCSS, and Images. The default ```gulp``` task does not persist and will stop once done.

To watch the files for changes as you develop you can run the ```gulp watch``` task.

When you are done building your theme you can run the ```gulp --build``` task. This will create a directory next to the development theme called ```wp-foundation-six-build``` this will only contain the files that should be added to the server. The node_modules, theme_components, and any dot files that are needed for development will not be included within the built theme. Once you upload the built theme to the server you can remove the -build from the end of the theme name so that you can FTP into it and the development version to make updates.

If you want to clean up your development environment of built assets just run the ```gulp clean``` task to delete the built theme, and assets directory.

There are a number of sub tasks that get initiated with the main tasks that can be run individually as needed. All tasks can be found in the ```gulpfile.babel.js``` file.

List of Gulp Tasks:

```sh
gulp # <- same as "gulp build" without hyphens
gulp styles
gulp scripts
gulp images
gulp serve
gulp watch
gulp watch:code # <- only watches scripts and styles
gulp clean
gulp build:code # <- only builds scripts and styles
gulp --build
```

These are not all the tasks, but just a list of the major tasks you might want to run individually to save time. The watch tasks do not work inside of docker services/containers at the moment.

## Unit Test Data

If you need unit test data to work with you can download it from here:

- [Theme Unit Test Data](https://wpcom-themes.svn.automattic.com/demo/theme-unit-test-data.xml)
- [More info can be found here](https://codex.wordpress.org/Theme_Unit_Test)

## What Now?

- In the ```public_html/wp-content/themes/wp-foundation-six/style.css``` file you will need to update the theme name and other settings.
- Update your app icons using [Favicon Generator](http://realfavicongenerator.net/)
- Think about optimizing the load order of your scripts and how you might be able to combine files for fewer http requests.
- Carefully organize your [Sass](http://sass-lang.com/) so that other developers can understand your code.
- Read the [Foundation Documentation](http://foundation.zurb.com/sites/docs/)
- Read the [Sass Documentation](http://sass-lang.com/guide)
- Ask question and contribute ideas!

You can reach me at [@BlakeCerecero](https://twitter.com/BlakeCerecero) on Twitter.
