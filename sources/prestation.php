
<h1>Gestion de mes prestations</h1>
    <section id="formadminprestation">
            <div class="form">
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
                <p class="titre">Créer des prestations</p>
                <form id="form" method="post" >
                                  <label>Nom prestation</label></br>
                                  <input type="text" name="titre" required></br>
                                  <label>Type de prestation</label></br>
                                  <input type="text" name="type" required></br>
                                  <label>Photo</label></br>                 
                                  <input type="file" name="photo" required></br>
                                  <label>Prix</label></br>
                                  <input type="text" name="prix" required></br>
                                  <input type="submit" value="Creer" name="valider"></br>
                 </form>
              </div>

              <div class="form">
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
                 <p class="titre">Modifier les prestations</p>
                    <form id="form1" method="post">
                          <label>Recherche le titre de la prestation</label></br>
                                  <input type="text" name="titre3" required></br>
                                  <label>Modifier le titre</label></br>
                                  <input type="text" name="titre2" required></br>
                                  <label>Modifier le type de prestation</label></br>
                                  <input type="text" name="type" required></br>
                                  <label>Modifier la Photo</label></br>                 
                                  <input type="file" name="photo" required></br>
                                  <label>Modifier le Prix</label></br>
                                  <input type="text" name="prix2" required></br>
                                  <input type="submit" value="modifier" name="modifier"></br>
                    </form>
                 </div>
                 <div class="form">
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
                  <p class="titre">Effacer une prestation</p>
                          <form id="form2" method="post">
                                  <label>Rechercher le titre de la prestation</label></br>
                                  <input type="text" name="titre4" required></br>
                                  <input type="submit" value="effacer" name="effacer"></br>
                          </form>
                  </div>
</section>