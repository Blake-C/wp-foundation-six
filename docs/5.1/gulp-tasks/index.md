---
layout: page
title: Gulp Tasks
permalink: /docs/5.1/gulp-tasks
version: 5.1
order: 9
---

To compile the theme code you can run the `gulp` task. This will build the themes JavaScript, SCSS, and Images. The default `gulp` task does not persist and will stop once done.

To watch the files for changes as you develop you can run the `gulp watch` task.

When you are done building your theme you can run the `gulp --build` task. This will create a directory next to the development theme called `wp-foundation-six-build` this will only contain the files that should be added to the server. The node_modules, theme_components, and any dot files that are needed for development will not be included within the built theme. Once you upload the built theme to the server you can remove the -build from the end of the theme name so that you can FTP into it and the development version to make updates.

If you want to clean up your development environment of built assets just run the `gulp clean` task to delete the built theme, and assets directory.

There are a number of sub tasks that get initiated with the main tasks that can be run individually as needed. All tasks can be found in the `gulpfile.babel.js` file.

List of Gulp Tasks:

```bash
gulp # <- same as "gulp build" without hyphens
gulp styles
gulp scripts
gulp images
gulp watch
gulp watch:code # <- only watches scripts and styles
gulp serve # <- doesn't work while running in docker
gulp clean
gulp build:code # <- only builds scripts and styles
gulp --build
```

These are not all the tasks, but just a list of the major tasks you might want to run individually to save time.

Regarding `gulp serve`, this task will not work while running within the docker general cli container/service. If you install node, npm, and gulp on your host machine this task can be ran from your host machine and the project served from docker. If you have run any of the style tasks from with in the docker container/service, you might need to run `npm rebuild node-sass` from the host machine if you start compiling styles from outside the general cli container. Similar to the serve task any gulp notifications will only work when running gulp on your host machine as notifications can not be passed from within the docker container/service to the host machine.
