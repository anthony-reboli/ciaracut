
<!-- ---------------------------------------------- -->
<!-- ---------- FORMULAIRE HTML-------------------- -->
<?php include("../include/functions.php");?>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
         <link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
    </head>

    <body id="profil">
        <header class="headeri">
            <?php include("../include/bar-nav.php");?>
        </header>
        <main id="continfo">

        <?php
        $user = new userpdo;
        $monprofil = $user->getAllInfos();
        ?>
        <div id="infoclient">
        <h1 class="title">Vos informations</h1>
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
                    
                ?>
            <form class="form-row col-4 justify-content-center"  method="post">
                 <label for="formGroupExampleInput"><b>Login</b></label>
                <input  class="form-control " type="text" name="login" required placeholder="Login" value="<?php echo $monprofil[0][1]; ?>">
                 <label for="formGroupExampleInput"><b>Nomt</b></label>
                <input  class="form-control " type="text" name="lastname" required placeholder="Nom" value="<?php echo $monprofil[0][2]; ?>">
                 <label for="formGroupExampleInput"><b>Prénom</b></label>
                <input  class="form-control" type="text" name="firstname" required placeholder="Prénom"value="<?php echo $monprofil[0][3]; ?>">
                 <label for="formGroupExampleInput"><b>Votre email</b></label>
                <input  class="form-control" type="email" name="email" required placeholder="Email" value="<?php echo $monprofil[0][4]; ?>">
                 <label for="formGroupExampleInput"><b>Mot de passe</b></label>
                <input  class="form-control" type="password" name="pass" required placeholder="Mot de passe" value="">
                <label for="formGroupExampleInput"><b>Votre téléphone</b></label>
                <input  class="form-control" type="text" name="tel" required placeholder="Votre tel" value="<?php echo $monprofil[0][7]; ?>">
                <input class="btn btn-dark" type="submit" name="update" required value="Modifier">
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
        </main>

    </body>
</html>