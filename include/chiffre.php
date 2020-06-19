
  
    <?php
    setlocale (LC_TIME, 'fr_FR');
    $startTime = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d'), date('Y')) - ((date('N')-1)*3600*24)); 
    $endTime = date("Y-m-d", mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
    $strtime=strtotime($startTime);
    $fintemps=strtotime("+7 day",$strtime);
    $fintemps=date("Y-m-d",$fintemps);
    $connexion=mysqli_connect("localhost","root","","ciaracut");
    $req="SELECT SUM(prixtotal) FROM sauvegarde WHERE mode='espece' AND datepanier BETWEEN '".$startTime."' AND '".$fintemps."'";
    $query=mysqli_query($connexion,$req);
    $resultat=mysqli_fetch_all($query);
    echo "Vous avez fait ".$resultat[0][0]."€ en espèce cette semaine<br>";

    $req2="SELECT SUM(prixtotal) FROM sauvegarde WHERE mode='cheque'AND datepanier BETWEEN '".$startTime."' AND '".$endTime."'";
    var_dump($req2);
    $query2=mysqli_query($connexion,$req2);
    $resultat2=mysqli_fetch_all($query2);

      echo "Vous avez fait ".$resultat2[0][0]."€ en chèque cette semaine";
    

    ?>



