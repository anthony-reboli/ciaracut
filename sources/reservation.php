<?php
session_start();
ob_start();


    $connexion= mysqli_connect("localhost", "root", "", "ciaracut");

    if ( isset($_SESSION['id']) ) 
    {
      $login= $_SESSION['login'];
     $requete = "SELECT titre,description,debut, fin FROM reservations WHERE id ='".$_SESSION['id']."'";

    $query = mysqli_query($connexion, $requete);
    $resultat = mysqli_fetch_all($query);
    $taille = count($resultat) - 1;
    

?>
<html>
<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="camping.css">
    <title>Réservation</title>
</head>
<body id="body-reserv">
<header id="header-reserv">
      <?php
     // include('bar-nav.php');

      ?>
</header>
    <main id="main-reserv">
<h1 id="h1-reserv">Votre reservation est disponible dans le tableau</h1>
<p class="p-reserv">Pour modifier la reservation contacter un membre de l'equipe</p>
 <section id="cadre-reserv">

  <h2 id="h2-reserv">Vos reservations</h1>
      <?php  
       $i = 0;
          echo "<table border id=\"table-reserv\">";
          echo "<thead><tr>";
          echo "<th>Nom</th>";
          echo "<th>sexe</th>";
          echo "<th>Type Prestation</th>";
          echo "<th>debut</th>";
          echo "<th>fin</th>";
          echo "</tr></thead>";
          echo "<tbody>";
          while ($i <= $taille) 
          {
            echo "<tr>";
            foreach ($resultat[$i] as $key => $value) 
            {
               echo "<td>{$value}</td>"; //contenue
            }
            echo "</tr>";
            $i++;
          }
          echo "</tbody></table>";
      ?>
  
  </section>
</main>

  <?php 

  }
  else {
    echo "vous n'avez pas de reservations a votre nom";
  } 
 // include("footer.php");
?>
</body>
</html>

		
	
	