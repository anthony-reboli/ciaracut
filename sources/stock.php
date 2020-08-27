<?php        
$bdd = mysqli_connect("localhost", "root", "", "ciaracut");
?>

<html>
<head>
	<title>Stock</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
       	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="../JS/stock.js"></script>
	<script type="text/javascript" src="../include/script.js"></script>
      <link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
</head>
<body id="stock">

<header id="headeri">
   <?php
   session_start();
   if (!isset($_SESSION['login']) or $_SESSION['login'] != 'vanessa')
   {
   	header('location:index.php');
   }
    include("../include/bar-nav.php");?>

</header>
		<main id="corpstock">
<?php

if (!isset($_GET['p']))
{

		?>
		<div id="autostock">
        <form id="autostock" method="post">
        <label class="title">Le moteur de recherche du stock</label>
        <input class="form-control mdb-autocomplete" name="search"type="text" placeholder="Recherche produits" id="searchBox">
		</form>
        <div id="response"></div>

		<!-- Modal -->
<div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gestion du stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex flex-column justify-content-center">
       <?php 
       include("../include/imagestock.php");
       ?>
       		       <form method="post"  enctype="multipart/form-data">
				    <label for="mon_fichier"></label><br/>
				     <label for="formGroupExampleInput"><b>Images</b></label>
				    <input type="hidden" name="MAX_FILE_SIZE" value="1048576" required />
				    <input type="file" name="mon_fichier" id="mon_fichier" required/><br/> 
				     <label for="formGroupExampleInput"><b>Nom du produit:</b></label>
				    <label for="titre"></label><br/>
				    <input id="formGroupExampleInput" class="form-control" type="text" name="nom" value="Nom du produit" id="nom" required /><br />
				    <label for="description"></label><br/>
				    <label for="formGroupExampleInput"><b>commentaires:</b></label>
				    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" id="description"></textarea><br/>  
				    <input class="btn btn-dark m-4" type="submit" name="submit" value="Envoyer"/>
				</form>
      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>

      </div>
    </div>
  </div>
</div>  
</div> 

  <button type="button" class="btn-lg btn-light" data-toggle="modal" data-target="#exampleModal6">
  		Gérer mon stock
		</button>

        <div id="produit"> 
        <label class="title">Mon stock</label> 
        <div id="titlestock">
        <?php
        $all="SELECT * FROM stock INNER JOIN produit ON stock.id_produit = produit.id";
		$allQ=mysqli_query($bdd,$all);
		while($data= mysqli_fetch_assoc($allQ))
			{
			
				$i=1;
				$did=$data['id'];
				$img=$data['image'];
				$dnp=$data['nom'];
				$cmb=$data['quantiteproduit'];


					echo"<div id='bloccardstock' class='card'style='15rem'\>";
					echo "<a href=\"stock.php?p=$did\"><img class=\"photostock\" src=\"../upload/stock/$img\"></a>";
					echo" <div class=\"titrestock\">";
					echo "<h1 class=\"dnp\">$dnp</h1><br>";
					echo "</div>";
					
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
		$unprod="SELECT * FROM stock INNER JOIN produit ON stock.id_produit = produit.id WHERE stock.id_produit = '$idproduit'";
		$unprodQ=mysqli_query($bdd,$unprod);
		$data=mysqli_fetch_assoc($unprodQ);
		



			$i=0;
			$did=$data['id'];
				$img=$data['image'];
				$dnp=$data['nom'];
				$cmb=$data['quantiteproduit'];
				$description=$data['description'];

				echo" <div id='bloccardstock' class=\"card\" style=\"width:30rem\";>";
				echo "<div id='cadrestock'>";
				echo "<h1 class=\"title\">$dnp</h1><br>";
				echo "<a href=\"stock.php?p=$did\"><img class=\"photostock\" src=\"../upload/stock/$img\"></a>";
				echo "<br>";
				echo "<label for=\"formGroupExampleInput\"><b>Description:</b></label>$description";
				
				echo "<br><br>";
				echo "<b>Quantité:</b> $cmb";
				echo "<br><br>";
				?>
				
				<form id="formqts" method="post">
						<label><b>Modifier quantité:</b></label>
						<input name="nombre" class="form-control" type="number">
						<br>
			            <button name="stockV" type="submit" class="btn btn-light">Valider</button>
				</form>
				<?php
				echo "</div>";

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
	<footer class="headeri">
    <?php include("../include/footer.php");?>
	</footer>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../JS/stock.js"></script>
	<script type="text/javascript" src="../include/script.js"></script>
</body>
</html>


<!-- SCRIPT -->
	<script>
		var quantiter = <?php echo $cmb;?>;
	</script>