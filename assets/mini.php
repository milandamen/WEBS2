<?php 
include_once 'database_lib.php';

$db = new db();
//$result = $db->execQuery('SELECT * FROM country');
//$result = $db->execQuery('INSERT INTO country (name) VALUES (:name)', array(':name' => 'Nederland'));
$result = $db->rowCountFromQuery('SELECT * FROM country');
$db->dbClose();

var_dump($result);
?>
