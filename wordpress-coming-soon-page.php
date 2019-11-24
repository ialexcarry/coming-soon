<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since             1.0.0
 * @package           wordpress-coming-soon-page
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Coming Soon And Manitenance Mode
 * Description:        WordPress coming soon Page allows you to create coming soon  page.
 * Version:           1.0.0
 * Author:            Ram
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       wordpress-coming-soon-page
 * Tested up to:      4.9
 * WC tested up to:   3.3.3
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WCSP_VERSION', '1.0.0' );
define( 'WCSP_dir_path', plugin_dir_path( __FILE__ ) );
define( 'WCSP_dir_url', plugin_dir_url( __FILE__ ) );
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wordpress-coming-soon-page-activator.php
 */
function activate_wordpress_coming_soon_page() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wordpress-coming-soon-page-activator.php';
	Mwb_Wordpress_Coming_Soon_Page_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wordpress-coming-soon-page-deactivator.php
 */
function deactivate_wordpress_coming_soon_page() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wordpress-coming-soon-page-deactivator.php';
	Mwb_Wordpress_Coming_Soon_Page_Deactivator::deactivate();
}

// register_activation_hook( __FILE__, 'activate_mwb_wordpress_coming_soon_page' );
function wcsp_plugin_add_settings_link( $wcsp_links ) {
	$mwb_wmm_my_link = array(
		'<a href="' . admin_url( 'admin.php?page=wcsp_menu' ) . '">' . __( 'Go To Settings', ' wordpress-coming-soon-page' ) . '</a>',
	);
	return array_merge( $mwb_wmm_my_link, $wcsp_links );
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'wcsp_plugin_add_settings_link' );
register_deactivation_hook( __FILE__, 'deactivate_mwb_wordpress_coming_soon_page' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wordpress-coming-soon-page.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wordpress_coming_soon_page() {

	$plugin = new Wordpress_Coming_Soon_Page();
	$plugin->run();

}
run_wordpress_coming_soon_page();
