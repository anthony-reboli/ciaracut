   <?php

       $db = new PDO('mysql:host=localhost;dbname=ciaracut', 'root', '');
                    if (isset($_POST['effacer'])) {
                    if (!empty($_POST['titre4'])){
                            $titre4 = $_POST['titre4']; 
                            $requete3 = $db->prepare("DELETE  FROM reservations WHERE titre = '$titre4'");
                            $requete3->execute(); 

                          }               
                        } 
                 ?>
                   
    
                 