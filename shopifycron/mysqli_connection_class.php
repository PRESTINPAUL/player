    <?php

include_once 'global_config.php';
/**
 * Database connection class.
 * $db = new db(array(host, user, password, database));
 * $db->connect();
 * $db->query("");
 * $db->disconnect();
 */

class DbHandler {

	protected $db = array();

	protected $connection;
	protected $dataSet;
	protected $sqlQuery;

	protected $databaseName;
	protected $hostName;
	protected $userName;
	protected $passCode;

	function DbHandler() {

		$this->connection = NULL;
		$this->sqlQuery = NULL;
		$this->dataSet = NULL;

		$this->databaseName = DATABASE_NAME;
		$this->hostName = DATABASE_SERVER;
		$this->userName = DATABASE_USER;
		$this->passCode = DATABASE_PASSWORD;

	}

	public function connect() {

		$this->connection = mysqli_connect($this->hostName, $this->userName, $this->passCode, $this->databaseName);

		if (mysqli_connect_error()) {
			throw new Exception("Database connection failed : " . mysqli_connect_error());
		}

		return true;

	}

	public function disconnect() {

		if ($this->connection) {

			mysqli_close($this->connection);
			$this->connection = null;
		}
	}

	/*public function select_db() {
		    		mysqli_select_db($this->connection, $this->db["database"]); }
	*/
	public function query($sql) {

		$result = mysqli_query($this->connection, $sql);

		if ($result === false) {
			return false;
		}
		return $result;

	}

	public function is_connected() {

		return ($this->connection) ? true : false;
	}

	public function select($query) {
		$rows = array();
		$result = mysqli_query($this->connection, $query);
		if ($result === false) {
			return false;
		}
		return $result;
	}

	/**
	 * Insert an associative array into a MySQL database
	 *
	 * @example
	 *    $data = array('field1' => 'data1', 'field2'=> 'data2');
	 *    insertArr("databaseName.tableName", $data);
	 */
	function insertArray($tableName, $insData) {
		$this->connect();
		$columns = implode(", ", array_keys($insData));
		$escaped_values = array_values($insData);
		foreach ($escaped_values as $idx => $data) {
			$escaped_values[$idx] = "'" . $data . "'";
		}

		$values = implode(", ", $escaped_values);
		$query = "INSERT INTO $tableName ($columns) VALUES ($values)";
		$result = mysqli_query($this->connection, $query);
		var_dump($result);

		if (!$result) {
			var_dump(mysqli_error($this->connection));
			die();
			throw new Exception(mysqli_error($this->connection));
		}
		return $result;
	}

}
