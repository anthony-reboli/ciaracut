<?php
		$connexion = mysqli_connect("localhost","root","","ciaracut");
      	$id=$_SESSION['id'];
      	$id_commande=$values[0];
      	$id_produits=$values[2];
		if (isset($_POST["supp$i"])) 
		{
		
				$eff= ("DELETE FROM commande WHERE id=$id_commande AND  id_prestation =$id_produits AND id_utilisateurs=$id ");
				$query2=mysqli_query($connexion,$eff);
				header("location:../sources/panier.php");
				
	
		}
	
		?>
	<form method="post" >
	<button id="suppprod" name="supp<?php echo $i ?>"><img width="50" height="50" src="../upload/corbeille.png"></button>
	</form>	
	
																  

	
	
	




		
	

			




	


	
																  

	
	
	




		
	

			




	

