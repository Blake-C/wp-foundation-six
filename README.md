# WP Foundation Six Theme Developer Framework

The WordPress Foundation 6 Theme Developer Framework is meant to be a starting point for developers to create projects without having third party code/modules within their git repo. This project uses composer to install WordPress and default plugins as project dependencies. The base theme uses NPM and Bower to install dependencies, and Gulp as the build system. Gulp also uses [Babel](http://babeljs.io/) and [Webpack](https://webpack.github.io/) to transpile ES6 to ES5 so that you can use the latest [ECMAScript](https://en.wikipedia.org/wiki/ECMAScript) syntax.


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

Now you can run ```composer install``` within your name-of-your-project directory. This will install WordPress into the wp directory and install plugins into the wp-content/plugins directory.

The following default plugins will be installed:
- wordpress-seo
- google-analytics-for-wordpress
- redirection
- regenerate-thumbnails
- akismet

Once composer has completed installing WordPress and the default Plugins, change directories to ```cd wp-content/themes/wp-foundation-six``` then you can run ```npm install```. This will install the node modules and bower components. When npm install is complete a post install script in the package.json file will automatically run bower install for you.

## Unit Test Data

If you need unit test data to work with you can download it from here:

- [Theme Unit Test Data](https://wpcom-themes.svn.automattic.com/demo/theme-unit-test-data.xml)
- [More info can be found here](https://codex.wordpress.org/Theme_Unit_Test)

## What Now?

- In the ```wp-content/themes/wp-foundation-six/theme-components/sass/global-styles.scss``` file you will need to update the theme name and other settings.
- Update your app icons using [Favicon Generator](http://realfavicongenerator.net/)
- Think about optimizing the load order of your scripts and how you might be able to combine files for fewer http requests.
- Carefully organize your [Sass](http://sass-lang.com/) so that other developers can understand your code.
- Read the [Foundation Documentation](http://foundation.zurb.com/sites/docs/)
- Read the [Sass Documentation](http://sass-lang.com/guide)
- Ask question and contribute ideas!

You can reach me at [@BlakeCerecero](https://twitter.com/BlakeCerecero) on Twitter.