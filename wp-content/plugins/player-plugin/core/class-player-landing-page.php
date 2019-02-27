<?php

class Player_Landing_Page {

	protected $loader;

	protected $plugin_name;

	protected $version;

	public function __construct() {
		if ( defined( 'Player_Landing_Page_VERSION' ) ) {
			$this->version = Player_Landing_Page_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'player-landing-page';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	private function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/class-player-landing-page-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/class-player-landing-page-i18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'controllers/PlayerLandingPageSettings.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'controllers/PlayerLandingPageTemplate.php';

		$this->loader = new Player_Landing_Page_Loader();

	}

	private function set_locale() {

		$plugin_i18n = new Player_Landing_Page_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	private function define_admin_hooks() {

		$plugin_admin = new Player_Landing_Page_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
        $this->loader->add_action( 'wp_ajax_wps_get_time',$plugin_admin, 'my_action' );
        $this->loader->add_action( 'wp_ajax_nopriv_wps_get_time',$plugin_admin, 'my_action' );

		// Add menu item
        $this->loader->add_action( 'admin_menu', $plugin_admin, 'add_plugin_admin_menu' );

        // Add Settings link to the plugin
        $plugin_basename = plugin_basename( plugin_dir_path( __DIR__ ) . $this->plugin_name . '.php' );
        $this->loader->add_filter( 'plugin_action_links_' . $plugin_basename, $plugin_admin, 'add_action_links' );
	}

	private function define_public_hooks() {
		$plugin_public = new Player_Landing_Page_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
	}

	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}

}
