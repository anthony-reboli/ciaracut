<?php 
$bdd = mysqli_connect("localhost", "root", "", "ciaracut");

$all="SELECT * FROM `stock` inner join produit on stock.id_produit = produit.id";
$allQ=mysqli_query($bdd,$all);


?>


<?php

if (!isset($_GET['p']))
{
		while($data= mysqli_fetch_assoc($allQ))
			{
				$i=0;
				$did=$data['id'];
				$img=$data['image'];
				$dnp=$data['nom'];


				echo" <div class=\"theb\">";
				echo "<h1 class=\"dnp\">$dnp </h1><br>";
				echo "<a href=\"stock.php?p=$did\"><img class=\"imagebout\" src=\"upload/$img\"></a>";


				echo "</div>";


				$i++;
				var_dump($data);

			}
}

 else  //si il a cliquer sur un article
{

		$idproduit=$_GET['p'];
		$unprod="SELECT * FROM stock inner join produit on stock.id_produit = produit.id where stock.id_produit = $idproduit";
		var_dump($unprod);
		$unprodQ=mysqli_query($bdd,$unprod);


			
				$did=$data['id'];
				$img=$data['image'];
				$dnp=$data['nom'];
				$cmb=$data['quantiteproduit'];


				echo" <div class=\"theb\">";
				echo "<h1 class=\"dnp\">$dnp </h1><br>";
				echo "<a href=\"stock.php?p=$did\"><img class=\"imagebout\" src=\"upload/$img\"></a>";
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
				var_dump($data);

			

				if(isset($_POST['stockV']))
					{
						$qtt=$_POST['nombre'];
						$idproduit=$_GET['p'];
						$update="UPDATE stock SET id_produit= $idproduit ,quantiteproduit = $qtt ";
						$updateQ=mysqli_query($bdd,$update);
						header("refresh:0");
					}


}









