﻿=== WP Maintenance Mode ===
Contributors: Bueltge
Plugin Name: WP Maintenance Mode
Plugin URI: http://bueltge.de/wp-wartungsmodus-plugin/101/
Author: Frank B&uuml;ltge
Author URI: http://bueltge.de/
Donate link: http://bueltge.de/wunschliste/
Tags: maintenance, mode, admin, administration, unavailable, coming soon, multisite
Requires at least: 2.6
Tested up to: 3.3
Stable tag: 1.7.1

Adds a splash page to your site that lets visitors know your site is down for maintenance. Full access to the back- & front-end is optional. Works on WP Multisite installs.

== Description ==
Adds a maintenance-page to your blog that lets visitors know your blog is down for maintenancetime. User with rights for theme-options get full access to the blog including the frontend.
Activate the plugin and your blog is in maintenance-mode, works and see the frontend, only registered users with enough rights. You can use a date with a countdown for informations the visitors or set a value and unit for infomrations.
Also you can add urls for exlude of maintenance mode.

You can add your own html and stylesheet and add the url of this style to the options of the plugin. Write your style to this markup and upload to the webspace; after add the url include http:// to the settings of this plugin and change th theme to `"Own Theme"`:

	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de" id="wartungsmodus" >
	
	<head>
		<title>Blogname - Maintenance Mode</title>
	</head>
	
	<body>
		
		<div id="header">
			<p>WP Dev</p>
		</div>
		
		<div id="content">
		
			<h1>Maintenance Mode</h1>
			<p>Sorry for the inconvenience.<br />Our website is currently undergoing scheduled maintenance.<br /><strong>Please try back in 231 weeks.</strong><br />Thank you for your understanding.</p>
			<div class="admin"><a href="http://example.com/wp-admin/">Admin-Login</a></div>
		</div>
		
		<div id="footer">
			<p><a href="http://bueltge.de/">Plugin by: <img src="http://bueltge.de/favicon.ico" alt="bueltge.de" width="16" height="16" /></a></p>
		</div>
		
	</body>
	</html>


Also you can add content via hook:

`wm_head` - hook inside the head of the maintenance mode site
`wm_content` - hook over the content, after the div with id content
`wm_footer` - hook inside the footer


Example:

	function add_my_link() {
	    echo '<a href="http://mylink.com/">My Link</a>
	}
	add_action( 'wm_footer', 'add_my_link' );


= Requirements =
1. WordPress version 2.6 and later, works also on Multisite
1. PHP 5


= Work with MySQLDumper =
This option is designed for users, who backups their database with "MySQLDumper".
With this option you can switch your Wordpress into maintenance mode, when you create a database-backup with MySQLDumper. This is very usefull especially for larger blogs, because their backup takes a longer time. With this option enabled, you have the guarantee of a clean and full backup of your database. All other requests to your database from other resources were blocked in the time of the backup and all the performance of the MySQL-Server will be taken for the backup. 

= How to use =
* MySQLDumper must be installed and has to run full funtionally. This includes the crontab, MySQLDumper uses. 

