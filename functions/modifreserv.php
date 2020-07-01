<?php
 session_start(); 
$db=mysqli_connect("localhost","root","","ciaracut");
 if (isset($_POST['modifier'])) {
        if (!empty($_POST['titre3'])) {
                $titre3 = $_POST['titre3'];
                $titre2 =  $_POST['titre2'];
                $description = $_POST['description'];
                $dated = $_POST['datedebut'];
                $datef = $_POST['datefin'];
                $requete2 = $db->prepare("UPDATE reservations SET titre = '$titre2', description = '$description', debut = '$dated', fin ='$datef' WHERE titre ='$titre3'");
                $requete2->execute();  
                }
             }
?>
    
                 