<?php 

class db {

	public $database;
	
	// Smart statements
	private $usesmartstmt;
	private $lastquery;
	private $laststmt;
	
	// TODO __destruct()
	
	function __construct($smartstmt = false) {
		$this->usesmartstmt = $smartstmt;
		$this->dbConnect();
	}
	
	function __destruct() {
		$this->dbClose();
	}

	public function dbConnect() {
		try {
			$this->database = new PDO('mysql:host=159.253.0.111;dbname=corintn78_bier','corintn78_bier','Nan9pLgP');
		} catch(PDOException $e){
			echo 'Database error: '.$e->getMessage().'<br/>';
		}
	}

	public function dbClose() {
		$this->closeLastStatement();
		$this->database = null;
	}
	
	public function closeLastStatement() {
		$this->lastquery = null;
		$this->laststmt = null;
	}
	
	public function execQuery($query, $params = array()) {
		$stmt = null;
		if ($this->usesmartstmt && $this->isLastQuery($query)) {
			$stmt = $this->laststmt;
			echo 'last stmt';
		} else {
			$this->closeLastStatement();
			$stmt = $this->database->prepare($query);
			echo 'new stmt';
		}
		
		foreach ($params as $key => $value) {
			$stmt->bindValue($key, $value);
		}
		
		$stmt->execute();
		$result = $stmt->fetchAll();
		if ($this->usesmartstmt) {
			$this->lastquery = $query;
			$this->laststmt = $stmt;
		} else {
			$stmt = null;
		}
		return $result;
	}
	
	public function rowCountFromQuery($query, $params = array()) {
		$stmt = null;
		if ($this->usesmartstmt && $this->isLastQuery($query)) {
			$stmt = $this->laststmt;
		} else {
			$this->closeLastStatement();
			$stmt = $this->database->prepare($query);
		}
		
		foreach ($params as $key => $value) {
			$stmt->bindValue($key, $value);
		}
		
		$stmt->execute();
		$rowcount = $stmt->rowCount();
		if ($this->usesmartstmt) {
			$this->lastquery = $query;
			$this->laststmt = $stmt;
		} else {
			$stmt = null;
		}
		return $rowcount;
	}
	
	public function setUseSmartStatement($bool) {
		$this->usesmartstmt = $bool;
	}
	
	private function isLastQuery($query) {
		return $this->lastquery === $query;
	}
}
?>