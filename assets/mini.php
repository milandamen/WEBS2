<?php 
include_once 'database_lib.php';

$db = new db(true);
//$result = $db->execQuery('SELECT * FROM country');
//var_dump($result);
//$result = $db->execQuery('INSERT INTO country (name) VALUES (:name)', array(':name' => 'Nederland'));
//var_dump($result);
//$result = $db->rowCountFromQuery('SELECT * FROM country');
//var_dump($result);
//$result = $db->execQuery('SELECT * FROM blog');
//var_dump($result);
$result = $db->execQuery('SELECT * FROM blog', array(), db::FETCH_OBJ);
var_dump($result);
echo $result[0]->name;

$db->dbClose();

?>
