<?php 

//TODO delcare/define

class db {
	const FETCH_ASSOC = PDO::FETCH_ASSOC;	// Return fetch result as an associaive array.
	const FETCH_OBJ = PDO::FETCH_OBJ;		// Return fetch result as an array with objects.

	public $database;						// PDO object for database connection handling.
	
	// Smart statements
	private $usesmartstmt;					// Boolean for enable/disable of smart statements mode.
	private $lastquery;						// When smart statements mode is enabled, this variable will contain the string of the last query.
	private $laststmt;						// When smart statements mode is enabled, this variable will contain the PDOStatement object of the last query.
	
	/**
		Constructor for this database library. Sets use of smart statements and connects to the database.
	*/
	function __construct($smartstmt = false) {
		$this->usesmartstmt = $smartstmt;
		$this->dbConnect();
	}
	
	/**
		Destructor for this database library. Closes the database connection and any open statements.
	*/
	function __destruct() {
		$this->dbClose();
	}
	
	/**
		Connect to the database.
	*/
	public function dbConnect() {
		try {
			$this->database = new PDO('mysql:host=159.253.0.111;dbname=corintn78_bier','corintn78_bier','Nan9pLgP');
		} catch(PDOException $e){
			echo 'Database error: '.$e->getMessage().'<br/>';
		}
	}
	
	/**
		Close the database connection and any open statements.
	*/
	public function dbClose() {
		$this->closeLastStatement();
		$this->database = null;
	}
	
	/**
		If you enabled smart statements, manually disconnect and remove the last statement.
	*/
	public function closeLastStatement() {
		$this->lastquery = null;
		$this->laststmt = null;
	}
	
	/**
		Execute a query. If the query returns rows, the result gets returned depending on what mode is set.
		Mode db::FETCH_ASSOC:   return an associative array
		Mode db::FETCH_OBJ:     return an array with objects
	*/
	public function execQuery($query, $params = array(), $mode = db::FETCH_ASSOC) {
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
		
		$result;
		if ($mode == db::FETCH_ASSOC) {
			$result = $stmt->fetchAll();
		}
		if ($mode == db::FETCH_OBJ) {
			$result = array();
			while ($row = $stmt->fetchObject()) {
				$result[] = $row;
			}
		}
		
		if ($this->usesmartstmt) {
			$this->lastquery = $query;
			$this->laststmt = $stmt;
		} else {
			$stmt = null;
		}
		return $result;
	}
	
	/** 
		Execute a query. Amount of affected rows are returned.
	*/
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
	
	/**
		Enables or disables the use of smart statements.
	*/
	public function setUseSmartStatement($bool) {
		$this->usesmartstmt = $bool;
	}
	
	/**
		Is the currently pending query the same as last one?
	*/
	private function isLastQuery($query) {
		return $this->lastquery === $query;
	}
}
?>