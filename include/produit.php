<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<html>
	<head>
		<title>Produit</title>
		<link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
		<meta charset="utf-8">
	</head>
			<body id="pageproduit">
				<header>
				<?php	include("bar-nav.php");?>
				</header>
							
		
						<section>
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
															echo" <div class=\"presta\">";
                        									echo "<h1 class=\"nomp\">$nom </h1><br>";
                        									echo "<a href=\"../include/produit.php?p=$did\"><img class=\"imagebout\" src=\"../upload/$img\"></a>";
                        									echo "<p class=\"nomp\">{$val['2']}</p>";
                        									echo "<p class=\"nomp\">{$val['3']}€</p>";
                        									echo "</div>";
															$i ++;
														}
															else
														{
															echo "Veuillez choisir un produit!";
					    								}

					    							}
								    		}
								    								
								    		if(!empty($_GET['p'])) {
    										
    											$connexion=mysqli_connect("localhost","root","","ciaracut");
    											$retour=$_GET['p'];
    											$prixglobal=$val[3];
    											$req2="INSERT INTO commande (id_utilisateurs,id_prestation,prixglobal,datecreation) VALUES ('$id_utilisateurs','$retour','$prixglobal',NOW())";
    											$query2=mysqli_query($connexion,$req2);
    											header("location:../include/panier.php");
    									
    										}
    									
    											?>
    									
    									
						</section>
						<footer>
								<?php include("footer.php");?>
						</footer>
						
				
			</body>
</html>
