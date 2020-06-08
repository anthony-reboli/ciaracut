<!DOCTYPE html>
<html>
<head>
  <title>formulaire</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
</head>
<body>
<?php 
#TA DATE EN TIME
$datetime=time("Y-m-d H:i:s");

#TU AJOUTES LE NOMBRE DE SECONDE DESIRE (ici 1h30 = 5400 secondes)
$dateplus=$datetime+5400;

#TU REPASSE EN FORMAT DATE
$date=date("Y-m-d H:i:s",$dateplus);


?>
                  <section id="reservation-form">
                  <h1><b>Formulaire de réservation</b></h1><br>
                  <form class="form-group " method="post" action="reservation-form.php">
                  <label for="exampleFormControlInput1"><b>Nom du client</b></label>
                  <input class="form-control form-control-lg"  type="text" placeholder="Tapez le nom du client" name="titre" required />
                  <label for="exampleFormControlInput1"><b>Prestation</b></label>
                  <input class="form-control form-control-lg"  type="text" placeholder="Tapez une prestation" name="description" required />
                  <label for="exampleFormControlInput1"><b>Date début</b></label>
                  <input class="form-control form-control-lg"  type="datetime-local" name="datedebut" required /> 
                  <label for="exampleFormControlInput1"><b>Date fin</b></label>
                  <input class="form-control form-control-lg"  type="datetime-local" name="datefin" required> 
                   <br>
                  <input class="btn btn-secondary" type="submit" value="Ajouter" name="valider" />
                  </form>
      
        
      <?php
        
                    if ( isset($_POST["valider"]) )
                    {
                          $titreresa = $_POST['titre'];
                          $renametitre = addslashes($titreresa); 
                          $descriptionresa = $_POST['description'];
                          $renamedescritpion = addslashes($descriptionresa);
                          $dated = $_POST['datedebut'];
                          $datef = $_POST['datefin']; 
                          $connexion=mysqli_connect("localhost","root","","ciaracut");   
                          $entre="SELECT count(*) FROM reservations WHERE debut BETWEEN '$dated' AND '$datef'";
                          $queryentre=mysqli_query($connexion,$entre);
                          $resultatentre=mysqli_fetch_all($queryentre);

                        if($dated < date('Y-m-d'))
                        {
                              echo "Vous ne pouvez pas reserver à une date anterieur au".date('d-m-Y');
                          
                        }
                        elseif ($datef < $dated) 
                        {
                              echo "Vous ne pouvez pas choisir une date de fin antérieur à la date de debut";
                        }
                        else{
                            
                          if($resultatentre[0][0] < 3)
                            {
                                      

                            $requete = "INSERT INTO reservations (titre, description, debut, fin) VALUES ('$renametitre', '$renamedescritpion', '$dated', '$datef')";   
                            $query = mysqli_query($connexion, $requete);
                      
                            }
                          else
                            {
                            echo "Il y a déja 3 réservations pour cette heure!!";
                            }       
                        } 
                         header("location:planning.php");
                    }
        
               
        ?>
      </section>
      </body>
</html>
      

  
                         

  

