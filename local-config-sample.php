<?php
 */


/* ============================================================================= 
   Load local development settings
   ========================================================================== */

/* Database settings */
define('DB_NAME', 'database_name_here');
define('DB_USER', 'username_here');
define('DB_PASSWORD', 'password_here');
define('DB_HOST', 'localhost');

/* Debugging */
define( 'SAVEQUERIES', true );
define( 'WP_DEBUG', true );

/*
 * Define the address of the local development website and the core WordPress files
 *
 * WP_HOME is the URL of the website
 * WP_SITEURL is the URL of the /wordpress directory
 */
define('WP_HOME', 'http://example.local');
define('WP_SITEURL', 'http://example.local/wordpress');
