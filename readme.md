# Message Board

Message board portal based on [Laravel framework](http://www.laravel.com)

## Install Dependencies

To run the application, you will need

* PHP >= 7.0, as well as few PHP extensions (PDO, OpenSSL, MbString)
* Composer
* Apache >= 2.4
* MySQL >= 5.6 / MariaDB >= 15

### Install Apache on Linux (Ubuntu 16.04)

`$ sudo apt-get update`

`$ sudo apt-get install apache2`

 Next, we will add a single line to the `/etc/apache2/apache2.conf` file to suppress a warning message.

Open up the main configuration file with your text edit:

`$ sudo nano /etc/apache2/apache2.conf`

Inside, at the bottom of the file, add a ServerName directive, pointing to your primary domain name. If you do not have a domain name associated with your server:

    ServerName example.com
    ServerAlias public.example.com
    ServerAlias private.example.com

Restart Apache to implement your changes:

`$ sudo systemctl restart apache2`

### Install MySQL on Linux (Ubuntu 16.04)

Again, we can use apt to acquire and install our software:

`$ sudo apt-get install mysql-server`

During the installation, your server will ask you to select and confirm a password for the MySQL "root" user. This is an administrative account in MySQL that has increased privileges. Think of it as being similar to the root account for the server itself (the one you are configuring now is a MySQL-specific account, however). Make sure this is a strong, unique password, and do not leave it blank.

When the installation is complete, we want to run a simple security script that will remove some dangerous defaults and lock down access to our database system a little bit. Start the interactive script by running:

`$ sudo mysql_secure_installation`

For the rest of the questions, you should press Y and hit the Enter key at each prompt. This will remove some anonymous users and the test database, disable remote root logins, and load these new rules so that MySQL immediately respects the changes we have made.

At this point, your database system is now set up and we can move on.

### Install PHP on Linux (Ubuntu 16.04)

We can once again leverage the apt system to install our components. We're going to include some helper packages as well, so that PHP code can run under the Apache server and talk to our MySQL database:

`$ sudo apt-get install php libapache2-mod-php php-mcrypt php-mysql php-curl php-gd`
This should install PHP without any problems. We'll test this in a moment.

In most cases, we'll want to modify the way that Apache serves files when a directory is requested. Currently, if a user requests a directory from the server, Apache will first look for a file called index.html. We want to tell our web server to prefer PHP files, so we'll make Apache look for an index.php file first.

To do this, type this command to open the dir.conf file in a text editor with root privileges:

`$ sudo nano /etc/apache2/mods-enabled/dir.conf`

After this, we need to restart the Apache web server in order for our changes to be recognized. You can do this by typing this:

`$ sudo systemctl restart apache2`

### Install Composer on Linux (Ubuntu 16.04)

`$ curl -sS https://getcomposer.org/installer | php`

`$ mv composer.phar /usr/local/bin/composer`

Now just run `composer` in order to run Composer

## Setup and run application

Unzip the project files in the folder `/var/www/example.com`

grant appropriate permissions to the directories:

`$ sudo chown -R $USER:$USER /var/www/example.com`

`$ sudo chmod -R 755 /var/www/example.com`

`$ sudo chmod -R 777 /var/www/example.com/storage`

install all the dependencies through the composer package manager

`$ cd /var/www/example.com`

`$ composer install`

create the mysql database on the system

`$ mysql -u root -p`

`mysql> create database board;`

`mysql> exit;`

copy and open the application config file

`$ cp .env.example .env`

`$ vim .env`

set the following variables:

`APP_ENV=production`

`APP_DEBUG=false`

`APP_URL=<your public URL>`

`SESSION_DOMAIN=<prefix the above URL with '.'>`

`DB_DATABASE=<your mysql database created>`

`DB_USERNAME=<your mysql username>`

`DB_PASSWORD=<your mysql password>`

`MAIL_HOST=<sendgrid host>`

`MAIL_USERNAME=<sendgrid username>`

`MAIL_PASSWORD=<sendgrid password>`

run the migration to import the necessary table structure

`$ php artisan migrate --seed`

create a symbolic link from "public/storage" folder to "storage/app/public"

`$ php artisan storage:link`

create the virtual host to the public folder

`$ sudo cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/example.com.conf`

`$ sudo vim /etc/apache2/sites-available/example.com.conf`

put the following content in the file:

    <VirtualHost *:80>
        ServerAdmin webmaster@localhost
        DocumentRoot /var/www/example.com/public
        ServerName example.com
        ServerAlias public.example.com
        ServerAlias private.example.com
        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
    </VirtualHost>

enable the new virtual host:

`$ sudo a2ensite example.com.conf`

restart Apache to make these changes take effect:

`$ sudo systemctl restart apache2`

check the application:

`http://example.com`

## Run Tests

Inorder to run the tests, first need to install PHPUnit & Laravel Dusk

#### Mac OSX / Linux

`$ wget https://phar.phpunit.de/phpunit.phar`

`$ chmod +x phpunit.phar`

`$ sudo mv phpunit.phar /usr/local/bin/phpunit`

`php artisan dusk`


