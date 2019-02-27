<?php

class Player_Landing_Page_Admin {

	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

        $this->templates = array();


        // Add a filter to the attributes metabox to inject template into the cache.
        if ( version_compare( floatval( get_bloginfo( 'version' ) ), '4.7', '<' ) ) {

            // 4.6 and older
            add_filter(
                'page_attributes_dropdown_pages_args',
                array( $this, 'register_project_templates' )
            );

        } else {

            // Add a filter to the wp 4.7 version attributes metabox
            add_filter(
                'theme_page_templates', array( $this, 'add_new_template' )
            );

        }

        // Add a filter to the save post to inject out template into the page cache
        add_filter(
            'wp_insert_post_data',
            array( $this, 'register_project_templates' )
        );


        // Add a filter to the template include to determine if the page has our
        // template assigned and return it's path
        add_filter(
            'template_include',
            array( $this, 'view_project_template')
        );


        // Add your templates to this array.
        $this->templates = array(
            '../views/player-landing-page-template.php' => 'Landing Page',
        );
    }

    public function add_new_template( $posts_templates ) {
	    $posts_templates = array_merge( $posts_templates, $this->templates );

	    return $posts_templates;
    }

    public function register_project_templates( $atts ) {

        // Create the key used for the themes cache
        $cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

        // Retrieve the cache list.
        // If it doesn't exist, or it's empty prepare an array
        $templates = wp_get_theme()->get_page_templates();
        if ( empty( $templates ) ) {
            $templates = array();
        }

        // New cache, therefore remove the old one
        wp_cache_delete( $cache_key , 'themes');

        // Now add our template to the list of templates by merging our templates
        // with the existing templates array from the cache.
        $templates = array_merge( $templates, $this->templates );

        // Add the modified cache to allow WordPress to pick it up for listing
        // available templates
        wp_cache_add( $cache_key, $templates, 'themes', 1800 );

        return $atts;

    }

    public function view_project_template( $template ) {

        // Get global post
        global $post;

        // Return template if post is empty
        if ( ! $post ) {
            return $template;
        }

        // Return default template if we don't have a custom one defined
        if ( !isset( $this->templates[get_post_meta(
                $post->ID, '_wp_page_template', true
            )] ) ) {
            return $template;
        }

        $file = plugin_dir_path(__FILE__). get_post_meta(
                $post->ID, '_wp_page_template', true
            );

        // Just to be safe, we check if the file exist first
        if ( file_exists( $file ) ) {
            return $file;
        }

        // Return template
        return $template;

    }

  	public function enqueue_styles($options_page) {
		if($options_page === 'settings_page_player-landing-page') {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . '../public/css/admin.css', array(), $this->version, 'all' );
		}
	}

	public function enqueue_scripts($options_page) {

		if($options_page === 'settings_page_player-landing-page'){
			wp_enqueue_script( 'ec_jquery_js', 'https://code.jquery.com/jquery-3.3.1.min.js' );
			wp_enqueue_script( 'ec_jqueryui_js', 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js' );
			wp_enqueue_style( 'ec_jquery_css', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' );
			wp_enqueue_script( 'ec_tiny', plugin_dir_url(__FILE__) . '../public/js/vendor/tinymce/tinymce.min.js');
			wp_enqueue_script( 'ec_adminjs', plugin_dir_url(__FILE__) . '../public/js/admin.js');
		}
	}

    public function add_plugin_admin_menu() {

        /*
         * Add a settings page for this plugin to the Settings menu.
         *
         * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
         *
         *        Administration Menus: http://codex.wordpress.org/Administration_Menus
         *
         */
        add_options_page( 'Landing Page', 'Landing Page', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'));
    }

    public function add_action_links( $links ) {
        /*
        *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
        */
        $settings_link = array(
            '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
        );
        return array_merge(  $settings_link, $links );

    }

    public function display_plugin_setup_page() {
        include_once( __DIR__.'/../views/player-landing-page-settings.php' );
    }

}
