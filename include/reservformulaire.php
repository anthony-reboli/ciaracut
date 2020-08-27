
<title>Formulaire - Web Agenda</title>

        <a href="index.php"><button type="submit">BACK HOME</button></a>
  
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
                   <h1>Veuillez rentrer les infos de reservation :</h1>
                   <form class="form_site" method="post" action="reservation-form.php"> <br>
                   <label for="text"><b>Nom client</b></label> <br>
                   <input type="text" placeholder="Tapez le nom du client" name="nom" required> <br>
                   <label for="text"><b>Prestation</b></label> <br>
                   <input type="text" placeholder="Tapez une Prestation" name="prestation" required> <br>
                   <label for="datedebut"><b>Date debut</b></label><br>
                   <input type="date" name="datedebut" required> <br> 
                   <label for="datefin"><b>Date fin</b></label> <br>
                   <input type="date" name="datefin" required> <br> 
                   <label for="heuredebut"><b>Heure debut</b></label> <br>
                   <input type="time" name="heuredebut" min="09:00" max="18:00" required> <br> 
                   <label for="heurefin"><b>Heure fin</b></label> <br>
                   <input type="time" name="heurefin" min="09:00" max="18:00" required> <br> 
                   
                   <br>
                   <input type="submit" value="SUBMIT EVENT" name="valider" />
                   </form>
            <?php
                    if ( isset($_POST["valider"]) )
                    {
                          $nom = $_POST['nom'];
                          $nomclient = addslashes($nom); 
                          $type = $_POST['prestation'];
                          $typepresta = addslashes($type); 
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
                              $requete = "INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES ('nomclient', '$typepresta', '$startdate', '$enddate',  ".$resultat2[0]['id'].")";
                              $query = mysqli_query($cnx, $requete);
                              header('Location:reservation-form.php');
                              }   
                          } 
                    }
            } 
            else 
            {
                 echo "Bonjour Guest, Veuillez vous connecté afin de pouvoir reserver une salle.<br />";
               
            }

            mysqli_close($cnx);
            ?>
</section>

