<?php

	if (isset($_GET['search'])) {
		$response = "<ul><li>No data found!</li></ul>";

		$connection = new mysqli('localhost', 'root', '', 'ciaracut');
		$q = $connection->real_escape_string($_GET['q']);


		$sql = $connection->query("SELECT * FROM utilisateurs WHERE nom LIKE '$q%'");
	
		

		if ($sql->num_rows > 0) {
			$response = "<ul>";

			while ($data = $sql->fetch_array())
				
			
				$response .= "<a href=\"profil.php?U=" . $data['id'] . "\"><li>" . $data['nom'] . "</li></a>";
			
			$response .= "</ul>";
			
			 ;
		}


		exit($response);  //termine la condition
	
	}




?>