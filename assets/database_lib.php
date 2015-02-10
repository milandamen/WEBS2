<?php 

class db {

	public $database;

function __construct() {
	$this->dbConnect();
	echo 'test';
}


public function dbConnect(){
  	try{
  	 	$database = new PDO('mysql:host=159.253.0.111;dbname=corintn78_bier','corintn78_bier','Nan9pLgP');
	} catch(PDOException $e){
		echo $e->getMessage().'<br/>';
	}
}

public function dbClose(){

}

public function execQuery(){




}

}



?>