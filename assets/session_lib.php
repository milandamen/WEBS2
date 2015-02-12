<?php
include_once 'database_lib.php';

session_start();

if (!isset($_SESSION['alreadyinsession']) || $_SESSION['alreadyinsession'] == false) {
	// Starting new session
	$db = new db(true);
	while ($db->rowCountFromQuery('SELECT token FROM session WHERE token = :sessiontoken', array(':sessiontoken' => session_id()))) {
		session_regenerate_id();
		// Generated new session id
	}
	$db->execQuery('INSERT INTO session (token) VALUES (:sessiontoken)', array(':sessiontoken' => session_id()));
	$db->dbClose();
	
	$_SESSION['alreadyinsession'] = true;
} else {
	// Continueing from old session
}

?>