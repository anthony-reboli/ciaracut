<?php
    session_start();
    unset($_SESSION['num']);
?>
<html>
<head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="../css/ciaracut.css">

    <title>Accueil</title>
</head>
<body id="index">
    <header class="headeri">
        <?php include("../include/bar-nav.php"); ?>      
    </header>

    <main id="contindex">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../upload/logo.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../upload/salon.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<div id="presentation">

  <div>
    <img class="img-fluid photo" src="../upload/vane.jpg">
  </div>

  <div id="descriptionphoto">
    <h1 style="text-align: center;" class="titrecoupe">Ciara cut by "Vanessa"</h1>
    <p>Véritable passionnée de coiffure depuis plus de 25 ans je vous invite à découvrir votre salon de coiffure dans le 9e à Marseille.
    Un endroit Simple avec une ambiance décontractée et entièrement dédiée à la coiffure.
    Plus qu’un simple passage chez le coiffeur, vous embarquez pour un moment de plaisir et de relaxation.</p>
  </div>

</div>


<div id="forfait" class="p-4">
   <h1 style="text-align: center;" class="titrecoupe">Mes Forfaits</h1>
  <div id="bulle1">
  <div class="bulle"><b>Forfait<br>Ombre Hair<br>ou Tye and Dye<br>A partir de 95€</b></div>
  <div class="bulle"><b>Forfait Coloration<br>Masque/Shamp<br>Coupe/Brush<br>A partir de 45€</b></div>
  <div class="bulle"><b>Forfait Mèches<br>Shamp/Masque<br>Coupe/Brush<br>A partir de 55€</b></div>
  </div>
  <div id="bulle2">
  <div class="bulle"><b>Forfait<br>Lissage Brésilien<br>A partir de 99€</b></div>
  <div class="bulle"><b>Coupe/Homme<br>15€</b></div>
  <div class="bulle"><b>Forfait<br>Extension<br>3,50€/mèche</b></div>
  </div> 
</div>


<div id="services">
   <h1 class="titrecoupe" style="text-align: center;">Mes Prestations</h1>
    <div id="contservices">
  <div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
    <li data-target="#demo" data-slide-to="4"></li>
    <li data-target="#demo" data-slide-to="5"></li>
    <li data-target="#demo" data-slide-to="6"></li>
    <li data-target="#demo" data-slide-to="7"></li>
    <li data-target="#demo" data-slide-to="8"></li>
  </ul>
  <div class="carousel-inner">

    <div class="carousel-item active">
      <img src="../upload/avantmecheblanche.jpg" width="600" height="600">
      <div class="carousel-caption">
        <h3>Avant</h3>
        <p>Dessus de mèches blanche </p>
      </div>   
    </div>

    <div class="carousel-item">
      <img src="../upload/FullSizeR2.jpg" width="600" height="600">
      <div class="carousel-caption">
        <h3>Après Mèches</h3>
        <p>Dessus de mèches blanche</p>
      </div>   
    </div>

      <div class="carousel-item">
      <img src="../upload/avantcuivre.jpg" width="600" height="600">
      <div class="carousel-caption">
        <h3>Avant</h3>
        <p>Cuivré chaud</p>
      </div>   
    </div>

    <div class="carousel-item">
      <img src="../upload/prest2.jpg" width="600" height="600">
      <div class="carousel-caption">
        <h3>Cuivré chaud</h3>
        <p>Avec soin au botox!!</p>
      </div>   
    </div>

     <div class="carousel-item">
      <img src="../upload/avantdessusmeches.jpg" width="600" height="600">
      <div class="carousel-caption">
        <h3>Avant</h3>
        <p>Dessus mèches et bas marron!</p>
      </div>   
    </div>

    <div class="carousel-item">
      <img src="../upload/choco.jpg" width="600" height="600">
      <div class="carousel-caption">
        <h3>Dessus de mèches</h3>
        <p>Et le bas marron chocolat!</p>
      </div>   
    </div>

    <div class="carousel-item">
      <img src="../upload/blond.jpg"  width="600" height="600">
      <div class="carousel-caption">
        <h3>Mèche blonde</h3>
        <p>Avec soin au botox!!</p>
      </div>   
    </div>

    <div class="carousel-item">
      <img src="../upload/avantmiel.jpg" width="600" height="600">
      <div class="carousel-caption">
        <h3>Avant</h3>
        <p>Mèches miel</p>
      </div>   
    </div>

    <div class="carousel-item">
      <img src="../upload/miel.jpg" width="600" height="600">
      <div class="carousel-caption">
        <h3>Mèches miel</h3>
        <p>Avec soin au botox!!</p>
      </div>   
    </div>

  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

</div>
</div>


      <div  id="facebook">
      <div id="contfacebook">
      <h1 class="titrecoupe" style="text-align: center;">Mon actu Faceboock</h1>
       <iframe  class="d-flex flex-column justify-content-center align-items-center" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FCiara-cut-103232688121762&tabs=timeline&width=485&height=800&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="500" height="800" style="border:double white 10px " scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
       </div>

       </div>
    </main>

  <?php

  ?>

  <header class="headeri">
        <?php include("../include/footer.php"); ?>      
    </header>
</body>
</html>