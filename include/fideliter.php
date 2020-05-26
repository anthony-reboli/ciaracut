<form method="post">
	<input type="submit" name="prix">
</form>
<?php
$bdd = mysqli_connect("localhost", "root", "", "ciaracut");

	if(isset($_POST['prix']))
	{


	$dateanM=date('n');
	$dateanJ=date('j');

$selectS="SELECT id FROM utilisateurs where mois= '$dateanM' and jour = '$dateanJ'";

$deux=mysqli_query($bdd,$selectS);
$trois=mysqli_fetch_all($deux);

	

	$i=0;
	 foreach ($trois as $key2) {

	 	$idus=$key2[0];
	 	

	 	$i++;
	 	$red="SELECT prixtotal from panier where id_utilisateurs= '$idus'";
		$redQ=mysqli_query($bdd,$red);
		$redR=mysqli_fetch_all($redQ);

			
				foreach ($redR as $key3) {
					
											$a=$key3[0];
											$b=10;
											$resultat= $a - ($a * ($b/100));
													
											$prix="UPDATE panier set prixtotal= $resultat where id_utilisateurs = $idus";
											$prixQ=mysqli_query($bdd,$prix);
											
											
										 }
	 							}
	 }


?>