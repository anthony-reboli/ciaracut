                <?php 
                session_start();
                
                $connexion = new PDO('mysql:host=localhost;dbname=ciaracut', 'root', '');
                // var_dump($_SESSION['doss'])
              ?>  

                <form action="test.php" id="form" class="form-group col-8" method="post" enctype="multipart/form-data">
                  <h3 >Créer des prestations</h3>
                                  <label for="exampleFormControlInput1">Nom prestation</label></br>
                                  <input class="form-control form-control-lg" type="text" name="titre" required></br>
                                  <label for="exampleFormControlInput1">Type de prestation</label></br>
                                  <input class="form-control form-control-lg" type="text" name="type" required></br>
                                            

                                  <label for="photo"></label><br />
                                    <input type="hidden" name="MAX_FILE_SIZE" value="1048576" required />
                                  <input type="file" name="photo" id="mon_fichier" required/><br /> </br>
                                  <label for="exampleFormControlInput1">Prix</label></br>
                                  <input class="form-control form-control-lg" type="text" name="prix" required></br>
                                  <input class="btn btn-secondary" type="submit" value="Creer" name="valider"></br>
                 </form>




                 <?php
                
                 

if(isset($_POST['titre']) & isset($_POST['prix']) )
{




      $dossier = '../upload/prestation/';

      $fichier = basename($_FILES['photo']['name']);
      
      // $_SESSION['doss']=$fichier;
      var_dump($_FILES['photo']);
      $taille_maxi = 1000000;
      $taille = filesize($_FILES['photo']['tmp_name']);
      $extensions = array('.png', '.gif', '.jpg', '.jpeg');
      $extension = strrchr($_FILES['photo']['name'], '.');
      $chemin=$fichier;
      var_dump($chemin);
        
      //Début des vérifications de sécurité...
      if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
      {
           $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
      }
      if($taille>$taille_maxi)
      {
           $erreur = 'Le fichier est trop gros...';
      }
      if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
      {
           //On formate le nom du fichier ici...
           $fichier = strtr($fichier,
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
           $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
           if(move_uploaded_file($_FILES['photo']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
           {
           try

      {
       
          // $bdd = mysqli_connect("localhost", "root", "", "ciaracut");
      }
        catch(Exception $e)
          {     
               die('Erreur : '.$e->getMessage());
          }
                     $titre = $_POST['titre'];
                      $type = $_POST['type'];
                      $prix = $_POST['prix'];
                      
                      $id=$_SESSION['id'];

              $image=$chemin;
              
                       $requete = $connexion->prepare("INSERT INTO prestation (nom,type,prix,id_utilisateurs,image) VALUES ('$titre','$type','$prix','$id','$image')");
                       $requete->execute();



           }
           else //Sinon (la fonction renvoie FALSE).
           {
                echo 'Echec de l\'upload !';
           }
      }
      else
      {
           echo $erreur;
      }
       header('refresh:0');
}
?>