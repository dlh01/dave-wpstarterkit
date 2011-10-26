# WordPress Boilerplate #

WordPress Boilerplate is a new, personal project to take some of the
repetitiveness out of creating new WP sites. The goal is to include
some plugins and modifications to a standard WordPress install that I
would make anyway.


## The `wp-content` folder and `wp-config.php` ##

By default, WordPress Boilerplate moves `wp-config.php` one level
above the `wordpress` directory, which is perfectly normal and even
[recommended for added security][1]. The `wp-content` folder has been
renamed `assets` and is also moved outside the `wordpress` folder,
which, although perhaps unusual, is [supported just fine][2].



[1]: http://codex.wordpress.org/Hardening_WordPress#Securing_wp-config.php
[2]: http://codex.wordpress.org/Editing_wp-config.php#Moving_wp-content
