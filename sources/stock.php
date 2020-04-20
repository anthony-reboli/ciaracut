


<?php 
session_start();

$bdd = mysqli_connect("localhost", "root", "", "ciaracut");

$all="SELECT * FROM `stock` inner join produit on stock.id_produit = produit.id";
$allQ=mysqli_query($bdd,$all);
?>

<html>
<head>
	<title>Boutique</title>
	<link rel="stylesheet" href= "ciaracut.css">
</head>
<body id="stock">
	<header id="headS">
		<?php include("../include/bar-nav.php");?>
	</header>
		<main>
<?php
if (!isset($_GET['p']))
{
		while($data= mysqli_fetch_assoc($allQ))
			{
				$i=1;
				$did=$data['id'];
				$img=$data['image'];
				$dnp=$data['nom'];
				$cmb=$data['quantiteproduit'];


				echo" <div class=\"theb\">";
				echo "<h1 class=\"dnp\">$dnp </h1><br>";
				echo "<a href=\"stock.php?p=$did\"><img class=\"imagebout\" src=\"../upload/$img\"></a>";


				echo "</div>";
				echo " quantité $cmb";

				$i++;
				var_dump($data);

			}
}

 else  //si il a cliquer sur un article
{

		$idproduit=$_GET['p'];
		$unprod="SELECT * FROM stock inner join produit on stock.id_produit = produit.id where stock.id_produit = $idproduit";
		$unprodQ=mysqli_query($bdd,$unprod);
		$data=mysqli_fetch_assoc($unprodQ);


			$i=0;
			$did=$data['id'];
				$img=$data['image'];
				$dnp=$data['nom'];
				$cmb=$data['quantiteproduit'];


				echo" <div class=\"theb\">";
				echo "<h1 class=\"dnp\">$dnp </h1><br>";
				echo "<a href=\"stock.php?p=$did\"><img class=\"imagebout\" src=\"../upload/$img\"></a>";
				echo "$cmb";

				echo "</div>";


				?>
				<form method="post">
					<div id="quantité">
						<label>Quantité</label>
						<input type="number" name="nombre">
					</div>

						<div id="buts">
							<input type="submit" name="stockV">
						</div>

				</form>
				<?php

				$i++;
				

			

				if(isset($_POST['stockV']))
					{
						$qtt=$_POST['nombre'];
						$idproduit=$_GET['p'];
						$update="UPDATE stock SET id_produit= $idproduit ,quantiteproduit = $qtt ";
						$updateQ=mysqli_query($bdd,$update);
						header("refresh:0");
					}


}

?>
</main>
<footer>

</footer>
