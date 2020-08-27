<?php
session_start();
ob_start();
   if (!isset($_SESSION['login']) or $_SESSION['login'] != 'vanessa')
   {
   	header('location:index.php');
   }



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

				<?php

					
				
				?>
						<body id="paiement">

							<header class="headeri">
							<?php include("../include/bar-nav.php");?>
							</header>

							<section id="paiementbloc1" class="container">
							<?php
							$id_utilisateurs=$_SESSION['id'];
							if(isset($_GET['id']))
							{
								$id = $_GET['id'];
							}
							
							$connexion=mysqli_connect("localhost","root","","ciaracut");
							$req=("SELECT prixtotal FROM panier ");
							$query2=mysqli_query($connexion,$req);
							$res=mysqli_fetch_all($query2);	

								$bdd = mysqli_connect("localhost", "root", "", "ciaracut");
								$requete="SELECT prixtotal FROM sauvegarde where datepanier ORDER by datepanier DESC LIMIT 1";
								$requeteQ=mysqli_query($bdd,$requete);
								$requeteR=mysqli_fetch_all($requeteQ);
								$somme=$requeteR[0][0];

											if(!isset($_GET['P']))
											{
												$res=$res[0][0];
												echo"<h1 id='notclient'>Le montant total à payer est de:   $res €</h1>";
												
											}
											else
											{
											echo "<p id='notclient'>La nouvelle somme après réduction est de : $somme € </p>";
											
											}
							?>


							
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
						include('../include/fideliter.php');
							?>
							<footer class="headeri">
				    		<?php include("../include/footer.php");?>
							</footer>
						
				</body>
			
				
			
				</html>





								
							
							
