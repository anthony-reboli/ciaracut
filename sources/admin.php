
<html lang="fr">
<head>
  <script type="text/javascript" src="../js/script.js."></script>
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
<?php

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
                <main>
              <div class="heure">
              <span id="date_heure"></span>
              <script type="text/javascript">window.onload = date_heure('date_heure');</script>
              </div>

        <section id="calendrier">
              <form  method="post">
              <input class="btn btn-secondary" type="submit" name="precedent" value="Précédent">
              </form>
            <?php
                   

                    $datejour = new DateTime("today");
                    if (!isset($_SESSION["num"])) {
                  
                        $_SESSION["num"] = 0;
                    }

                    if (isset($_POST["suivant"])) {
                        $_SESSION["num"] += 1;
                           
                    }

                    if (isset($_POST["precedent"])) {
                        $_SESSION["num"] -= 1;
                        
                    }

                    date_add($datejour, date_interval_create_from_date_string($_SESSION['num']." days"));
                    echo date_format($datejour, 'Y-m-d');
                    $dateselec = date_format($datejour, 'Y-m-d');
                  
?>
              <form  method="post">
              <input class="btn btn-secondary" type="submit" name="suivant" value="Suivant">
              </form>
            </section>
 <?php
 
 $connexion=mysqli_connect("localhost","root","","ciaracut");
 $data2 ="SELECT count(*)  FROM reservations LEFT JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur WHERE \"$dateselec\" BETWEEN DATE_FORMAT(debut, \"%Y-%m-%d\") AND DATE_FORMAT(fin, \"%Y-%m-%d\")";
  $query2=mysqli_query($connexion, $data2);
  $result2=mysqli_fetch_all($query2);
  echo "<div class='alert alert-dark' role='alert'>";
  echo "<p id='message'>Vous avez ".$result2[0][0]." rendez-vous pour cette date!</p>";
  echo "</div>";
 ?>
    <div class="heure">
    <?php include("../sources/chiffre.php");?>
    </div>
                </main>



</body>
</html>