<?php
require_once 'session_lib.php';
// Implicit require database_lib

class user {
	public $id;
	public $username;
	public $name;
	public $surname;
	public $address;
	public $postal;
	public $city;
	public $country_id;
	public $session_token;
	
	/**
		Constructor for this user library. Initializes user data.
	*/
	function __construct() {
		$this->$session_token = session_id();
		
		$this->getData();
	}
	
	/**
		If user is logged in, returns true, else returns false;
	*/
	public function isLoggedIn() {
		return isset($this->id);
	}
	
	/**
		Logs in user if input username and password are correct.
	*/
	public function login($usern, $pass) {
		if (isset($usern) && !empty($usern) && isset($pass) && !empty($pass)) {
			$success = false;
			$db = new db();
			
			$result = $db->execQuery('
					SELECT 
						id, 
						username 
					FROM user 
					WHERE username = :username AND password = :password', 
					array(
						':username' => $usern,
						':password' => $pass
					), 
					db::FETCH_OBJ);
			
			if (is_array($result) && count($result) == 1) {
				$db->execQuery('
						UPDATE user 
						SET session_token = :session_token 
						WHERE user.id = :id',
						array(
							':id' => $result[0]->id,
							':session_token' => $this->session_token
						);
				
				$success = true;
			}
			
			$db->dbClose();
			
			$this->getData();
			
			return $success;
		} else {
			return false;
		}
	}
	
	/**
		Logs out user if he is logged in.
	*/
	public function logout() {
		if ($this->isLoggedIn()) {
			$db = new db();
			
			$db->execQuery('
					UPDATE user 
					SET session_token = NULL 
					WHERE user.id = :id',
					array(':id' => $this->id);
			
			$db->dbClose();
		}
	}
	
	/**
		Fills instance variables with user data from database.
	*/
	private function getData() {
		$db = new db();
		
		$result = $db->execQuery('
				SELECT 
					id, 
					username, 
					name, 
					surname, 
					address, 
					postal, 
					city, 
					country_id 
				FROM user 
				WHERE session_token = :session_token', 
				array(':session_token' => $session_token), 
				db::FETCH_OBJ);
		
		if (is_array($result) && count($result) == 1) {
			$this->id = $result[0]->id;
			$this->username = $result[0]->username;
			$this->name = $result[0]->name;
			$this->surname = $result[0]->surname;
			$this->address = $result[0]->address;
			$this->postal = $result[0]->postal;
			$this->city = $result[0]->city;
			$this->country_id = $result[0]->country_id;
		} else {
			// User is not logged in. (Anonymous user)
		}
		
		$db->dbClose();
	}
	
}

?>