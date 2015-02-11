<?php 

class db {

	public $database;
	
	function __construct() {
		$this->dbConnect();
	}

	public function dbConnect() {
		global $database;
		try {
			$database = new PDO('mysql:host=159.253.0.111;dbname=corintn78_bier','corintn78_bier','Nan9pLgP');
		} catch(PDOException $e){
			echo 'Database error: '.$e->getMessage().'<br/>';
		}
	}

	public function dbClose() {
		global $database;
		$database = null;
	}
	
	public function execQuery($query, $params = array(), $bindonvalue = false) {
		global $database;
		$stmt = $database->prepare($query);
		
		foreach ($params as $key => $value) {
			$stmt->bindParam($key, $value);
		}
		
		$stmt->execute();
		$result = $stmt->fetchAll();
		$stmt = null;
		return $result;
	}
	
	public function rowCountFromQuery($query, $params = array()) {
		global $database;
		$stmt = $database->prepare($query);
		
		foreach ($params as $key => $value) {
			$stmt->bindParam($key, $value);
		}
		
		$stmt->execute();
		$rowcount = $stmt->rowCount();
		$stmt = null;
		return $rowcount;
	}
}
?>