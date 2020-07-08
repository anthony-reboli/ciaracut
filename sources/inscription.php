

<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="ciaracut.css">
	<title>Inscription</title>
</head>
<body class="TSbodyc">

	<?php
    include("../include/bar-nav.php");
    include("../include/functions.php");
     $connexion =  mysqli_connect("localhost","root","","ciaracut");
     if ( !isset($_SESSION['login']) )
    {
    ?>
    <section id="TSinscription">

        <div id="TSmain" class="column">
            <h1>Inscrivez-vous !</h1>

                <form  method="post">
                    <input class="form-control" type="text" name="login" required placeholder="Login"/>
                    <input class="form-control" type="text" name="nom" required placeholder="Nom"/>
                    <input class="form-control" type="text" name="prenom" required placeholder="Prénom"/>
                    <input class="form-control" type="email" name="email" required placeholder="Email"/>
                    <input class="form-control" type="password" name="pass1" required placeholder="Mot de passe"/>
                    <input class="form-control" type="password" name="pass2" required placeholder="Confirmer votre mot de passe"/>
                    <input class="form-control" type="date" name="date" required placeholder="Date">
                    <input class="form-control" type="text" name="tel" required placeholder="Votre tel">
                    <input class="form-control" type="submit" name="signin" required value="S'inscrire"/>

                    <?php
                    if (isset($_POST['signin'])) {
                        $user = new userpdo;
                        $user_sign = $user->register($_POST['login'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['pass1'], $_POST['pass2'], $_POST['date'], $_POST['tel']);
                        
                             
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
    </section>
</body>
    <?php
    }
    include("../include/footer.php");
    ?>
</html>