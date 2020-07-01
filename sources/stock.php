<?php 

        
$bdd = mysqli_connect("localhost", "root", "", "ciaracut");

$all="SELECT * FROM `stock` inner join produit on stock.id_produit = produit.id";
$allQ=mysqli_query($bdd,$all);
?>

<html>
<head>
	<title>Boutique</title>
	<link rel="stylesheet" href= "../CSS/cira.css">
 	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="../JS/stock.js"></script>
	<script type="text/javascript" src="../include/script.js"></script>
	
</head>
<body id="stock">
<header>
   <?php include("../include/bar-nav.php");?>
</header>
		<main>
<?php
if (!isset($_GET['p']))
{
		?>
	<h1 class="title">Le moteur de recherche du stock</h1>

             <form method="post">
        <input name="search"type="text" placeholder="Recherche par type" id="searchBox">
		</form>
   
        <div id="response"></div>
        <?php
        echo"<div id='stockcont'>";
		while($data= mysqli_fetch_assoc($allQ))
			{
				
				$i=1;
				$did=$data['id'];
				$img=$data['image'];
				$dnp=$data['nom'];
				$cmb=$data['quantiteproduit'];


										if ($cmb < 3)
					{
						echo"<div class='insufisant'>";
					}
					else 
					{
						echo" <div class=\"theb\">";
					}
				

				echo "<a href=\"stock.php?p=$did\"><img class=\"imagebout\" src=\"../upload/$img\"></a>";

					echo" <div class=\"titrestock\">";

					echo "<h1 class=\"dnp\">$dnp </h1><br>";

					echo "</div>";


						if ($cmb < 3)
					{
						echo"<div id='insufisant'>";
					}
					else
					{
						echo"<div id='stockquant'>";
					}
					
					echo " quantité $cmb";
					echo "</div>";
				echo "</div>";

				$i++;
				

			}
			echo"</div>";

}

 else  //si il a cliquer sur un article
{

		$idproduit=$_GET['p'];
		$unprod="SELECT * FROM `stock` inner join produit on stock.id_produit = produit.id where stock.id_produit = '$idproduit'";
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
				echo "<div>";
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
						$update="UPDATE stock SET quantiteproduit = $qtt where id_produit = $idproduit";
						$updateQ=mysqli_query($bdd,$update);
						 header("refresh:0");
					}


}

?>
</main>
<footer>

</footer>


<!-- SCRIPT -->
	<script>
		var quantiter = <?php echo $cmb;?>;
	</script>