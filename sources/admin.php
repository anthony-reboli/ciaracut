<?php session_start() ?>
<html>
<head>
<title>Formulaire - Web Agenda</title>

</head>
<body>
<?php include("../include/bar-nav.php"); ?>
<main>
<section class="leftsidebar">
     <section class="quote">
    <img src="img/gaming.jpg">
  </section>
    <section class="sidebartable">
      <p>Vous faites une réservation, veuillez remplir le formulaire </p>
    </section>
</section>
<section class="formulaire">
  <section class="pinright">
    <img src="img/pin.png">
    <img src="img/pin.png">
  </section>
   <?php
            date_default_timezone_set('Europe/Paris');
            $cnx = mysqli_connect("localhost", "root", "", "ciaracut");
            if (isset($_SESSION["login"])) 
            {
                    $requete2 = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
                    $query2 = mysqli_query($cnx, $requete2);
                    $resultat2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
                    echo "Bonjour, " . $_SESSION["login"] . " vous êtes connecté vous pouvez passer une reservation.<br />";
            ?>
                   <article><h1>Veuillez rentrer les infos de reservation :</h1></article>
                   <form class="form_site" method="post">
                   <label for="text"><b>Nom du client</b></label>
                   <input type="text" placeholder="Tapez le nom du client" name="nom" required>
                   <label for="text"><b>Description</b></label>
                   <input type="text" placeholder="Tapez la prestation" name="description" required>
                   <label for="datedebut"><b>Date debut</b></label>
                   <input type="date" name="datedebut" required> 
                   <label for="datefin"><b>Date fin</b></label>
                   <input type="date" name="datefin" required> 
                   <label for="heuredebut"><b>Heure debut</b></label>
                   <input type="time" name="heuredebut" min="08:00" max="18:00" required> 
                   <label for="heurefin"><b>Heure fin</b></label>
                   <input type="time" name="heurefin" min="09:00" max="19:00" required> 
                   
                   <br>
                   <input type="submit" value="SUBMIT EVENT" name="valider" />
                   </form>
            <?php
                    if ( isset($_POST["valider"]) )
                    {
                          $titreresa = $_POST['nom'];
                          $renametitre = addslashes($titreresa); 
                          $descriptionresa = $_POST['description'];
                          $renamedescritpion = addslashes($descriptionresa); 
                          $datedebut = $_POST['datedebut']." ".$_POST['heuredebut'];
                          $datefin = $_POST['datefin']." ".$_POST['heurefin'];
                          $startdate = date('Y-m-d H:i:s', strtotime($datedebut));
                          $enddate = date('Y-m-d H:i:s', strtotime($datefin));
                          if($startdate < date('Y-m-d H:i:s')){
                              echo "Vous ne pouvez pas reserver a une date anterieur au ".date('d-m-Y H:i:s');
                          
                          }
                          elseif ($enddate < $startdate) {
                              echo "Vous ne pouvez pas choisir une date de fin antérieur a la date de debut";
                          }
                          else{
                              $resaverif = "SELECT * FROM reservations WHERE (debut BETWEEN '$startdate' AND '$enddate') OR (fin BETWEEN '$startdate' AND '$enddate') ";
                              $queryverif = mysqli_query($cnx, $resaverif);
                              $resultatverif = mysqli_fetch_all($queryverif, MYSQLI_ASSOC);
                              if(!empty($resultatverif)){
                                echo "Une reservation existe deja a cette date";
                              }
                              else{
                              $requete = "INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES ('$renametitre', '$renamedescritpion', '$startdate', '$enddate',  ".$resultat2[0]['id'].")";
                              $query = mysqli_query($cnx, $requete);
                              header('Location:../sources/planning.php');
                              }   
                          } 
                    }
            } 
            else 
            {
                 echo "Bonjour, Veuillez vous connecté afin de pouvoir reserver.<br />";
               
            }

            mysqli_close($cnx);
            ?>
</section>
</main>
 <?php include("../include/footer.php"); ?>
</body>
</html>
