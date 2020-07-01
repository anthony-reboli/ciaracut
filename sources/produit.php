<?php
        if (!isset($_SESSION['login']))
        {
            header("location:index.php");
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
   <?php include("../include/bar-nav.php");?>
</header>
							
		
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
										                        echo" <div class=\"presta\">";
										                        echo "<h1 class=\"nomp\">$nom </h1><br>";
										                        echo "<a href=\"panier.php?p=$did\"><img class=\"imagebout\" src=\"../upload/$img\"></a>";
										                        echo "<p class=\"nomp\">{$val['2']}</p>";
										                        echo "<p class=\"nomp\">{$val['3']}€</p>";
										                        echo "</div>";
										                        include("../include/quantite2.php");
															
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
								    		<button id="btvalprod" name="valider2"><img id="imgbtval" height="65" width="65" src="../upload/ajout.png"></button>
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
								<?php include("../include/footer.php");?>
						</footer>
						
				
			</body>
</html>
