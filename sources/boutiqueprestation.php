<?php
    session_start();
    var_dump($_SESSION['doss']);
    $connexion= mysqli_connect("localhost", "root", "", "ciaracut");
    $requete = "SELECT * FROM prestation ";
    $query = mysqli_query($connexion, $requete);
    $resultat = mysqli_fetch_all($query);
    
?>
    <!DOCTYPE html>
    <html>
    <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
      <title>Tableau Prestation</title>
    </head>
     <body id="boutiquepresta">
    <header class="headeri">
    <?php include("../include/bar-nav.php");?>
    </header>
          <main id="main-reserv">
            <section id="cadre-reserv">
                  <h1 class="title">Mes prestations</h1>
                  <div id="contpresta">
                      <?php 
                      $i=0;
                      foreach ($resultat as $values)
                        {
                        if (!empty($values)) {
                        $did=$values[0];
                        $img=$values[5];
                        $nom=$values[1];
                        $type=$values[2];
                        echo" <div class=\"cardproduit\" class=\"card\" style=\"width: 15rem\";>";
                        echo "<h1 class=\"nomp\">$nom </h1><br>";
                        echo "<a href=\"produit.php?p=$did\"><img class=\"card-img-top\" src=\"../upload/$img\"></a>";
                        echo "<p class=\"card-text\">Détails:{$values['2']}</p>";
                        echo "<p class=\"card-text\">Prix:{$values['3']}€</p>";
                        echo "</div>";
                             
                    }
                     
                  }
              ?>
              </div>
            </section>

  <button id="btnprest" type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
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

      <?php
      include("../include/prestation.php");
      

      ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
<?php

?>
  <div class="heure">
    <?php include("../include/chiffre.php");?>
    </div>

  </main>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="../js/script.js"></script>
</body>
</html>

    
  
  