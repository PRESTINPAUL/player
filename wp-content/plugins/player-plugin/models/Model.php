<?php

	abstract class Model {

		public $tableName;

		function __construct($table) {
			global $wpdb;

			$prefix = $wpdb->base_prefix;
			if(MULTISITE){
				$this->tableName = sprintf('%s%s_%s', $prefix, get_current_blog_id(), $table);
			}else{
				$this->tableName = sprintf('%s%s', $prefix, $table);
			}
		}

	}