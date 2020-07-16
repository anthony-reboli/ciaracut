<?php

$connexion =  mysqli_connect("localhost","root","","ciaracut");

?>

                <form class="form-group d-flex flex-column align-items-center m-4"  method="post">
                    <input class="form-control form-control-lg" type="text" name="nom" required placeholder="Nom"/>
                    <input class="form-control form-control-lg" type="text" name="prenom" required placeholder="Prénom"/>
                    <input class="form-control form-control-lg" type="email" name="email" required placeholder="Email"/>
                    <input class="form-control form-control-lg" type="password" name="mdp" required placeholder="mdp"/>
                    <input class="form-control form-control-lg" type="date" name="date" required placeholder="Date">
                    <input class="form-control form-control-lg" type="text" name="tel" required placeholder="tel">
                    <br><input class="btn btn-dark" type="submit" name="formI" required value="S'inscrire"/>
                </form>

<?php

            if(isset($_POST['formI']))
            {
                
                $nom=$_POST['nom'];
                $prenom=$_POST['prenom'];
                $email=$_POST['email'];
                $date=$_POST['date'];
                $mdp=$_POST['mdp'];
                $tel=$_POST['tel'];

                
                $login=$_POST['login'];
                $requete1="SELECT * FROM utilisateurs WHERE login='$nom'";
                
                $requete1Q=mysqli_query($connexion,$requete1);
                $requete1R=mysqli_fetch_all($requete1Q);
                

                        
        
           
            if (empty($requete1R) )
            {
                include("../include/mdpaleatoire.php");
                $hash = password_hash($mdp, PASSWORD_BCRYPT, ['cost' => 12]);
                $requete2=("INSERT INTO utilisateurs VALUES(NULL,'$nom','$nom', '$prenom','$email','$hash','$date',$tel,NULL,NULL)");
                var_dump($requete2);
                
                $requete2Q=mysqli_query($connexion,$requete2);
                echo "votre inscription est confirmer";
                
                
            }
            else
            {
                echo"login déjà existant";
            }
        }

        ?>
        



        

            