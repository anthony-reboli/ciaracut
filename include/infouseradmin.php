 
 <?php
 $i=0;
 										
						                $nom=$data['nom'];
						                $prenom=$data['prenom'];
						                
						                $ids=$data['id'];


						                echo"<div id='infouser'>";
						                echo "nom:&nbsp $nom &nbsp";
						                echo "prenom:&nbsp $prenom &nbsp";
						                 
						                echo "<a href=\"profil.php?U=$ids\" target=\"_blank\"><button name=\"profil\">Profil</button></a>";
						                	$dateanM=date('n');
											$dateanJ=date('j');
						                	if($data['jour']== $dateanJ and $data['mois']== $dateanM)
						                	{
						                		echo "<img src=\"../upload/gat.png\" style=\" height: 28px; width: 28px;\">";
						                	}
						                echo"</div>";


						                $i++;
						                
