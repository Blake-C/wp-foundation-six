---
layout: page
title: Composer
permalink: /docs/5.1/composer
version: 5.1
order: 7
---

Now you can run `composer install` then `composer update` within your `./public_html directory`. This will install WordPress into the `./public_html/wp` directory and install plugins into the `./public_html/wp-content/plugins` directory.

The following default plugins will be installed:
- [wordpress-seo](https://wordpress.org/plugins/wordpress-seo/)
- [google-analytics-for-wordpress](https://wordpress.org/plugins/google-analytics-for-wordpress/)
- [redirection](https://wordpress.org/plugins/redirection/)
- [regenerate-thumbnails](https://wordpress.org/plugins/regenerate-thumbnails/)
- [akismet](https://wordpress.org/plugins/akismet/)

Once composer has completed installing WordPress and the default Plugins, change directories to `cd public_html/wp-content/themes/wp-foundation-six` then you can run `npm install`. This will install the node modules so that Gulp can run its tasks. Jump down to the Gulp Tasks section to learn more about the tasks.

### Add/Remove composer packages/modules

To install new WordPress plugins you can use composer to install them so that when another developer downloads the project and runs the composer install command they will have the same WordPress plugins to match your own development environment.

Install existing packages in the composer.json file:

```bash
composer install
```

Add new composer package:

```bash
composer require wpackagist-plugin/name-of-plugin
```

All public WordPress plugins that are listed in the WordPress plugin directory can be installed using composer with the vendor name: `wpackagist-plugin`. For a full list of public WordPress plugins that can be installed using composer please refer to [wpackagist.org](https://wpackagist.org/).

Remove composer package:

```bash
composer remove wpackagist-plugin/name-of-plugin
```

To update any composer packages that are set to a specific version use:

```bash
composer update
```

The default packages are installed using the most recent versions, you can change this if needed by uninstalling and reinstalled the package to set the version number. Otherwise you can open up the composer.json file and manually set the version number needed.

If you need to include premium plugins in your project that are not listed in the public WordPress plugin directory, then you can either host your own repo of premium plugins and include the path in the composer.json file as long as the project is private on GitHub or wherever you keep your shared code. Alternatively, you can just commit the premium plugins into the project, once again only if your project is private. If your project is not private, do not keep premium plugins in your project repo. You will need to find a different means of storing/sharing premium plugins with your team. You will be subject to the terms and conditions of the premium plugins and your use of them.

