<?php
 session_start();
 ob_start();
 ?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="">
    <title>Réservation Ciara cut</title>
</head>
<body id="planning">
    <header id="head">
       <?php
       include("../include/bar-nav.php");
    if (isset($_SESSION['login']))
  {
       ?> 
    </header>

    <main id="corpplanning">
      <h1 id="titre">Calendrier</h1>

    <div id="jour">
      
              <form  method="post" action="planning.php">
              <input id="arriere" type="submit" name="precedent" value="">
              </form>
<?php
                   

                    $datejour = new DateTime("today");

                    //var_dump($datejour);

                    if (!isset($_SESSION["num"])) {
                        $_SESSION["num"] = 0;
                    }

                    if (isset($_POST["suivant"])) {
                        $_SESSION["num"] += 1;
                    }

                    if (isset($_POST["precedent"])) {
                        $_SESSION["num"] -= 1;
                    }

                    //echo $_SESSION["num"];

                    date_add($datejour, date_interval_create_from_date_string($_SESSION['num']." days"));
                    echo date_format($datejour, 'Y-m-d');
                    $dateselec = date_format($datejour, 'Y-m-d');


?>

              <form  method="post" action="planning.php">
              <input id="avant" type="submit" name="suivant" value="">
              </form>
   

    <?php 
//requete qui recupere tout de l utilisateur
      $connexion = mysqli_connect("localhost", "root", "", "ciaracut");
      $requete = "SELECT titre, description , DATE_FORMAT(debut, \"%Y-%m-%d\"), DATE_FORMAT(fin, \"%Y-%m-%d\"),id_utilisateur FROM reservations LEFT JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur WHERE \"$dateselec\" BETWEEN DATE_FORMAT(debut, \"%Y-%m-%d\") AND DATE_FORMAT(fin, \"%Y-%m-%d\")";
      $query = mysqli_query($connexion, $requete);
      //var_dump($query);
      $resultat = mysqli_fetch_all($query);
      //var_dump($resultat);


        $capacite1 = 0;
        $capacite2 = 0;
        $capacite3 = 0;

      
//foreach corresondance entre lieu et type
                    foreach ($resultat as $key) {
                      if ($key[2] == "Plage") {
                      if ($key[1] =="Tente") {
                          $capacite1+=1;
                        }
                        elseif ($key[1] == "Camping-car") {
                          $capacite1+=2; 
                        }

                        }
                         //echo $capacite1;

                        if ($key[2] == "Pins") {
                          if ($key[1] =="Tente") {
                            $capacite2+=1;
                          }
                          elseif ($key[1] == "Camping-car") {
                            $capacite2+=2;  
                          }
                      }
                        //echo $capacite2;

                      if ($key[2] == "Maquis") {
                        if ($key[1] =="Tente") {
                          $capacite3+=1;
                        }
                        elseif ($key[1] == "Camping-car") {
                          $capacite3+=2;  
                        }
                    }
                          //echo $capacite3;
                  }


$capacite = [$capacite1,$capacite2,$capacite3];
//tableau qui recupere les reservations et affiche les emplacements dispo
?>
<div id="tableau">
  <h3>Lieux et emplacements disponibles</h3>
   <table id="table">
       <thead>
           <tr>
               <th></th>
               <th>Lundi</th>
               <th>Mardi</th>
               <th>Mercerdi</th>
               <th>Jeudi</th>
               <th>Vendredi</th>
               <th>Samedi</th>
               <th>Dimanche</th>

       </thead>
       <tbody>

<?php
              for ($emplacement=9; $emplacement <=18 ; $emplacement++) { 
                echo "<tr>";
                echo "<td>".$emplacement."H";

              for ($lieu=1; $lieu <=7 ; $lieu++) { 
                echo "<td>";
              
                if ($lieu>= $emplacement){
                  echo "<div id=\"liens\"><a href=\"reservation.php\">Réservé</a></div>"; 
                  }
                  else{
                   echo "<div id=\"lien\"><a href=\"reservation-form.php\">Disponible</a></div>";
                   }
          
            echo "</td>";
           }
            echo "</tr>";
          }
    
?>
     </tbody>
   </table>
   </div>
 </main>
      
    
    
       <?php
        include("../include/footer.php");
    }
    else 
   {
   ?>
    <section id="notcon">
      <p>Veuillez vous connecter pour accéder à votre page !</p>
    </section>
  <?php
  }

      
       ?> 
    
</body>
</html>


