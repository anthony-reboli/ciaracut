
<!-- ---------------------------------------------- -->
<!-- ---------- FORMULAIRE HTML-------------------- -->
<?php
include("../include/functions.php");
?>
<html>
    <head>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="boutique.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
    </head>

    <body id="profil">
    <header class="headeri">
    <?php include("../include/bar-nav.php");?>
    </header>
    

<?php
        if (!isset($_SESSION['login']))
        {
            header('Location: index.php');
        }

        if (isset($_GET['U']))
        {
            $profil = $_GET['U'];
            $connexion = mysqli_connect("localhost", "root", "", "ciaracut");
            $req = ("SELECT * FROM utilisateurs WHERE id = $profil ");
            $affichage = mysqli_query($connexion, $req);
            $fetch = mysqli_fetch_assoc($affichage);
            $login=$fetch['login'];
            $nom=$fetch['nom'];
            $prenom=$fetch['prenom'];
            $email=$fetch['email'];
            $aniv=$fetch['date'];
            $tel=$fetch['tel'];
            echo "<div id=\"infouser2\">";
            echo "<h1 class='titrecoupe'>Le fichier client:</h1>";

            echo "<h1>Les infos de $nom<br>";
                echo" Pseudo: $login<br>";
                echo" Nom: $nom<br>";
                echo" Prénom: $prenom<br>";
                echo" Email: $email<br>";
                echo" Téléphone: $tel<br>";
                echo" Anniversaire: $aniv<br>";
            echo "</div>";
            ?>


    <section id="popclient">
        <?php include("../include/fiche.php"); ?>
    </section>
        <?php
    

            $profil = $_GET['U'];
            $req = ("SELECT titre, description, debut FROM reservations  WHERE id_utilisateur=".$profil."  ORDER BY debut DESC LIMIT 3" );
            $affichage = mysqli_query($connexion, $req);
            $fetch2 = mysqli_fetch_all($affichage);
    
            echo "<div id='contentinfos' class='row justify-content-space-around p-4 m-3' >";
            echo "<div id='titreclient' h1 class='titrecoupe' 'container'>Les infos client</h1></div>";
            echo "<div id='continfo'>";
                        echo "<div id='dernierpresta' class='col-lg-4 col-sm-12'>";
                        echo "<h1>Les derniers rendez-vous</h1>";
            foreach ($fetch2 as $key => $value){
                echo '<br/>';
                echo '<div class=" container row justify-content-md-center table-dark"> <p class="bg-dark">Nom et prémon: </p>',$value[0],'</div>';
                echo '<div class=" container row justify-content-md-center table-dark"> <p class="bg-dark">Prestation: </p>',$value[1],'</div>';
                echo '<div class=" container row justify-content-md-center table-dark"> <p class="bg-dark">Date de début: </p>',$value[2],'</div>';
                echo '<br/>';
            }
            
                        echo "</div>";
                            echo "<div id='fiche' class='col-lg-6 col-sm-12 p-4'>";
                            echo "<div id='contfiche' class='p-3' >";
                            echo "<h1>Fiche client: $nom</h1><br>";
                            echo "Date: ".$fetch['datefiche']."<br>";
                            echo "Dernière prestation: ".$fetch['fiche']."";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
        }
        else
        {

        $user = new userpdo;
        $monprofil = $user->getAllInfos();
        ?>
                <?php
                if (isset($_POST['update']))
                {

                    $profil_update = $user->update($_POST['login'], $_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['pass'],$_POST['tel']);
                    
                        if ($profil_update == "erreur2")
                        {
                            ?><p>Mot de passe trop court (5 caractères minimums)</p>
                            <?php
                        }
                    
                    echo "Le changement a bien été effectué!";
                    session_destroy();
                    header('location:index.php');
                }
                
            ?>
        <div id="formprofil">
                <h1 class="title">Vos informations</h1>
               <form class="form-row col-4 justify-content-center"  method="post">
                 <label for="formGroupExampleInput"><b>Login</b></label>
                <input  class="form-control " type="text" name="login" required placeholder="Login" value="<?php echo $monprofil[0][1]; ?>">
                 <label for="formGroupExampleInput"><b>Nom</b></label>
                <input  class="form-control " type="text" name="lastname" required placeholder="Nom" value="<?php echo $monprofil[0][2]; ?>">
                 <label for="formGroupExampleInput"><b>Prénom</b></label>
                <input  class="form-control" type="text" name="firstname" required placeholder="Prénom"value="<?php echo $monprofil[0][3]; ?>">
                 <label for="formGroupExampleInput"><b>Votre email</b></label>
                <input  class="form-control" type="email" name="email" required placeholder="Email" value="<?php echo $monprofil[0][4]; ?>">
                 <label for="formGroupExampleInput"><b>Mot de passe</b></label>
                <input  class="form-control" type="password" name="pass" required placeholder="Mot de passe" value="">
                <label for="formGroupExampleInput"><b>Votre téléphone</b></label>
                <input  class="form-control" type="text" name="tel" required placeholder="Votre tel" value="<?php echo $monprofil[0][7]; ?>">
                <input class="btn btn-light m-4" type="submit" name="update" required value="Modifier">
            </form>
        </div>
    
        <?php
        }

        ?>
        <footer class="headeri">
        <?php include("../include/footer.php");?>
        </footer>
    
    </body>
</html>