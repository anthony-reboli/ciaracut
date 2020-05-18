<?php
		$connexion = mysqli_connect("localhost","root","","ciaracut");
		$id_prestation=$resultat[0][0];
		$id=$resultat[0][4];
		$prix=$resultat[0][3];

		if (isset($_POST["ajout$i"])) 
		{
		
				$ajout= ("INSERT INTO commande (id_utilisateurs,id_prestation,prixglobal,datecreation) VALUES ('$id','$id_prestation','$prix',NOW())");
				$query2=mysqli_query($connexion,$ajout);
				//header("location:panier.php");	
	
		}
	
		?>
	<form method="post" >
	<button id="suppprod" name="ajout<?php echo $i ?>"><img width="50" height="50" src="../upload/ajout.png"></button>
	</form>	
	
																  

	
	
	




		
	

			




	

