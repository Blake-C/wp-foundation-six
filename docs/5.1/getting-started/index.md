---
layout: page
title: Getting Started
permalink: /docs/5.1/getting-started/
version: 5.1
order: 1
---

The WordPress Foundation 6 Developer Framework is meant to be a starting point for developers to create projects without having third party code/modules within their git repo. This project uses [Composer](https://getcomposer.org/) to install [WordPress](https://wordpress.org/) and default plugins as project dependencies. The base theme uses [NPM](https://www.npmjs.com/) to install script dependencies, and [Gulp](http://gulpjs.com/) as the build system. Gulp also uses [Babel](http://babeljs.io/) and [Webpack](https://webpack.github.io/) to transpile ES6/ES2015 to ES5 so that you can use the latest [ECMAScript](https://en.wikipedia.org/wiki/ECMAScript) syntax.

## TL;DR

Starting up:

- `git clone https://github.com/Blake-C/wp-foundation-six.git your-project-name`
- `cd your-project-name`
- `docker-compose up -d`
- `docker container list -a`
	- get the id (############) of the general-cli container
- `docker exec -it ############ zsh`
- `composer install`
- `composer update`
- `cd wp-content/themes/wp-foundation-six/`
- `npm install`
- `gulp`
- site will load under http://localhost
	- database under http://localhost:8000
		- server: mysql
		- user: root
		- password: root

When done:

- `exit`
- `docker-compose down`

