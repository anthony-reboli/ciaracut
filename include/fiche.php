
<!-- Large modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <form method="post">
		<label for="ficheS">Remplir la fiche du client:</label><br>
		<textarea id="ficheS" name="fiche" rows="5" cols="33"></textarea>
		<input type="submit" name="ficheE" value="valider">
		</form>
    </div>
  </div>
</div>




<?php
$login=$_SESSION['login'];


$connexion=mysqli_connect("localhost","root","","ciaracut");

if(isset($_POST['ficheE']))
{

	
	$fiche=$_POST['fiche'];
	$U=$_GET['U'];

 	$fiche="UPDATE utilisateurs SET fiche= '$fiche' WHERE id= $U";
 	
 	$ficheQ=mysqli_query($connexion,$fiche);

 echo "votre saisie a etait completer";

}
