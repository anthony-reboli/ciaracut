<?php
session_start();
?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
	<title>Paiement</title>
</head>
		<body>

			<header>
			<?php include("../include/bar-nav.php");?>
			</header>
			<section id="paiement">
			<?php
			$id_utilisateurs=$_SESSION['id'];
			$connexion=mysqli_connect("localhost","root","","ciaracut");
			$req=("SELECT prixtotal FROM panier where id_utilisateurs=$id_utilisateurs");
			$query2=mysqli_query($connexion,$req);
			$res=mysqli_fetch_all($query2);
			
			
			?>

			<h1 id="montant">Le montant total à payer est de:<?php echo $res[0][0]?>€</h1>

			<?php
			
			if (isset($_POST['payer'])) {
				
				if (!empty($_POST['select'])&&!empty($_POST['codecb'])&&!empty($_POST['codesec'])&&!empty($_POST['nomcb'])) {
			$id_utilisateurs=$_SESSION['id'];
			$connexion=mysqli_connect("localhost","root","","ciaracut");
			$req2=("DELETE FROM panier WHERE id_utilisateurs=$id_utilisateurs");
			$req3=("DELETE FROM commande WHERE id_utilisateurs=$id_utilisateurs");
			$query3=mysqli_query($connexion,$req2);
			$query4=mysqli_query($connexion,$req3);
			header("location:admin.php");
			echo"<p id='validp'> Votre paiement a bien été effectué!<br>Merci de votre visite! <br>A bientot!</p>";
	

				}

			}
			
			?>

			<h1 class="titre">Votre paiement</h1>
			<img id="logopaiement" height="100" width="400" src="../upload/paiementsecur.jpg">
			<div id="contpaiement">
 			<form class="formpaiement"method="post"><b>
 				<H2>Information CB</H2><br>
 				<label>TYPE CB</label><br>
 				<label>Choisir:</label><br>
				<select class="formpaiement" name="select"><br>
			    <option class="formpaiement" value="">Choisir option-</option>
			    <option value="visa">Visa</option>
			    <option value="master">Mastercard</option>
			    <option value="amex">AMEX</option>
				</select><br>
 				<label>Numéro CB</label><br>
 				<input class="formpaiement" type="number" name="codecb"><br>
 				<label>Code Sécurité</label><br>
 				<input class="formpaiement" type="number" name="codesec"><br>
 				<label>Nom du Porteur</label><br>
 				<input class="formpaiement" type="text" name="nomcb"><br>
 				<button id="btpayer" name="payer"><img width="50" height="30" src="../upload/paiement.jpg"></button><br>	
 			</form>
 			</div>
 		</section>
		
			
		<footer>
		<?php include("../include/footer.php");?>
		</footer>
	</body>
</html>



								
							
							
