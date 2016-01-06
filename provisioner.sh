#! /usr/bin/env bash

# https://serversforhackers.com/getting-off-of-mamp/
# http://askubuntu.com/questions/19127/how-to-access-phpmyadmin-after-installation
# http://fideloper.com/ubuntu-install-php54-lamp

# Variables
DBNAME=default_db
DBUSER=root
DBPASSWD=root

# Get environment
UNAMESTR=`uname`

if [[ "$UNAMESTR" == "Linux" ]]; then

	# Install php 5.5:
	sudo apt-get update
	sudo apt-get install -y python-software-properties
	sudo add-apt-repository ppa:ondrej/php5
	sudo apt-get update
	sudo apt-get install -y php5

	# Install Debconf Utils:
	sudo apt-get install debconf-utils -y

	debconf-set-selections <<< "mysql-server mysql-server/root_password password $DBPASSWD"
	debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $DBPASSWD"
	debconf-set-selections <<< "phpmyadmin phpmyadmin/dbconfig-install boolean true"
	debconf-set-selections <<< "phpmyadmin phpmyadmin/app-password-confirm password $DBPASSWD"
	debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/admin-pass password $DBPASSWD"
	debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/app-pass password $DBPASSWD"
	debconf-set-selections <<< "phpmyadmin phpmyadmin/reconfigure-webserver multiselect none"

	# Install Apache:
	sudo apt-get install -y apache2 apache2-utils
	sudo apt-get install -y libapache2-mod-php5
	echo "ServerName localhost" > "/etc/apache2/conf-available/fqdn.conf"
	a2enconf fqdn
	a2enmod rewrite
	a2dissite 000-default.conf

	# Apache / Virtual Host Setup
	echo "----- Provision: Install Host File..."
	cp /var/www/hostfile /etc/apache2/sites-available/project.conf
	a2ensite project.conf

	# Cleanup
	apt-get -y autoremove

	# Restart Apache
	echo "----- Provision: Restarting Apache..."
	service apache2 restart

	# Install MySQL:
	sudo apt-get install -y mysql-server
	sudo apt-get install -y php5-mysql

	# Install PHPMYADMIN:
	sudo apt-get install -y phpmyadmin

	# Setting up our MySQL user and db
	mysql -uroot -p$DBPASSWD -e "CREATE DATABASE $DBNAME"
	mysql -uroot -p$DBPASSWD -e "grant all privileges on $DBNAME.* to '$DBUSER'@'localhost' identified by '$DBPASSWD'"

	# Allow phpmyadmin access through host browser:
	sudo sh -c "echo "Include /etc/phpmyadmin/apache.conf" >> /etc/apache2/apache2.conf"
	sudo /etc/init.d/apache2 restart

	# Enabling mod-rewrite
	a2enmod rewrite > /dev/null 2>&1
	 
	# Allowing Apache override to all
	sed -i "s/AllowOverride None/AllowOverride All/g" /etc/apache2/apache2.conf

	# Install CURL
	echo 
	echo "***** Installing CURL *****"
	sudo apt-get install -y curl

	# Install Git:
	echo 
	echo "***** Installing Git *****"
	sudo apt-get install -y git

	#Composer
	echo 
	echo "***** Installing Composer *****"
	curl -Ss https://getcomposer.org/installer | php > /dev/null
	chmod +x "composer.phar"
	mv "composer.phar" "/usr/bin/composer"

	# WP-CLI Install
	echo 
	echo "***** Installing WP-CLI *****"
	git clone "https://github.com/wp-cli/wp-cli.git" "/srv/www/wp-cli"
	cd /srv/www/wp-cli
	composer install
	ln -sf "/srv/www/wp-cli/bin/wp" "/usr/local/bin/wp"

	# Set up WordPress
	cd /var/www/
	rm -rf "html"
	composer install
else
	echo "This is not the correct environment for this script. Please make sure you are on Linux (Ubuntu)"
fi