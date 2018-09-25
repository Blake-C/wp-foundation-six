---
layout: page
title: Composer
permalink: /docs/3.0/add-remove-compose-packages/
version: 3.0
order: 4
---

To install new WordPress plugins you can use composer to install them so that when another developer downloads the project and runs the composer install command they will have the same WordPress plugins to match your own development environment.

Install existing packages in the composer.json file:

```bash
composer install
```

Add new composer package:

```bash
composer require wpackagist-plugin/name-of-plugin
```

All public WordPress plugins that are listed in the WordPress plugin directory can be installed using composer with the vendor name: ```wpackagist-plugin```. For a full list of public WordPress plugins that can be installed using composer please refer to [wpackagist.org](https://wpackagist.org/).

Remove composer package:

```bash
composer remove wpackagist-plugin/name-of-plugin
```

To update any composer packages that are set to a specific version use:

```bash
composer update
```

The default packages are installed using the most recent versions, you can change this if needed by uninstalling and reinstalled the package to set the version number. Otherwise you can open up the composer.json file and manually set the version number needed.

If you need to include premium plugins in your project that are not listed in the public WordPress plugin directory, then you can either host your own repo of premium plugins and include the path in the composer.json file as long as the project is private on GitHub or wherever you keep your shared code. Alternatively, you can just commit the premium plugins into the project, once again only if your project is private. If your project is not private to your team then do not keep premium plugins pathed or within the project. You will need to find a different means of storing/sharing premium plugins with your team. You will be subject to the terms and conditions of the premium plugins and your use of them.
