 
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
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Espace Administrateur - Ciaracut </title>
    <link rel="stylesheet" href="../css/ciaracut.css">

</head>

    <body id="pageadmin">

         <header>
         <?php include("../include/bar-nav.php");?>
         </header>
                <main>
 
</main>



</body>
</html>