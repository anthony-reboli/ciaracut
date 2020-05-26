 
<?php
session_start();
date_default_timezone_set('europe/paris');
$bdd = mysqli_connect("localhost", "root", "", "ciaracut");

?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Administrateur - ciaracut </title>
    <link rel="stylesheet" href="boutique.css">
</head>
<body id="pageadmin">
<header>
<?php
include("bar-nav.php");?>
</header>
<h1 class="titre">Nos Prestations</h1>
		<section id="formadmin">
						<div class="form">
						<?php	
							
								
								if (isset($_POST['valider'])) {

									if (!empty($_POST['titre'])&& !empty($_POST['prix'])&& !empty($_POST['type'])) {
													$titre = $_POST['titre'];
									                $prix = $_POST['prix'];
									                $description = $_POST['description'];
									                $type = $_POST['type'];
									                
													$presta = "INSERT INTO prestation (nom,type,prix) VALUES ('$titre','$type', '$prix')";
													$prestaQ=mysqli_query($bdd,$presta);
													var_dump($presta);
													
												
															//var_dump($connexion);
									}
								
								}


								if (isset($_POST['modifM'])) {

									if (!empty($_POST['titreMP'])&& !empty($_POST['prixM'])&& !empty($_POST['typeM'])) {
													$Tapres = $_POST['titreMP'];
													$Tavant = $_POST['titreMA'];
									                $prix = $_POST['prixM'];
									                $description = $_POST['description'];
									                $type = $_POST['typeM'];
									                
													$presta = "UPDATE prestation set nom='$Tapres',prix=$prix,type='$type' where nom='$Tavant'";
													$prestaQ=mysqli_query($bdd,$presta);
													var_dump($presta);
													
												
															//var_dump($connexion);
									}
								
								}
								
							  ?>
							   <form method="post" >
							  <button type="submit" name="creation">Prestations</button>
							</form>
							  <?php 
							  	if(isset($_POST['creation']))
							  	{
							  		?>

							  								<div id="createA">
										<h3>Créer une prestation</h3>
							  <form method="post" >
							                    <label>titre</label></br>
							                    <input type="text" name="titre"></br>							          
							                    <label>Prix</label></br>
							                    <input type="number" name="prix"></br>
							                    <label>type</label></br>
							                    <input type="text" name="type" required></br>
							                    <input type="submit" value="Envoyer" name="valider"></br>
							   </form>
							   		</div>
							   <div id="modifcre">
							   	<h3>Modifier une prestation</h3>
							   		<form method="post" >
							                    <label>titre avant</label></br>
							                    <input type="text" name="titreMA" required></br>
							                    <label>titre apres</label></br>
							                    <input type="text" name="titreMP" required></br>								          
							                    <label>Prix</label></br>
							                    <input type="number" name="prixM" required></br>
							                    <label>type</label></br>
							                    <input type="text" name="typeM" required ></br>
							                    <input type="submit" value="Modifier" name="modifM"></br>
							   		</form>
							   </div>
							</div>
							<?php

								}

						?>

						<!-- reservation -->
							<form method="post" >
							  	<button type="submit" name="reservation">Reservation</button>
							</form>
						<?php 
						if(isset($_POST['reservation']))
						{
							$reserv="SELECT * FROM reservation inner join utilisateurs on id_utilisateurs = utilisateurs.id";
							$reservQ=mysqli_query($bdd,$reserv);


						

							while($data= mysqli_fetch_assoc($reservQ))
						            {
										 $i=0;
						                $nom=$data['nom'];
						                $prenom=$data['prenom'];
						                $nais=$data['date_naissance'];
						                $ids=$data['id'];
						                $debut=$data['debut'];
						                $fin=$data['fin'];

						                var_dump($data);
						                echo"<div id='infouser'>";
						                echo "nom:&nbsp $nom &nbsp";
						                echo "prenom:&nbsp $prenom &nbsp";
						                echo "née: &nbsp$nais &nbsp";
						                echo "debut:&nbsp$debut &nbsp";
						                echo "debut:&nbsp$fin &nbsp";

						                echo "<a href=\"profil.php?U=$ids\" target=\"_blank\"><button name=\"profil\">Profil</button></a>";
						                echo"</div>";



						                $i++;
										
						            }
						}


						// Membre

						?>
						<form method="post" >
							  	<button type="submit" name="membre">client</button>
							</form>
						<?php 
						if(isset($_POST['membre'])) //quand on clique sur client
						{

							?>
							<form method="post">
								<input type="text" name="RechercheU">
								<button type="submit" name="butrecherche">Rechercher</button>
							</form>
							<?php
							$user="SELECT * FROM utilisateurs";
							$reservQ=mysqli_query($bdd,$user);
							

										while($data= mysqli_fetch_assoc($reservQ))
						            		{
												include("../include/infouseradmin.php");

						            		}




						}
										 if(isset($_POST['butrecherche']))  //on recherche un utilistateur
						            {
						            	$rechercheA=$_POST['RechercheU'];
						            	$userR="SELECT * FROM utilisateurs where nom like '$rechercheA%'";
										$reservQ2=mysqli_query($bdd,$userR);
										
										
										while($data= mysqli_fetch_assoc($reservQ2))
						            		{
						            			include("../include/infouseradmin.php");

						            		}



										
						            }
						?>
						


							


				
</section>
<footer>
	</footer>
</body>
</html>