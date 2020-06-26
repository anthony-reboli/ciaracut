<?php
session_start();
ob_start()

?>
<html>
<head>
	<meta charset="utf-8">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
	<title>Panier</title>
</head>
		<body id="pagepanier">
			<header>
				<?php include("../include/bar-nav.php");?>
			</header>
							<section id="contpanier">
									 <a href="../sources/boutiqueprestation.php"><button class="btn btn-secondary">Retour sur la boutique</button></a>

 								<h1 class="titre">Votre Panier</h1>
  				<?php
 							
                                $connexion = new PDO('mysql:host=localhost;dbname=ciaracut', 'root', '');
								$id_utilisateurs=$_SESSION['id'];
								$rep= $connexion->query("SELECT * FROM commande INNER JOIN prestation ON commande.id_prestation=prestation.id ");
								$test = $rep->fetchAll();
								
								$i=0;
	            				foreach ($test as $values)
								{
						        		if (!empty($values)) {
						        				          
										$did=$values[0];
										$img=$values[10];
										$nom=$values[6];
										$prixglobal=$values[3];
										
										echo" <div class=\"presta\">";
										echo "<h1 class=\"nomp\">$nom </h1><br>";
										echo "<img class=\"imagebout\" src=\"../upload/$img\">";
										echo "<p class=\"nomp\">{$values['7']}</p>";
										echo "<p class=\"nomp\">{$values['3']}€</p>";
										echo "</div>";
											include("../include/quantite.php");
																	
											$i++;
																  
										}
										 
									}

									$connexion = new PDO('mysql:host=localhost;dbname=ciaracut', 'root', '');
									$req=$connexion->query("SELECT SUM(prixglobal) FROM commande WHERE id_utilisateurs=$id_utilisateurs");
									$total = $req->fetchAll();
								
													   			
									?>
									<p class="nomp">Le montant total est : <?php echo "".$total[0][0].""?>€</p>
									<?php

									if (isset($_POST['ajoutpanier'])) 
									{

									$connexion=mysqli_connect("localhost","root","","ciaracut");
									$id_utilisateurs=$values[1];
									$id_produits=$values[2];
									$prixtotal=$total[0][0];
									$req="INSERT INTO panier (id_utilisateurs,id_produit,datepanier,prixtotal) VALUES ('$id_utilisateurs','$id_produits',NOW(),'$prixtotal')";
									$query=mysqli_query($connexion,$req);
									// $req2="INSERT INTO sauvegarde (id_utilisateurs,id_produit,datepanier,prixtotal) VALUES ('$id_utilisateurs','$id_produits',NOW(),'$prixtotal')";
									// $query2=mysqli_query($connexion,$req2);
									$id = mysqli_insert_id($connexion);
									header("location:paiement.php?id=".$id);
									}
														
							?>
							<form method="post">
								<button class="ajoutpanier" name="ajoutpanier"/><img width="50" height="50" src="../upload/panier.jpg"></button>
							</form>
						</section>
						<footer>
								<?php include("../include/footer.php");?>
						</footer>
	
			</body>
</html>



								
							
							




								
							
							
