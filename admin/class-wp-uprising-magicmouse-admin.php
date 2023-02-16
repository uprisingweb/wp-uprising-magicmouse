<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.uprising-web.com
 * @since      1.0.0
 *
 * @package    Wp_Uprising_Magicmouse
 * @subpackage Wp_Uprising_Magicmouse/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Uprising_Magicmouse
 * @subpackage Wp_Uprising_Magicmouse/admin
 * @author     Uprising Web <sdupuy@uprising-web.com>
 */
class Wp_Uprising_Magicmouse_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-uprising-magicmouse-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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
		wp_enqueue_script( 'wp-color-picker');
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-uprising-magicmouse-admin.js', array( 'wp-color-picker' ), $this->version, false );

	}

	//Display the validation errors and update messages
	/*
	 * Admin notices
	 */
	public function wp_uprising_magicmouse_admin_notices(){
	   settings_errors();
	}

	public function wp_uprising_magicmouse_register_settings() {
		//this will save the option in the wp_options table as 'wp_uprising_magicmouse_settings'
    	//the third parameter is a function that will validate your input values
    	register_setting('wp_uprising_magicmouse_settings', 'wp_uprising_magicmouse_settings', 'wp_uprising_magicmouse_settings');
  
	}


	public function wp_uprising_magicmouse_settings($args){
	    //$args will contain the values posted in your settings form, you can validate them as no spaces allowed, no special chars allowed or validate emails etc.
	    if(!isset($args['wpumm_outer_width']) || !is_numeric($args['wpumm_outer_width'])){
	        //add a settings error because the email is invalid and make the form field blank, so that the user can enter again
	        $args['wpumm_outer_width'] = '';
	    add_settings_error('wp_uprising_magicmouse_settings', 'wpse61431_invalid_email', 'Vous devez saisir un nombre', $type = 'error');   
	    }

	    //make sure you return the args
	    return $args;
	}


	public function wp_uprising_magicmouse_add_admin_menu(  ) {
	    add_menu_page( esc_html__('WP Custom Cursors', 'wp-uprising-magicmouse'), esc_html__('WP Uprising MagicMouse', 'wp-uprising-magicmouse'), 'manage_options', 'wp_uprising_magicmouse', 'wp_uprising_magicmouse_render_options_page', 'data:image/svg+xml;base64,PHN2ZyBpZD0iYjZjZmJjMTctOGNjOC00MGViLTgzODMtYWQ5ZTI3MTg4MTQ4IiBkYXRhLW5hbWU9IkNhbHF1ZSAxIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzNiAzNCI+PGRlZnM+PHN0eWxlPi5lMjA3ZWM5Yi0xMWNlLTRkZGUtOTkzMi03NjY1YWFlNzVlZDd7ZmlsbDpub25lO3N0cm9rZTojYWFhO3N0cm9rZS1taXRlcmxpbWl0OjEwO30uYWY2MTEzMTctZTE2Yi00YmRlLWE2NzMtMzA4YzM2ZmQxNTlle2ZpbGw6I2FhYTt9PC9zdHlsZT48L2RlZnM+PGNpcmNsZSBjbGFzcz0iZTIwN2VjOWItMTFjZS00ZGRlLTk5MzItNzY2NWFhZTc1ZWQ3IiBjeD0iMTcuOTgiIGN5PSIxNi45NCIgcj0iMTQuMzgiLz48Y2lyY2xlIGNsYXNzPSJhZjYxMTMxNy1lMTZiLTRiZGUtYTY3My0zMDhjMzZmZDE1OWUiIGN4PSIxNy45OCIgY3k9IjE2Ljk0IiByPSIxLjMiLz48L3N2Zz4=' );

	    // add_submenu_page( 'wp_uprising_magicmouse', esc_html__( 'Add New', 'wp-uprising-magicmouse' ), esc_html__( 'Add New', 'wp-uprising-magicmouse' ), 'manage_options', 'wpcc_add_new', 'uw_add_new_other_menu' );


	    function wp_uprising_magicmouse_render_options_page(  ) {
	    	
	    	/* SELECT INPUTS VALUES */
			$cursorOuter = array(
				'circle-basic' => 'circle-basic',
				'circle' => 'circle',
				'disable' => 'disable',
			);
			$hoverEffect = array(
				'circle-move' => 'circle-move',
				'pointer-blur' => 'pointer-blur',
				'pointer-overlay' => 'pointer-overlay',
			);
			$trueFalse = array(
				'true' => 'true',
				'false' => 'false',				
			);
			$overlayBlend = array(
	    		"normal" => "normal",
				"multiply" => "multiply",
				"screen" => "screen",
				"overlay" => "overlay",
				"darken" => "darken",
				"lighten" => "lighten",
				"color-dodge" => "color-dodge",
				"color-burn" => "color-burn",
				"hard-light" => "hard-light",
				"soft-light" => "soft-light",
				"difference" => "difference",
				"exclusion" => "exclusion",
				"hue" => "hue",
				"saturation" => "saturation",
				"color" => "color",
				"luminosity" => "luminosity",
			);


	    	if ( isset( $_POST['submit'] ) ) {/* Nothing there */}
		    ?>
		   <div class="wrap">
				<h1><?php echo esc_html__('WP Uprising MagicMouse', 'wp-uprising-magicmouse') ?></h1>

				<div id="col-container" class="wp-clearfix">
					<div id="col-left">
						<form method="post" action="options.php" novalidate="novalidate">
						
						 	<?php
						 	settings_fields( 'wp_uprising_magicmouse_settings' );
		        			do_settings_sections( __FILE__ );
		        			$options = get_option( 'wp_uprising_magicmouse_settings' ); 
							?>

							<table class="form-table" role="presentation">
							<tbody>	

							<tr>
							<th scope="row"><label for="wpumm_cursor_outer"><?php echo esc_html__('Cursor Outer', 'wp-uprising-magicmouse') ?></label></th>
							<td>
								<select name="wp_uprising_magicmouse_settings[wpumm_cursor_outer]" id="wpumm_cursor_outer">
									<?php foreach ($cursorOuter as $key => $value): ?>
										<option value="<?= $key; ?>" <?php echo (isset($options['wpumm_cursor_outer']) && $key== $options['wpumm_cursor_outer'])?'selected':'';?>>
										<?php echo esc_html__($value, 'wp-uprising-magicmouse') ?>
									</option>	
									<?php endforeach; ?>	
								</select>
							</td>
							</tr>
							<tr>
							<th scope="row"><label for="wpumm_hover_effect"><?php echo esc_html__('Hover Effect', 'wp-uprising-magicmouse') ?></label></th>
							<td>
								<select name="wp_uprising_magicmouse_settings[wpumm_hover_effect]" id="wpumm_hover_effect">
									<?php foreach ($hoverEffect as $key => $value): ?>
										<option value="<?= $key; ?>" <?php echo (isset($options['wpumm_hover_effect']) && $key== $options['wpumm_hover_effect'])?'selected':'';?>>
										<?php echo esc_html__($value, 'wp-uprising-magicmouse') ?>
									</option>
								<?php endforeach; ?>
								</select>
							</td>
							</tr>


							<th scope="row"><label for="wpumm_hover_item_move"><?php echo esc_html__('Hover Item Move', 'wp-uprising-magicmouse') ?></label></th>
							<td>
								<select name="wp_uprising_magicmouse_settings[wpumm_hover_item_move]" id="wpumm_hover_item_move">
									<?php foreach ($trueFalse as $key => $value): ?>
										<option value="<?= $key; ?>" <?php echo (isset($options['wpumm_cursor_outer']) && $key== $options['wpumm_cursor_outer'])?'selected':'';?>>
										<?php echo esc_html__($value, 'wp-uprising-magicmouse') ?>
									</option>	
									<?php endforeach; ?>												
								</select>
							</td>
							</tr>
							<th scope="row"><label for="wpumm_default_cursor"><?php echo esc_html__('Default Cursor', 'wp-uprising-magicmouse') ?></label></th>
							<td>
								<select name="wp_uprising_magicmouse_settings[wpumm_default_cursor]" id="wpumm_default_cursor">
									<?php foreach ($trueFalse as $key => $value): ?>
										<option value="<?= $key; ?>" <?php echo (isset($options['wpumm_default_cursor']) && $key== $options['wpumm_default_cursor'])?'selected':'';?>>
										<?php echo esc_html__($value, 'wp-uprising-magicmouse') ?>
									</option>	
									<?php endforeach; ?>															
								</select>
							</td>
							</tr>

							<!-- -->
							<tr>
								<th scope="row"><label for="wpumm_outer_width"><?php echo esc_html__('Outer Width', 'wp-uprising-magicmouse') ?></label></th>
								<td><input name="wp_uprising_magicmouse_settings[wpumm_outer_width]" type="text" id="wpumm_outer_width" value="<?php echo (isset($options['wpumm_outer_width'])?$options['wpumm_outer_width']:'30');?>" class="regular-text"></td>
							</tr>
							<tr>
								<th scope="row"><label for="wpumm_outer_height"><?php echo esc_html__('Outer Height', 'wp-uprising-magicmouse') ?></label></th>
								<td><input name="wp_uprising_magicmouse_settings[wpumm_outer_height]" type="text" id="wpumm_outer_height" value="<?php echo (isset($options['wpumm_outer_height'])?$options['wpumm_outer_height']:'30');?>" class="regular-text"></td>
							</tr>

							<!-- -->
							<tr>
								<th scope="row"><label for="wpumm_circle_color"><?php echo esc_html__('Circle Color', 'wp-uprising-magicmouse') ?></label></th>
								<td><input name="wp_uprising_magicmouse_settings[wpumm_circle_color]" type="text" id="wpumm_circle_color" value="<?php echo (isset($options['wpumm_circle_color'])?$options['wpumm_circle_color']:'#FFFFFF');?>" class="regular-text wpu-color-picker"></td>
							</tr>	
							<tr>
								<th scope="row"><label for="wpumm_circle_width"><?php echo esc_html__('Circle Border Size', 'wp-uprising-magicmouse') ?></label></th>
								<td><input name="wp_uprising_magicmouse_settings[wpumm_circle_width]" type="text" id="wpumm_circle_width" value="<?php echo (isset($options['wpumm_circle_width'])?$options['wpumm_circle_width']:'1');?>" class="regular-text"></td>
							</tr>

							<!-- -->
							<tr>
								<th scope="row"><label for="wpumm_point_color"><?php echo esc_html__('Pointer Color', 'wp-uprising-magicmouse') ?></label></th>
								<td><input name="wp_uprising_magicmouse_settings[wpumm_point_color]" type="text" id="wpumm_point_color" value="<?php echo (isset($options['wpumm_point_color'])?$options['wpumm_point_color']:'#FFFFFF');?>" class="regular-text wpu-color-picker"></td>
							</tr>
							<tr>
								<th scope="row"><label for="wpumm_point_hover_color"><?php echo esc_html__('Pointer Hover Color', 'wp-uprising-magicmouse') ?></label></th>
								<td><input name="wp_uprising_magicmouse_settings[wpumm_point_hover_color]" type="text" id="wpumm_point_hover_color" value="<?php echo (isset($options['wpumm_point_hover_color'])?$options['wpumm_point_hover_color']:'#FFFFFF');?>" class="regular-text wpu-color-picker"></td>
							</tr>

							<!-- -->
							<tr>
								<th scope="row"><label for="wpumm_blur_color"><?php echo esc_html__('Blur Color', 'wp-uprising-magicmouse') ?></label></th>
								<td><input name="wp_uprising_magicmouse_settings[wpumm_blur_color]" type="text" id="wpumm_blur_color"  value="<?php echo (isset($options['wpumm_blur_color'])?$options['wpumm_blur_color']:'#FFFFFF');?>" class="regular-text wpu-color-picker"></td>
							</tr>
						
							<tr>
								<th scope="row"><label for="wpumm_blur_width"><?php echo esc_html__('Blur Border Size', 'wp-uprising-magicmouse') ?></label></th>
								<td><input name="wp_uprising_magicmouse_settings[wpumm_blur_width]" type="text" id="wpumm_blur_width" value="<?php echo (isset($options['wpumm_blur_width'])?$options['wpumm_blur_width']:'1');?>" class="regular-text"></td>
							</tr>
							<!-- -->
							<tr>
								<th scope="row"><label for="wpumm_overlay_color"><?php echo esc_html__('Overlay Color', 'wp-uprising-magicmouse') ?></label></th>
								<td><input name="wp_uprising_magicmouse_settings[wpumm_overlay_color]" type="text" id="wpumm_overlay_color" value="<?php echo (isset($options['wpumm_overlay_color'])?$options['wpumm_overlay_color']:'#FFFFFF');?>" class="regular-text wpu-color-picker"></td>
							</tr>
							<tr>
								<th scope="row"><label for="wpumm_overlay_blend"><?php echo esc_html__('Overlay Blend', 'wp-uprising-magicmouse') ?></label></th>
								<td>
									<select name="wp_uprising_magicmouse_settings[wpumm_overlay_blend]" id="wpumm_overlay_blend">
									<?php foreach ($overlayBlend as $key => $value): ?>
										<option value="<?= $key; ?>" <?php echo (isset($options['wpumm_overlay_blend']) && $key== $options['wpumm_overlay_blend'])?'selected':'';?>>
										<?php echo esc_html__($value, 'wp-uprising-magicmouse') ?>
									</option>										
									<?php endforeach; ?>
								</select>
								</td>
							</tr>

							
								
							</tbody>
							</table>

							

							<p></p>
							<p></p>
							<p>If you want your mouse have elegant hover effect, don't forget to add the class "magic-hover" to the element you want it have hover effect, for example :</p>
		  					<p><code><?= htmlentities('<a class="magic-hover magic-hover__square">download</a>'); ?></code></p>
		  					<p></p>
		  					<p>Disable Magicmouse on an element: Sometime you just don't want to use Magicmouse on some specific elements? Then you just need to add no-cursor class to that element:</p>
		  					<p><code><?= htmlentities('<div class="no-cursor">...</div>'); ?></code></p>
		  					<p></p>
							<p></p>
		  					<p><i>More Information on : <a href='https://github.com/dshongphuc/magic-mouse-js' taget='_blank'>https://github.com/dshongphuc/magic-mouse-js</a></i></p>


						<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Enregistrer les modifications"></p></form>

					</div>
					<div id="col-right">
						<iframe src="https://magicmousejs.web.app/" width='100%' height="650"></iframe>

					</div>
				</div>
			</div>
		    
		    
		    <?php
		}

		// function uw_add_new_other_menu() {
		// 	echo "<div></div>";
		// }
	}

	public function add_plugin_settings_link($links) {
		$links[] = '<a href="' .
		admin_url( 'options-general.php?page=wp_uprising_magicmouse' ) .
		'">' . esc_html__('Settings') . '</a>';
		return $links;
	}

}
