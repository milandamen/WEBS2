<?php 


include_once '../../assets/database_lib.php'; 
date_default_timezone_set('UTC');

$timeMilan =0;
$timeCorina =0;

$db = new db();
$result = $db->execQuery('SELECT * FROM blog');

foreach($result as $key => $blogitem){

	if($blogitem['name'] === 'Corina'){
		$timeCorina += $blogitem['hours'];
	} else {
		$timeMilan += $blogitem['hours'];
	}

}
$totalTime = $timeMilan + $timeCorina;
$db->dbClose();

?>

<?php $pagetitle = 'Blog';
include("../../header.php"); ?>

<div id="content">

<h2> Blog </h2>

<div id="start">
<div id="blogform">
	<form action="pages/blog/actions/submitlog.php" method="post">
			<select name="name">
  			<option value="Corina">Corina</option>
  			<option value="Milan">Milan</option>
		</select> 

		<input name="hours" type="number" placeholder="Uren"/><br/> <br/>
		<textarea name="work" placeholder="Work done" rows="5" cols="50"> </textarea>
		<br/> <br/>
		<input type="text" name="pass" placeholder="pass"/><input type="submit" value="Opslaan"/>
	</form>

</div>
	
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

</div>

<?php foreach($result as $key => $blogitem){  ?>
	<div class="message">
		<?php 	$name = $blogitem['name'];
			$time = $blogitem['hours'];
			$what = $blogitem['work']; 
			$date = $blogitem['date'];
			$datehalf = explode(' ', $date);
			$dtime = explode('-', $datehalf[0]);
			?>
		<h4> Log <?php echo $dtime[2] . '-'. $dtime[1]. '-'. $dtime[0]; ?> </h4>
		<p> 
		<table>
		<tr> 
		 	<td><b>Datum</b> </td>
			<td> <?php echo $dtime[2] . '-'. $dtime[1]. '-'. $dtime[0]; ?> </td>
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

<?php } ?>

	
</div>

<?php include('../../sidebar.php'); ?>
<?php include('../../footer.php');