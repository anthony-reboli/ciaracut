 
<?php

session_start();
include("../functions/functionreserv.php");
date_default_timezone_set('europe/paris');

    	if (isset($_SESSION['login'])==false)
    	{
       echo "<h3>Connectez vous et achetez maintenant";
    	}
    	elseif(isset($_SESSION['login'])==true)

    	{
       if($_SESSION['login'] =="admin")
       {
        $user = $_SESSION['login'];
            echo "<h3><b>Bonjour <u>$user,</u> vous êtes connecté.</b></h3>";
       }
       else
       {
        $user = $_SESSION['login'];
            echo "<h3><b>Bonjour <u>$user,</u> vous êtes connecté .</b></h3>"; 
       }
    	}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Administrateur - Ciara cut </title>
    <link rel="stylesheet" href="">
</head>
<body>
<header>
<?php
include("../include/bar-nav.php");?>
</header>
<?php

   $connexion = new PDO('mysql:host=localhost;dbname=ciaracut', 'root', '');


if (isset($_SESSION['login'])=='vanessa') {

	echo "string";
}

    if (isset($_POST['valider'])) {
	
	echo "salut";
    if (!empty($_POST['nom'])&& !empty($_POST['prestation'])&& !empty($_POST['datedebut'])&& !empty($_POST['datefin'])) {
         ajoutreserv($nom,$id_prestation,$debut,$fin);
        }
	
	}
	
?>
        <h1 class="titre">Mes rendez vous</h1>
		      <section>
			     <form method ="post">
     		   <label for="text"><b>Nom:</b></label></br>
     		   <input type="text" name="nom" required><br>
           <label class="" for="text"><b>Type Prestation:</b></label><br>
         	  <input type="text"name="prestation "required><br>
          	<label for="text"><b>Date Rendez-vous: </b></label><br>
            <label   for="datedebut"><b>Date de début: </b></label><br>
            <input  type="datetime-local" name="datedebut" required><br>
            <label   for="datefin"><b>Date de fin: </b></label><br>
            <input  type="datetime-local" name="datefin" required><br>
            <br>  
     		</form>	

			<form method="post">
			<input type="submit" value="RESERVER" name="valider" ></br> 
			</form>	

			</section>		
  		<h2>Mes réservations</h1>
    
</body>
</html>