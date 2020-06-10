<?php
session_start();
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body id="planning">
<header>
   <?php include("../include/bar-nav.php");?>
</header>
    <?php include("../sources/reservation-form.php");?>

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


  $db=mysqli_connect("localhost","root","","ciaracut");
  mysqli_set_charset($db, "utf8");
  $date="SELECT *  FROM reservations LEFT JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur WHERE \"$dateselec\" BETWEEN DATE_FORMAT(debut, \"%Y-%m-%d\") AND DATE_FORMAT(fin, \"%Y-%m-%d\")";
  $query=mysqli_query($db, $date);
  $result=mysqli_fetch_all($query);
  $idreserv=$result[0][0];
  $data2 ="SELECT count(*)  FROM reservations LEFT JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur WHERE \"$dateselec\" BETWEEN DATE_FORMAT(debut, \"%Y-%m-%d\") AND DATE_FORMAT(fin, \"%Y-%m-%d\")";
  $query2=mysqli_query($db, $data2);
  $result2=mysqli_fetch_all($query2);
  var_dump($result);
  echo "<div class='alert alert-dark' role='alert'>";
  echo "<p id='message'>Vous avez ".$result2[0][0]." rendez-vous pour cette date!</p>";
  echo "</div>";

  
  
?>


<section id="agenda">
    <table id="agenda" class="table table-striped table-dark">
      <thead>
        <tr>
          <th>
          </th>
          <th>Lundi</th>
          <th>Mardi</th>
          <th>Mercredi</th>
          <th>Jeudi</th>
          <th>Vendredi</th>
          <th>Samedi</th>
          <th>Dimanche</th>
        </tr>
      </thead>
      <tbody>
<?php
    
    for($ligne =9; $ligne <= 18; $ligne++ )
    {
      echo "<tr>";
      echo "<td class='ligne2'>".$ligne."H</td>";

      for($colonne = 1; $colonne <= 7; $colonne++)
      {
        echo "<td class='ligne'>";
        foreach($result as $value)
        {
          $jour=date("w", strtotime($value[3]));
          $h=date("H", strtotime($value[3]));
          if($h==$ligne && $jour== $colonne)
                  {
                    echo "<div><a class=\"lien\" href=\"reservation-form2.php?reserv=$idreserv\"><u>Client:</u>".$value[1]."<br><u>Prestation:</u>".$value[2]."</a></div>";
                
                  } 
              }
        }
        echo "</td>";
      }
    echo "</tr>";

?>
  </tbody>
    
</table>
</section>




</body>

</html>