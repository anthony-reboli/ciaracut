<?php
						
							
							if (isset($_POST['payer'])) {

										
							$datejour=date('Y-m-d');

							$bdd = mysqli_connect("localhost", "root", "", "ciaracut");

								$nomclient=$_POST['nom'];
								$prenomclient=$_POST['prenom'];
								$modeclient=$_POST['mode'];
								$selectotal="SELECT * FROM utilisateurs where nom ='$nomclient'";

								$selectotalQ=mysqli_query($bdd,$selectotal);
								$selectotalR=mysqli_fetch_all($selectotalQ);

								$dateR=$selectotalR[0][6];
								// $dateR = date('Y-m-d', $dateR);
								$dateRT=strtotime($dateR);
									

								$test=strtotime("+7 day", $dateRT);
								$test=date('Y-m-d', $test);
								 $datetime1 = date_create($dateR); //dateclient
								$datetime2 = date_create($test);   //Dateclient + 7 jour
								$datetime3 = date_create($datejour); //datedujour
								$interval = date_diff($datetime1, $datetime2); //dif entre client + 7 jour
								$interval1 = date_diff($datetime1, $datetime3); //dif entre date client et date jour

								if($datetime3 >= $datetime1 == "true" and $datetime3 <= $datetime2 == "true")
						{
							
									$selectS="SELECT * FROM sauvegarde where nom = '$nomclient' and datepanier LIKE ('$datejour%')";
									var_dump($selectS);
												 $req1=("UPDATE sauvegarde SET mode ='$modeclient',nom ='$nomclient',prenom ='$prenomclient'  WHERE nom is null AND prenom is null");
												 
												$query1=mysqli_query($bdd,$req1);
						

						$deux=mysqli_query($bdd,$selectS);
						$trois=mysqli_fetch_all($deux);
						foreach ($trois as $key2) {
							 	
							 	$prix=$key2[4];
							 	

							 	
							 	$red="SELECT prixtotal from sauvegarde where prixtotal= '$prix'";
							 	
								$redQ=mysqli_query($bdd,$red);
								$redR=mysqli_fetch_all($redQ);



									
										foreach ($redR as $key3) {
											
																	$a=$key3[0];
																	$b=10;
																	$resultat= $a - ($a * ($b/100));
																			
																	$prix="UPDATE sauvegarde set prixtotal= $resultat where nom = '$nomclient' and datepanier LIKE  ('$datejour%')";
																	var_dump($prix);
																	
																	
																	
																	$prixQ=mysqli_query($bdd,$prix);
																	
																	
																 }
							 							}
							$req2=("DELETE FROM panier WHERE id_utilisateurs=$id_utilisateurs");
							$req3=("DELETE FROM commande WHERE id_utilisateurs=$id_utilisateurs");
							$query3=mysqli_query($connexion,$req2);
							$query4=mysqli_query($connexion,$req3);
							   header("location:paiement.php?P=prix");
						}
							else
							{



												
							$id_utilisateurs=$_SESSION['id'];
							$idpanier = $_GET["id"];
							$mode=$_POST['mode'];
							$nom=$_POST['nom'];
							$prenom=$_POST['prenom'];
							$connexion=mysqli_connect("localhost","root","","ciaracut");
							$req1=("UPDATE sauvegarde SET mode ='$mode',nom ='$nom',prenom ='$prenom'  WHERE nom is null AND prenom is null");
							$query1=mysqli_query($connexion,$req1);
							$req2=("DELETE FROM panier WHERE id_utilisateurs=$id_utilisateurs");
							$req3=("DELETE FROM commande WHERE id_utilisateurs=$id_utilisateurs");
							$query3=mysqli_query($connexion,$req2);
							$query4=mysqli_query($connexion,$req3);
							
							  header("location:boutiqueprestation.php");
							}
						}