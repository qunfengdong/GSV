# Environment Construction Tutorial
* Credit to [Jiawei Li](17818521030@163.com)

To run GSV and mGSV, you need to install **PHP5.3.20 or higher but no more than PHP5.50 + Apache or Nginx + MySQL** and make sure that **PHP has the MySQL extension and GD extension enabled**. Because mGSV needs to use MySQL extensions to operate on MySQL, store collinear data and use the GD library to draw the picture.

If your existing php version is php7 or is not installed PHP, you should build an environment that can use PHP5 because PHP5 and PHP7 have big differences, PHP7 has abandoned some extension libraries. For example, the mysql extension in PHP5 has been deprecated in PHP7 and replaced with the mysqli extension. This will causes a series of mysql extension functions in the GSV and mGSV script code to be unavailable, causing an error.

The following is a tutorial on configuring the environment required to run the GSV and mGSV in **CentOS**.

* **Note: Requires root privileges**

## Section I: Install Nginx

* Install gcc and g++
```bash
yum -y install gcc automake autoconf libtool make
yum install gcc gcc-c++
```
* Install PCRE
```bash
cd /usr/local/src
wget ftp://ftp.csx.cam.ac.uk/pub/software/programming/pcre/pcre-8.39.tar.gz
tar -xzvf pcre-8.39.tar.gz
cd pcre-8.39
./configure
make
make install
```
* Install zlib
```bash
cd /usr/local/src
wget http://zlib.net/zlib-1.2.11.tar.gz
tar -xzvf zlib-1.2.11.tar.gz
cd zlib-1.2.11
./configure
make
make install
```
* Install Nginx
```bash
cd /usr/local/src
wget http://nginx.org/download/nginx-1.1.10.tar.gz
tar -zxvf nginx-1.1.10.tar.gz
cd nginx-1.1.10
./configure
make
make install
```
* Configure Nginx
* Because I installed Apache before and Apache uses port 80. So I configured Nginx to use port 8089.

```bash
vim /usr/local/nginx/conf/nginx.conf
```

