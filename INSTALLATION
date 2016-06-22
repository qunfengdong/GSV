System Requirements
-------------------

The current version of Genome Synteny Viewer was only tested on Ubuntu 10.04 OS. The minimum requirements include: 
- Apache 1.3 or higher (http://www.apache.org)
- PHP 5.2 or higher (http://www.php.net/)
- MySQL 5.0 or higher (http://dev.mysql.com/)
- GD library. (http://php.net/manual/en/book.image.php)

Section I: Install Prerequisites
--------------------------------

On our Ubuntu OS, Apache, PHP, GD library and MySQL was installed using apt-get. The commands are listed below. You can also use yum, rpm or dpkg etc depending on the operating system, speak to your systems administrator about it.
	shell> sudo apt-get install apache2
	shell> sudo apt-get install php5
	shell> sudo apt-get install libapache2-mod-php5
	shell> sudo apt-get install mysql-server
	shell> sudo apt-get install php5-mysql
	shell> sudo apt-get install php5-gd

Section II: MySQL Database Setup
--------------------------------

GSV requires a MySQL database to store data. Listed below are steps to create a user, database, and 2 tables within the database

1. Log into MySQL, replace <password> with root password
	shell> mysql -u root -p <password>

2. Create 'gsv' database
	mysql> CREATE DATABASE gsv;

3. Create a user 'gsv_user'
	mysql> CREATE USER 'gsvuser'@'localhost' IDENTIFIED BY 'gsvpass';


4. Set privileges to 'gsv_user' to use database 
	mysql> GRANT SELECT, INSERT, CREATE, DROP ON gsv.* TO 'gsvuser'@'localhost';

5. Create table "userinfo" in 'gsv' database by executing the following MySQL command
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

If you use different database settings, please refer to the MySQL document for instructions on how to configure the database.


Section III: Set up the Genome Synteny Viewer
-----------------------------------------

1. Download the source code from GSV website http://cas-bioinfo.cas.unt.edu/gsv/software.php

2. Unzip the file gsv.v1.2.tar.gz, this should create a folder called 'gsv'.
	shell> tar zxvf gsv.v1.2.tar.gz

3. Move the folder 'gsv' to DocumentRoot of Apache web server. By default, the DocumentRoot of Apache is /var/www/, speak to system administrator to know the exact DocumentRoot.
	shell> mv gsv /var/www/.
	
4. Enter 'gsv' directory and you should see another directory called 'syn'. Execute a Linux command to change permission for 'syn' folder. It has to be world accessible to store the uploaded files.
	shell> cd /var/www/gsv
	shell> chmod -R 777 syn

5. If you have setup MySQL database name, user and password as mentioned in STEP II, you can skip this step.  However, if your MySQL setting is different, you must open the file 'dbtools.php' in 'gsv' directory with any text editor you are comfortable with (e.g., pico, emacs, or vi), and modify lines 3, 7, 8, and 9 to change the variables $database_host, $database_name, $database_user, and $database_password.

6. Under 'gsv' folder you should see a file called 'Arial.tff', Copy it to '/usr/share/fonts/truetype/.', you may need the sudo privilege, talk to your system administrator if necessary.
	shell> cp Arial.tff /usr/share/fonts/truetype/.

7. Cleanup scripts are provided to drop database synteny and annotation tables, remove entries from database table 'userinfo' and delete folder containing image files which are older than 60 days. This task is accomplished by cron job to run the cleanup script everyday. To create a cron job, use the command below
	shell> crontab -e

At the last line of crontab, copy and paste the line below, and provide the exact path to gsv/cleanup.php
	30 04 * * * /var/www/gsv/cleanup.php

The script cleanup.php will be executed at 4.30 AM everyday morning.

8. GSV uses mail function from PHP to send email to users. Speak to your system administrator to provide required information in PHP configuration file called 'php.ini'.

9. This completes installation, you can now open Install/index.php (i.e., http://<YOUR_SERVER_DOMAIN_NAME>/gsv/Install/), which verifies prerequisites, database setup and installation. YOUR_SERVER_DOMAIN_NAME refers to the domain name of your server.

Section IV: Additional notes:

1. For trouble shooting, please use contact details at http://cas-bioinfo.cas.unt.edu/gsv/support.php 
2. Refer to ARCHITECTURE.txt file to understand the architecture of GSV.
3. Read FAQs at http://cas-bioinfo.cas.unt.edu/gsv/faq.php 

