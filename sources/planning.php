<html>

<head>
  <link href="reservations.css" rel="stylesheet">
</head>



<body class="planning">

<?php


?>

<header>
   <?php include("../include/bar-nav.php");?>
</header>

              <form  method="post">
              <input id="arriere" type="submit" name="precedent" value="-">
              </form>
<?php
                   

                    $datejour = new DateTime("today");
                    var_dump($datejour);
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
              <input id="avant" type="submit" name="suivant" value="+">
              </form>
<?php 


  $db=mysqli_connect("localhost","root","","ciaracut");
  mysqli_set_charset($db, "utf8");
  $date="SELECT * FROM reservations LEFT JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur WHERE \"$dateselec\" BETWEEN DATE_FORMAT(debut, \"%Y-%m-%d\") AND DATE_FORMAT(fin, \"%Y-%m-%d\")";
  $query=mysqli_query($db, $date);
  $result=mysqli_fetch_all($query);
  var_dump($result);
  
?>

<section class="tableaux">

<article class="planningtable">
<table class="BlueTable">
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
      echo "<td>".$ligne."H</td>";

      for($colonne = 1; $colonne <= 7; $colonne++)
      {
        echo "<td>";
        foreach($result as $value)
        {
        $jour=date("w", strtotime($value[3]));
        $h=date("H", strtotime($value[3]));
        if($h==$ligne && $jour== $colonne)
        {
          echo $value[1];
          
        ?>
         
        <?php         
        }
      }
        echo "</td>";
      }
    }
    echo "</tr>";

?>
  </tbody>
    
</table>


</article>

</section>

</body>

</html>