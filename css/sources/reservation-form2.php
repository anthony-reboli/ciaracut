 <?php session_start();?>
 <section id="modifreserva">
 <div class="form-group">
 	<link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <?php
       if (isset($_SESSION['id'])) {
                if (isset($_POST['modifier'])) {
                	     if (!empty($_POST['titre3']))
                            {

                				$id = $_SESSION['id'];
                          $titre3 = $_POST['titre3'];
                          $titre2 =  $_POST['titre2'];
                          $description = $_POST['description'];
                          $dated = $_POST['datedebut'];
                          $datef = $_POST['datefin'];
                          $connexion = new PDO('mysql:host=localhost;dbname=ciaracut', 'root', '');
                          $requete2 = $connexion->prepare("UPDATE reservations SET titre = '$titre2', description = '$description', debut = '$dated', fin ='$datef' WHERE titre ='$titre3'");
                          $requete2->execute();
                          header("location:planning.php");
                }
             }
                ?>
                 <h1 class="titre"><b>Modifier les rendez-vous<b></h1>
                    <form class="form-group " method="post">
                    <label for="exampleFormControlInput1"><b>Recherche le nom du rendez-vous<b></label></br>
                    <input class="form-control form-control-lg" type="text" name="titre3" required></br>
                    <label for="exampleFormControlInput1"><b>Entrez le nom<b></label></br>
                    <input class="form-control form-control-lg" type="text" name="titre2" required></br>
                    <label for="exampleFormControlInput1"><b>Prestation<b></label></br>
                    <input class="form-control form-control-lg" type="text" placeholder="Modifiez la prestation" name="description" required></br>
                    <label for="exampleFormControlInput1"><b>Date debut<b></label><br>
                    <input class="form-control form-control-lg" type="datetime-local" name="datedebut" required></br> 
                    <label for="exampleFormControlInput1"><b>Date fin<b></label></br>
                    <input class="form-control form-control-lg" type="datetime-local" name="datefin" required></br> 
                    <input class="btn btn-secondary" type="submit" value="Modifiez" name="modifier" />
                    </form>
                    </div>
            <?php
                 ?>
                 <div class="form">
                 <?php

                 if (isset($_POST['effacer'])) {
                    if (!empty($_POST['titre4']))
                            {
                            $titre4 = $_POST['titre4']; 
                            $id = $_SESSION['id'];
                            $connexion = new PDO('mysql:host=localhost;dbname=ciaracut', 'root', '');
                            $requete3 = $connexion->prepare("DELETE FROM reservations WHERE titre = '$titre4'");
                            $requete3->execute(); 
                            header("location:planning.php");
                              }               
                          } 
                        
    
                 ?>
                  <h1 class="titre"><b>Effacer un rendez-vous<b></h1>
                          <form class="form-group " method="post">
                                  <label for="exampleFormControlInput1">Rechercher le titre du rendez-vous</label></br>
                                  <input class="form-control form-control-lg" type="text" name="titre4" required></br>
                                  <input class="btn btn-secondary" type="submit" value="effacer" name="effacer"></br>
                          </form>
                          <?php
                       }
                       ?>
                  </div>
                  </section>