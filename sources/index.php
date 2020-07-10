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
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
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
  <div id="photo">
    <img  src="../upload/vane.jpg">
</div>
  <div id="descriptionphoto">
    <h1 style="text-align: center;" class="title">Présentation de Vanessa</h1>
    <p>Véritable passionnée de coiffure depuis plus de 25 ans je vous invite à découvrir votre salon de coiffure dans le 8e à Marseille.
    Un endroit relaxant avec une ambiance reposante et entièrement dédiée à la coiffure.
    Plus qu’un simple passage chez le coiffeur, vous embarquez pour un moment de détente et de relaxation.</p>
  </div>
</div>


<div id="forfait" class="p-4">
   <h1 style="text-align: center;" class="title">Mes Forfaits</h1>
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


<div class="p-4" id="services">
  
    <h1 class="title">Avant/Aprés</h1>
    <div id="contservices">
    <div id="theme">
    <h1 class="title">Dessus de mèches et bas de nuque marron chocolat</h1>
    </div>
    <div id="carouselExampleSlidesOnly m-4 d-flex flex-column  " class="carousel slide w-50 p-4 " data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="../upload/prest9.jpg" class="d-block w-50" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../upload/prest1.jpg" class="d-block w-50" alt="...">
    </div>
  </div>
    
  </div>
</div>

</div>

 


  
      <div id="facebook">
        <h1 class="title">Mon actu Faceboock</h1>
       <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FCiara-cut-103232688121762&tabs=timeline&width=600&height=800&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="600" height="800" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
       </div>
    </main>

  <?php

  ?>

  <header class="headeri">
        <?php include("../include/footer.php"); ?>      
    </header>
</body>
</html>