How to install MySQLDumper:
Please visit [the official website](http://www.mysqldumper.de/tutorials/) for several tutorials and videotutorials where you can see, how to install MySQLDumper.

To configure the automatic backup with MySQLDumper: 
Please visit [the official website](http://forum.mysqldumper.de/features-perl-cronscript-einstellungen-von-konfiguration-cron-t502.html) for informations about the full automatic backup of your database with perl and crontab.

* Maintenance Mode must be installed and all needed options must be set.
* After that, go to your Dumper-settings -> Configuration -> Databases. There you have two options
->Command before Dump
->Command after Dump
* On the right you find a link named "SQL Commands", after you click this link, you can set the two queries for the automatic backup. 
* Click the link "new command", give it a name like "activate maintenance mode"  and paste the code below in the required field and finally save this command:

	`UPDATE 'wp-database'.'wp-prefix_options' SET 'option_value' = '1' WHERE 'wp-prefix_options'.'option_name' = 'wp-maintenance-mode-msqld';`

* Now you can set the second command to deactivate the maintenance mode like the first one with this code:

	`UPDATE 'wp-database'.'wp-prefix_options' SET 'option_value' = '0' WHERE 'wp-prefix_options'.'option_name' = 'wp-maintenance-mode-msqld';`

= Note! =
You must edit three places of the code to your options:

* `wp-database` -> put here the name of your database.
* `wp-prefix_options` -> put here the name of your options-table with the prefix you use (normally wp_options). This you must edit twice in the code!

When you have edited the code, save the two commands and go back to the MySQLDumper Configuration. Now you can choose the commands in the required field. For "Command before Dump" use the Command you named like "activate maintenance mode" and for "Command after Dump" use the other, named like "deactivate maintenance mode".

Don't forget to save these settings! After that, your Wordpress will be switch in maintenance mode, when Dumper is backup your database!

= Frequently Asked Questions for MySQLDumper =
Please visit [the official website](http://www.mysqldumper.de/) for general informations about MySQLDumper.

= How to: Backup with maintenance mode and MySQLDumper (illustrated Tutorial in german language) =
Please visit [Automatisches Backup der WordPress-Datenbank](http://www.beedy.de/2010/05/09/automatisches-backup-der-wordpress-datenbank/)

= How to: Use a contact form inside the Maintenance Message =
Please use a plugin for the form-function with the possibility Shortcode, like [Contact Form 7](http://wordpress.org/extend/plugins/contact-form-7/). Use a Shortcode of the plugin inside the teyt on the options of the plugin WP Maintenance Mode, thats all.

= More Plugins = 
Please see also my [Premium Plugins](http://wpplugins.com/author/malo.conny/). Maybe you find an solution for your requirement.

= Interested in WordPress tips and tricks =
You may also be interested in WordPress tips and tricks at [WP Engineer](http://wpengineer.com/) or for german people [bueltge.de](http://bueltge.de/) 

== Installation ==
1. Unpack the download-package
1. Upload all files to the `/wp-content/plugins/` directory, include folders
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Click the `settings`-link for change time, link of authors, text and design
1. Activate under the settings and your blog is in maintenance mode
1. Please check the **Exclude** option in settings for parts of your install; maybe an custom login-adress etc.

See on [the official website](http://bueltge.de/wp-wartungsmodus-plugin/101/ "WP Maintenance Mode").

== Screenshots ==
1. Aktiv Maintenance-Mode with Theme "The Truck" and german language
1. Settings on plugin-page
1. Aktiv Maintenance-Mode with Theme "Simple Text" and german language
1. Aktiv Maintenance-Mode with Theme "The Sun"
1. Aktiv Maintenance-Mode with Theme "The FF Error"
1. Aktiv Maintenance-Mode with Theme "Monster"
1. Aktiv Maintenance-Mode with Theme "Chastely"
1. Aktiv Maintenance-Mode with Theme "Only Typo"
1. Aktiv Maintenance-Mode with Theme "Paint"
1. Aktiv Maintenance-Mode with Theme "Animate (Flash)"
1. Aktiv Maintenance-Mode with Theme "Damask"
1. Aktiv Maintenance-Mode with Theme "Lego"
1. Aktiv Maintenance-Mode with Theme "Chemistry"

== Frequently Asked Questions ==
= Where can I get more information? =
Please visit [the official website](http://bueltge.de/wp-wartungsmodus-plugin/101/ "WP Maintenance Mode") for the latest information on this plugin.

= I love this plugin! How can I show the developer how much I appreciate his work? =
Please visit [the official website](http://bueltge.de/wp-wartungsmodus-plugin/101/ "WP Maintenance Mode") and let him know your care or see the [wishlist](http://bueltge.de/wunschliste/ "Wishlist") of the author.

= Frequently Asked Questions for MySQLDumper =
Please visit [the official website](http://www.mysqldumper.de/) for general informations about MySQLDumper.

= How to: Backup with maintenance mode and MySQLDumper (illustrated Tutorial in german language) =
Please visit [Automatisches Backup der WordPress-Datenbank](http://www.beedy.de/2010/05/09/automatisches-backup-der-wordpress-datenbank/)

= How to: Use a contact form inside the Maintenance Message =
Please use a plugin for the form-function with the possibility Shortcode, like [Contact Form 7](http://wordpress.org/extend/plugins/contact-form-7/). Use a Shortcode of the plugin inside the teyt on the options of the plugin WP Maintenance Mode, thats all.

== Other Notes ==
= Work with MySQLDumper =
This option is designed for users, who backups their database with "MySQLDumper".
With this option you can switch your Wordpress into maintenance mode, when you create a database-backup with MySQLDumper. This is very usefull especially for larger blogs, because their backup takes a longer time. With this option enabled, you have the guarantee of a clean and full backup of your database. All other requests to your database from other resources were blocked in the time of the backup and all the performance of the MySQL-Server will be taken for the backup. 

= How to use =
* MySQLDumper must be installed and has to run full funtionally. This includes the crontab, MySQLDumper uses. 

How to install MySQLDumper:
Please visit [the official website](http://www.mysqldumper.de/tutorials/) for several tutorials and videotutorials where you can see, how to install MySQLDumper.

To configure the automatic backup with MySQLDumper: 
Please visit [the official website](http://forum.mysqldumper.de/features-perl-cronscript-einstellungen-von-konfiguration-cron-t502.html) for informations about the full automatic backup of your database with perl and crontab.

* Maintenance Mode must be installed and all needed options must be set.
* After that, go to your Dumper-settings -> Configuration -> Databases. There you have two options
->Command before Dump
->Command after Dump
* On the right you find a link named "SQL Commands", after you click this link, you can set the two queries for the automatic backup. 
* Click the link "new command", give it a name like "activate maintenance mode"  and paste the code below in the required field and finally save this command:

	UPDATE `wp-database`.`wp-prefix_options` SET `option_value` = '1' WHERE `wp-prefix_options`.`option_name` = 'wp-maintenance-mode-msqld';

* Now you can set the second command to deactivate the maintenance mode like the first one with this code:

	UPDATE `wp-database`.`wp-prefix_options` SET `option_value` = '0' WHERE `wp-prefix_options`.`option_name` = 'wp-maintenance-mode-msqld';

= Note! =
You must edit three places of the code to your options:

* `wp-database` -> put here the name of your database.
*  `wp-prefix_options` -> put here the name of your options-table with the prefix you use (normally wp_options). This you must edit twice in the code!

When you have edited the code, save the two commands and go back to the MySQLDumper Configuration. Now you can choose the commands in the required field. For "Command before Dump" use the Command you named like "activate maintenance mode" and for "Command after Dump" use the other, named like "deactivate maintenance mode".

Don't forget to save these settings! After that, your Wordpress will be switch in maintenance mode, when Dumper is backup your database!

= Frequently Asked Questions for MySQLDumper =
Please visit [the official website](http://www.mysqldumper.de/) for general informations about MySQLDumper.

= How to: Backup with maintenance mode and MySQLDumper (illustrated Tutorial in german language) =
Please visit [Automatisches Backup der WordPress-Datenbank](http://www.beedy.de/2010/05/09/automatisches-backup-der-wordpress-datenbank/)

= Acknowledgements =
* Thanks to [David Hellmann](http://www.davidhellmann.com/ "David Hellmann") for the design "The Truck"
* Thanks to [Nicki Steiger](http://mynicki.net/ "Nicki Steiger") for the design "The Sun"
* Thanks to [Thomas Meschke](http://www.lokalnetz.com/ "Thomas Meschke") for the design "The FF Error"
* Thanks to [Sebastian Sebald](http://www.backseatsurfer.de "Sebastian Sebald") for the design "Monster"
* Thanks to [Florian Andreas Vogelmaier](http://fv-web.de/ "Florian Andreas Vogelmaier") for the design "Chastely"
* Thanks to [Robert Pfotenhauer](http://krautsuppe.de/ "Robert Pfotenhauer") for the design "Only Typo"
* Thanks to [Marvin Labod](http://bugeyes.de/ "Marvin Labod") for the design "Paint"
* Thanks to [Sebastian Schmiedel](http://www.cayou-media.de/ "Sebastian Schmiedel") for the design "Animate (Flash)"
* Thanks to [Fabian Letscher](http://fabianletscher.de/ "Fabian Letscher") for the design "Damask"
* Thanks to [Alex Frison](http://www.afrison.com/ "Alex Frison") for the design "Lego"
* Thanks to [elmastudio.de](http://www.elmastudio.de/ "elmastudio.de") for the design "Chemistry"

* Thanks to [Stefan Wilhelm](http://www.beedy.de/) for Idea, Tests and a tutorial for work with MySQLDumper

* Thanks to [H&uuml;seyin &Uuml;lk&uuml;](http://www.salsabar.org/ "H&uuml;seyin &Uuml;lk&uuml;") for turkey language file
* Thanks to [Gilles WALET](http://www.nevermindfr.com/ "Gilles WALET") for frensh language file
* Thanks to [J&uuml;rgen Toth](http://www.relijoc.ro/ "J&uuml;rgen Toth") for romanian language file
* Thanks to [Gianni Diurno](http://gidibao.net/ "Gianni Diurno") for italian language file and an [tutorial](http://gidibao.net/index.php/2010/09/16/wp-maintenance-mode-in-italiano/ "WP Maintenance Mode in italiano") for italien users
* Thanks to [Romeo Shuka](http://www.romeolab.com/wp-wartungsmodus-shqip "About this Plugin in albanian language") for albanian language file
* Thanks to [TodoWordPress](http://www.todowp.org/ "TodoWordPress") for spanish language file
* Thanks to FatCow for belorussion language file
* Thanks to [yuarez](http://yuraz.uni.cc "yuraz.uni.cc") for croatian languge files
* Thanks to [Georg](http://wordpress.blogos.dk/s%C3%B8g-efter-downloads/?did=250 "wordpress.blogos.dk") for danish languge files
* Thanks to [Jakub Dirska](http://www.bellartis.com "bellartis.com") for polish languge files
* Thanks to [Rene](http://wpwebshop.com/blog/ "wpwebshop.com/blog") for durch translation files and hints to my errors on my bad english.
* Thanks to [Alejandro Garcia](http://blog.wrsmexico.com "blog.wrsmexico.com") for a spanish flash-file for the style "Animate"
* Thanks to [S.M. Mehdi Akram (Royal)](http://mehdiakram.wordpress.com/ "mehdiakram.wordpress.com") for (mother) bengali language files.
* Thanks to [Yaser Maadan](http://www.englize.com "www.englize.com") for a arabic language files
* Thanks to [Andrew Kovalev](http://www.portablecomponentsforall.com/)
* Thanks to [Brian Flores](http://www.inmotionhosting.com/) for serbian translation


== Changelog ==
= 1.7.1 (12/05/2011) =
* fix for WP smaller 3.2* on Network

= 1.7.0 (12/02/2011) =
* add functionalities to use in WP Multisite
* remove message in header, current is not fixed the ticked in core and the message on Admin Bar an Notice is enough
* check on WP 3.3RC1

= 1.6.10 (08/30/2011) =
* add hint in Admin Bar, if active
* small changes for WP Codex

= 1.6.9 (06/13/2011) =
* Small fix for empty string on custom design

= 1.6.8 (04/05/2011) =
* Small changes on check for datepicker
* Fix for Design monster

= 1.6.7 (01/05/2011) =
* Bugfix: new check for files for different themes; hope this fix the server errors
* Bugfix: fix add default settings
* Maintenance: different changes on the syntax
* Feature: add check for Super Admin on WP Multisite; has allways the rights for access
* Feature: now it is possible to exclude feed from maintenance mode
* Maintenance: check with 3.0.4 and 3.1-RC2
* Maintenance: update language file: .pot, de_DE
* Bugfix: JavaScript error on Bulk Actions on plugins fixed
* Maintenance: fix all notice, if set no values

= 1.6.6. (10/09/2010) =
* Maintenance: many changes on the code; $locale and hook in side frontend
* Maintenance: change attribute_escaped to esc_attr with custom method for WP smaller 2.8
* Maintenance: Update german language files
* Feature: Shortcodes is now possible in the "Text" option
* Feature: no cache header rewrite

= 1.6.5 (09/16/2010) =
* add new design "Chemistry" by [elmastudio.de](http://www.elmastudio.de/ "elmastudio.de")
* changes for include methods od class for preview
* changes the possibility for include of language specific flash files

= 1.6.4 (09/13/2010) =
* add preview functions
* bugfix for list in wp-admin/plugins.php
* remove datepicker.regional - dont work fine
* different small changes
* new language file .pot
* add flash file and change on plugin for style "Animate" for spanish language

= 1.6.3 (07/27/2010) =
* bugfix to include stylesheet on maintenance mode message

= 1.6.2 (07/08/2010) =
* add functions for hint in the new UI of WP 3.0
* add more WP Codex standard source
* fix strings in the language and languages files
* add datetimepicker-de

= 1.6.1 (06/18/2010) =
* fix a problem with https://; see [Ticket #13941](http://core.trac.wordpress.org/ticket/13941)

= 1.6 (05/17/2010) =
* bugfix for exclude sites

= 1.5.9 (05/07/2010) =
* change different points
* add possibility to wotk with MySQLDumper

= 1.5.8 (21/03/2010)=
* fix exclude error
* add textareas for heading and header fields

= 1.5.7 (03/18/2010) =
* block admin-area via role
* add message for registered users with not enough rights
* add message on login-page
* different changes

= 1.5.6 (02/25/2010) =
* changes on css, site.php and different syntax on the plugin

= 1.5.5 (02/23/2010) =
* SORRY, small bug for the url to jQuery

= 1.5.4 (02/23/2010) =
* add time for countdown
* changes for WP 3.0
* changees on rights to see frontend

= 1.5.3 (01/05/2010) =
* Fix for JavaScript with WordPress 2.9
* Add new custom fields for fronted: title, header, heading
* Fix for setting userrole to see frontend
* Change laguage files

= 1.5.2 (01/04/2010) =
* add user-role setting
* correctly the de_DE language file

= 1.5.1 (10/04/2009) =
* add small fix
* add language files (en_ES, ro_RO)

= 1.5.0 (09/28/2009) =
* add countdown
* change options
* change default options
* add field for own adress to excerpt of the maintenance mode
* etc.

= 1.4.9 (07/09/2009) =
* also ready for WordPress 2.6
* add romanian language files
* add italian language file by [Gianni Diurno](http://gidibao.net/ "Gianni Diurno")

= 1.4.8 (03/09/2009) =
* add design "Damask" by [Fabian Letscher](http://fabianletscher.de/ "Fabian Letscher")
* add design "Lego" by [Alex Frison](http://www.afrison.com/ "Alex Frison")

= 1.4.7 (26/08/2009) =
* change doc-type to utf-8 without BOM

= v1.4.6 (24/08/2009) =
* add design "Animate (Flash)" by [Sebastian Schmiedel](http://www.cayou-media.de/ "Sebastian Schmiedel")
* add new hook for add content `wm_content` to include flash on content
* add frensh language files

= v1.4.5 (19/08/2009) =
* fix html string in text on frontend
* add design "Paint" by [Marvin Labod](http://bugeyes.de/ "Marvin Labod")
* add turkey language files

= v1.4.4 (18/08/2009) =
* add design "Chastely" by [Florian Andreas Vogelmaier](http://fv-web.de/ "Florian Andreas Vogelmaier")
* add design "Only Typo" by [Robert Pfotenhauer](http://krautsuppe.de/ "Robert Pfotenhauer")

= v1.4.3 (13/08/2009) =
* add option for the Text
* add option for active maintenance mode
* add design "The FF Error" by [Thomas Meschke](http://www.lokalnetz.com/ "Thomas Meschke")
* add design "Monster" by [Sebastian Sebald](http://www.backseatsurfer.de "Sebastian Sebald")

= v1.4.2 (10/08/2009) =
* add design "The Sun" by [Nicki Steiger](http://mynicki.net/ "Nicki Steiger")
* now it is possible to add own css and add in settings the url to the css-file

= v1.4.1 (07/08/2009) =
* small html-fix

= v1.4 (06/08/2009) =
* complety new code
* options menu
* new designs by [David Hellmann](http://www.davidhellmann.com/ "David Hellmann")
