---
layout: page
title: JavaScript
permalink: /docs/5.1/javascript
version: 5.1
order: 8
---

This section is only relevant if you intend to use the built in wp-foundation-six base theme.

The base theme includes the [Gulp](http://gulpjs.com/) task manager that will run a [Webpack](https://webpack.github.io/) task that will use [Babel](https://babeljs.io/) to transpile [ES6/ES2015](https://babeljs.io/docs/learn-es2015/) into ES5. This means you can use ES2015 `import` to include modules into your project.

jQuery has been set as a global script for third party WordPress plugins. Since we never know when a WordPress plugin will require jQuery we need to leave it in the global/window scope. When using jQuery within your custom scripts you do not need to `import` it in, you can use the `$` as you normally would.

The scripts that run through the Gulp tasks will also be subject to [ESLint](http://eslint.org/) for code quality control. This is to keep the project scripts within a set standard for the development team and to catch any errors before the projects goes to production.

To require a new JavaScript package use [NPM](https://www.npmjs.com/) to install it:

```bash
npm install name-of-package --save
```

If the NPM package uses ES2015 module loaders then you can import the package using the name of the package. Otherwise you will need to path your import to the desired script file from within the node_modules directory.

```js
import 'custom-name' from 'name-of-package'
```

or

```js
import 'name-of-package/js/index.js';
```

If you need to add a new script file to be exported as a new bundle then create your file within the theme_components/js directory and add the name of your file to the scripts-list.js file within that same directory. This file has a const that is imported into the Webpack config as an object of exported bundles.

```js
// public_html/wp-content/themes/wp-foundation-six/theme_components/js/scripts-list.js

const scriptsList = {
	'global-scripts': './theme_components/js/global-scripts.js',
	'my-new-scripts': './theme_components/js/my-new-scripts.js'
}
```

If you or any third part scripts need [Modernizr](https://modernizr.com/) feature detects you'll want to add the feature you want to check to the modernizr-feature-detects.js file. For a list of proper feature detects you'll want to look at this list of [Modernizr configs](https://github.com/Modernizr/Modernizr/blob/master/lib/config-all.json). This file is pulled into the webpack.config.babel.js as an array for a custom modernizr build.

```js
// public_html/wp-content/themes/wp-foundation-six/theme_components/js/modernizr-feature-detects.js

const modernizrFeatureDetects = [
	'css/animations',
	'css/backgroundsize',
	'css/transforms',
	'css/transforms3d',
	'css/transitions',
	'svg'
];

export default modernizrFeatureDetects;
```
