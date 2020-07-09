<?php
if (($_SESSION['login']) == "vanessa")
{
	?>
		  <!-- Large modal -->
		<button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg">fiche client</button>

		<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <form class="form-row" method="post">
				<label for="formGroupExampleInput">Remplir la fiche du client:</label><br>
				<textarea class="form-control" id="ficheS" name="fiche" rows="5" cols="30"></textarea>
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

 echo "Votre saisie a été completé";

}
