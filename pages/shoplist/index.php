
<?php 
include_once '../../assets/database_lib.php'; 
include_once 'actions/functions.php'; 
date_default_timezone_set('UTC');

$db = new db();


// Hier nog zorgen voor een correct huidig user_id
$result = $db->execQuery('SELECT u.name as username,
						 b.name as name, 
						 b.price as price, 
						 c.number as number
						 FROM cart as c
						 LEFT JOIN beer as b
						 ON c.beer_id = b.id
						 LEFT JOIN user as u
						 ON c.user_id = u.id
						 WHERE c.user_id LIKE 3' 
						  , array(), db::FETCH_OBJ);

$db->dbClose();



include("../../header.php"); 
?>
<div id="content" class="shoppinglist">

<h6> Winkelwagentje</h6>
<p>
<br/>

</p>

<?php  if($result != null){ ?>
<table>
	<tbody>
		<tr>
			<th> Product </th>
			<th> Aantal </th>
			<th> Prijs p. stuk </th>
			<th> Prijs totaal </th>
			<th></th>
		</tr>

<?php foreach($result as $product){  
	$price = substr($product-> price, 1);
	$price = tofloat($price);
	$total = $price * floatval($product -> number);

	?>

	<tr>
		<td> <?php echo $product -> name;  ?></td>
		<td> <?php echo $product -> number;  ?>	</td>
		<td> <?php echo $product -> price;  ?></td>	
		<td> &euro; <?php  echo $total  ?> </td>
		<td> +  -  X</td>
	</tr>

<?php }   ?>




	</tbody>
</table>

<br/>
	<input class="buttondetail" type="button" value="Legen" />
	<input class="buttondetail" type="button" value="Betalen" />


<?php  }  else {  ?>

<p>
Uw winkelwagentje is nog leeg!
</p>

<?php } ?>

</div>


<?php


?>

<?php include('../../sidebar.php'); ?>
<?php include('../../footer.php');