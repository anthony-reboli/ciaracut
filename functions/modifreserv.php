<?php
 session_start(); 
$db=mysqli_connect("localhost","root","","ciaracut");
 if (isset($_POST['modifier'])) {
        if (!empty($_POST['titre3'])) {
                $titre3 = htmlspecialchars($_POST['titre3']);
                $titre2 = htmlspecialchars($_POST['titre2']);
                $description = htmlspecialchars($_POST['description']);
                $dated = htmlspecialchars($_POST['datedebut']);
                $datef = htmlspecialchars($_POST['datefin']);
                $requete2 = $db->prepare("UPDATE reservations SET titre = '$titre2', description = '$description', debut = '$dated', fin ='$datef' WHERE titre ='$titre3'");
                $requete2->execute();  
                }
             }
?>
    
                 