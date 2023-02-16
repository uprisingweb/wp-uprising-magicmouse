<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.uprising-web.com
 * @since      1.0.0
 *
 * @package    Wp_Uprising_Magicmouse
 * @subpackage Wp_Uprising_Magicmouse/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_Uprising_Magicmouse
 * @subpackage Wp_Uprising_Magicmouse/public
 * @author     Uprising Web <sdupuy@uprising-web.com>
 */
class Wp_Uprising_Magicmouse_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Uprising_Magicmouse_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Uprising_Magicmouse_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-uprising-magicmouse-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Uprising_Magicmouse_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Uprising_Magicmouse_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/magic_mouse-1.2.1.min.js', array(), $this->version, false );


	}

	/**
	 * Add code before </body>
	 *
	 * @since    1.0.0
	 */
	public function add_footer() {
		$options = get_option( 'wp_uprising_magicmouse_settings' ); 
		?>
		<script type="text/javascript">
		(function() {
				options = {
			    "cursorOuter": "<?= $options["wpumm_cursor_outer"] ?>",
			    "hoverEffect": "<?= $options["wpumm_hover_effect"] ?>",
			    "hoverItemMove": <?= $options["wpumm_hover_item_move"] ?>,
			    "defaultCursor": <?= $options["wpumm_default_cursor"] ?>,
			    "outerWidth": <?= $options["wpumm_outer_width"] ?>,
			    "outerHeight": <?= $options["wpumm_outer_height"] ?>
		    };
		    magicMouse(options);

		})();
		</script>

		<style type="text/css">
			<?php if(isset($options["wpumm_circle_color"])):?>
			body #magicMouseCursor { border-color: <?= $options["wpumm_circle_color"] ?>; }
			<?php endif;?>

			<?php if(isset($options["wpumm_circle_width"])):?>
			body #magicMouseCursor { border-width: <?= $options["wpumm_circle_width"] ?>px; }
			<?php endif;?>

			<?php if(isset($options["wpumm_point_color"])):?>
			body #magicPointer { background: <?= $options["wpumm_point_color"] ?>; }
			<?php endif;?>

			<?php if(isset($options["wpumm_point_hover_color"])):?>
			body #magicPointer.is-hover { background: <?= $options["wpumm_point_hover_color"] ?>; }
			<?php endif;?>

			<?php if(isset($options["wpumm_blur_color"])):?>
			body #magicPointer.pointer-blur { border-color: <?= $options["wpumm_blur_color"] ?>; box-shadow: 0px 0px 15px -5px <?= $options["wpumm_blur_color"] ?> }
			<?php endif;?>

			<?php if(isset($options["wpumm_blur_width"])):?>
			body #magicPointer.pointer-blur { border-width: <?= $options["wpumm_blur_width"] ?>px; }
			<?php endif;?>

			<?php if(isset($options["wpumm_overlay_color"])):?>
			body #magicPointer.pointer-overlay { box-shadow: 0px 0px 15px -5px <?= $options["wpumm_overlay_color"] ?>;background: <?= $options["wpumm_overlay_color"] ?>; }
			<?php endif;?>	
					
			<?php if(isset($options["wpumm_overlay_blend"])):?>
			body #magicPointer.pointer-overlay { mix-blend-mode: <?= $options["wpumm_overlay_blend"] ?>; }
			<?php endif;?>

			

		</style>
		
	<?php
	}

}
