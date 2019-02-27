<?php

class DBBootstrap {

	static function TableName($table){
		global $wpdb;
		$prefix = $wpdb->base_prefix;
		if(MULTISITE){
			return sprintf('%s%s_%s',$prefix, get_current_blog_id(), $table);
		}else{
			return sprintf('%s%s',$prefix, $table);
		}
	}

    function create_tables($seed = false){
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        # steps
        $table_name = self::TableName('plp_settings');
        if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
            $sql = "CREATE TABLE $table_name (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                setting varchar(255),
                value text,
                UNIQUE KEY id (id)
        	) $charset_collate;";
            dbDelta( $sql );
            if($seed) $this->seed_table('plp_settings');
        }

    }

    function seed_table($tableName){
        global $wpdb;
        switch ($tableName){
            case 'plp_settings':
                $seed_data = json_decode(file_get_contents(__DIR__.'/seeds/settings.json'));
                foreach ($seed_data->rows as $row) $wpdb->insert(self::TableName($tableName), (array) $row);
                break;
            default: break;
        }
    }

}