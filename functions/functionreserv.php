<!-- SELECT * FROM reservation WHERE debut LIKE '2020-04-20%' -->
<?php

function ajoutreserv(){
	$bdd = new PDO('mysql:host=localhost;dbname=ciaracut','root','');
	$id_utilisateurs=$_SESSION['id'];
	$nom=$_POST['nom'];
	$id_prestation=$_POST['prestation'];
	$debut=$_POST['datedebut'];
	$fin=$_POST['datefin'];
	$req = $bdd->query('SELECT * FROM utilisateurs INNER JOIN reservation ON utilisateurs.id=id_utilisateurs')->fetch_ALL($bdd,$req);
	var_dump($req);




	$trouv=$bdd->prepare('INSERT INTO reservation (nom,description,debut,fin,id_utilisateurs) VALUES (:nom,:description,:debut,:fin,:id_utilisateurs)');
	$trouv->execute();
	var_dump($trouv);
	return;
	

}
?>