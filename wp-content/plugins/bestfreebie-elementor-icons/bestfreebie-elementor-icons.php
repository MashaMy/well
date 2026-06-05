<?php
	
	/*
	Plugin Name: Bestfreebie Elementor Icons
	Plugin URI: https://wordpress.org/plugins/bestfreebie-elementor-icons
	Description: Bestfreebie elementor supported addons, this plugin helps to add Default Icon Field of Elementor with popular font icons, such as, Ionicons, Simple Line, Google Material and Fontawesome. This plugin do not merge different icons. It helps to enrich your page with single icons set.
	Version: 1.6
	Author: Bestfreebie
	Author URI: https://bestfreebiefiles.com/
	License: GPLv2 or later
	*/
	
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly.
	}
	
	final class Bestfreebie_elementor_icons {
		
		/**
		 * Plugin Version
		 *
		 * @since 1.0.0
		 *
		 * @var string The plugin version.
		 */
		const VERSION = '1.6';
		
		/**
		 * Minimum Elementor Version
		 *
		 * @since 1.0.0
		 *
		 * @var string Minimum Elementor version required to run the plugin.
		 */
		const MINIMUM_ELEMENTOR_VERSION = '2.6';
		/**
		 * Minimum PHP Version
		 *
		 * @since 1.0.0
		 *
		 * @var string Minimum PHP version required to run the plugin.
		 */
		const MINIMUM_PHP_VERSION = '5.6';
		/**
		 * Instance
		 *
		 * @since 1.0.0
		 *
		 * @access private
		 * @static
		 *
		 * @var Elementor_Custom Icon_Extension The single instance of the class.
		 */
		private static $_instance = null;
		
		/**
		 * Constructor
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function __construct() {
			add_action( 'init', [ $this, 'i18n' ] );
			add_action( 'plugins_loaded', [ $this, 'init' ] );
		}
		
		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 * @static
		 *
		 * @return Elementor_Custom Icon_Extension An instance of the class.
		 */
		
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			
			return self::$_instance;
		}
		
		/**
		 * Initialize the plugin
		 *
		 * Load the plugin only after Elementor (and other plugins) are loaded.
		 * Checks for basic plugin requirements, if one check fail don't continue,
		 * if all check have passed load the files required to run the plugin.
		 *
		 * Fired by `plugins_loaded` action hook.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function init() {
			// Check if Elementor installed and activated
			if ( ! did_action( 'elementor/loaded' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
				
				return;
			}
			
			// Check for required Elementor version
			if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
				
				return;
			}
			
			// Check for required PHP version
			if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
				
				return;
			}
			// Include plugin files
			$this->includes();
			
			// add menu item
			add_action( 'admin_menu', array( $this, 'bestfreebie_add_admin_menu' ), 99 );
			
			////////////
			add_action( 'elementor/controls/controls_registered', array( $this, 'wpbucket_icons_filters' ), 10, 1 );
			add_filter( 'elementor/icons_manager/additional_tabs', array( $this, 'wpbucket_icons_filters_new' ), 9999999, 1 );
			
			// Enqueue Widget Styles
			add_action( 'elementor/frontend/before_enqueue_styles', [ $this, 'bestfreebie_widget_styles' ] );
			add_action( 'elementor/editor/before_enqueue_styles', [ $this, 'bestfreebie_widget_styles' ] );
			
		}
		
		/**
		 * Load External Files
		 *
		 * Load plugin external files.
		 *
		 * Fired by `init` action hook.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function includes() {
			require_once( __DIR__ . '/lib/bestfreebie-helper.php' );
		}
		
		/**
		 * Load Textdomain
		 *
		 * Load plugin localization files.
		 *
		 * Fired by `init` action hook.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function i18n() {
			
			load_plugin_textdomain( 'bestfreebie_elementor_icons', false, basename( dirname( __FILE__ ) ) . '/languages' );
			
		}
		
		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have Elementor installed or activated.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function admin_notice_missing_main_plugin() {
			
			if ( isset( $_GET['activate'] ) ) {
				unset( $_GET['activate'] );
			}
			
			$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
				esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'bestfreebie_elementor' ),
				'<strong>' . esc_html__( 'Elementor Custom Icon Extension', 'bestfreebie_elementor' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'bestfreebie_elementor' ) . '</strong>'
			);
			
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
			
		}
		
		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required Elementor version.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function admin_notice_minimum_elementor_version() {
			
			if ( isset( $_GET['activate'] ) ) {
				unset( $_GET['activate'] );
			}
			
			$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bestfreebie_elementor' ),
				'<strong>' . esc_html__( 'Elementor Custom Icon Extension', 'bestfreebie_elementor' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'bestfreebie_elementor' ) . '</strong>',
				self::MINIMUM_ELEMENTOR_VERSION
			);
			
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
			
		}
		
		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required PHP version.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function admin_notice_minimum_php_version() {
			
			if ( isset( $_GET['activate'] ) ) {
				unset( $_GET['activate'] );
			}
			
			$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bestfreebie_elementor' ),
				'<strong>' . esc_html__( 'Elementor Custom Icon Extension', 'bestfreebie_elementor' ) . '</strong>',
				'<strong>' . esc_html__( 'PHP', 'bestfreebie_elementor' ) . '</strong>',
				self::MINIMUM_PHP_VERSION
			);
			
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
			
		}
		
		
		/**
		 * Add custom icons to Elementor registry
		 *
		 * @param object $controls_registry
		 *
		 * @return void
		 */
		public function wpbucket_icons_filters( $controls_registry ) {
			if ( current_user_can( 'manage_options' ) ) {
				$options = $this->bestfreebie_get_options( 'bestfreebie_icons_fonts' );
				if ( $options ) {
					$controls_registry->get_control( 'icon' )->set_settings( 'options', array() );
					if ( $options == 'free-ionicons' ) {
						$controls_registry->get_control( 'icon' )->set_settings( 'options', Bestfreebie_Helper::get_ionicons_array() );
					} elseif ( $options == 'free-simpleicon' ) {
						$controls_registry->get_control( 'icon' )->set_settings( 'options', Bestfreebie_Helper::get_simple_line_icons() );
					} elseif ( $options == 'free-materialicon' ) {
						$controls_registry->get_control( 'icon' )->set_settings( 'options', Bestfreebie_Helper::get_material_icons() );
					}elseif ( $options == 'free-metrize' ) {
						$controls_registry->get_control( 'icon' )->set_settings( 'options', Bestfreebie_Helper::get_metrize_icons() );
					} else {
						$controls_registry->get_control( 'icon' )->set_settings( 'options', Bestfreebie_Helper::get_fontawesome_array() );
					}
				}
			}
		}
		
	/**
	 * Add custom icons to Elementor Icons tabs (new in v2.6+)
	 *
	 * @param array $tabs Additional tabs for new icon interface.
	 * @return array $tabs
	 */
	public function wpbucket_icons_filters_new( $tabs = array() ) {

		// get loaded icon files
		$options = $this->bestfreebie_get_options( 'bestfreebie_icons_fonts' );

		$newicons = [];
		if ( $options ) {
			$json_file_url = plugin_dir_url( __FILE__ ) .'json/bestfreebie.json';
			$json_file_dir = __DIR__ .'/json/bestfreebie.json';
					if ( $options == 'free-ionicons' ) {
						$icons = Bestfreebie_Helper::wpbucket_get_new_format(Bestfreebie_Helper::get_ionicons_array());
						$json_data = json_encode($icons);
						file_put_contents($json_file_dir, $json_data);
						$newicons[ 'ionicons' ] = [
							'name'          => 'ionicons',
							'label'         => 'Ion Icons',
							'url'           => '',
							'enqueue'       => '',
							'prefix'        => '',
							'displayPrefix' => 'bestfreebie ',
							'labelIcon'     => 'ion-ios-add',
							'ver'           => self::VERSION,
							'fetchJson'     => $json_file_url,
						];
					} elseif ( $options == 'free-simpleicon' ) {
						$icons = Bestfreebie_Helper::wpbucket_get_new_format(Bestfreebie_Helper::get_simple_line_icons());
						$json_data = json_encode($icons);
						file_put_contents($json_file_dir, $json_data);
						$newicons[ 'ionicons' ] = [
							'name'          => 'simpleicon',
							'label'         => 'Simple Icon',
							'url'           => '',
							'enqueue'       => '',
							'prefix'        => '',
							'displayPrefix' => 'bestfreebie ',
							'labelIcon'     => 'icon-user',
							'ver'           => self::VERSION,
							'fetchJson'     => $json_file_url,
						];
					} elseif ( $options == 'free-materialicon' ) {
						$icons = Bestfreebie_Helper::wpbucket_get_new_format(Bestfreebie_Helper::get_material_icons());
						$json_data = json_encode($icons);
						file_put_contents($json_file_dir, $json_data);
						$newicons[ 'ionicons' ] = [
							'name'          => 'materialicon',
							'label'         => 'Material Icon',
							'url'           => '',
							'enqueue'       => '',
							'prefix'        => '',
							'displayPrefix' => 'bestfreebie ',
							'labelIcon'     => 'mdi mdi-account',
							'ver'           => self::VERSION,
							'fetchJson'     => $json_file_url,
						];
					}elseif ( $options == 'free-metrize' ) {
						$icons = Bestfreebie_Helper::wpbucket_get_new_format(Bestfreebie_Helper::get_metrize_icons());
						$json_data = json_encode($icons);
						file_put_contents($json_file_dir, $json_data);
						$newicons[ 'ionicons' ] = [
							'name'          => 'metrize',
							'label'         => 'Metrize',
							'url'           => '',
							'enqueue'       => '',
							'prefix'        => '',
							'displayPrefix' => 'bestfreebie ',
							'labelIcon'     => 'icon-yen',
							'ver'           => self::VERSION,
							'fetchJson'     => $json_file_url,
						];
					}
		}else{
			return $tabs;
		}

		return array_merge( $tabs, $newicons );

	}
		
		protected function bestfreebie_get_options( $option_key ) {
			return get_option( $option_key );
		}
		
		/**
		 * Add new pages to admin
		 */
		public function bestfreebie_add_admin_menu() {
			
			add_submenu_page(
				'elementor',
				__( 'Custom Icons for Elementor', 'bestfreebie-elementor' ),
				__( 'Bestfreebie Icons', 'bestfreebie-elementor' ),
				'manage_options',
				'bestfreebie-elementor-custom-icons',
				array(
					$this,
					'bestfreebie_options_page',
				)
			);
			
		}
		
		/*
		 * GET THE OPTIONS
		 * */
		
		/**
		 * Render all options
		 */
		public function bestfreebie_options_page() {
			
			include_once 'lib/bestfreebie-options-page.php';
			
		}
		
		/**
		 * Enque Styles
		 */
		public function bestfreebie_widget_styles() {
			
				$options = $this->bestfreebie_get_options( 'bestfreebie_icons_fonts' );
				if ( $options ) {
					if ( $options == 'free-ionicons' ) {
						wp_register_style( 'bestfreebie-ionicons', plugin_dir_url( __FILE__ ) . 'assets/ionicons/css/ionicons.css' );
						wp_enqueue_style( 'bestfreebie-ionicons' );
					} elseif ( $options == 'free-simpleicon' ) {
						wp_register_style( 'bestfreebie-simpleicon', plugin_dir_url( __FILE__ ) . 'assets/simple-line-icons/css/simple-line-icons.css' );
						wp_enqueue_style( 'bestfreebie-simpleicon' );
					} elseif ( $options == 'free-materialicon' ) {
						wp_register_style( 'bestfreebie-materialicon', plugin_dir_url( __FILE__ ) . 'assets/material-icons/css/materialdesignicons.min.css' );
						wp_enqueue_style( 'bestfreebie-materialicon' );
					}elseif ( $options == 'free-metrize' ) {
						wp_register_style( 'bestfreebie-metrize', plugin_dir_url( __FILE__ ) . 'assets/metrize/style.css' );
						wp_enqueue_style( 'bestfreebie-metrize' );
					}
				}
		
		}
		
	}
	
	Bestfreebie_elementor_icons::instance();