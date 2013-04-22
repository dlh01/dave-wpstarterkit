<?php

/*
 * Local database settings
 *
 * Add a suffix (or prefix) to your database name for some extra security
 */
define('DB_NAME', 'database_name_here');
define('DB_USER', 'username_here');
define('DB_PASSWORD', 'password_here');
define('DB_HOST', 'localhost');

/*
 * Debugging
 *
 * See whether you want SCRIPT_DEBUG enabled at
 * http://codex.wordpress.org/Debugging_in_WordPress#SCRIPT_DEBUG
 */
define( 'SAVEQUERIES', true );
define( 'WP_DEBUG', true );
// define( 'SCRIPT_DEBUG', true );

/*
 * Define the address of the local website and the core WordPress files
 *
 * WP_HOME is the URL of your website, and WP_SITEURL is the URL
 * of the /wordpress directory
 */
define('WP_HOME', 'http://local.example');
define('WP_SITEURL', 'http://local.example/wordpress');


/*
 * Define the directory path and URL of the local wp-content directory
 *
 * Avoid using `$_SERVER` if you can:
 * http://lists.automattic.com/pipermail/wp-hackers/2012-July/043598.html
 *
 * Delete these if you want to use the standard wordpress/wp-content structure
 */
define('WP_CONTENT_DIR', dirname( __FILE__ ) . '/content');
define('WP_CONTENT_URL', 'http://local.example/content');

