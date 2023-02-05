<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.uprising-web.com
 * @since             1.0.0
 * @package           Wp_Uprising_Magicmouse
 *
 * @wordpress-plugin
 * Plugin Name:       WP Uprising MagicMouse
 * Plugin URI:        https://www.uprising-web.com
 * Description:       Custom Cursor for Wordpress based on MagicMouse.js
 * Version:           1.0.1
 * Author:            Uprising Web
 * Author URI:        https://www.uprising-web.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-uprising-magicmouse
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
define( 'WP_UPRISING_MAGICMOUSE_VERSION', '1.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-uprising-magicmouse-activator.php
 */
function activate_wp_uprising_magicmouse() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-uprising-magicmouse-activator.php';
	Wp_Uprising_Magicmouse_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-uprising-magicmouse-deactivator.php
 */
function deactivate_wp_uprising_magicmouse() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-uprising-magicmouse-deactivator.php';
	Wp_Uprising_Magicmouse_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_uprising_magicmouse' );
register_deactivation_hook( __FILE__, 'deactivate_wp_uprising_magicmouse' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-uprising-magicmouse.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_uprising_magicmouse() {

	$plugin = new Wp_Uprising_Magicmouse();
	$plugin->run();

}
run_wp_uprising_magicmouse();
