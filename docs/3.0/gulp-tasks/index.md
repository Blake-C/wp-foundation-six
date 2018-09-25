---
layout: page
title: Gulp Tasks
permalink: /docs/3.0/gulp-tasks/
version: 3.0
order: 6
---

To compile the theme code you can run the ```gulp``` task. This will build the themes JavaScript, SCSS, and Images. The default ```gulp``` task does not persist and will stop once done.

To watch the files for changes as you develope you can run the ```gulp watch``` task.

If you have a local development environment setup you can add your local domain as the proxy_target const at the top of the ```gulpfile.babel.js``` file. Your local domain should not contain "http://" or the ending "/". Then you can run ```gulp serve``` to start up the local dev server to have autoreload and style injection when developing in the browser.

The line to change proxy_target will look like the follow:

```js
// BrowserSync Dev URL to reload
const proxy_target = 'wp-foundation-six';
```

When you are done building your theme you can run the ```gulp --build``` task. This will create a directory next to the development theme called ```wp-foundation-six-build``` this will only contain the files that should be added to the server. The node_modules, theme_components, and any dot files that are needed for development will not be included within the built theme. Once you upload the built theme to the server you can remove the -build from the end of the theme name so that you can FTP into it and the development version to make updates.

If you want to clean up your development environment of built assets just run the ```gulp clean``` task to delete the built theme, and assets directory.

There are a number of sub tasks that get initiated with the main tasks that can be run individually as needed. All tasks can be found in the ```gulpfile.babel.js``` file.

List of Gulp Tasks:

```bash
gulp # <- same as "gulp build" without hyphens
gulp styles
gulp scripts
gulp images
gulp fonts
gulp icons
gulp serve
gulp watch
gulp clean
gulp --build
```

These are not all the commands, but just a list of the major tasks you might want to run individually to save time.
