<?php    
include_once '../../../assets/database_lib.php';

$name = $_POST['name'];
$work = $_POST['work'];
$hours = $_POST['hours'];
$pass = $_POST['pass'];

if ($pass === '42') {
	$db = new db();
	
	$result = $db->execQuery('INSERT INTO blog(name, work, hours) VALUES (:name, :work, :hours)', 
								array(':name' => $name, ':work' => $work, ':hours' => $hours));
	
	$db->dbClose();
} else {
	echo 'Password incorrect';
}

$url = "../blog.php";
echo $url;
header( "Location: $url");
?>