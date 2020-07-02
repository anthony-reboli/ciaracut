<?php
    session_start();
    unset($_SESSION['num']);
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
      

    <title>Accueil</title>
</head>
<body class="bodya">
  <header class="headeri">
    <?php 
    include("../include/bar-nav.php");
    ?>
    <main id="user">
    <?php
    if (isset($_SESSION['login'])==false)
    {
       echo "<h3>Connectez vous et réservez maintenant";
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
            echo "<h3><b>Bonjour <u>$user,</u> vous êtes connecté vous pouvez réserver maintenant.</b></h3>"; 
       }
    }
    ?>
  </header>
  <h1>Mes réservations</h1>
    
    <main id="logo">
      <?php
      $connexion = new PDO('mysql:host=localhost;dbname=ciaracut', 'root', '');
      $requete = $connexion->prepare("SELECT titre,description,debut,fin FROM reservations   ORDER BY debut ASC
      LIMIT 10");
      $requete->execute();
      foreach ($requete as $values)
                {
                        if (!empty($values)) {
                                      
                      echo "<table class='stripped' width=600px>";
                      echo "<tr>";
                      echo "<th class='nom'>Prestations</th>";
                      echo "<th class='nom' >Début de la prestation</th>";
                      echo "<th class='nom' >Fin de la prestation</th>";
                      echo "</tr>";
                      echo "<tr>";
                      echo "<td class='nom'>".$values[1]."</td>";
                      echo "<td class='nom'>Du:".$values[2]."</td>";
                      echo "<td class='nom'>Au:".$values[3]."</td>";
                      echo "</tr>";
                      echo "</table>";
                                 
                    }
                     
                  }
        ?>

      
    </main>
  <?php

  ?>
  <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FCiara-cut-103232688121762&tabs=timeline&width=600&height=800&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="600" height="800" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
  
</body>
</html>