
<!-- ---------------------------------------------- -->
<!-- ---------- FORMULAIRE HTML-------------------- -->
<html>
    <head>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
    </head>

    <body>
        <?php
        include("../include/functions.php");
        include("../include/bar-nav.php");


        $user = new userpdo;
        $monprofil = $user->getAllInfos();
        ?>
        <h1 class="log_titre">Vos informations</h1>
        <div id="form_log2">
            <form action="" method="post">
                <?php
                if (isset($_POST['update']))
                {

                    $profil_update = $user->update($_POST['login'], $_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['pass'] , $_POST['tel']);
                    
                    
                    if ($profil_update == "erreur")
                    { ?>

                        <p>Login déjà existant</p><?php
                    }
                    else
                    {
                        if ($profil_update == "erreur2")
                        {
                            ?><p>Mot de passe trop court (5 caractères minimums)</p><?php
                        }
                    }
                }
                ?>
                <?
                if (isset($_GET))
                    var_dump($_GET);
                ?>
                <input type="text" name="login" required placeholder="Login" value="<?php echo $monprofil[0][1]; ?>">
                <input type="text" name="lastname" required placeholder="Nom" value="<?php echo $monprofil[0][2]; ?>">
                <input type="text" name="firstname" required placeholder="Prénom"value="<?php echo $monprofil[0][3]; ?>">
                <input type="email" name="email" required placeholder="Email" value="<?php echo $monprofil[0][4]; ?>">
                <input type="password" name="pass" required placeholder="Mot de passe" value="">
                <input type="text" name="tel" required placeholder="Votre tel" value="<?php echo $monprofil[0][7]; ?>">
                <input type="submit" name="update" required value="Modifier">
            </form>
        </div>



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
            $fetch = mysqli_fetch_all($affichage);


            $profil = $_GET['U'];
            $connexion = mysqli_connect("localhost", "root", "", "ciaracut");
            $req = ("SELECT titre, description, debut FROM reservations WHERE id_utilisateur ='".$profil."' ORDER BY debut DESC LIMIT 3" );
            $affichage = mysqli_query($connexion, $req);
            $fetch = mysqli_fetch_all($affichage);

            foreach ($fetch as $key => $value){
                echo '<br/>';
                echo '<div class=" container row justify-content-md-center table-dark"> <p class="bg-secondary">Nom et prémon  : </p>', $value[0],'</div>';
                echo '<div class=" container row justify-content-md-center table-dark"> <p class="bg-secondary">Prestation  :</p>', $value[1],'</div>';
                echo '<div class=" container row justify-content-md-center table-dark"> <p class="bg-secondary">Date de début  :</p>', $value[2],'</div>';
                echo '<br />';
            }

        }



        ?>

    </body>
</html>