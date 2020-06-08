// reservation
<?php session_start();
unset($_SESSION['num']);


#TA DATE EN TIME
$datetime=time("Y-m-d H:i:s");

#TU AJOUTES LE NOMBRE DE SECONDE DESIRE (ici 1h30 = 5400 secondes)
$dateplus=$datetime+5400;

#TU REPASSE EN FORMAT DATE
$date=date("Y-m-d H:i:s",$dateplus);


?>
<html>
<head>
  <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="camping.css">
  <title>Réservation</title>
</head>
<body class="bodir">
  <?php
  include("bar-nav.php");
    

  if (isset($_SESSION['login']))
  {
        date_default_timezone_set('Europe/Paris');
        $connexion = mysqli_connect("localhost","root","","ciaracut");
        $requete ="SELECT * FROM utilisateurs WHERE login ='".$_SESSION['login']."'";
        $query = mysqli_query($connexion, $requete);
        $resultat = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $requete1 = "SELECT * FROM tarif2 ";

        $req = mysqli_query($connexion, $requete1);


  ?>
  <section  id="reservation-form">
      <h1 id="h1reservation-form"><b>Veuillez remplir le formulaire de la réservation</b></h1>
      <div class="parent">
      <article class="reservationf">

                         <form class="form_site" method="post" action="reservation-form.php">
                   <label for="text"><b>Titre</b></label>
                   <input type="text" placeholder="Tapez le titre de l'Activite" name="titre" required>
                   <label for="text"><b>Description</b></label>
                   <input type="text" placeholder="Tapez une Description" name="description" required>
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
      </article>
        <article class="comment">
      <?php
        
                    if ( isset($_POST["valider"]) )
                    {
                      


                          $titreresa = $_POST['titre'];
                          $renametitre = addslashes($titreresa); 
                          $descriptionresa = $_POST['description'];
                          $renamedescritpion = addslashes($descriptionresa); 
                          $datedebut = $_POST['datedebut']." ".$_POST['heuredebut'];
                          $datefin = $_POST['datefin']." ".$_POST['heurefin'];
                          $startdate = date('Y-m-d H:i:s', strtotime($datedebut));
                          $enddate = date('Y-m-d H:i:s', strtotime($datefin));

                        
                    $entre="SELECT count(*) from reservations WHERE debut BETWEEN '$datedebut' AND '$datefin'";
                    $queryentre=mysqli_query($connexion,$entre);
                    $resultatentre=mysqli_fetch_all($queryentre);



                          
                        if($datedebut < date('Y-m-d'))
                        {
                              echo "Vous ne pouvez pas reserver a une date anterieur au".date('d-m-Y');
                          
                        }
                        elseif ($datefin < $datedebut) 
                        {
                              echo "Vous ne pouvez pas choisir une date de fin antérieur a la date de debut";
                        }
                        else{
                            
                          if($resultatentre[0][0] < 3)
                            {
                                      

                                        $requete = "INSERT INTO reservations (titre, description, debut, fin) VALUES ('$renametitre', '$renamedescritpion', '$startdate', '$enddate')";
                                        
                                    $query = mysqli_query($connexion, $requete);
                                    
                                }
                                    else
                                {
                                  echo "il y a deja 3 reservation pour c'est horaire";
                                }
                                  
                                  
                        } 
                    }
        
               mysqli_close($connexion);
        ?>
        </article>
    </div>
     <?php
   }
   else 
   {
   ?>
    <section id="notcon">
      <p>Veuillez vous connecter pour accéder à votre page !</p>
    </section>
  <?php
  }
  include("footer.php");
?>
                         

  



</body>
</html>