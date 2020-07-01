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
                    echo "Bonjour, " . $_SESSION["login"] . " vous êtes connecté vous pouvez prendre une réservation.<br><br><br>";
            
                    if ( isset($_POST["valider"]) )
                    {
                          $titreresa = $_POST['nom'];
                          $renametitre = addslashes($titreresa); 
                          $descriptionresa = $_POST['description'];
                          $renamedescritpion = addslashes($descriptionresa); 
                          $dated = $_POST['datedebut'];
                          $datef = $_POST['datefin'];
                          if($dated < date('Y-m-d H:i:s')){
                              echo "Vous ne pouvez pas reserver a une date anterieur au ".date('d-m-Y H:i:s')."";
                          
                          }
                          elseif ($datef < $dated) {
                              echo "Vous ne pouvez pas choisir une date de fin antérieur a la date de debut";
                          }
                        
                              else{
                              $requete = "INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES ('$renametitre', '$renamedescritpion', '$dated', '$datef',  ".$resultat2[0]['id'].")";
                              $query = mysqli_query($cnx, $requete);
                          
                              }   
                          } 
                    }
            
            else 
            {
                 echo "Bonjour, Veuillez vous connecté afin de pouvoir reserver un rendez-vous.<br />";
               
            }

            mysqli_close($cnx);
            ?>
                <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
               <script type="text/javascript" src="../js/script.js."></script>
</section>

