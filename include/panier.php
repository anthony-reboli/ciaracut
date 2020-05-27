<?php
session_start();

?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
	<title>Panier</title>
</head>
		<body id="pagepanier">
			<header>
				 <?php include("bar-nav.php");?>
			</header>
				<section id="contpanier">

 								<h1 class="titre">Votre Panier</h1>
  								<?php
                                $connexion = new PDO('mysql:host=localhost;dbname=ciaracut', 'root', '');
								$id_utilisateurs=$_SESSION['id'];
								$rep= $connexion->query("SELECT * FROM commande INNER JOIN prestation ON commande.id_prestation=prestation.id");
								$test = $rep->fetchAll();
								var_dump($test);
								
								$i=0;
	            				foreach ($test as $values)
								{
						        		if (!empty($values)) {
						        			$did=$values[0];
                        					$img=$values[10];
                        					$nom=$values[6];
                        					$type=$values[7];	          
											echo" <div class=\"presta\">";
                        					echo "<h1 class=\"nomp\">$nom </h1><br>";
                        					echo "<a href=\"../include/produit.php?p=$did\"><img class=\"imagebout\" src=\"../upload/$img\"></a>";
                        					echo "<p class=\"nomp\">{$values['7']}</p>";
                        					echo "<p class=\"nomp\">{$values['8']}€</p>";
                        					include("../include/quantite2.php");
                        					echo "</div>";
																	
											$i++;
																  
										}
										 
									}

									$connexion = new PDO('mysql:host=localhost;dbname=ciaracut', 'root', '');
									$req=$connexion->query("SELECT SUM(prixglobal) FROM commande WHERE id_utilisateurs=$id_utilisateurs");
									$total = $req->fetchAll();				   			
									?>
									<p class="nom">Le montant total est : <?php echo "".$total[0][0].""?>€</p>

								<?php
									if (isset($_POST['ajoutpanier'])) 
									{

									$connexion=mysqli_connect("localhost","root","","ciaracut");
									$id_utilisateurs=$values[1];
									$id_produits=$values[2];
									$prixtotal=$total[0][0];
									$req="INSERT INTO panier (id_utilisateurs,id_produit,datepanier,prixtotal) VALUES ('$id_utilisateurs','$id_produits',NOW(),'$prixtotal')";
									$query=mysqli_query($connexion,$req);

									?>	
								
									<?php

									//var_dump($query);	
									
									}
														
							?>
							<form method="post">
								<button class="ajoutpanier"  name="ajoutpanier"/><img width="50" height="50" src="upload/panier.jpg"></button>
							</form>
							<a href="../include/paiement.php"><p>Pour payer cliquer ici!!</p></a>
						</section>
						<footer>
								<?php include("footer.php");?>
						</footer>
	
			</body>
</html>



								
							
							




								
							
							
