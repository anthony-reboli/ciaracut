<?php


    $connexion= mysqli_connect("localhost", "root", "", "ciaracut");

    if ( isset($_SESSION['login']) ) 
    {
    $login= $_SESSION['login'];
    $requete = "SELECT * FROM prestation ";
    $query = mysqli_query($connexion, $requete);
    $resultat = mysqli_fetch_all($query);
    
    

?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>Tableau Prestation</title>
      <link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
    </head>
    <body id="boutiquepresta">
    <main id="main-reserv">
        <h2 id="h2-reserv">Mes prestations</h1>
 <section id="cadre-reserv">



                      <?php 
                      $i=0;
                      foreach ($resultat as $values)
                        {
                        if (!empty($values)) {
                                      
                      
                        $did=$values[0];
                        $img=$values[5];
                        $nom=$values[1];
                        $type=$values[2];
                        echo" <div class=\"presta\">";
                        echo "<h1 class=\"nomp\">$nom </h1><br>";
                        echo "<a href=\"../include/produit.php?p=$did\"><img class=\"imagebout\" src=\"../upload/$img\">";
                        echo "<p class=\"nomp\">{$values['2']}</p>";
                        echo "<p class=\"nomp\">{$values['3']}€</p>";
                        echo "</div>";
                                  
                    }
                     
                  }
                }
   
      ?>
  
  </section>
</main>

</body>
</html>

    
  
  