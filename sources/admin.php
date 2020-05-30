 
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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <title>Espace Administrateur - Ciaracut </title>
    <link rel="stylesheet" href="../css/ciaracut.css">
</head>

    <body id="pageadmin">

         <header>
         <?php include("../include/bar-nav.php");?>
         </header>
                <main>
  <script>
  $(document).ready(function(){
  $("#hide").click(function(){
    $("#formadminprestation").hide();
    $("#cadre-reserv").hide();
   
  });
  $("#show").click(function(){
    $("#formadminprestation").show();
    $("#cadre-reserv").show();
   
  });
});
</script>

<button id="show">Afficher les prestation</button>
<button id="hide">Cacher les prestations</button>

</main>
<?php 
include("../sources/prestation.php");?>
<?php 
include("../sources/boutiqueprestation.php");?>
</body>
</html>