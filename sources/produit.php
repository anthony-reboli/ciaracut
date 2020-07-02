
<?php session_start();?>
<html>
	<head>
		<title>Produit</title>
		<link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<meta charset="utf-8">
	</head>
			<body id="pageproduit">
			
				<?php	include("../include/bar-nav.php");?>
			
							
		
						<section id="formprestation">
						
								<H1 class="titre">Ma Selection</H1>
								<?php
								$connexion = new PDO('mysql:host=localhost;dbname=ciaracut', 'root', '');
								$retour=$_GET['p'];
								$id_utilisateurs=$_SESSION['id'];
								$reponse = $connexion->query("SELECT * FROM prestation WHERE prestation.id=$retour ");
								$rep=$reponse->fetchAll();
								
						
      										if (!empty($_GET['p'])) 
      										{
													$i = 0;
													foreach ($rep as $val)
													{
														if (!empty($val)) 
														{
															  	$did=$val[0];
										                        $img=$val[5];
										                        $nom=$val[1];
										                        $type=$val[2];
										                        echo" <div id=\"formprestation\" class=\"card\" style=\"width: 18rem;>";
										                        echo "<h3 class=\"nomp\">$nom </h3><br>";
										                        echo "<a href=\"panier.php?p=$did\"><img class=\"card-img-top\" src=\"../upload/$img\"></a>";
										                        echo "<p class=\"card-text\">{$val['2']}</p>";
										                        echo "<p class=\"card-text\">Prix:{$val['3']}€</p>";
										                           include("../include/quantite2.php");
										                        echo "</div>";
										                        
															
															$i ++;
														}
															else
														{
															echo "Veuillez choisir une prestation!";
					    								}

					    							}
								    		}
								    		?>
								    		<form method="post">
								    		<button id="btvalprod" name="valider2"><span class="material-icons">
											add_circle
											</span></button>
	    									</form>
	    									
								
								    		<?php
    										if (isset($_POST['valider2'])) 
    										{
    											$connexion=mysqli_connect("localhost","root","","ciaracut");
    											$retour=$_GET['p'];
    											$id_utilisateurs=$_SESSION['id'];
    											$prixglobal=$val[3];
    											$req2="INSERT INTO commande (id_utilisateurs,id_prestation,prixglobal,datecreation) VALUES ('$id_utilisateurs','$retour','$prixglobal',NOW())";
    											$query2=mysqli_query($connexion,$req2);
    											header("location:panier.php");
    										}
    											?>
    										</section>
    									
    										
						<footer>
						
						</footer>
						
				
			</body>
</html>
