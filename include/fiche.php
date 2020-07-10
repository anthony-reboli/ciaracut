<?php
if (($_SESSION['login']) == "vanessa")
{
	?>
		  <!-- Large modal -->
		<button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg">fiche client</button>

		<div class="modal fade bd-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      	<form id="formfiche" class="form-column" method="post">
				<label for="formGroupExampleInput"><b>Remplir la fiche du client:<b></label>
				<textarea class="form-control col-12" id="ficheS" name="fiche" rows="5" cols="30"></textarea><br>
				<input class="btn btn-dark" type="submit" name="ficheE" value="valider">
				</form>
		    </div>
		  </div>
		</div>
		<?php
}


$login=$_SESSION['login'];


$connexion=mysqli_connect("localhost","root","","ciaracut");

if(isset($_POST['ficheE']))
{

	$datefiche=date('Y-m-d');
	$fiche=$_POST['fiche'];
	$U=$_GET['U'];

 	$fiche="UPDATE utilisateurs SET datefiche='$datefiche',fiche= '$fiche' WHERE id= $U";
 	$ficheQ=mysqli_query($connexion,$fiche);
 	   header ("Refresh: 0");

 echo "Votre saisie a été completé";

}
