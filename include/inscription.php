<?php
     $connexion =  mysqli_connect("localhost","root","","ciaracut");
     if ( !isset($_SESSION['login']) )
    {
    ?>
    <section id="connexion">
    <form method="post">
      <input type="text" name="login">
      <input type="text" name="prenom">
      <input type="text" name="nom">
      <input type="mail" name="email">
      <input type 
 
                 <?php


        if (isset($_POST['connexion']))
       {
            $login = $_POST['login'];
	        $mdp= password_hash($_POST["mdp1"], PASSWORD_DEFAULT, array('cost' => 12));
	        if ($_POST['mdp1']==$_POST['mdp2'])
            {
            $requet="SELECT* FROM utilisateurs WHERE login='".$login."'";
            $query2=mysqli_query($connexion,$requet);
            $resultat=mysqli_fetch_all($query2);
            $trouve=false;
            foreach ($resultat as $key => $value) 
            {
            if ($resultat[$key][1]==$_POST['login'])
            {
               $trouve=true;
               echo "<p class='erreur'><b>Login déja existant!!</b></p>";
            }
           }
           if ($trouve==false)
           {
            $sql = "INSERT INTO utilisateurs (login,password)
                VALUES ('".$login."','".$mdp."')";
            $query=mysqli_query($connexion,$sql);
            header('location:connexion.php');
            }
           }
           else
           {
              echo "<p class='erreur'><b>Les mots de passe doivent être identique!</b></p>";
           }
        }

    ?>
        
        </form>
    </div>
        

    <?php
    }

