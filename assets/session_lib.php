<?php
include_once 'database_lib.php';

session_start();

if (!isset($_SESSION['alreadyinsession']) || $_SESSION['alreadyinsession'] == false) {
	// Starting new session
	$db = new db();
	while ($db->rowCountFromQuery('SELECT sessiontoken FROM cart WHERE sessiontoken = :sessiontoken', array(':sessiontoken' => session_id()))) {
		session_regenerate_id();
		// Generated new session id
	}
	$db->dbClose();
	
	$_SESSION['alreadyinsession'] = true;
} else {
	// Continueing from old session
}

?>