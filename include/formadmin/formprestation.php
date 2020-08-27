<?php	
							
								
								if (isset($_POST['valider'])) {

									if (!empty($_POST['titre'])&& !empty($_POST['prix'])&& !empty($_POST['type'])) {
													$titre = $_POST['titre'];
									                $prix = $_POST['prix'];
									                $description = $_POST['description'];
									                $type = $_POST['type'];
									                
													$presta = "INSERT INTO prestation (nom,type,prix) VALUES ('$titre','$type', '$prix')";
													$prestaQ=mysqli_query($bdd,$presta);
													var_dump($presta);
													
												
															//var_dump($connexion);
									}
								
								}


								if (isset($_POST['modifM'])) {

									if (!empty($_POST['titreMP'])&& !empty($_POST['prixM'])&& !empty($_POST['typeM'])) {
													$Tapres = $_POST['titreMP'];
													$Tavant = $_POST['titreMA'];
									                $prix = $_POST['prixM'];
									                $description = $_POST['description'];
									                $type = $_POST['typeM'];
									                
													$presta = "UPDATE prestation set nom='$Tapres',prix=$prix,type='$type' where nom='$Tavant'";
													$prestaQ=mysqli_query($bdd,$presta);
													var_dump($presta);
													
												
															//var_dump($connexion);
									}
								
								}
								
							  ?>
							  		<button id="btnPopupprestation" class="btnPopupprestation">afficher popup</button>
			<div id="overlayprestation" class="overlayprestation">
				<div id="popupprestation" class="popupprestation">
					<div>
						<h2>exemple simple <span id="btnCloseprestation" class="btnCloseprestation">&times;</span></h2>
					</div>
					
							  								<div id="createA">
										<h3>Créer une prestation</h3>
							  <form method="post" >
							                    <label>titre</label></br>
							                    <input type="text" name="titre"></br>							          
							                    <label>Prix</label></br>
							                    <input type="number" name="prix"></br>
							                    <label>type</label></br>
							                    <input type="text" name="type" required></br>
							                    <input type="submit" value="Envoyer" name="valider"></br>
							   </form>
							   		</div>
							   <div id="modifcre">
							   	<h3>Modifier une prestation</h3>
							   		<form method="post" >
							                    <label>titre avant</label></br>
							                    <input type="text" name="titreMA" required></br>
							                    <label>titre apres</label></br>
							                    <input type="text" name="titreMP" required></br>								          
							                    <label>Prix</label></br>
							                    <input type="number" name="prixM" required></br>
							                    <label>type</label></br>
							                    <input type="text" name="typeM" required ></br>
							                    <input type="submit" value="Modifier" name="modifM"></br>
							   		</form>
							   </div>
							</div>
				</div>
			</div>
			

<script type="text/javascript" src="../include/popup/popupadmin.js"></script>