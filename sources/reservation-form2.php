 <?php
 if (isset($_POST['modifier'])) {
        if (!empty($_POST['titre3']))
                            {

                $id = $_SESSION['id'];
                $titre3 = $_POST['titre3'];
                $titre2 =  $_POST['titre2'];
                $description = $_POST['description'];
                $dated = $_POST['datedebut'];
                $datef = $_POST['datefin'];
                $requete2 = $connexion->prepare("UPDATE reservations SET titre = '$titre2', description = '$description', debut = '$dated', fin ='$datef' WHERE titre ='$titre3'");
                $requete2->execute();                
                }
             }
             ?>
      <h5 class="modal-title" id="exampleModalLabel">Modifier le rendez-vous</h5>
                    <form class="form-group" method="post">
                    <label for="exampleFormControlInput1"><b>Recherche le nom du rendez-vous<b></label>
                    <input class="form-control form-control-lg" type="text" name="titre3" required value= <?php echo $test[0][1] ?> ></br>
                    <label for="exampleFormControlInput1"><b>Entrez le nom<b></label></br>
                    <input class="form-control form-control-lg" type="text" name="titre2" required value= <?php echo $test[0][1] ?> > </br>
                    <label for="exampleFormControlInput1"><b>Prestation<b></label></br>
                    <input class="form-control form-control-lg" type="text" placeholder="Modifiez la prestation" name="description" required value= <?php echo $test[0][2] ?> ></br>
                    <label for="exampleFormControlInput1"><b>Date debut<b></label><br>
                    <input class="form-control form-control-lg" type="datetime-local" name="datedebut"  value=<?php echo $test[0][3] ?> ></br> 
                    <label for="exampleFormControlInput1"><b>Date fin<b></label></br>
                    <input class="form-control form-control-lg" type="datetime-local" name="datefin" value=<?php echo $test[0][4] ?> ></br> 
                    <input class="btn btn-secondary" type="submit" value="Modifiez" name="modifier" />
                    </form>
                    <?php
                    if (isset($_POST['effacer'])) {
                    if (!empty($_POST['titre4']))
                            {
                            $titre4 = $_POST['titre4']; 
                            $id = $_SESSION['id'];
                            $connexion = new PDO('mysql:host=localhost;dbname=ciaracut', 'root', '');
                            $requete3 = $connexion->prepare("DELETE FROM reservations WHERE titre = '$titre4'");
                            $requete3->execute(); 
                          
                        
                              }               
                          } 
                 ?>
                    <h5 class="modal-title" id="exampleModalLabel">Effacer le rendez-vous</h5>
                          <form class="form-group " method="post">
                                  <label for="exampleFormControlInput1">Rechercher le titre du rendez-vous</label></br>
                                  <input class="form-control form-control-lg" type="text" name="titre4" required value=<?php echo $test[0][1] ?>></br>
                                  <input class="btn btn-secondary" type="submit" value="effacer" name="effacer"></br>
                          </form>