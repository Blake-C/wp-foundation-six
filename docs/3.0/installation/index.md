---
layout: page
title: Installation
permalink: /docs/3.0/installation/
version: 3.0
order: 3
---

Clone the project to your local machine to start a new project.

```bash
git clone --depth=1 --branch=master https://github.com/Blake-C/wp-foundation-six.git name-of-your-project
```

To start a new project cd into name-of-your-project and delete the .git directory. Then run a new git init.

```bash
cd name-of-your-project
rm -rf .git
git init
```

Commit the inital state of the project and push to the remote repo if one exists.

```bash
git add .
git commit -m "Initial Commit"
git push origin master
```

Now you can run ```composer install``` then ```composer update``` within your name-of-your-project directory. This will install WordPress into the wp directory and install plugins into the wp-content/plugins directory.

The following default plugins will be installed:
- [wordpress-seo](https://wordpress.org/plugins/wordpress-seo/)
- [google-analytics-for-wordpress](https://wordpress.org/plugins/google-analytics-for-wordpress/)
- [redirection](https://wordpress.org/plugins/redirection/)
- [regenerate-thumbnails](https://wordpress.org/plugins/regenerate-thumbnails/)
- [akismet](https://wordpress.org/plugins/akismet/)
- [members](https://wordpress.org/plugins/members/)

Once composer has completed installing WordPress and the default Plugins, change directories to ```cd wp-content/themes/wp-foundation-six``` then you can run ```npm install```. This will install the node modules so that Gulp can run its tasks. Jump down to the Gulp Tasks section to learn more about the tasks.
