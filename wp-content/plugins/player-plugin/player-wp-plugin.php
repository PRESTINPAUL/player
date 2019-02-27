<?php

/**
 * The plugin bootstrap file
 *
 * @since             1.0.0
 * @package           Player_Landing_Page
 *
 * @wordpress-plugin
 * Plugin Name:       Playr Landing Page
 * Plugin URI:        player-landing-page
 * Description:       This plugin enables the Playr Landing page templates, it also enables an admin panel to edit
 * Version:           1.0.0
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * The code that runs during plugin activation.
 * This action is documented in core/class-player-landing-page-activator.php
 */
function activate_Player_Landing_Page() {
	require_once plugin_dir_path( __FILE__ ) . 'core/class-player-landing-page-activator.php';
	Player_Landing_Page_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in core/class-player-landing-page-deactivator.php
 */
function deactivate_Player_Landing_Page() {
	require_once plugin_dir_path( __FILE__ ) . 'core/class-player-landing-page-deactivator.php';
	Player_Landing_Page_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_Player_Landing_Page' );
register_deactivation_hook( __FILE__, 'deactivate_Player_Landing_Page' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'core/class-player-landing-page.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_Player_Landing_Page() {

	$plugin = new Player_Landing_Page();
	$plugin->run();

}

run_Player_Landing_Page();
