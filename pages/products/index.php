<?php 


include_once '../../assets/database_lib.php'; 
date_default_timezone_set('UTC');

$db = new db();
$result = $db->execQuery('SELECT b.name, price, br.name as brandname FROM beer AS b LEFT JOIN brand AS br ON b.brand_id = br.id');


$db->dbClose();

?>
<?php include("../../header.php"); ?>

<div id="content">
HLP
<?php foreach($result as $key => $product){   
	$productname = $product['name'];
	$price = $product['price'];
	$brand = $product['brandname'];


	?>

	<div class="productinfo">
			<p> <?php echo $productname; ?> </p>
	</div>
<?php	
}
?>


</div>

<?php include('../../sidebar.php'); 
 include('../../footer.php');  ?>