<?php

$connexion =  mysqli_connect("localhost","root","","ciaracut");
?>

<form  method="post">
                    
                    <input type="text" name="nom" required placeholder="Nom"/>
                    <input type="text" name="prenom" required placeholder="Prénom"/>
                    <input type="email" name="email" required placeholder="Email"/>
                   <input type="date" name="date" required placeholder="Date">
                    <br><input type="submit" name="signin2" required value="S'inscrire"/>

</form>

<?php

            if(isset($_POST['signin2']))
            {
                
                $nom=$_POST['nom'];
                $prenom=$_POST['prenom'];
                $email=$_POST['email'];
                $date=$_POST['date'];

                
                $login=$_POST['login'];
                $requete1="SELECT * FROM utilisateurs WHERE login='$nom'";
                var_dump($requete1);
                $requete1Q=mysqli_query($connexion,$requete1);
                $requete1R=mysqli_fetch_all($requete1Q);
                

                        
        
            var_dump($requete1R);
            if (empty($requete1R) )
            {
                include("../include/mdpaleatoire.php");
                $hash = password_hash($pass1, PASSWORD_BCRYPT, ['cost' => 12]);
                $requete2=("INSERT INTO utilisateurs VALUES(NULL,'$nom','$nom', '$prenom','$email','$mon_mot_de_passe','$date')");
                var_dump($requete2);
                
                $requete2=mysqli_query($connexion,$requete2);
                echo "votre inscription est confirmer";
                mail('$email', 'code', '$mon_mot_de_passe');
                
            }
            else
            {
                echo"login déjà existant";
            }
        }

        ?>
        <input type="submit" name="send">



        

            