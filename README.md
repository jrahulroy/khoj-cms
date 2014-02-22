Khoj cms
========
This is a CMS for the popular Tresure Hunt that is conducted as a part of Technical Fest across India. Now for every College that conducts  Treasure Hunt as an event don’t have to develop their own code for the event site. You can use the CMS to change the questions and upload the site

Features:
--------------
- Powered by Zend Framework, PHP, MySQL
- Flexible Options in the admin Panel
- Facebook Integration (Login and Registration)
- Separate User Profiles
- Discussion Forum every Question
- Site Tour – to present yourselves to the first visitors of the site
- Gamification through New Metrics for User Progress bypoints
- We will be launching the CMS on Feb 15, 2013
- We offer free support for implementation of the platform 
- We are Open Source and available on GitHub

Installation
============
1. Set up db details in to /application/congigs/application.ini
2. Import the database from /db-scripts/khoj-db.sql

Testing in WAMP
===============
Zend Framework requires following vhost sample configuration

	<VirtualHost *:80>
		ServerAdmin jrahulroy@gmail.com
		DocumentRoot "C:\wamp\www\khoj-cms\public"
		ServerName khoj.localhost
		ServerAlias www.khoj.localhost
		ErrorLog "logs/khoj.localhost-error.log"
		CustomLog "logs/khoj.localhost-access.log" common
		SetEnv APPLICATION_ENV "development"
		<Directory "C:\wamp\www\khoj-cms\public">
		  DirectoryIndex index.php
		  AllowOverride All
		  Order allow,deny
		  Allow from all
	 </Directory>
	</VirtualHost>


A Product from Tiny Creations
