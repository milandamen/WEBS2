<?php 
include_once '../../assets/session_lib.php';
include_once '../../assets/database_lib.php';
include_once '../../assets/user_lib.php';

$product;

if (isset($_GET['id'])) {
	$db = new db();
	
	$result = $db->execQuery('
			SELECT 
				b.name AS name,
				br.name AS brand,
				s.name AS sort,
				b.content AS content,
				b.percentage AS percentage,
				w.name AS wrapping,
				brw.name AS brewery,
				c.name AS country,
				b.description AS description 
			FROM beer AS b 
			LEFT JOIN brand AS br 
				ON br.id = b.brand_id 
			LEFT JOIN sort AS s 
				ON s.id = b.sort_id 
			LEFT JOIN wrapping AS w 
				ON w.id = b.wrapping_id 
			LEFT JOIN brewery AS brw 
				ON brw.id = b.brewery_id 
			LEFT JOIN country AS c 
				ON c.id = brw.country_id 
			WHERE b.id = :id', 
			array(':id' => $_GET['id']), 
			db::FETCH_OBJ);
	
	$db->dbClose();
	
	if (is_array($result) && count($result) == 1) {
		$product = $result[0];
	} else {
		die('ERROR: Recieved invalid result from database!');
	}
} else {
	die('ERROR: GET request invalid!');
}
?>
<?php include("../../header.php"); ?>

<div id="content">
	<h6><?php echo $product->name ?></h3>
	<div class="details">
		<img class="prod_detailimg" src="pages/products/img/<?php echo $product->name; ?>/<?php echo $product->name; ?>.png" />
		<h4>Specificaties</h4>
		<p> 
			<table>
				<tr>
					<td>Merk</td>
					<td><?php echo $product->brand; ?></td>
				</tr>
				<tr>
					<td>Soort</td>
					<td><?php echo $product->sort; ?></td>
				</tr>
				<tr>
					<td>Inhoud</td>
					<td><?php echo $product->content; ?></td>
				</tr>
				<tr>
					<td>Alcohol</td>
					<td><?php echo $product->percentage; ?></td>
				</tr>
				<tr>
					<td>Verpakking</td>
					<td><?php echo $product->wrapping; ?></td>
				</tr>
				<tr>
					<td>Brouwerij</td>
					<td><?php echo $product->brewery; ?></td>
				</tr>
				<tr>
					<td>Land</td>
					<td><?php echo $product->country; ?></td>
				</tr>
			</table>
		</p>
		
		<h4>Omschrijving</h4>
		<p><?php echo $product->description; ?></p>    
	</div>
	
	<input class="buttondetail" type="button" value="Bestellen" />
	<input class="buttondetail" type="button" value="Verlanglijstje" />
</div>

<?php include('../../sidebar.php'); ?>
<?php include('../../footer.php');  ?>