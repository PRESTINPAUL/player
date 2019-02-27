<?php

/**
 * Fired during plugin activation
 *
 * @since      1.0.0
 *
 * @package    Player_Landing_Page
 * @subpackage Player_Landing_Page/core
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Player_Landing_Page
 * @subpackage Player_Landing_Page/core
 */

require_once (__DIR__.'/../database/db-bootstrap.php');

if(file_exists(__DIR__.'/../../../../wp-admin/includes/upgrade.php' )){
    require_once(__DIR__.'/../../../../wp-admin/includes/upgrade.php' );
}

# Environment Constraint
if(file_exists(__DIR__.'/../../../../wp/wp-admin/includes/upgrade.php' )){
    require_once(__DIR__.'/../../../../wp/wp-admin/includes/upgrade.php' );
}

class Player_Landing_Page_Activator {

    public static function activate() {

        $db_bootstrap = new DBBootstrap();
        $db_bootstrap->create_tables(true);
    }

}