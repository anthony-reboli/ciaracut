<?php
session_start();
         if($_SESSION['login'] != 'vanessa')
         {
          header('location:index.php');
         }
?>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
</head>
<body id="planning">

<header class="headeri">
   <?php include("../include/bar-nav.php");?>
</header>
<main id="contplanning">

<button id="pop1" type="button" class="btn-lg btn-dark" data-toggle="modal" data-target="#exampleModal2">
Gérer mes rendez-vous </button>
   <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Créer mes rendez-vous</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span class="material-icons" aria-hidden="true">close</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <?php include("../include/reservation-form.php"); ?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Fermer</button>
                      </div>
                    </div>
                  </div>
                </div>
  
          <section id="calendrier">
              <form  method="post">
              <input class="btn-lg btn-light" type="submit" name="precedent" value="Précédent">
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
              <input class="btn-lg btn-light" type="submit" name="suivant" value="Suivant">
              </form>
            </section>

          <section id="agenda">
<?php 
  $db=mysqli_connect("localhost","root","","ciaracut");
  mysqli_set_charset($db, "utf8");
  $date="SELECT *  FROM reservations LEFT JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur WHERE \"$dateselec\" BETWEEN DATE_FORMAT(debut, \"%Y-%m-%d\") AND DATE_FORMAT(fin, \"%Y-%m-%d\")";
  $query=mysqli_query($db, $date);
  $result=mysqli_fetch_all($query);

  $data2 ="SELECT count(*)  FROM reservations LEFT JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur WHERE \"$dateselec\" BETWEEN DATE_FORMAT(debut, \"%Y-%m-%d\") AND DATE_FORMAT(fin, \"%Y-%m-%d\")";
  $query2=mysqli_query($db, $data2);
  $result2=mysqli_fetch_all($query2);
  echo "<div id='alertplanning' class='alert alert-dark' role='alert'>";
  echo "<p id='message'>Vous avez ".$result2[0][0]." rendez-vous pour cette date!</p>";
  echo "</div>";
?>

    <table id="tableauplanning" class="table table-striped table-dark">
      <thead>
        <tr>
          <th></th>
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
                    $idreserv=$value[0];
                    ?>
                    <div class="lien">
                      <?php echo "Client: ".$value[1]."<br>Prestations: ".$value[2].""?>
                    <button type="button" id="<?php echo $idreserv;?>" class="material-icons btnRes" data-toggle="modal" data-target="#exampleModal" title="Modifier">create</button>
                    </div>
                      
                    <?php
                    $connexion = new PDO('mysql:host=localhost;dbname=ciaracut', 'root', '');
                    $requete = $connexion->prepare("SELECT * FROM reservations WHERE id='$idreserv'");
                    $requete->execute();
                    $test = $requete->fetchAll();
              foreach ($test as  $teste) {
                $idtest=$teste;          
                ?>
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier ou supprimer mes rendez-vous</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span class="material-icons" aria-hidden="true">close</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <?php include("../include/reservation-form2.php"); ?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Fermer</button>
                      </div>
                    </div>
                  </div>
                </div>
                  <?php
              } 
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


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="../js/script.js"></script>
</main>
<footer class="headeri">
    <?php include("../include/footer.php");?>
</footer>
</body>

</html>