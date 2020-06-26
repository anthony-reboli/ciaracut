<?php
    session_start();
    $connexion= mysqli_connect("localhost", "root", "", "ciaracut");

    if ($_SESSION['id_droits'] == 1337){}
    else{
      header("location: index.php");
    }
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
        <header>
        <?php include("../include/bar-nav.php");?>
        </header>

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
                        echo "<a href=\"produit.php?p=$did\"><img class=\"imagebout\" src=\"../upload/$img\"></a>";
                        echo "<p class=\"nomp\">{$values['2']}</p>";
                        echo "<p class=\"nomp\">{$values['3']}€</p>";
                        echo "</div>";
                                
                    }
                     
                  }
                
   
      ?>
  </section>
  <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
  Gestion de mes prestations
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gestion de mes prestations</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php include("../include/prestation.php");?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
  <div class="heure">
    <?php include("../include/chiffre.php");?>
    </div>

</main>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="../js/script.js"></script>
</body>
</html>

    
  
  