![nginxConfig](https://github.com/qunfengdong/GSV/blob/master/img/nginxConfig.png)

* Running Nginx
```bash
/usr/local/nginx/sbin/nginx -c /usr/local/nginx/conf/nginx.conf

```
* Put the web file in /usr/local/nginx/html/ . You can now successfully access the web page in the browser. (i.e., http://YOUR_IP:8089/)
* You will see the following:

![nginxFinish](https://github.com/qunfengdong/GSV/blob/master/img/nginxFinish.png)

## Section II: Install PHP
* Install ibpng and freetype
```bash
conda install -c conda-forge libpng
conda install -c conda-forge freetype
```
* Install GD library
```bash
wget https://github.com/libgd/libgd/releases/download/gd-2.2.4/libgd-2.2.4.tar.gz
```
```bash
tar -xzvf libgd-2.2.4.tar.gz
cd libgd-2.2.4
./configure --prefix=/usr/local/gd2 --with-png --with-freetype
make
make install
```
* Download the required PHP version
```bash
wget http://museum.php.net/php5/php-5.3.20.tar.gz
```
* Compile PHP
```bash
tar -xzvf php-5.3.20.tar.gz
cd php-5.3.20
./configure --enable-fpm --enable-mysqlnd --with-mysql=/opt/lampp/ --without-sqlite --without-pdo-sqlite --with-gd --with-freetype-dir=/usr/include/freetype2/freetype/
make
make install
```
* Obtain and move configuration files to their correct locations
```bash
cp php.ini-development /usr/local/php-5.3.20/php.ini
```
* Load up php.ini
```bash
vim php.ini
```
* Open the mysql and gd extensions. Find and modify the following:

![phpModify_1](https://github.com/qunfengdong/GSV/blob/master/img/phpModify_1.png)

* Locate cgi.fix_pathinfo= and modify it as follows:

![phpModify_2](https://github.com/qunfengdong/GSV/blob/master/img/phpModify_2.png)

## Section III: Configure Nginx and php-fpm so that web pages can use php5 that you just installed

* Obtain and move php-fpm.conf to their correct locations
```bash
cp /usr/local/etc/php-fpm.conf.default /usr/local/sbin/php-fpm.conf

```
* Enter **/usr/local/sbin** and you should see php-fpm and php-fpm.conf
```bash
cd /usr/local/sbin
```
![phpModify_3](https://github.com/qunfengdong/GSV/blob/master/img/phpModify_3.png)
* Modify the php-fpm.conf file

![phpModify_4](https://github.com/qunfengdong/GSV/blob/master/img/phpModify_4.png)

* Running php-fpm
```bash
/usr/local/sbin/php-fpm
```
* Modify the nginx.conf file
```bash
cd /usr/local/nginx/conf
vim nginx.conf
```
![phpModify_5](https://github.com/qunfengdong/GSV/blob/master/img/phpModify_5.png)

* Restart the Nginx
```bash
/usr/local/nginx/sbin/nginx -s reload
```
* Write a PHP script to test if the configuration is successful
```bash
cd /usr/local/nginx/html/
vim phptest.php
```
input:
```
<?php
phpinfo();
?>
```
* Access phptest.php scripts through your browser (i.e., http://YOUR_IP:8089/phptest.php)
* Displays this content indicating that the configuration was successful.
![phpFinal](https://github.com/qunfengdong/GSV/blob/master/img/phpFinal.png)


# GSV Installation Guide

## Section I: System Requirements

The current version of Genome Synteny Viewer was only tested on Ubuntu 10.04 OS. The minimum requirements include: 
* Apache 1.3 or higher (http://www.apache.org)
* PHP 5.3.20 or higher but no more than PHP5.50 (http://www.php.net/)
* MySQL 5.0 or higher (http://dev.mysql.com/)
* GD library. (http://php.net/manual/en/book.image.php)

NOTE：PHP must have the MySQL extension and GD extension enabled

If you successfully completed the above Environment Construction Tutorial, you have everything installed.

## Section II: MySQL Database Setup

GSV requires a MySQL database to store data. Listed below are steps to create a user, database, and 2 tables within the database

1. Log into MySQL, replace <password> with root password
```shell
shell> mysql -u root -p <password>
```

2. Create 'gsv' database
```shell
mysql> CREATE DATABASE gsv;
```

3. Create a user 'gsv_user'
```shell
mysql> CREATE USER 'gsvuser'@'localhost' IDENTIFIED BY 'gsvpass';
```

4. Set privileges to 'gsv_user' to use database 
```shell
mysql> GRANT SELECT, INSERT, CREATE, DROP ON gsv.* TO 'gsvuser'@'localhost';
```

5. Create table "userinfo" in 'gsv' database by executing the following MySQL command
```shell
mysql> use gsv;
mysql> CREATE TABLE IF NOT EXISTS `userinfo` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`email` text NOT NULL,
	`hash` text NOT NULL,
	`synfilename` text NOT NULL,
	`annfilename` text NOT NULL,
	`url` text NOT NULL,
	`session_id` text NOT NULL,
	`annImage`   int(5) NOT NULL,
	`create_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
	) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
```

If you use different database settings, please refer to the MySQL document for instructions on how to configure the database.

## Section III: Set up the Genome Synteny Viewer

1. Download the source code from GSV website http://bioinfo.lumc.edu/gsv/software.php

2. Unzip the file gsv.v1.2.tar.gz, this should create a folder called 'gsv'.
```shell
shell> tar zxvf gsv.v1.2.tar.gz
```

3. Move the folder 'gsv' to DocumentRoot of Apache web server. By default, the DocumentRoot of Apache is /var/www/, speak to system administrator to know the exact DocumentRoot.
```shell
shell> mv gsv /var/www/.
```
	
4. Enter 'gsv' directory and you should see another directory called 'syn'. Execute a Linux command to change permission for 'syn' folder. It has to be world accessible to store the uploaded files.
```shell
shell> cd /var/www/gsv
shell> chmod -R 777 syn
```

5. If you have setup MySQL database name, user and password as mentioned in STEP II, you can skip this step.  However, if your MySQL setting is different, you must open the file 'dbtools.php' in 'gsv' directory with any text editor you are comfortable with (e.g., pico, emacs, or vi), and modify lines 3, 7, 8, and 9 to change the variables $database_host, $database_name, $database_user, and $database_password.

6. Under 'gsv' folder you should see a file called 'Arial.tff', Copy it to '/usr/share/fonts/truetype/.', you may need the sudo privilege, talk to your system administrator if necessary.
```shell
shell> cp Arial.tff /usr/share/fonts/truetype/.
```

7. Cleanup scripts are provided to drop database synteny and annotation tables, remove entries from database table 'userinfo' and delete folder containing image files which are older than 60 days. This task is accomplished by cron job to run the cleanup script everyday. To create a cron job, use the command below
```shell
shell> crontab -e
```

At the last line of crontab, copy and paste the line below, and provide the exact path to gsv/cleanup.php
```shell
30 04 * * * /var/www/gsv/cleanup.php
```

The script cleanup.php will be executed at 4.30 AM everyday morning.

8. GSV uses mail function from PHP to send email to users. Speak to your system administrator to provide required information in PHP configuration file called 'php.ini'.

9. This completes installation, you can now open Install/index.php (i.e., http://<YOUR_SERVER_DOMAIN_NAME>/gsv/Install/), which verifies prerequisites, database setup and installation. YOUR_SERVER_DOMAIN_NAME refers to the domain name of your server. You should see the successfully installed GSV as the following:

![GSVfinish_1](https://github.com/qunfengdong/GSV/blob/master/img/GSVfinish_1.png)
![GSVfinish_2](https://github.com/qunfengdong/GSV/blob/master/img/GSVfinish_2.png)


### Section IV: Additional notes:

1. For trouble shooting, please use contact details at http://bioinfo.lumc.edu/gsv/support.php 
2. Refer to ARCHITECTURE.txt file to understand the architecture of GSV.
3. Read FAQs at http://bioinfo.lumc.edu/gsv/faq.php 

