<?php

/* ============================================================================= 
   Set database info, but use local-config.php if it exists
   ========================================================================== */

if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
  /* WP_LOCAL_DEV is used in disable-plugins-when-doing-local-dev.php */
  define( 'WP_LOCAL_DEV', true );
  include( dirname( __FILE__ ) . '/local-config.php' );
} else {
  define( 'WP_LOCAL_DEV', false );

  /*
   * Production database settings
   *
   * Add a prefix (or suffix) to your database name for some extra security
   */
  define('DB_NAME', '25ecb29_database_name_here');
  define('DB_USER', 'username_here');
  define('DB_PASSWORD', 'password_here');
  define('DB_HOST', 'localhost');

  /*
   * Define the address of the production website and the core WordPress files 
   *
   * WP_HOME is the URL of your website, and WP_SITEURL is the URL
   * of the /wordpress directory
   */
  define('WP_HOME', 'http://www.example.com');
  define('WP_SITEURL', 'http://www.example.com/wordpress');

  /*
   * Define the directory path and URL of the production wp-content directory
   *
   * Avoid using `$_SERVER` if you can:
   * http://lists.automattic.com/pipermail/wp-hackers/2012-July/043598.html
   *
   * Delete these if you want to use the standard wordpress/wp-content structure
   */
  define('WP_CONTENT_DIR', dirname( __FILE__ ) . '/content');
  define('WP_CONTENT_URL', 'http://www.example.com/content');
}

/* You probably don't need to change these */
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
    


/* ============================================================================= 
   Authentication unique keys and salts
   ========================================================================== */

/* Generate these at https://api.wordpress.org/secret-key/1.1/salt/ */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');



/* =============================================================================
   WordPress Database Table prefix
   ========================================================================== */

/*
 * You probably want to change this to something sensible for your project,
 * but in case you don't, this is more random and secure than `wp_`
 */
$table_prefix  = 'f3bcf46_';



/* ============================================================================= 
   Other definitions
   ========================================================================== */

/* WordPress Localized Language, defaults to English if blank */
define( 'WPLANG', '' );

/* Prevent users from editing theme or plugin files from the Dashboard */
define( 'DISALLOW_FILE_EDIT', true );

/* Optionally specify a maximum number of post revisions saved */
/* define( 'WP_POST_REVISIONS', 5 ); */

/* Optionally define the number of days between emptying Trash. Default is 30 */
/* define( 'EMPTY_TRASH_DAYS', 30 ); */

/* Optionally define the number of seconds between autosaves. Default is 60 */
/* define( 'AUTOSAVE_INTERVAL', 60 ); */

/* Optionally define the default theme; also the fallback for broken themes */
/* define( 'WP_DEFAULT_THEME', 'twentyeleven' ); */

/* Uncomment if you need backwards compatability with older plugins */
/* define( 'PLUGINDIR', '../wp-content/plugins' ); */


/* Debugging
   ========================================================================== */

/*
 * Ensure WP_DEBUG is off unless we have explicitly said otherwise
 *
 * Via ocwp.org/jonbrown/2012/01/30/working-local-on-wordpress-even-better/
 */
if ( !defined('WP_DEBUG') )
  define( 'WP_DEBUG', false );

/* Hide errors */
ini_set( 'display_errors', 0 );
define( 'WP_DEBUG_DISPLAY', false );

/* More constants here: wpengineer.com/2382/wordpress-constants-overview */



/* ============================================================================= 
   Send WordPress on its way
   ========================================================================== */

/* Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/wordpress/');

/* Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
