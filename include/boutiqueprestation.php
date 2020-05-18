<?php


    $connexion= mysqli_connect("localhost", "root", "", "ciaracut");

    if ( isset($_SESSION['login']) ) 
    {
    $login= $_SESSION['login'];
    $requete = "SELECT * FROM prestation";
    $query = mysqli_query($connexion, $requete);
    $resultat = mysqli_fetch_all($query);
    

?>
    <title>Tableau Prestation</title>
    <main id="main-reserv">
 <section id="cadre-reserv">

  <h2 id="h2-reserv">Mes prestations</h1>
      <?php 
      $i=0;
                      foreach ($resultat as $values)
                {
                        if (!empty($values)) {
                                      
                      echo "<table id='contenue' width=900px>";
                      echo "<tr>";
                      echo "<th class='nom'>Nom produit</th>";
                      echo "<th class='nom'>Type</th>";
                      echo "<th class='nom' >Prix unitaire</th>";
                      echo "</tr>";
                      echo "<tr>";
                      echo "<td class='nom'>".$values[1]."</td>";
                      echo "<td class='nom'>".$values[2]."</td>";
                      echo "<td class='nom'>".$values[3]."</td>";
                      echo "</tr>";
                      echo "</table>";
                       include("../include/quantite.php");
                      $i++;
                                  
                    }
                     
                  }
                }
   
      ?>
  
  </section>
</main>

</body>
</html>

    
  
  