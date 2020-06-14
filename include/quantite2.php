<?php
		$connexion = mysqli_connect("localhost","root","","ciaracut");
      	$id=$_SESSION['id'];
      	$id_commande=$val[0];
      	$id_prestation=$val[2];
 	
		

		if (isset($_POST["supp$i"])) 
		{
		
				$eff= ("DELETE  FROM commande WHERE id=$id_commande AND  id_prestation =$id_prestation AND id_utilisateurs=$id ");
				$query2=mysqli_query($connexion,$eff);
				header("location:../sources/boutiqueprestation.php");
				
				
	
		}
	
		?>
	<form method="post" >
	<button id="suppprod" name="supp<?php echo $i ?>"><img width="50" height="50" src="../upload/corbeille.png"></button>
	</form>	
	
																  

	
	
	




		
	

			




	


	
																  

	
	
	




		
	

			




	

