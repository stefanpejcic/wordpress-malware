<?php
/**
 * Plugin Name:       Protect Uploads
 * Plugin URI:        https://www.alticreation.com/en/protect-uploads/
 * Description:       Protect your uploads directory. Avoid browsing of your uploads directory by adding a htaccess file or an index.php file.
 * Version:           0.3
 * Author:            Alexis Blondin
 * Author URI:        https://www.alticreation.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       protect-uploads
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function activate_alti_protect_uploads() {

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-protect-uploads.php';
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-protect-uploads-activator.php';
	$activation = new Alti_ProtectUploads_Activator();
	$activation->run();

}

function deactivate_alti_protect_uploads() {

	require_once plugin_dir_path( __FILE__ ) . 'admin/class-protect-uploads-admin.php';
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-protect-uploads-deactivator.php';
	$deactivation = new Alti_ProtectUploads_Deactivator();
	$deactivation->run();

}

register_activation_hook( __FILE__, 'activate_alti_protect_uploads' );
register_deactivation_hook( __FILE__, 'deactivate_alti_protect_uploads' );

require plugin_dir_path( __FILE__ ) . 'includes/class-protect-uploads.php';

$plugin = new Alti_ProtectUploads();
$plugin->run();
