
							  		<button id="btnPopupreservation" class="btnPopupreservation">afficher reservation</button>
			<div id="overlayreservation" class="overlayreservation">
				<div id="popupreservation" class="popupreservation">
					<div>
						<h2>exemple simple <span id="btnClosereservation" class="btnClosereservation">&times;</span></h2>
					</div>
					
				<?php 
						
							$reserv="SELECT * FROM reservation inner join utilisateurs on id_utilisateurs = utilisateurs.id";
							$reservQ=mysqli_query($bdd,$reserv);


						

							while($data= mysqli_fetch_assoc($reservQ))
						            {
										 $i=0;
						                $nom=$data['nom'];
						                $prenom=$data['prenom'];
						                $mois=$data['mois'];
						                $jour=$data['jour'];
						                $ids=$data['id'];
						                $debut=$data['debut'];
						                $fin=$data['fin'];

						                
						                echo"<div id='infouser'>";
						                echo "nom:&nbsp $nom &nbsp";
						                echo "prenom:&nbsp $prenom &nbsp";
						                echo "debut:&nbsp$debut &nbsp";
						                echo "fin:&nbsp$fin &nbsp";

						                echo "<a href=\"profil.php?U=$ids\" target=\"_blank\"><button name=\"profil\">Profil</button></a>";
						                echo"</div>";



						                $i++;
										
						            }
								  								
		


?>
<script type="text/javascript" src="../include/popup/popupadmin.js"></script>
