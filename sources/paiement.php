<?php
session_start();
ob_start();
?>
<html>
<head>
	<meta charset="utf-8">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
	<title>Paiement</title>
</head>
		<body id="paiement">

			<header class="headeri">
			<?php include("../include/bar-nav.php");?>
			</header>

			<section id="paiementbloc1" class="container">
			<?php
			$id_utilisateurs=$_SESSION['id'];
			$id = $_GET['id'];
			$connexion=mysqli_connect("localhost","root","","ciaracut");
			$req=("SELECT prixtotal FROM panier ");
			$query2=mysqli_query($connexion,$req);
			$res=mysqli_fetch_all($query2);	
			?>

			<h1 id="montant">Le montant total à payer est de: <?php echo $res[0][0]?>€</h1>
            <H2 class id="title">En espèce ou chèque</H2><br>

            <form id="paiementbloc" method="post">

				  <div  class="form-column d-flex align-items-center flex-column justify-content-center">
				  	<h1 class="card-title">Formulaire de paiement</h1>
				    <div class="col-10">
				    <label for="validationDefault01">Nom</label>
				    <input name="nom" type="text" class="form-control" placeholder="Nom client">
				    <small class="exemplescript" class="form-text text-muted">(Exemple:Dupont)</small><br>
				  </div>
				  <div class="col-10">
				   	<label for="validationDefault01">Prénom</label>
				    <input name="prenom" type="text" class="form-control" placeholder="Prénom client">
				    <small class="exemplescript" class="form-text text-muted">(Exemple:Madeleine)</small><br>
				  </div>
				  <div class="form-group col-md-10">
				    <label for="inputState">Paiement</label>
				    <select name="mode" id="inputState" class="form-control">
				    <option selected>Choisir...</option>
				   	<option value="espece" required>Espece</option>
					<option value="cheque"required>Chèque</option>
				    </select>
				  </div>
				     <button name="payer" class="btn btn-light" type="submit">Payer</button>
				  </div>
			</form>	
 		</section>

		
		<?php
		
			
			if (isset($_POST['payer'])) {

						
			$datejour=date('Y-m-d');

			$bdd = mysqli_connect("localhost", "root", "", "ciaracut");

				$nomclient=$_POST['nom'];
				$prenomclient=$_POST['prenom'];
				$modeclient=$_POST['mode'];
				$selectotal="SELECT * FROM utilisateurs where nom ='$nomclient'";

				$selectotalQ=mysqli_query($bdd,$selectotal);
				$selectotalR=mysqli_fetch_all($selectotalQ);

				$dateR=$selectotalR[0][6];
				// $dateR = date('Y-m-d', $dateR);
				$dateRT=strtotime($dateR);
					

				$test=strtotime("+7 day", $dateRT);
				$test=date('Y-m-d', $test);
				$datetime1 = date_create($dateR);
				$datetime2 = date_create($test);
				$datetime3 = date_create($datejour);
				$interval = date_diff($datetime1, $datetime2);
				$interval1 = date_diff($datetime1, $datetime3);

				if($datetime3 >= $datetime1 == "true" and $datetime3 <= $datetime2 == "true")
		{
			
					$selectS="SELECT * FROM sauvegarde where nom = '$nomclient' and datepanier LIKE ('$datejour%')";
					var_dump($selectS);
								 $req1=("UPDATE sauvegarde SET mode ='$modeclient',nom ='$nomclient',prenom ='$prenomclient'  WHERE nom is null AND prenom is null");
								 
								$query1=mysqli_query($bdd,$req1);
		

		$deux=mysqli_query($bdd,$selectS);
		$trois=mysqli_fetch_all($deux);
		foreach ($trois as $key2) {
			 	
			 	$prix=$key2[4];
			 	

			 	
			 	$red="SELECT prixtotal from sauvegarde where prixtotal= '$prix'";
			 	
				$redQ=mysqli_query($bdd,$red);
				$redR=mysqli_fetch_all($redQ);



					
						foreach ($redR as $key3) {
							
													$a=$key3[0];
													$b=10;
													$resultat= $a - ($a * ($b/100));
															
													$prix="UPDATE sauvegarde set prixtotal= $resultat where nom = '$nomclient' and datepanier LIKE  ('$datejour%')";
													
													
													
													$prixQ=mysqli_query($bdd,$prix);
													
													
												 }
			 							}
			
		}
			else
			{



								
			$id_utilisateurs=$_SESSION['id'];
			$idpanier = $_GET["id"];
			$mode=$_POST['mode'];
			$nom=$_POST['nom'];
			$prenom=$_POST['prenom'];
			$connexion=mysqli_connect("localhost","root","","ciaracut");
			$req1=("UPDATE sauvegarde SET mode ='$mode',nom ='$nom',prenom ='$prenom'  WHERE nom is null AND prenom is null");
			$query1=mysqli_query($connexion,$req1);
			$req2=("DELETE FROM panier WHERE id_utilisateurs=$id_utilisateurs");
			$req3=("DELETE FROM commande WHERE id_utilisateurs=$id_utilisateurs");
			$query3=mysqli_query($connexion,$req2);
			$query4=mysqli_query($connexion,$req3);
			
			 header("location:boutiqueprestation.php");
			}
		}
			
			?>
			<footer class="headeri">
    		<?php include("../include/footer.php");?>
			</footer>
		
	</body>
</html>



								
							
							
