<?php 

$timeCorina = 0;
$timeMilan = 0;
$totalTime = $timeMilan + $timeCorina;

?>
<?php include("../../header.php"); ?>

<div id="content">

<h2> Blog </h2>
</br>
	<div id="totals">
		<h3> Totalen </h3>
		<table>
			<tr>
				<td> Corina </td>
				<td> <? echo $timeCorina ?> </td>
			</tr>
			<tr> 
				<td> Milan </td>
				<td> <? echo $timeMilan ?> </td>
			</tr>

			<tr>
				<td> Totaal: </td>
				<td> <? echo $totalTime ?> </td>
			</tr>
		</table>


	</div>

<!-- clean empty  copyable message voor hardcode invoer
	<div class="message">
		<?php 	$name;
			$time;
			$what;
			$date;
			?>
		<h3> Log <?php echo $date; ?> </h3>
		<p> 
		<table>
		<tr> 
		 	<td><b>Datum</b> </td>
			<td> <?php echo $date; ?> </td>
		 </tr> 
		 <tr> 
		 	<td><b>Naam</b> </td>
			<td> <?php echo $name; ?> </td>
		 </tr> 
		 <tr> 
		 	<td><b>Bestede tijd</b> </td>
			<td> <?php echo $time; ?> </td>
		 </tr> 
		 <tr> 
		 	<td><b>Wat gedaan?</b> </td>
			<td> <?php echo $what; ?> </td>
		 </tr> 
		</table>

	</div>
	-->

		<div class="message">
		<?php 	$name = "Corina";
			$time = 4;
			$what = "Design opgezet, basis opzet php gemaakt, css toegepast";
			$date = "08-02-2015";
			?>
		<h4> Log <?php echo $date; ?> </h4>
		<p> 
		<table>
		<tr> 
		 	<td><b>Datum</b> </td>
			<td> <?php echo $date; ?> </td>
		 </tr> 
		 <tr> 
		 	<td><b>Naam</b> </td>
			<td> <?php echo $name; ?> </td>
		 </tr> 
		 <tr> 
		 	<td><b>Bestede tijd</b> </td>
			<td> <?php echo $time; ?> </td>
		 </tr> 
		 <tr> 
		 	<td><b>Wat gedaan?</b> </td>
			<td> <?php echo $what; ?> </td>
		 </tr> 
		</table>

	</div>





</div>

<?php include('../../sidebar.php'); ?>
<?php include('../../footer.php');