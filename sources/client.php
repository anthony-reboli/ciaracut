 
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
   
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
     <script type="text/javascript" src="../include/script2.js"></script>
</head>
	<body id="pageadmin">
		<header>
		<?php
		include("bar-nav.php");?>
		</header>
	<main>
		
							  	
							</form>
						<?php 
						

							?>
             <form method="post">
        <input name="search"type="text" placeholder="Recherche par type" id="searchBox">
		</form>
   
        <div id="response"></div>

							<?php
							if(isset($_POST['search']))
								{
									
									$R=$_POST['search'];
									$requete="SELECT * FROM utilisateurs WHERE nom LIKE '$R%' ORDER BY id DESC";
									$queryR=mysqli_query($bdd,$requete);
									var_dump($requete);
									while($data= mysqli_fetch_assoc($queryR))
						            		{
												include("../include/infouseradmin.php");

						            		}
								}
								else
								{



							$user="SELECT * FROM utilisateurs";
							$reservQ=mysqli_query($bdd,$user);
							

										while($data= mysqli_fetch_assoc($reservQ))
						            		{
												include("../include/infouseradmin.php");

						            		}



						         }
						
						?>
	</main>
<footer>
</footer>
</body>
</html>