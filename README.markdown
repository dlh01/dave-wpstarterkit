# Dave's WordPress Starter Kit #

Dave's WordPress Starter Kit takes some repetitiveness out
of new WordPress projects and provides a few useful
defaults.


## Features ##

* Optimizations in `wp-config.php`
* Security and performance improvements in `.htaccess` files
* Easier file browsing by moving `/wordpress/wp-content` to
  `/content`
* Easier local development with Mark Jaquith's
  `local-config.php`
* Install WordPress with no default content (e.g. "Hello
  world!")
* A few helpful default `.gitignore`s
* [wp-cli][23] and [EditorConfig][18] support


## Requirements ##

* [wp-cli][23]


## Installation ##

* Run `setup.sh`. It will download the latest version of WordPress,
set up the `/content` directory, and handle a few other tasks.


## wp-config.php and the wp-content directory ##

By default, the kit moves `wp-config.php` one level above
the `wordpress` directory. The `wp-content` directory has
been renamed `content` and is also moved outside the
`wordpress` directory, which is [supported just fine][2].
For me, moving the configuration files and custom assets out
of the application directory helps reinforce the separation
between the two --- i.e., don't modify core files. It also
saves a step when browsing to the `content` folder from your
file manager or the command line.


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

*   The default database prefix is changed from `wp` to a
    random string. You probably want to change this to
    something more sensible for your project, but in case
    you don't, your database will be more secure than with
    the default.

*   `DISALLOW_FILE_EDIT` is defined `true` to prevent users
    from editing theme or plugin files from the Dashboard.

*   Looks pretty via formatting based on [Nicholas
    Gallagher's work][17].

Note that `WP_SITEURL` and `WP_HOME` lock the associated
settings in the Dashboard but do not also change the
database values. For more information, [see the Codex][5].

Also, `wp-config.php` is included in `.gitignore` by
default. If you want to include `wp-config.php` in your
repository, you need to take the affirmative step of
removing it from `.gitignore`. Requiring this step
safeguards against accidentally pushing the file to a public
cloud such as GitHub.


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
local development. Or check out his [WordPress
Skeleton][16], where many of these ideas have already been
implemented.


## Goodbye "Hello world!" ##

The `install.php` file inside the `content` directory
contains an empty `wp_install_defaults` function, which
overrides the standard function in
`wp-admin/includes/upgrade.php`. Leaving the function empty
causes WordPress to install without the default "Hello
world!" post, page, links, categories, etc. (via [the
wp-hackers mailing list][12] and [WordPress bits][13]).


## Some .htaccess defaults ##

*   Block surfers from accessing `wp-config.php` and
    include-only files ([via the Codex][9])

*   Prevent viewing the `.htaccess` file itself ([via Net
    magazine][10])

*   Prevent access to PHP files in `/content` (via
    `/content/.htaccess`)


## .gitignore ##

The Starter Kit includes some default listings in
`.gitignore` from [GitHub][15] and [WP Engine][24].


## wp-cli support ##

The [`wp-cli.yml` configuration file][25] supplies default options
to the `wp` executable. The `path` config is predefined so `wp`
knows where to find the core files after installation.


## EditorConfig support ##

[EditorConfig][18] "helps developers define and maintain
consistent coding styles between different editors and
IDEs":

> The EditorConfig project consists of a file format for
> defining coding styles and a collection of text editor
> plugins that enable editors to read the file format and
> adhere to defined styles.

[Projects using EditorConfig][19] include jQuery and
Modernizr. An `.editorconfig` is included here that suits my
needs, but of course you can tailor it for your preferences.


## crossdomain.xml, humans.txt, robots.txt ##

The Starter Kit includes the `crossdomain.xml`, `humans.txt`, and
`robots.txt` files from the HTML5 Boilerplate. Links for more
information are included in each file, as well as in
[the H5BP docs][21].


[1]: http://codex.wordpress.org/Hardening_WordPress#Securing_wp-config.php
[2]: http://codex.wordpress.org/Editing_wp-config.php#Moving_wp-content
[3]: http://markjaquith.wordpress.com/2011/06/24/wordpress-local-dev-tips/
[4]: http://wordpress.tv/2011/08/20/mark-jaquith-scaling-servers-and-deploys-oh-my/
[5]: http://codex.wordpress.org/Editing_wp-config.php#WordPress_address
[8]: https://github.com/dlh01/dave-wpstarterkit/tree/noassets
[9]: http://codex.wordpress.org/Hardening_WordPress
[10]: http://www.netmagazine.com/tutorials/protect-your-wordpress-site-htaccess
[11]: http://perishablepress.com/5g-blacklist-2012/
[12]: http://lists.automattic.com/pipermail/wp-hackers/2012-April/042932.html
[13]: http://wpbits.wordpress.com/2007/08/10/automating-wordpress-customizations-the-installphp-way/
[14]: https://github.com/retlehs/roots
[15]: https://github.com/github/gitignore
[16]: https://github.com/markjaquith/WordPress-Skeleton
[17]: https://github.com/necolas/idiomatic-css
[18]: http://editorconfig.org/
[19]: https://github.com/editorconfig/editorconfig/wiki/Projects-Using-EditorConfig
[20]: http://blog.sucuri.net/2012/07/wordpress-and-server-hardening-taking-security-to-another-level.html
[21]: https://github.com/h5bp/html5-boilerplate/tree/master/doc
[22]: http://perishablepress.com/wordpress-5g-blacklist/
[23]: http://wp-cli.org
[24]: http://git.wpengine.com/assets/media/recommended-gitignore-no-wp
[25]: http://wp-cli.org/config/
