<?php session_start() ?>
<section id="formulaire">
   <?php
            date_default_timezone_set('Europe/Paris');
            $cnx = mysqli_connect("localhost", "root", "", "ciaracut");
            if (isset($_SESSION["login"])) 
            {
                    $requete2 = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
                    $query2 = mysqli_query($cnx, $requete2);
                    $resultat2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
                    echo "Bonjour, " . $_SESSION["login"] . " vous êtes connecté vous pouvez passer une reservation.<br><br><br>";
            ?>
                   <article><h1>Veuillez rentrer les infos de reservation :</h1></article>
                   <form id="createform" class="form-row " method="post" action="reservation-form.php">
                   <label for="formGroupExampleInput"><b>Nom du Client</b></label>
                   <input  class="form-control" id="formGroupExampleInput" type="text" placeholder="Entrer le nom du client" name="titre" required>
                   <label for="formGroupExampleInput"><b>Description</b></label>
                   <input  class="form-control" id="formGroupExampleInput" type="text" placeholder="Tapez une Description" name="description" required>
                   <label for="formGroupExampleInput"><b>Date debut</b></label><br>
                   <input  class="form-control" id="formGroupExampleInput" type="date" name="datedebut" required> 
                   <label for="formGroupExampleInput"><b>Date fin</b></label>
                   <input  class="form-control" id="formGroupExampleInput" type="date" name="datefin" required> 
                   <label for="formGroupExampleInput"><b>Heure debut</b></label><br>
                   <input  class="form-control" id="formGroupExampleInput" type="time" name="heuredebut" min="08:00" max="18:00" required> 
                   <label for="formGroupExampleInput"><b>Heure fin</b></label>
                   <input  class="form-control" id="formGroupExampleInput" type="time" name="heurefin" min="09:00" max="19:00" required> 
                   
                   <br><br><br><br>
                   <input class="btn btn-secondary" type="submit" value="Ajouter" name="valider" />
                   </form>
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
                          if($startdate < date('Y-m-d H:i:s')){
                              echo "Vous ne pouvez pas reserver a une date anterieur au ".date('d-m-Y H:i:s');
                          
                          }
                          elseif ($enddate < $startdate) {
                              echo "Vous ne pouvez pas choisir une date de fin antérieur a la date de debut";
                          }
                        
                              else{
                              $requete = "INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES ('$renametitre', '$renamedescritpion', '$startdate', '$enddate',  ".$resultat2[0]['id'].")";
                              $query = mysqli_query($cnx, $requete);
                              header("Location:planning.php");
                              }   
                          } 
                    }
            
            else 
            {
                 echo "Bonjour, Veuillez vous connecté afin de pouvoir reserver un rendez-vous.<br />";
               
            }

            mysqli_close($cnx);
            ?>
</section>

