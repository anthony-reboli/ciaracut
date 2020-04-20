 
 <?php
 $i=0;
						                $nom=$data['nom'];
						                $prenom=$data['prenom'];
						                $nais=$data['date_naissance'];
						                $ids=$data['id'];


						                echo"<div id='infouser'>";
						                echo "nom:&nbsp $nom &nbsp";
						                echo "prenom:&nbsp $prenom &nbsp";
						                echo "née: &nbsp$nais &nbsp";
						                echo "<a href=\"profil.php?U=$ids\" target=\"_blank\"><button name=\"profil\">Profil</button></a>";
						                echo"</div>";


						                $i++;
						                
