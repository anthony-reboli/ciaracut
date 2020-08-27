 
 <?php
 $i=0;
 										
 										
						                $nom=$data['nom'];
						                $prenom=$data['prenom'];
						                $date=$data['date'];
						                $ids=$data['id'];
						                echo"<div id='infouser' class='table table-dark'>";
						                echo "Nom:&nbsp $nom &nbsp";
						                echo "Prénom:&nbsp $prenom &nbsp";
						                echo "<a href=\"profil.php?U=$ids\" target=\"_blank\"><button class=\"btn btn-light\" name=\"profil\">Profil</button></a>";
										$datejour=date('Y-m-d');
										
						                if($date == $datejour)
						                	{
						                	echo "<img src=\"../upload/gat.png\" style=\" height: 50px; width: 100px;\">";
						                	}
						                echo"</div>";

						                $i++;


						                
