
  
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
    
    echo "<div id=\"alertchiffre\">";
    echo "Votre chiffre d'affaire en \"espèce\" est de ".$resultat[0][0]." €  cette semaine<br>";
    $req2="SELECT SUM(prixtotal) FROM sauvegarde WHERE mode='cheque'AND datepanier BETWEEN '".$startTime."' AND '".$fintemps."'"; 
    $query2=mysqli_query($connexion,$req2);
    $resultat2=mysqli_fetch_all($query2);
    echo "Votre chiffre d'affaire en \"chèque\" est de ".$resultat2[0][0]." €  cette semaine";
    echo "</div>";

    ?>




