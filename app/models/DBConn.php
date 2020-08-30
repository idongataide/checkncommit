<?php
/**
 * 
 */
class DBConn
{
	public $connection;
	public $server = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "checkncommit";
	function __construct(){
		try {
		    $this->connection = mysqli_connect($this->server, $this->username, $this->password, $this->database);
		} catch (Exception $errormsg) {
		    echo $errormsg->getMessage();
		}
	}
	public function getStructureData( $results ){
		$data = array();
		while($tmp_data = mysqli_fetch_array($results)){
			$data[] = $tmp_data;
		}
		return $data;
	}
}
?>