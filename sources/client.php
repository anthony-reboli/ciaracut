 
<?php



date_default_timezone_set('europe/paris');
$bdd = mysqli_connect("localhost", "root", "", "ciaracut");

?>

<script type="text/javascript">
	var timerRunning = false;
function runClock() 
{
  var today   = new Date();
  var hours   = today.getHours();
  var minutes = today.getMinutes();
  var seconds = today.getSeconds();
  var timeValue = hours;
 
  // Les deux prochaines conditions ne servent que pour l'affichage.
  // Si le nombre de minutes est inférieur à 10, alors on ajoute un 0 devant...
 
  timeValue += ((minutes < 10) ? ":0" : ":") + minutes;
  timeValue += ((seconds < 10) ? ":0" : ":") + seconds;
  document.getElementById("time").value = timeValue;
  timerRunning = true;
}
 
var timerID = setInterval(runClock,1000);
</script>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Administrateur - ciaracut </title>
    <link rel="stylesheet" href="../CSS/cira.css">
   	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
     <script type="text/javascript" src="../include/script2.js"></script>

     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
	<body id="pageadmin">
		<header>
<header>
   <?php include("../include/bar-nav.php");?>
</header>
	<main>
		
							  	
							</form>
							<input type="text" id="time" size="10" />
             <form method="post">
        <input name="search"type="text" placeholder="Recherche par type" id="searchBox">
		</form>
   
        <div id="response"></div>

							<?php
							$count="SELECT count(id) FROM utilisateurs";
							$countQ=mysqli_query($bdd,$count);
							$countR=mysqli_fetch_all($countQ);
							$CR=$countR[0][0];
							echo "Il y a $CR clients inscrit";

							if(isset($_POST['search']))
								{
									
									$R=$_POST['search'];
									$requete="SELECT * FROM utilisateurs WHERE nom LIKE '$R%' ORDER BY id DESC";
									$queryR=mysqli_query($bdd,$requete);
									
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
						
      									
    		<button type="button"  class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Inscription membre</button>

			<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  				<div class="modal-dialog modal-sm">
    				<div class="modal-content">
    					<h1>Inscription du membre</h1>
      					<?php include("../include/inscriptionclient.php");?>
    				</div>
  				</div>
			</div>

	</main>


<footer>
</footer>
</body>
</html>


