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

  /* Production database settings */
  define('DB_NAME', 'database_name_here');
  define('DB_USER', 'username_here');
  define('DB_PASSWORD', 'password_here');
  define('DB_HOST', 'localhost');

  /*
   * Define the address of the production website and the core WordPress files. 
   *
   * WP_HOME is the URL of your website, and WP_SITEURL is the URL
   * of the /wordpress directory
   */
  define('WP_HOME', 'http://www.example.com');
  define('WP_SITEURL', 'http://www.example.com/wordpress');
}

/* You probably don't need to change these */
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
    


/* ============================================================================= 
   Move the wp-content directory
   ========================================================================== */

/*
 * You might need to add more to these paths. Defining WP_CONTENT_DIR and 
 * WP_CONTENT_URL here, and not in the above conditional, also assumes the same 
 * directory structure in local and production installs. For example, if your 
 * local install is in a subdirectory and your production install is in root, 
 * you can move these definitions up, and to local-config.php, to configure them 
 * for each environment
 */
define('WP_CONTENT_DIR', dirname( __FILE__ ) . '/content');
define('WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/content');



/* ============================================================================= 
   Authentication unique keys and salts
   =========================================================================== */

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
  =========================================================================== */

/*
 * You probably want to change this to something sensible for your project,
 * but in case you don't, here's a random, more secure default
 */
$table_prefix  = 'bfbab39_';



/* ============================================================================= 
   Other definitions
   ========================================================================== */

/* WordPress Localized Language, defaults to English if blank */
define( 'WPLANG', '' );

/* Prevent users from editing theme or plugin files from the Dashboard */
define( 'DISALLOW_FILE_EDIT', true );

/* Optionally specify a maximum number of post revisions saved */
/* define( 'WP_POST_REVISIONS', 5 ); */


/* Debugging
   ========================================================================== */

/*
 * Ensure WP_DEBUG is off unless we have explicitly said otherwise
 *
 * Via ocwp.org/jonbrown/2012/01/30/working-local-on-wordpress-even-better/
 *
 */
if ( !defined('WP_DEBUG') )
  define( 'WP_DEBUG', false );

/* Hide errors */
ini_set( 'display_errors', 0 );
define( 'WP_DEBUG_DISPLAY', false );



/* ============================================================================= 
   Send WordPress on its way
   ========================================================================== */

/* Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/wordpress/');

/* Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
