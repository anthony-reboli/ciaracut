<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == 'vanessa')
{
	?>
	<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
	<title>Panier</title>
</head>
		<body id="pagepanier">
			
					<header class="headeri">
        			<?php include("../include/bar-nav.php");?>
        			</header>
        			
        			<div id="btnretour">
        			<a href="../sources/boutiqueprestation.php"><button class="btn btn-dark">Retour sur la boutique</button></a>
        			</div>
					<section id="contpanier">
						<h1 class="title">Votre Panier</h1>
						<div id="produitpanier">
  				<?php
 							
                            $connexion = new PDO('mysql:host=localhost;dbname=ciaracut', 'root', '');
							$id_utilisateurs=$_SESSION['id'];
							$rep= $connexion->query("SELECT * FROM commande INNER JOIN prestation ON commande.id_prestation=prestation.id ");
							$test = $rep->fetchAll();
							$i=0;
	            			foreach ($test as $values)
							{
						        if (!empty($values)) 
						        {
						        				          
								$did=$values[0];
								$img=$values[10];
								$nom=$values[6];
								$prixglobal=$values[3];
								echo" <div id=\"cardpanier\" class=\"card\" style=\"width: 18rem\";>";
								echo "<h1 class=\"nomp\">$nom </h1><br>";
								echo "<img class=\"card-img-top\" src=\"../upload/$img\">";
								echo "<p class=\"card-text\">Détail:{$values['7']}</p>";
								echo "<p class=\"card-text\">Prix:{$values['3']}€</p>";
								include("../include/quantite.php");
								echo "</div>";
																	
							$i++;
																  
								}
										 
							}
									?>
						</div>
									<?php
									$connexion = new PDO('mysql:host=localhost;dbname=ciaracut', 'root', '');
									$req=$connexion->query("SELECT SUM(prixglobal) FROM commande WHERE id_utilisateurs=$id_utilisateurs");
									$total = $req->fetchAll();
								
													   			
									?>

								<div id="infopanier" class="alert" role="alert">
									<p>Le montant total est : <?php echo "".$total[0][0].""?>€</p>
							
									<?php

									if (isset($_POST['ajoutpanier'])) 
									{

									$connexion=mysqli_connect("localhost","root","","ciaracut");
									$id_utilisateurs=$values[1];
									$id_produits=$values[2];
									$prixtotal=$total[0][0];
									$req="INSERT INTO panier (id_utilisateurs,id_produit,datepanier,prixtotal) VALUES ('$id_utilisateurs','$id_produits',NOW(),'$prixtotal')";
									$query=mysqli_query($connexion,$req);
									$id = mysqli_insert_id($connexion);
									 header("location:paiement.php?id=".$id);
									}
														
							?>
						
									<form method="post">
										<button class="ajoutpanier" name="ajoutpanier"/><img width="50" height="50" src="../upload/panier.jpg"></button>
									</form>
								</div>
						</section>
				
					
	
			</body>
</html>
<?php
}
else
{
	header("location:index.php");
}
?>




								
							
							




								
							
							
