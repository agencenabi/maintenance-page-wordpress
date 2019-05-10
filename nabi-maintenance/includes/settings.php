<?php
/**
 * Maintenance Settings
 *
 * @package nabimaint
 * @version 0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


// create custom plugin settings menu
add_action('admin_menu', 'nabimaint_create_menu');

function nabimaint_create_menu() {

	//create new top-level menu
	add_menu_page('Nabi Maintenance Mode', 'Maintenance', 'administrator', __FILE__, 'nabimaint_settings_page' , plugins_url('/assets/img/icon.png', __FILE__) );

	//call register settings function
	add_action( 'admin_init', 'register_nabimaint_settings' );
}


function register_nabimaint_settings() {
	//register settings for Reorder Function
	register_setting( 'nabimaint-settings-group', 'nabimaint_active' );
	register_setting( 'nabimaint-settings-group', 'nabimaint_branding' );
	register_setting( 'nabimaint-settings-group', 'nabimaint_title' );
	register_setting( 'nabimaint-settings-group', 'nabimaint_text' );
}

function nabimaint_settings_page() {
?>
<div class="wrap">
	<h1><?php _e('Paramètres Maintenance Mode', 'nabi'); ?></h1>

	<div class="nabimaint-tabs-nav">

	</div>
	<div class="nabimaint-tabs">
		<div class="tabcontent1">
			<form method="post" action="options.php">
			    <?php settings_fields( 'nabimaint-settings-group' ); ?>
			    <?php do_settings_sections( 'nabimaint-settings-group' ); ?>
			    <h2><?php _e('Bienvenue dans le Maintenance Mode Nabi!', 'nabi'); ?></h2>
			    <p><?php _e('Si la Maintenance Mode est active, elle sera affichée uniquement aux utilisateurs qui ne sont pas connectés à l’administration de WordPress.', 'nabi'); ?></p>
			     <hr />
			    <table class="form-table">
				    <tr valign="top">
			        <th scope="row"><?php _e('Activer le mode?', 'nabi'); ?></th>
			        <td><input type="checkbox" name="nabimaint_active" value="1" <?php echo checked( 1, get_option('nabimaint_active'), false ); ?> /></td>
			        </tr>
			        <tr valign="top">
			        <th scope="row"><?php _e('Afficher le logo Nabi?', 'nabi'); ?></th>
			        <td><input type="checkbox" name="nabimaint_branding" value="1" <?php echo checked( 1, get_option('nabimaint_branding'), false ); ?> /></td>
			        </tr>
			        <tr valign="top">
			        <th scope="row"><?php _e('Titre de la page', 'nabi'); ?></th>
			        <td><input type="text" name="nabimaint_title" value="<?php echo esc_attr( get_option('nabimaint_title') ); ?>" style="width: 100%;" /></td>
			        </tr>
			        <tr valign="top">
			        <th scope="row"><?php _e('Texte', 'nabi'); ?></th>
			        <td><textarea name="nabimaint_text" style="width: 100%; resize: none; height: 200px;"><?php echo esc_attr( get_option('nabimaint_text') ); ?></textarea></td>
			        </tr>
			    </table>
			    <?php submit_button(); ?>
			</form>
		</div>
	</div>
</div>
<?php } ?>