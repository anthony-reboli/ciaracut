<?php
if (isset($_POST['id'])) {
	$id=$_POST['id'];
	$connexion=mysqli_connect("localhost","root","","ciaracut");
	$req="SELECT * FROM reservations WHERE id=$id";
	$query=mysqli_query($connexion,$req);
	$res=mysqli_fetch_all($query);
	$json=json_encode($res);
	echo $json;
}
?>