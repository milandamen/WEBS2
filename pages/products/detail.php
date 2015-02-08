<?php 


?>
<?php include("../../header.php"); ?>

<div id="content">

	<?php  

	$productname = 'La Chouffe';
	$sort = 'zwaar blond';
	$contains = 0.75;
	$alcohol = 8;
	$wrapping = 'Fles';
	$brewery = 'Brasserie d\'Achouffe';
	$info = '
			Wil je iemand op originele manier verrassen? Dat kan met deze fles La
			Chouffe (0,75 liter 8% vol). Dit zwaar blond speciaalbier uit Belgie
			heeft een fruitige geur van perzik en frisse kruidige geur van koriander.
			Het is een bier waar bitter, zoet en fruitsmaken elkaar afwisselen; een
			ware smaakexplosie.';

	?>
	<h6> <?php echo $productname ?> </h3>
<div class="details">

	<img class="prod_detailimg" src="pages/products/img/<?php echo $productname ?>/<?php echo $productname ?>.png" />
	<h4> Specificaties </h4>
	<p> 
		<table>
			<tr>
				<td> Soort </td>
				<td> <?php echo $sort; ?></td>
			</tr>
			<tr>
				<td> Inhoud  </td>
				<td> <?php echo $contains; ?></td>
			</tr>
			<tr>
				<td> Alcohol %  </td>
				<td> <?php echo $alcohol; ?></td>
			</tr>
			<tr>
				<td> Verpakking </td>
				<td> <?php echo $wrapping; ?></td>
			</tr>
			<tr>
				<td> Brouwerij  </td>
				<td> <?php echo $brewery; ?></td>
			</tr>

		</table>
	</p>


	<br />
	<br />
	<br />
	<br />
	<br />

	<h4> Omschrijving </h4>
	<p> <?php echo $info; ?> </p>    
</div>

<input class="buttondetail" type="button" value="Bestellen" />
<input class="buttondetail" type="button" value="Verlanglijstje" />

</div>

	<?php include('../../sidebar.php'); ?>



<?php include('../../footer.php'); ?>