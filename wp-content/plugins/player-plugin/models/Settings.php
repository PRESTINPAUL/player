<?php

require_once 'Model.php';

class Settings extends Model{

	public $values;

	function __construct() {
		global $wpdb;
		parent::__construct('plp_settings');
		$rawResults = $this->values = $wpdb->get_results("select * from $this->tableName", OBJECT);
		foreach ($rawResults as $rawResult){
			$this->values[$rawResult->setting] = $rawResult->value;
		}
	}

	function save($postValues){
		global $wpdb;
		foreach ($postValues as $key => $value){
			if(array_key_exists($key, $this->values)){
				$wpdb->update($this->tableName, ['value' => stripslashes($value)], ['setting' => $key]);
			}else{
				$wpdb->insert($this->tableName, ['setting' => $key, 'value' => stripslashes($value)]);
			}
		}
	}

	function get($key){
		return isset($this->values[$key]) ? $this->values[$key] : null;
	}

	function refresh(){
		$this->__construct();
	}

	function export(){
	  $export = array(
	      'rows' => array()
    );
	  foreach($this->values as $key => $value) {
	    $export['rows'][] = $value;
    }
		file_put_contents(__DIR__.'/../export.json', json_encode($export));
	}

}