<?php
namespace ElementorMegaPostsDisplay;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.0.0
 */
class Plugin {

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function widget_scripts() {
		
		// Load WP jQuery if not included
		wp_enqueue_script('jquery');
		
		// Main
		wp_register_style( 'mega-posts-display-posts',  plugins_url( 'assets/css/posts.css', __FILE__ ) );
		wp_register_style( 'mega-posts-display-style',  plugins_url( 'assets/css/style.css', __FILE__ ) );
		wp_register_style( 'fonts-vc',  plugins_url( 'assets/css/fonts.css', __FILE__ ));

		// Carousel
		wp_register_style( 'owlcarousel',  plugins_url( 'assets/css/owl.carousel.css', __FILE__ ) );
		wp_register_style( 'owltheme',  plugins_url( 'assets/css/owl.theme.css', __FILE__ ) );
		wp_register_script( 'owlcarousel',  plugins_url( 'assets/js/vendor/owl.carousel.js' , __FILE__ ), [ 'jquery' ], false, true );	

		// Ticker
		wp_register_script( 'newsTicker',  plugins_url( 'assets/js/vendor/jquery.newsTicker.min.js' , __FILE__ ), [ 'jquery' ], false, true );	
						
		// ANIMATE
		wp_register_style( 'animations',  plugins_url( 'assets/css/animations.min.css', __FILE__ ) );
		wp_register_script( 'appear',  plugins_url( 'assets/js/vendor/appear.min.js' , __FILE__ ), [ 'jquery' ], false, true );	
		wp_register_script( 'animate',  plugins_url( 'assets/js/vendor/animations.min.js' , __FILE__ ), [ 'jquery' ], false, true );		
		
		
		if(\Elementor\Plugin::$instance->preview->is_preview_mode()) {			
			wp_enqueue_style( 'mega-posts-display-posts' );
			wp_enqueue_style( 'fonts-vc' );
			wp_enqueue_style( 'owlcarousel' );
			wp_enqueue_style( 'owltheme' );
			wp_enqueue_style( 'mega-posts-display-style' );
			wp_enqueue_style( 'animations' );
			wp_enqueue_script( 'newsTicker' );			
			wp_enqueue_script( 'owlcarousel' );			
			wp_enqueue_script( 'appear' );			
			wp_enqueue_script( 'animate' );
		}			
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once( __DIR__ . '/widgets/MegaPostsDisplay/posts-display.php' );
		require_once( __DIR__ . '/widgets/MegaPostsDisplay/news-ticker.php' );
		require_once( __DIR__ . '/widgets/MegaPostsDisplay/carousel.php' );
		require_once( __DIR__ . '/widgets/widgets-help-functions.php' );
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Mega_Posts_Display() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Mega_News_Ticker() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Mega_Carousel() );
	}

	/**
	 * Register Category
	 *
	 * Register new Elementor widgets Category.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_category() {

		\Elementor\Plugin::instance()->elements_manager->add_category( 
			'mega-posts-display',
			[
				'title' => 'Mega Posts Display',
				'icon' => 'fa fa-plug',
			],
			1
		);
	
	}
	
	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
		
		// Register widgets Category
		add_action( 'elementor/init', [ $this, 'register_category' ] );
	}
}

// Instantiate Plugin Class
Plugin::instance();
