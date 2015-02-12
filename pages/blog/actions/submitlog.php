<?php    

$name = $_POST['name'];
$work = $_POST['work'];
$hours = $_POST['hours'];



include_once '../../../assets/database_lib.php'; 
$db = new db();

$result = $db->execQuery('INSERT INTO blog(name, work, hours) 
							VALUES (:name, :work, :hours)', 
							array(':name' => $name, ':work' => $work, ':hours' => $hours));

$db->dbClose();


$url = "../blog.php";
  echo $url;
  header( "Location: $url");

?>