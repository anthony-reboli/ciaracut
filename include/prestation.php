<?php 

if (isset($_SESSION['id'])) {

?>


<h1>Gestion de mes prestations</h1>
    <section id="formadminprestation">
            
            <?php 
                if (isset($_POST['valider'])) {
                      $titre = $_POST['titre'];
                      $type = $_POST['type'];
                      $prix = $_POST['prix'];
                      $image = $_POST['photo'];
                      $id=$_SESSION['id'];
                      $connexion = new PDO('mysql:host=localhost;dbname=ciaracut', 'root', '');
                      $requete = $connexion->prepare("INSERT INTO prestation (nom,type,prix,id_utilisateurs,image) VALUES ('$titre','$type','$prix','$id','$image')");
                      $requete->execute();
                
                }
                ?>
                
                <form id="form" class="form-group col-8" method="post" >
                  <h3 >Créer des prestations</h3>
                                  <label for="exampleFormControlInput1">Nom prestation</label></br>
                                  <input class="form-control form-control-lg" type="text" name="titre" required></br>
                                  <label for="exampleFormControlInput1">Type de prestation</label></br>
                                  <input class="form-control form-control-lg" type="text" name="type" required></br>
                                  <label for="exampleFormControlInput1">Photo</label></br>                 
                                  <input type="file" name="photo" required></br>
                                  <label for="exampleFormControlInput1">Prix</label></br>
                                  <input class="form-control form-control-lg" type="text" name="prix" required></br>
                                  <input class="btn btn-secondary" type="submit" value="Creer" name="valider"></br>
                 </form>
             
                  <?php

                if (isset($_POST['modifier'])) {
                          $titre3 = $_POST['titre3'];
                          $titre2 =  $_POST['titre2'];
                          $prix2 = $_POST['prix2'];
                          $type = $_POST['type'];
                          $id = $_SESSION['id'];
                          $image = $_POST['photo'];
                          $connexion = new PDO('mysql:host=localhost;dbname=ciaracut', 'root', '');
                          $requete2 = $connexion->prepare("UPDATE prestation SET nom = '$titre2', type = '$type', prix = '$prix2',image ='$image' WHERE nom ='$titre3'");
                          $requete2->execute();
                }
                ?>
                 
                    <form class="form-group col-8" method="post">
                        <h3 >Modifier des prestations</h3>
                          <label for="exampleFormControlInput1">Recherche le titre de la prestation</label></br>
                                  <input class="form-control form-control-lg" type="text" name="titre3" required></br>
                                  <label for="exampleFormControlInput1">Modifier le titre</label></br>
                                  <input class="form-control form-control-lg" type="text" name="titre2" required></br>
                                  <label for="exampleFormControlInput1">Modifier le type de prestation</label></br>
                                  <input class="form-control form-control-lg" type="text" name="type" required></br>
                                  <label for="exampleFormControlInput1">Modifier la Photo</label></br>                 
                                  <input type="file" name="photo" required></br>
                                  <label for="exampleFormControlInput1">Modifier le Prix</label></br>
                                  <input class="form-control form-control-lg" type="text" name="prix2" required></br>
                                  <input class="btn btn-secondary" type="submit" value="modifier" name="modifier"></br>
                    </form>
                 
                 <?php

                 if (isset($_POST['effacer'])) {
                    if (!empty($_POST['titre4']))
                            {
                            $titre4 = $_POST['titre4']; 
                            $id = $_SESSION['id'];
                            $connexion = new PDO('mysql:host=localhost;dbname=ciaracut', 'root', '');
                            $requete3 = $connexion->prepare("DELETE FROM prestation WHERE nom = '$titre4'");
                            $requete3->execute(); 
                              }               
                          } 
    
                 ?>
                          <form class="form-group col-8" method="post">
                             <h3 >Effacer des prestations</h3>
                                  <label for="exampleFormControlInput1">Rechercher le titre de la prestation</label></br>
                                  <input class="form-control form-control-lg" type="text" name="titre4" required></br>
                                  <input class="btn btn-secondary" type="submit" value="effacer" name="effacer"></br>
                          </form>
          
</section>
<?php
}
?>

