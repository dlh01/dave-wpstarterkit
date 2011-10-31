# Dave's WordPress Boilerplate #

Dave's WordPress Boilerplate is a personal project to take some of the
repetitiveness out of creating new WP sites. The goal is to include
some plugins and modifications to a standard WordPress install that I
would make anyway. Please note that this project is *not yet
production-ready* in any way.


## The wp-content directory and wp-config.php ##

By default, Dave's WordPress Boilerplate moves `wp-config.php` one
level above the `wordpress` directory, which is perfectly normal and
even [recommended for added security][1]. The `wp-content` directory
has been renamed `assets` and is also moved outside the `wordpress`
directory, which, although perhaps unusual, is [supported just
fine][2].

The advantage of keeping `assets` outside of your `wordpress`
directory is that you can update WordPress more easily. Just overwrite
the old `wordpress` directory with the new one. There's less worry
about overwriting in `wordpress/wp-content` because everything should
be stored in the `assets` directory. That said:

**Always back up your entire site before upgrading**.

If you prefer to use the default `/wordpress/wp-content` directory,
then delete `wp-config.php` and copy `wp-config-sample.php` from the
`wordpress` directory as you would during a normal installation. You
will also have to remove the definitions of `WP_CONTENT_DIR` and
`WP_CONTENT_URL` in `local-config.php`.


## Additional modifications to wp-config.php ##

-   `WP_SITEURL` is predefined to include the `wordpress` directory.
    Otherwise, WordPress won't know to look in `wordpress` for the
    installation files when you first navigate to the root directory.
    Note that defining `WP_SITEURL` also locks the setting in the
    Dashboard but does not also change the database value. For more
    information, [see the Codex][5].

    If you remove the `WP_SITEURL` definition before installation, you
    will get a 404 at your_url.com; just browse to
    your_url.com/wordpress and the installer should work fine.


## Local development with local-config.php ##

I use the local development configuration suggested by Mark Jaquith.
This configuration involves creating a separate version of
`wp-config.php` called `local-config.php`, in which your local
database values are stored and `WP-DEBUG` is turned on. A conditional
inside `wp-config.php` checks for the existence of `local-config.php`
and uses it if found. If not, it continues using the production
configuration in `wp-config.php`.

When deploying your site to your production server, then, you
obviously have to ensure that you exclude `local-config.php`, or else
it will be used. That means that you need to *ignore*
`local-config.php` after you download the boilerplate, but before you
configure the local file.

For more information about the configuration, read Mark Jaquith's
[blog post][3] or watch his [presentation at WordCamp SF 2011][4],
both of which include other tips for local development.




[1]: http://codex.wordpress.org/Hardening_WordPress#Securing_wp-config.php
[2]: http://codex.wordpress.org/Editing_wp-config.php#Moving_wp-content
[3]: http://markjaquith.wordpress.com/2011/06/24/wordpress-local-dev-tips/
[4]: http://wordpress.tv/2011/08/20/mark-jaquith-scaling-servers-and-deploys-oh-my/
[5]: http://codex.wordpress.org/Editing_wp-config.php#WordPress_address
