<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @since      1.0.0
 *
 * @package    Wordpress_Coming_Soon_Page
 * @subpackage Wordpress_Coming_Soon_Page/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wordpress_Coming_Soon_Page
 * @subpackage Wordpress_Coming_Soon_Page/admin
 * @author     ram <mailtoram@gmail.com>
 */
class Wordpress_Coming_Soon_Page_Admin {

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
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
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
		 * defined in Mwb_Wordpress_Coming_Soon_Page_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mwb_Wordpress_Coming_Soon_Page_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		 wp_enqueue_style( 'wcsp-ui-css', plugin_dir_url( __FILE__ ) . 'css/mwb-jqueryUi.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'wcsp-timepicker-css', plugin_dir_url( __FILE__ ) . 'js/jquery-timepicker/jquery-ui-timepicker-addon.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'wcsp_font_awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wordpress-coming-soon-page-admin.css', array(), $this->version, 'all' );

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
		 * defined in Mwb_Wordpress_Coming_Soon_Page_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mwb_Wordpress_Coming_Soon_Page_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		 wp_enqueue_script( 'jquery-ui-datepicker' );
		 wp_enqueue_script( 'jquery-ui-spinner' );
		 wp_enqueue_script( 'wcsp-timepicker-js', plugin_dir_url( __FILE__ ) . 'js/jquery-timepicker/jquery-ui-timepicker-addon.js', array( 'jquery', 'jquery-ui-datepicker', 'jquery-ui-slider' ), $this->version, false );

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wordpress-coming-soon-page-admin.js', array( 'jquery', 'wcsp-timepicker-js' ), $this->version, false );
		$wcsp_ajax_nonce = wp_create_nonce( 'special_string' );
		wp_localize_script(
			$this->plugin_name,
			'wcsp_Ajax',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'security' => $wcsp_ajax_nonce,
				'activated' => __( 'Activated', 'wordpress-coming-soon-page' ),
				'activate' => __( 'Activate', 'wordpress-coming-soon-page' ),
				'template1' => __( 'Template 1 has been activated', 'wordpress-coming-soon-page' ),
				'template2' => __( 'Template 2 has been activated', 'wordpress-coming-soon-page' ),
				'template3' => __( 'Template 3 has been activated', 'wordpress-coming-soon-page' ),
				'template4' => __( 'Template 4 has been activated', 'wordpress-coming-soon-page' ),
			)
		);

	}

	/**
	 * Register the Settings for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function wcsp_menu_pages() {

		add_menu_page( 'Coming Soon', __( 'Coming Soon Settings', 'wordpress-coming-soon-page' ), 'administrator', 'wcsp_menu', array( $this, 'wcsp_display' ) );
	}

	/**
	 * Display the Settings for the admin area.
	 *
	 * @name wcsp_display
	 * @since    1.0.0
	 */
	public function wcsp_display() {
		$mwb_wcsp_images = array(
			'temp1' => 'bg1',
			'temp2' => 'bg2',
			'temp3' => 'bg3',
		);
		require_once WCSP_dir_path . 'admin/partials/wordpress-coming-soon-page-admin-display.php';
	}

	/**
	 * Register the Thickbox for the admin area.
	 *
	 * @name wcsp_register_thick_box
	 * @since    1.0.0
	 */
	public function wcsp_register_thick_box() {
		add_thickbox();
	}

	/**
	 * Save setings of Cooming soon Page.
	 *
	 * @name wcsp_save_settings
	 * @since    1.0.0
	 */
	public function wcsp_save_settings() {
		if ( isset( $_POST['submit'] ) ) {
			if ( wp_verify_nonce( $_POST['nonce'], 'wcsp_form_string' ) ) {
				$wcsp_enable = isset( $_POST['enable_plugin'] ) ? sanitize_text_field( wp_unslash( $_POST['enable_plugin'] ) ) : '';
				$wcsp_site_heading = isset( $_POST['sitetitle'] ) ? sanitize_text_field( wp_unslash( $_POST['sitetitle'] ) ) : '';
				$wcsp_site_enable_image = isset( $_POST['enable_image'] ) ? sanitize_text_field( wp_unslash( $_POST['enable_image'] ) ) : '';
				$wcsp_site_image = isset( $_POST['image'] ) ? sanitize_text_field( $_POST['image'] ) : '';
				$wcsp_site_description = isset( $_POST['description'] ) ? sanitize_text_field( stripslashes( $_POST['description'] ) ) : '';
				$wcsp_site_enable_timer = isset( $_POST['enable_timer'] ) ? sanitize_text_field( $_POST['enable_timer'] ) : '';
				$wcsp_site_timer = isset( $_POST['timer'] ) ? sanitize_text_field( stripslashes( $_POST['timer'] ) ) : '';
				update_option( 'wcsp_enable', $wcsp_enable );
				update_option( 'wcsp_heading', $wcsp_site_heading );
				update_option( 'wcsp_site_image', $wcsp_site_enable_image );
				update_option( 'wcsp_site_description', $wcsp_site_description );
				update_option( 'wcsp_site_enable_timer', $wcsp_site_enable_timer );
				update_option( 'wcsp_site_timer', $wcsp_site_timer );
				update_option( 'wcsp_site_image_enable', $wcsp_site_image );
			}
		}
		if ( isset( $_POST['submit_css'] ) ) {
			if ( wp_verify_nonce( $_POST['nonce'], 'mwb_form_string_css' ) ) {
				$mwb_wcsp_css  = isset( $_POST['custom_css'] ) ? sanitize_text_field( stripcslashes( $_POST['custom_css'] ) ) : '';
				update_option( 'wcsp_css', $mwb_wcsp_css );
			}
		}

	}

	/**
	 *  Save Template for  Cooming soon Page.
	 *
	 * @name wcsp_image_action_callback
	 * @since    1.0.0
	 */
	public function wcsp_image_action_callback() {
		if ( check_ajax_referer( 'special_string', 'security' ) ) {
			$wcsp_enable_imgurl = sanitize_text_field( $_POST['imgurl'] );
			update_option( 'wcsp_enable_imgurl', $wcsp_enable_imgurl );
			wp_send_json( $wcsp_enable_imgurl );
		}
	}
}
