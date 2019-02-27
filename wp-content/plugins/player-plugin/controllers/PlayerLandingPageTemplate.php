<?php

class Player_Landing_Page_Public {

	private $plugin_name;

	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function enqueue_styles() {
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . '../public/css/main.css', array(), $this->version, 'all');
	}

	public function enqueue_scripts() {

		if ( is_page_template( '../views/player-landing-page-template.php' ) ) {
			wp_enqueue_script('plp-jquery', plugin_dir_url(__FILE__) . '../public/js/vendor/jquery/jquery-3.3.1.min.js', array(), $this->version, true);
			wp_enqueue_script('plp-main', plugin_dir_url(__FILE__) . '../public/js/main.js', array(), $this->version, false);
		}
	}

}
