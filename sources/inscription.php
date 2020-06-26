

<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="camping.css">
	<title>Inscription</title>
</head>
<body class="bodyc">

	<?php
    include("../include/bar-nav.php");
    include("../functions/functions.php");
     $connexion =  mysqli_connect("localhost","root","","ciaracut");
     if ( !isset($_SESSION['login']) )
    {
    ?>
    <section id="connexion">

        <div id="main" class="container">
            <h1>Inscrivez-vous !</h1>

                <form action="inscription.php" method="post">
                    <input type="text" name="login" required placeholder="Login"/>
                    <input type="text" name="nom" required placeholder="Nom"/>
                    <input type="text" name="prenom" required placeholder="Prénom"/>
                    <input type="email" name="email" required placeholder="Email"/>
                    <input type="password" name="pass1" required placeholder="Mot de passe"/>
                    <input type="password" name="pass2" required placeholder="Confirmer votre mot de passe"/>
                   <input type="date" name="date" required placeholder="Date">
                    <input type="submit" name="signin" required value="S'inscrire"/>

                    <?php
                    if (isset($_POST['signin'])) {
                        $user = new userpdo;
                        $user_sign = $user->register($_POST['login'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['pass1'], $_POST['pass2'], $_POST['date']);
                             
                            if ($user_sign == "ok") 
                            {
                                header ("Refresh: 1;URL=connexion.php");
                            } 
                            else 
                            {
                            echo $user_sign;
                            }
                    }
                    ?>
                </form>
            </div>


        <?php
    }
    include("../include/footer.php");
    ?>


 </body>
</html>