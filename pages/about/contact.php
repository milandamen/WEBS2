<?php 


?>
<?php include("../../header.php"); ?>

<div id="content">

<h6> Contact </h6>

<p> Heeft u vragen of wilt u een klacht indienen? <br/>
 Dat kan met ons contactformulier hieronder. </p>
 <br/>

	<table class="contactform">
		<form>	
			<tr>
				<td><label> Naam </label></td>
				<td><input type="text" placeholder="Naam"/> <br/> </td>
			</tr>
			<tr>	
				<td><label> Emailadres </label></td>
				<td><input type="text" placeholder="Email"/><br/></td>
			</tr>
			<tr>	
				<td><label> Product </label></td>
				<td><input type="text" placeholder="Product"/><br/></td>
			</tr>

			<tr>	
				<td><label> Vraag </label></td>
				<td><textarea cols="40" rows="5" placeholder="Omschrijving"></textarea><br/> </td>
			</tr>
			<tr> <td> </td>
			<td><input type="submit"  /> </td>
		</tr>
		</form>	
	</table>



</div>

<?php 


include('../../sidebar.php'); 
include('../../footer.php');?>
