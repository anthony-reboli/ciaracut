
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
	<title>Paiement</title>
</head>
		<body id="paiement">

			<header>
			<?php include("../include/bar-nav.php");?>
			</header>
			<section id="paiement">
			<?php
			$id_utilisateurs=$_SESSION['id'];
			$id = $_GET['id'];
			$connexion=mysqli_connect("localhost","root","","ciaracut");
			$req=("SELECT prixtotal FROM panier ");
			$query2=mysqli_query($connexion,$req);
			$res=mysqli_fetch_all($query2);	
			?>

			<h1 id="montant">Le montant total à payer est de:<?php echo $res[0][0]?>€</h1>

			

 			<div id="contpaiement">
			<H2 class id="titre">En espèce ou chèque</H2><br>
 			<form method="post">
 				<label>Nom du client</label><br>
 				<input type="text" name="nom" required><br>
 				<label>Prénom du client</label><br>
 				<input type="text" name="prenom" required><br>
 				<label>Mode de paiement</label><br>
 				<select class="formpaiement" name="mode" required><br>
			    <option class="formpaiement">-Choisir type paiement-</option>
			    <option value="espece" required>Espece</option>
			    <option value="cheque"required>Chèque</option>
				</select><br>					
 				<button id="btpayer" name="payer"><img width="50" height="30" src="../upload/paiement.jpg"></button><br>	
 			</form>
 			</div>
 		</section>
		
		<?php
			
			if (isset($_POST['payer'])) {
								
			$id_utilisateurs=$_SESSION['id'];
			$idpanier = $_GET["id"];
			$mode=$_POST['mode'];
			$nom=$_POST['nom'];
			$prenom=$_POST['prenom'];
			$connexion=mysqli_connect("localhost","root","","ciaracut");
			$req1=("UPDATE sauvegarde SET mode ='$mode',nom ='$nom',prenom ='$prenom'  WHERE nom is null AND prenom is null");
			var_dump($req1);
			$query1=mysqli_query($connexion,$req1);
			$req2=("DELETE FROM panier WHERE id_utilisateurs=$id_utilisateurs");
			$req3=("DELETE FROM commande WHERE id_utilisateurs=$id_utilisateurs");
			$query3=mysqli_query($connexion,$req2);
			$query4=mysqli_query($connexion,$req3);
			//header("location:boutiqueprestation.php");
		}
			
			?>
			
		<footer>
		<?php include("../include/footer.php");?>
		</footer>
	</body>
</html>



								
							
							
