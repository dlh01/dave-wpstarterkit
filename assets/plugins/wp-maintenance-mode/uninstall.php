if( !defined( 'ABSPATH') && !defined('WP_UNINSTALL_PLUGIN') )
	exit();

delete_option( 'wp-maintenance-mode' );
delete_option( 'wp-maintenance-mode-msqd' );
