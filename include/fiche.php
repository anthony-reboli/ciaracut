<?php
if (($_SESSION['login']) == "vanessa")
{
	?>
		  <!-- Large modal -->
		<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">fiche client</button>
		<!-- Button trigger modal -->

			
		<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remplir la fiche du client:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form id="formfiche" class="form-column" method="post">
		<textarea class="form-control col-lg-12" id="ficheS" name="fiche" rows="5" cols="30"></textarea><br>
		<input class="btn btn-dark" type="submit" name="ficheE" value="valider">
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
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
