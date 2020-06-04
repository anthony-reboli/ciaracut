<?php
session_start();
?>
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
			$connexion=mysqli_connect("localhost","root","","ciaracut");
			$req=("SELECT prixtotal FROM panier where id_utilisateurs=$id_utilisateurs");
			$query2=mysqli_query($connexion,$req);
			$res=mysqli_fetch_all($query2);
			
			
			?>

			<h1 id="montant">Le montant total à payer est de:<?php echo $res[0][0]?>€</h1>

			<?php
			
			if (isset($_POST['payer'])) {
				echo "string";
				
				
			$id_utilisateurs=$_SESSION['id'];
			$connexion=mysqli_connect("localhost","root","","ciaracut");
			$req2=("DELETE FROM panier WHERE id_utilisateurs=$id_utilisateurs");
			$req3=("DELETE FROM commande WHERE id_utilisateurs=$id_utilisateurs");
			$query3=mysqli_query($connexion,$req2);
			$query4=mysqli_query($connexion,$req3);
			header("location:../sources/boutiqueprestation.php");
			echo"<p id='validp'> Votre paiement a bien été effectué!<br>Merci de votre visite! <br>A bientot!</p>";
			}
			
			?>

 			<div id="contpaiement">
			<H2 class id="titre">En espèce ou chèque</H2><br>
 			<form method="post">
 				<select class="formpaiement" name="select2"><br>
			    <option class="formpaiement" value="">-Choisir type paiement-</option>
			    <option value="espece" required>Espece</option>
			    <option value="cheque"required>Chèque</option>
				</select><br>					
 				<button id="btpayer" name="payer"><img width="50" height="30" src="../upload/paiement.jpg"></button><br>	
 			</form>
 			</div>
 		</section>
		
			
		<footer>
		<?php include("../include/footer.php");?>
		</footer>
	</body>
</html>



								
							
							
