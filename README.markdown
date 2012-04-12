# Dave's WordPress Starter Kit #

Dave's WordPress Starter Kit is a personal project to take
some of the repetitiveness out of creating new WP sites. It
includes plugins and modifications to a standard WordPress
installation that I would make anyway. This project has
received a few production tests now, and has generally
worked as intended.


## wp-config.php and the wp-content directory ##

By default, the kit moves `wp-config.php` one level above
the `wordpress` directory, which is perfectly normal and
even [recommended for added security][1].

The `wp-content` directory has been renamed `assets` and is
also moved outside the `wordpress` directory, which,
although perhaps unusual, is [supported just fine][2].

The advantage of keeping `assets` outside of your
`wordpress` directory is that you can update WordPress more
easily. Just overwrite the old `wordpress` directory with
the new one. There's less worry about overwriting in
`wordpress/wp-content` because everything should be stored
in the `assets` directory.

That said, **always back up your site before upgrading**.
Also note that any fresh copy of WordPress includes
`readme.html`, which is removed from the kit by default (see
below).

If you prefer to use the default `/wordpress/wp-content`
directory, then try [the `noassets` branch][8], which makes
the same modifications as the master branch except for
moving `wp-content`.

Note that the `noassets` branch is less frequently updated
to new versions of WordPress (i.e., I forget).


## Additional modifications to wp-config.php ##

*   `WP_SITEURL` is predefined to include the `wordpress`
    directory. Otherwise, WordPress won't know to look in
    `wordpress` for the installation files when you first
    navigate to the root directory.  

    If you remove the `WP_SITEURL` definition before
    installation, you will get a 404 at yourwebsite.com;
    just browse to yourwebsite.com/wordpress and the
    installer should work fine.

*   `WP_HOME` is predefined so that your site's home page
    isn't at `/wordpress`.

Note that these definitions lock the associated settings in
the Dashboard but do not also change the database values.
For more information, [see the Codex][5].

Also, `wp-config.php` is included in `.gitignore` by
default. If you want to include `wp-config.php` in your
repository, you need to take the affirmative step of
removing it from `.gitignore`.

Requiring this step safeguards against accidentally pushing
the file to a public cloud such as GitHub.

## Local development with local-config.php ##

I use the local development configuration suggested by Mark
Jaquith. This configuration involves creating a separate
version of `wp-config.php` called `local-config.php`, in
which your local database values are stored and `WP-DEBUG`
is on.

A conditional inside `wp-config.php` checks for the
existence of `local-config.php` and uses it if found. If
not, it continues using the production configuration in
`wp-config.php`.

When deploying your site to your production server, then,
you obviously have to exclude `local-config.php`, or else it
will be used. So `local-config.php` is included in
`.gitignore`.

For more information about the configuration, read Mark
Jaquith's [blog post][3] or watch his [presentation at
WordCamp SF 2011][4], both of which include other tips for
local development.


## Some .htaccess defaults ##

*   Block surfers from accessing `wp-config.php` and
    include-only files ([via the Codex][9])

*   No directory browsing ([via Net magazine][10])

*   Prevent viewing the `.htaccess` file itself ([via Net
    magazine][10])

*   Experimental: Access the Dashboard through
    example.com/manage (or "/admin", or whatever you choose)

*   [The 5G Blacklist 2012 from Perishable Press][11]   

*   Prevent access to PHP files in `/assets` (via
    `/assets/.htaccess`)


## Included plugins ##

One plugin is included in the kit: [Disable plugins when
doing local dev][7], written by Mark Jaquith. It uses the
`local-config.php` file addressed above to disable plugins
that shouldn't run on your development server, such as
VaultPress. His [blog post][3] also discusses the plugin.

There are many definitions of "must-have" plugins out there,
of course. But other plugins are as easy to add to your
installation as they are at any other time, and selectivity
keeps the weight of the kit down.


## Miscellaneous ##

* `readme.html` is removed from the `wordpress` directory
  because it betrays the WordPress version number ([via Net
  Magazine][10]).


[1]: http://codex.wordpress.org/Hardening_WordPress#Securing_wp-config.php
[2]: http://codex.wordpress.org/Editing_wp-config.php#Moving_wp-content
[3]: http://markjaquith.wordpress.com/2011/06/24/wordpress-local-dev-tips/
[4]: http://wordpress.tv/2011/08/20/mark-jaquith-scaling-servers-and-deploys-oh-my/
[5]: http://codex.wordpress.org/Editing_wp-config.php#WordPress_address
[7]: https://gist.github.com/1044546
[8]: https://github.com/dlh01/dave-wpstarterkit/tree/noassets
[9]: http://codex.wordpress.org/Hardening_WordPress
[10]: http://www.netmagazine.com/tutorials/protect-your-wordpress-site-htaccess
[11]: http://perishablepress.com/5g-blacklist-2012/

