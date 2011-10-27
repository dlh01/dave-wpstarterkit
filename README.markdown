# Dave's WordPress Boilerplate #

Dave's WordPress Boilerplate is a personal project to take some of the
repetitiveness out of creating new WP sites. The goal is to include
some plugins and modifications to a standard WordPress install that I
would make anyway.


## The wp-content directory and wp-config.php ##

By default, WordPress Boilerplate moves `wp-config.php` one level
above the `wordpress` directory, which is perfectly normal and even
[recommended for added security][1]. The `wp-content` directory has
been renamed `assets` and is also moved outside the `wordpress`
directory, which, although perhaps unusual, is [supported just
fine][2].

The advantage of keeping `assets` outside of your `wordpress`
directory is that you can update WordPress more easily. Just overwrite
the old `wordpress` directory with the new one. There's less worry
about overwriting in `wordpress/wp-content` because everything should
be stored in the `assets` folder. That said, *always back up your
entire site before upgrading*.

If you prefer to use the default `/wordpress/wp-content` directory,
simply delete `wp-config.php`, rename `wp-config-default.php` to
`wp-config`, and edit the file normally.



[1]: http://codex.wordpress.org/Hardening_WordPress#Securing_wp-config.php
[2]: http://codex.wordpress.org/Editing_wp-config.php#Moving_wp-content
