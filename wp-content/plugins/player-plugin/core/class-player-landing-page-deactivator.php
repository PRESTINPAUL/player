<?php

/**
 * Fired during plugin deactivation
 *
 * @since      1.0.0
 *
 * @package    Player_Landing_Page
 * @subpackage Player_Landing_Page/core
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Player_Landing_Page
 * @subpackage Player_Landing_Page/core
 */

require_once (__DIR__.'/../database/db-bootstrap.php');

class Player_Landing_Page_Deactivator {

    public static function deactivate() {

        global $wpdb;
        $tables = ['plp_settings'];

        foreach ( $tables as $table ) {
            $drop_sql_statement = sprintf("drop table if exists %s", DBBootstrap::TableName($table));
            $wpdb->query($drop_sql_statement);
        }

    }

}