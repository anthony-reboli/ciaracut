 
<?php
session_start();
date_default_timezone_set('europe/paris');
$bdd = mysqli_connect("localhost", "root", "", "ciaracut");

?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Administrateur - ciaracut </title>
    <link rel="stylesheet" href="../CSS/cira.css">
</head>
<body id="pageadmin">
<header>
<?php
include("bar-nav.php");?>
</header>
<h1 class="titre">Nos Prestations</h1>
		<section id="formadmin">
			<?php
			include("../include/formadmin/formprestation.php");
			?>
						
						

						

						reservation

						<?php 
			include("../include/formadmin/formreservation.php");


						// Membre

						?>
						<form method="post" >
							  	<button type="submit" name="membre">client</button>
							</form>
						<?php 
						if(isset($_POST['membre'])) //quand on clique sur client
						{

							?>
							<form method="post">
								<input type="text" name="RechercheU">
								<button type="submit" name="butrecherche">Rechercher</button>
							</form>
							<?php
							$user="SELECT * FROM utilisateurs";
							$reservQ=mysqli_query($bdd,$user);
							

										while($data= mysqli_fetch_assoc($reservQ))
						            		{
												include("../include/infouseradmin.php");

						            		}




						}
										 if(isset($_POST['butrecherche']))  //on recherche un utilistateur
						            {
						            	$rechercheA=$_POST['RechercheU'];
						            	$userR="SELECT * FROM utilisateurs where nom like '$rechercheA%'";
										$reservQ2=mysqli_query($bdd,$userR);
										
										
										while($data= mysqli_fetch_assoc($reservQ2))
						            		{
						            			include("../include/infouseradmin.php");

						            		}



										
						            }
						?>
						


							


				
</section>
<footer>
	</footer>
</body>
</html>