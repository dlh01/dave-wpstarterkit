<?php
/**
 * The base configurations of the WordPress.
 */


/**
 * Load database info, and use local-config.php if it exists
 */
if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
  define( 'WP_LOCAL_DEV', true ); // For disable-plugins-when-doing-local-dev.php
  include( dirname( __FILE__ ) . '/local-config.php' );
} else {
  define( 'WP_LOCAL_DEV', false );

  /* Production MySQL settings */
  define('DB_NAME', 'database_name_here');
  define('DB_USER', 'username_here');
  define('DB_PASSWORD', 'password_here');
  define('DB_HOST', 'localhost');

  /* Define the address of the production website and the core WordPress files */
  define('WP_HOME', 'http://www.example.com');
  define('WP_SITEURL', 'http://www.example.com/wordpress');
}

/* You probably don't need to change these */
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
    

/**
 * Move the wp-content directory
 *
 * You might need to add more to these paths if your site isn't in root. These 
 * paths also assume the same directory structure in local and production installs.
 * If, say, your local install is in a subdirectory and your production install is 
 * in root, you can move these definitions to the above conditional and to
 * local-config.php to configure them for each environment
 */
define('WP_CONTENT_DIR', dirname( __FILE__ ) . '/content');
define('WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/content');


/**
 * Authentication Unique Keys and Salts.
 *
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');


/**
 * WordPress Database Table prefix.
 *
 * You probably want to change this to something sensible for your project,
 * but in case you don't, the table prefix is changed from 'wp_' to something
 * more random and secure (actually, it's a recent commit number from the
 * dave-wpstarterkit repository).
 */
$table_prefix  = 'bfbab39_';


/**
 * WordPress Localized Language, defaults to English.
 */
define('WPLANG', '');


/**
 * WordPress debugging mode. This is typically enabled in local-config.php
 */
// define('WP_DEBUG', false);


/**
 * Hide errors
 */
ini_set( 'display_errors', 0 );
define( 'WP_DEBUG_DISPLAY', false );

/**
 * Prevent users from editing theme or plugin files from the Dashboard
 */
define('DISALLOW_FILE_EDIT',true);


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
