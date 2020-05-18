 
<?php
session_start();
date_default_timezone_set('europe/paris');

      if (isset($_SESSION['login'])==false)
      {
       echo "<h3>Connectez vous et achetez maintenant";
      }
      elseif(isset($_SESSION['login'])==true)

      {
       if($_SESSION['login'] =="admin")
       {
        $user = $_SESSION['login'];
            echo "<h3><b>Bonjour <u>$user,</u> vous êtes connecté.</b></h3>";
       }
       else
       {
        $user = $_SESSION['login'];
            echo "<h3><b>Bonjour <u>$user,</u> vous êtes connecté vous pouvez achetez.</b></h3>"; 
       }
      }
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Administrateur - Ciaracut </title>
    <link rel="stylesheet" href="ciaracut.css">
</head>
<body id="pageadmin">
<header>
<?php include("../include/bar-nav.php");?>
</header>

<?php include("../include/reservformulaire.php");?>
<?php 
include("../include/prestation.php");?>
<?php 
include("../include/boutiqueprestation.php");?>
</body>
</html>