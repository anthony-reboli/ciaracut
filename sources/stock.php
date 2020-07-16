<?php        
$bdd = mysqli_connect("localhost", "root", "", "ciaracut");
$all="SELECT * FROM `stock` inner join produit on stock.id_produit = produit.id";
$allQ=mysqli_query($bdd,$all);
?>

<html>
<head>
	<title>Stock</title>
	<meta charset="utf-8">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
</head>
<body id="stock">

<header id="headeri">
   <?php include("../include/bar-nav.php");?>
</header>
		<main id="corpstock">
<?php

if (!isset($_GET['p']))
{
		?>

        <form id="autostock" method="post">
        <label class="title">Le moteur de recherche du stock</label>
        <input class="form-control mdb-autocomplete" name="search"type="text" placeholder="Recherche par type" id="searchBox">
		</form>
        <div id="response"></div>
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal6">
  		Gérer mon stock
		</button>
		<!-- Modal -->
<div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gestion stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       ...............
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        <div id="produit">
        <label class="title">Mon stock</label>           
        <?php
        echo"<div id='bloccardstock' class='card' style=\"width: 15rem;>";
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
					echo" <div id='bloccardstock' class=\"card\" style=\"width: 15rem\";>";
					echo "<a href=\"stock.php?p=$did\"><img class=\"\" src=\"../upload/$img\"></a>";
					echo" <div class=\"titrestock\">";
					echo "<h1 class=\"dnp\">Nom:$dnp</h1><br>";
					echo "</div>";
					}	
					if ($cmb < 3)
					{
						echo"<div id='insufisant'>";
					}
					else
					{
						echo"<div id='stockquant'>";
					}
					
					echo " Quantité: $cmb";
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


				echo" <div id=\"bloccardstock\"  class=\"card\">";
				echo "<h1 class=\"form-control\">$dnp </h1><br>";
				echo "<a href=\"stock.php?p=$did\"><img class=\"card-img-top\" src=\"../upload/$img\"></a>";
				echo "<div>";
				echo "$cmb";
				echo "</div>";


				?>
				<form class="form-group" id="quantite" method="post">
					<div>
						<label>Quantité:</label>
						<input name="nombre" class="form-control" type="number">
						<br>
					</div>

						<div>
							<button name="stockV" type="submit" class="btn btn-dark">Valider</button>
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
</div>
</main>
<footer>

</footer>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../JS/stock.js"></script>
	<script type="text/javascript" src="../include/script.js"></script>

</body>


<!-- SCRIPT -->
	<script>
		var quantiter = <?php echo $cmb;?>;
	</script>