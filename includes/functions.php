<?php
/**
 * Maintenance Mode Function
 *
 * @package nabimaint
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * PHP to JS
 *
 * @since nabimaint 1.0
 */
add_action( 'wp_enqueue_scripts', 'nabimaint_php_to_js' );

function nabimaint_php_to_js() {
	$version = 1;
	$vars = array(
		'site_url'      => home_url(),
		'template_url'  => get_template_directory_uri(),
		'site_title'    => get_bloginfo( 'name' ),
		'ajaxUrl' 		=> admin_url('admin-ajax.php'),
		'homeUrl'	 	=> home_url(),
	    'pluginsUrl' 	=> plugins_url() . '/' . plugin_basename( __FILE__ ),
		'post_id'      	=> get_the_ID(),
	);
}



/**
 * Flushing Rewrite on theme switching
 *
 * @since nabimaint 1.0
 */
add_action( 'after_switch_theme', 'nabimaint_rewrite_flush' );

function nabimaint_rewrite_flush() {
    flush_rewrite_rules();
}


/**
 * Redirect Users to Maintenance Page
 *
 * @since nabimaint 1.0
 */
function maintenance_mode() {
	$options = get_option( 'nabimaint_active' );	
	if( $options == '1' ) { 
    	if ( !current_user_can( 'edit_themes' ) || !is_user_logged_in() ) {
			wp_redirect( plugins_url() . '/nabi-maintenance/maintenance/' );
		} else { 
			//do nothing
		}
		return;
	}
}
add_action('get_header', 'maintenance_mode');


/**
 * Display Maintenance Admin Notice
 *
 * @since nabimaint 1.0
 */
function nabi_admin_notice(){
	$options = get_option( 'nabimaint_active' );	
	if( $options == '1' ) { 
	    echo '<div class="notice notice-error"><p>';
	    echo _e('Le mode maintenance est activé. Cliquez ', 'nabi');
	    echo '<a href="/wp-admin/admin.php?page=nabi-maintenance">';
	    echo _e('ici ', 'nabi');
	    echo '</a>';
	    echo _e('pour gérer l’état de la maintenance.', 'nabi');
	    echo '</p></div>';
    }
}
add_action('admin_notices', 'nabi_admin_notice');
