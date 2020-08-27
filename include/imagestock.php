<?php
if(isset($_POST['description']) & isset($_POST['nom']) )
{
	


			$dossier = '../upload/stock/';
			   
			$fichier = basename($_FILES['mon_fichier']['name']);
			$taille_maxi = 1000000;
			$taille = filesize($_FILES['mon_fichier']['tmp_name']);
			$extensions = array('.png', '.gif', '.jpg', '.jpeg');
			$extension = strrchr($_FILES['mon_fichier']['name'], '.');
			$chemin=$fichier;
			var_dump($chemin);
			  
			//Début des vérifications de sécurité...
			if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
			{
			     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
			}
			if($taille>$taille_maxi)
			{
			     $erreur = 'Le fichier est trop gros...';
			}
			if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
			{
			     //On formate le nom du fichier ici...
			     $fichier = strtr($fichier,
			          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
			          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
			     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
			     if(move_uploaded_file($_FILES['mon_fichier']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
			     {
			     try
			{
			 
			    $bdd = mysqli_connect("localhost", "root", "", "ciaracut");
			}
			  catch(Exception $e)
			    {          die('Erreur : '.$e->getMessage());
			    }
			    		$nom=$_POST['nom'];
			    		$image=$chemin;
			    		$description=$_POST['description'];
			          $req = $bdd->prepare("INSERT INTO `produit`(`nom`, `image`, `description`) VALUES ('$nom','$image','$description')");
			          


			          // Evidemment il faut mettre un WHERE .. = .. (car l'image est forcément liée à un utilisateur?)
			          $req->execute();
			     }
			     else //Sinon (la fonction renvoie FALSE).
			     {
			          echo 'Echec de l\'upload !';
			     }
			}
			else
			{
			     echo $erreur;
			}
			// header('Location: formulaire.php');
}
?>