#!/usr/bin/env bash

# ---------------------------------------
#          Virtual Machine Setup
# ---------------------------------------

# Adding multiverse sources.
cat > /etc/apt/sources.list.d/multiverse.list << EOF
deb http://archive.ubuntu.com/ubuntu trusty multiverse
deb http://archive.ubuntu.com/ubuntu trusty-updates multiverse
deb http://security.ubuntu.com/ubuntu trusty-security multiverse
EOF


# Updating packages
apt-get update

# ---------------------------------------
#          Apache Setup
# ---------------------------------------

# Installing Packages
apt-get install -y apache2 libapache2-mod-fastcgi apache2-mpm-worker

# linking Vagrant directory to Apache 2.4 public directory
rm -rf /var/www
ln -fs /vagrant /var/www

# Add ServerName to httpd.conf
echo "ServerName localhost" > /etc/apache2/httpd.conf
# Setup hosts file
VHOST=$(cat <<EOF
<VirtualHost *:80>
  DocumentRoot "/var/www/public"
  ServerName localhost
  <Directory "/var/www/public">
    AllowOverride All
  </Directory>
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-enabled/000-default.conf

# Loading needed modules to make apache work
a2enmod actions fastcgi rewrite
service apache2 reload

# ---------------------------------------
#          PHP Setup
# ---------------------------------------

# Install PHP 5.6
sudo add-apt-repository -y ppa:ondrej/php5-5.6

# Installing packages
apt-get install -y php5 libapache2-mod-php5 php5-mysqlnd php5-curl php5-gd php5-intl php-pear php5-imagick php5-imap php5-mcrypt php5-memcache php5-ming php5-ps php5-pspell php5-recode php5-snmp php5-sqlite php5-tidy php5-xmlrpc php5-xsl php5-apcu

# Creating the configurations inside Apache
cat > /etc/apache2/conf-available/php5-fpm.conf << EOF
<IfModule mod_fastcgi.c>
    AddHandler php5-fcgi .php
    Action php5-fcgi /php5-fcgi
    Alias /php5-fcgi /usr/lib/cgi-bin/php5-fcgi
    FastCgiExternalServer /usr/lib/cgi-bin/php5-fcgi -socket /var/run/php5-fpm.sock -pass-header Authorization

    # NOTE: using '/usr/lib/cgi-bin/php5-cgi' here does not work,
    #   it doesn't exist in the filesystem!
    <Directory /usr/lib/cgi-bin>
        Require all granted
    </Directory>

</IfModule>
EOF

# Enabling php modules
php5enmod mcrypt

# Triggering changes in apache
a2enconf php5-fpm
service apache2 reload

# ---------------------------------------
#          MySQL Setup
# ---------------------------------------

# Setting MySQL root user password root/root
debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'

# Installing packages
apt-get install -y mysql-server mysql-client php5-mysql

# ---------------------------------------
#          PHPMyAdmin setup
# ---------------------------------------

# Default PHPMyAdmin Settings
debconf-set-selections <<< 'phpmyadmin phpmyadmin/dbconfig-install boolean true'
debconf-set-selections <<< 'phpmyadmin phpmyadmin/app-password-confirm password root'
debconf-set-selections <<< 'phpmyadmin phpmyadmin/mysql/admin-pass password root'
debconf-set-selections <<< 'phpmyadmin phpmyadmin/mysql/app-pass password root'
debconf-set-selections <<< 'phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2'

# Install PHPMyAdmin
apt-get install -y phpmyadmin

# Make Composer available globally
ln -s /etc/phpmyadmin/apache.conf /etc/apache2/sites-enabled/phpmyadmin.conf

# Restarting apache to make changes
service apache2 restart



# ---------------------------------------
#       Tools Setup.
# ---------------------------------------
# These are some extra tools that you can remove if you will not be using them 
# They are just to setup some automation to your tasks. 

# Adding NodeJS from Nodesource. This will Install NodeJS Version 5 and npm
curl -sL https://deb.nodesource.com/setup_5.x | sudo -E bash -
sudo apt-get install -y nodejs

# Installing Bower and Gulp
npm install -g bower gulp

# Installing GIT
apt-get install -y git


# Begin mailcatcher

sudo apt-get update
sudo apt-get install -y build-essential software-properties-common
sudo apt-get install -y libsqlite3-dev ruby1.9.1-dev

# Install Mailcatcher as a Ruby gem
sudo gem install mime-types --version "< 3"
sudo gem install --conservative mailcatcher
 
# Run mailcatcher
mailcatcher --http-ip=0.0.0.0
# config mailcatcher to run service white php 

# Add config to mods-available for PHP
# -f flag sets "from" header for us

echo "sendmail_path = /usr/bin/env $(which catchmail) -f test@local.dev" | sudo tee /etc/php5/mods-available/mailcatcher.ini

# Enable sendmail config for all php SAPIs (apache2, fpm, cli)
sudo php5enmod mailcatcher



# Restart PHP-FPM if using FPM
sudo service php5-fpm restart

# End mailcatcher 

# Begin apc cache 

sudo apt-get install gcc make autoconf libc-dev pkg-config
sudo pecl5.X-sp install apcu-4.0.11

sudo bash -c "echo extension=apcu.so > /etc/php5/mods-available/apcu.ini"

# End ap cache



# Begin rabbitmq


# wget https://www.rabbitmq.com/rabbitmq-signing-key-public.asc

# sudo apt-key add rabbitmq-signing-key-public.asc


# sudo apt-get update

# sudo apt-get install rabbitmq-server


#sudo rabbitmq-plugins enable rabbitmq_management



# rabbitmqctl add_user admin admin

# rabbitmqctl set_user_tags admin administrator

# rabbitmqctl set_permissions -p / admin ".*" ".*" ".*"

# End rabbitmq


# install drupal 8

# apt-get install git drush -y


# cd /var/www/drupal
# drush dl drupal-8

# mv drupal-8.0.1/* .
# rm -rf drupal-8.0.1/

# cd sites/default
# cp default.settings.php settings.php
# cp default.services.yml services.yml

# mkdir files/
# chmod a+w * 

# cd /var/www/
# chown -R www-data:www-data drupal/

# Restart Apache if using mod_php
sudo service apache2 restart


# Install Composer
curl -s https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

#!/bin/bash
 
