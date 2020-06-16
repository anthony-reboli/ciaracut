
<?php
$datejour=date('Y-m-d');

$bdd = mysqli_connect("localhost", "root", "", "ciaracut");
$selectotal="SELECT * FROM utilisateurs where nom ='aniv'";
$selectotalQ=mysqli_query($bdd,$selectotal);
$selectotalR=mysqli_fetch_all($selectotalQ);

$dateR=$selectotalR[0][6];
// $dateR = date('Y-m-d', $dateR);
$dateRT=strtotime($dateR);
		

$test=strtotime("+7 day", $dateRT);
$test=date('Y-m-d', $test);
$datetime1 = date_create($dateR);
$datetime2 = date_create($test);
$datetime3 = date_create($datejour);
$interval = date_diff($datetime1, $datetime2);
$interval1 = date_diff($datetime1, $datetime3);


				if($datetime3 >= $datetime1 == "true" and $datetime3 <= $datetime2 == "true")
		{
			?>
			<form method="post">
			<input type="submit" name="prix">
			</form>
			<?php
		}
		?>

<?php





	if(isset($_POST['prix']))
	{




		$selectS="SELECT * FROM sauvegarde where nom = 'aniv' and datepanier LIKE ('$datejour%')";
		var_dump($selectS);

		$deux=mysqli_query($bdd,$selectS);
		$trois=mysqli_fetch_all($deux);

			

			
			 foreach ($trois as $key2) {
			 	var_dump($key2);
			 	$prix=$key2[4];
			 	

			 	
			 	$red="SELECT prixtotal from sauvegarde where prixtotal= '$prix'";
				$redQ=mysqli_query($bdd,$red);
				$redR=mysqli_fetch_all($redQ);

					
						foreach ($redR as $key3) {
							var_dump($key3);
													$a=$key3[0];
													$b=10;
													$resultat= $a - ($a * ($b/100));
															
													$prix="UPDATE sauvegarde set prixtotal= $resultat where nom = 'aniv' and datepanier LIKE  ('$datejour%')";
													var_dump($prix);
													
													$prixQ=mysqli_query($bdd,$prix);
													
													
												 }
			 							}
	 }


?>