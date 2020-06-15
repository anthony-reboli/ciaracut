<!DOCTYPE html>
<html>
<head>
  <title>CHIFFRE AFFAIRE</title>
</head>
<body>
  <main>
    <?php
    $connexion=mysqli_connect("localhost","root","","ciaracut");
    $req="SELECT SUM(prixtotal) FROM sauvegarde WHERE mode='espece'";
    var_dump($req);
    $query=mysqli_query($connexion,$req);
    $resultat=mysqli_fetch_all($query);
    var_dump($resultat);
    $req2="SELECT SUM(prixtotal) FROM sauvegarde WHERE mode='cheque'";
    var_dump($req);
    $query2=mysqli_query($connexion,$req2);
    $resultat2=mysqli_fetch_all($query2);
     var_dump($resultat2);

    ?>
  </main>

</body>
</html>