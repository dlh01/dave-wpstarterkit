# Dave's WordPress Starter Kit #

Dave's WordPress Starter Kit takes some repetitiveness out
of new WordPress projects and provides some sensible
defaults.


## Features ##

* Cleaner `wp-config.php`
* Security and performance improvements in `.htaccess`,
  including the [Roots Theme][14] version of the HTML5
  Boilerplate `.htaccess` and the [5G Blacklist 2012 from
  Perishable Press][11]
* Easier file browsing by moving `/wordpress/wp-content` to
  `/content`
* Easier local development with Mark Jaquith's
  `local-config.php`
* Install WordPress with no default content (e.g. "Hello
  world!")
* A few helpful default `.gitignore`s
* [EditorConfig][18] support


## wp-config.php and the wp-content directory ##

By default, the kit moves `wp-config.php` one level above
the `wordpress` directory, which is perfectly normal and
even [recommended for added security][1].

The `wp-content` directory has been renamed `content` and is
also moved outside the `wordpress` directory, which,
although perhaps unusual, is [supported just fine][2].

The advantage of keeping `content` outside of your
`wordpress` directory is that you can update WordPress more
easily. Just overwrite the old `wordpress` directory with
the new one. There's less worry about overwriting in
`wordpress/wp-content` because everything should be stored
in the `content` directory.

That said, **always back up your site before upgrading**.
Also note that any fresh copy of WordPress includes
`readme.html`, which is removed from the kit by default (see
below).


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
    from editing theme or plugin files from the Dashboard 

*   Formatted using [Nicholas Gallagher's principles of
    writing consistent, idiomatic CSS][17], so it looks
    pretty.

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

*   [The Roots Theme version of the HTML5 Boilerplate
    `.htaccess`][14]

*   [The 5G Blacklist 2012 from Perishable Press][11]

*   Block surfers from accessing `wp-config.php` and
    include-only files ([via the Codex][9])

*   Prevent viewing the `.htaccess` file itself ([via Net
    magazine][10])

*   Prevent access to PHP files in `/content` (via
    `/content/.htaccess`)

*   Optionally limit access to the Dashboard by IP address
    (via `/wordpress/wp-admin/.htaccess`)


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


## .gitignore ##

The Starter Kit also includes some default listings in
`.gitignore` from [GitHub's collection of `.gitignore`
templates][15].


## readme.html and license.txt ##

These are removed from the `/wordpress` directory because
they betray the WordPress version number ([via Net
Magazine][10]). Just in case, browsing access to them is
also blocked in `.htaccess`.


## EditorConfig support ##

[EditorConfig][18] "helps developers define and maintain
consistent coding styles between different editors and
IDEs":

> The EditorConfig project consists of a file format for
> defining coding styles and a collection of text editor
> plugins that enable editors to read the file format and
> adhere to defined styles.

An `.editorconfig` is included here that suits my needs, but
of course you can tailor it for your preferences.


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
[12]: http://lists.automattic.com/pipermail/wp-hackers/2012-April/042932.html
[13]: http://wpbits.wordpress.com/2007/08/10/automating-wordpress-customizations-the-installphp-way/
[14]: https://github.com/retlehs/roots
[15]: https://github.com/github/gitignore
[16]: https://github.com/markjaquith/WordPress-Skeleton
[17]: https://github.com/necolas/idiomatic-css 
[18]: http://editorconfig.org/
