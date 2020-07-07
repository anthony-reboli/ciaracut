
<?php session_start();?>
<html>
	<head>
		<title>Produit</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<meta charset="utf-8">
	</head>
			<body id="pageproduit">
			
				  	<header class="headeri">
        			<?php include("../include/bar-nav.php");?>
        			</header>
			
							
		
						<section id="formprestation">
						
								
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
										                        echo" <div id=\"formprestation2\" class=\"card\" style=\"width: 30rem;>";
										                        echo "<H1 class=\"title\">Ma Selection</H1>";
										                        echo "<h3 class=\"nomp\">$nom </h3><br>";
										                        echo "<a href=\"panier.php?p=$did\"><img class=\"card-img-top\" src=\"../upload/$img\"></a>";
										                        echo "<p class=\"card-text\">{$val['2']}</p>";
										                        echo "<p class=\"card-text\">Prix:{$val['3']}€</p>";
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
    									</div>
    								</section>						
				
			</body>
</html>
