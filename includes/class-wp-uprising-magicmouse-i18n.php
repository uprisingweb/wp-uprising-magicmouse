<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.uprising-web.com
 * @since      1.0.0
 *
 * @package    Wp_Uprising_Magicmouse
 * @subpackage Wp_Uprising_Magicmouse/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Uprising_Magicmouse
 * @subpackage Wp_Uprising_Magicmouse/includes
 * @author     Uprising Web <sdupuy@uprising-web.com>
 */
class Wp_Uprising_Magicmouse_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-uprising-magicmouse',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
