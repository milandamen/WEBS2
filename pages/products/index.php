<?php 


include_once '../../assets/database_lib.php'; 
date_default_timezone_set('UTC');

$db = new db();

$result = $db->execQuery('SELECT b.name AS name,
				b.id as id,
				br.name AS brand,
				b.price AS price,
				b.img as image,
				brw.name AS brewery
				FROM beer AS b 
				LEFT JOIN brand AS br 
				ON br.id = b.brand_id
				LEFT JOIN brewery AS brw 
				ON brw.id = b.brewery_id ' , array(), db::FETCH_OBJ);

$db->dbClose();

?>
<?php include("../../header.php"); ?>

<div id="content">

<?php foreach($result as $product){   
	$productname = $product -> name;
	$price =  $product -> price;
	$brand = $product -> brand;
	$img = $product -> image;
	$brewery = $product -> brewery;
	$imageurl = "pages/products/".$brand."/".$img;
	$productid = $product -> id;  

	?>

	<div class="productinfo">
		<div class="productcol"> 
			<img src="<?php echo $imageurl; ?>" />
			<p  <?php echo $productname; ?>
				<p class="extrainfo"> <br/>
				<?php echo $brand; ?></i> <br/>
				<?php echo $brewery; ?>
			</p></p>
		
			<a href="pages/products/detail.php?id=<?php echo $productid; ?>"> Meer info</a>
		</div>
			<div class="ordercol"> 
				<price><?php echo $price; ?> </price>
				<p>  Bestellen? </p>
			</div>
	</div>
<?php	
}
?>


</div>

<?php include('../../sidebar.php'); 
 include('../../footer.php');  ?>