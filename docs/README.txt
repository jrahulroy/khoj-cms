README
======
Khoj cms
This is a CMS for the popular Tresure Hunt that is conducted as a part of Technical Fest across India. Now for every College that conducts Treasure Hunt as an event don�t have to develop their own code for the event site. You can use the CMS to change the questions and upload the site

Features:
--------------
Powered by Zend Framework, PHP, MySQL
Flexible Options in the admin Panel
Facebook Integration (Login and Registration)
Separate User Profiles
Discussion Forum every Question
Site Tour � to present yourselves to the first visitors of the site
Gamification through New Metrics for User Progress bypoints
We will be launching the CMS on Feb 15, 2013
We offer free support for implementation of the platform
We are Open Source and available on GitHub

A Product from Tiny Creations


Setting Up Your VHOST
=====================

The following is a sample VHOST you might want to consider for your project.

<VirtualHost *:80>
   DocumentRoot "C:/wamp/www/materials/public"
   ServerName .local

   # This should be omitted in the production environment
   SetEnv APPLICATION_ENV development

   <Directory "C:/wamp/www/materials/public">
       Options Indexes MultiViews FollowSymLinks
       AllowOverride All
       Order allow,deny
       Allow from all
   </Directory>

</VirtualHost>
