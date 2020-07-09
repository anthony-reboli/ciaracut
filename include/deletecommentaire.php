<?php
session_start();

$connexion = mysqli_connect("localhost", "root", "", "ciaracut");

if(isset($_SESSION['login'] ) == true && $_SESSION['login'] == 'vanessa'){
    $id = $_GET['id'];
    $requete= "DELETE FROM commentaires WHERE id=". $id;
    $req = mysqli_query($connexion, $requete);
    header("location:../sources/livreor.php");
}
else{
    echo'Vous n\'êtes pas administrateur';
}

?>