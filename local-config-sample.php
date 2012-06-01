<?php
/**
 * The base configurations of the local WordPress.
 */

/* MySQL settings */
define('DB_NAME', 'database_name_here');
define('DB_USER', 'username_here');
define('DB_PASSWORD', 'password_here');
define('DB_HOST', 'localhost');

/* Debugging */
define( 'SAVEQUERIES', true );
define( 'WP_DEBUG', true );

/* Define the address of the local website and the core WordPress files */
define('WP_HOME', 'http://www.example.com');
define('WP_SITEURL', 'http://www.example.com/wordpress');
