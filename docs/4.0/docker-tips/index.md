---
layout: page
title: Docker Tips
permalink: /docs/4.0/docker-tips
version: 4.0
order: 5
---

I usually add the following to my `~/.bash_profile` or `~/.zshrc` file depending on what system I am using. These functions and alias's are meant to help me quickly run the commands that I use most often with Docker. They might help you as well:

{% raw %}
```bash
# Docker Commands
alias dps="docker container list -a --format \"table {{.ID}}\t{{.Image}}\t{{.Status}}\t{{.Ports}}\""
alias dimg="docker image list"
alias dup="docker-compose up -d"
alias ddown="docker-compose down"

# This command is not particularly for this project,
# but it shows the flexibility of docker containers
# to be used in different circumstances
dockit() {
	docker run --rm -it -v $PWD:/var/www/public_html digitalblake/general-cli:0.0.4 zsh
}
```
{% endraw %}

### General CLI Container Scripts

Along with these useful docker commands that you can add to your host machine, the `general-cli` container has several shell scripts to help you with your WordPress development.

```bash
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

For the eject script, after you upload the final files to your server you'll have two robots.txt files that will be with the final project. In order for these two work properly on a development server using apache you'll want to open up the `.htaccess` file and replace `put_development_domain` on this line: `RewriteCond %{HTTP_HOST} ^(.*).put_development_domain.[com|net|cloud] [NC]` with your development domain.
