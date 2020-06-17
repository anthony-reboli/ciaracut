<?php

	if (isset($_GET['search'])) {
		$response = "<ul><li>No data found!</li></ul>";
		$connection = new mysqli('localhost', 'root', '', 'ciaracut');
		$q = $connection->real_escape_string($_GET['q']);

		$sql = $connection->query("SELECT nom FROM utilisateurs WHERE nom LIKE '$q%'");
		if ($sql->num_rows > 0) {
			$response = "<ul>";

			while ($data = $sql->fetch_array())
			
				$response .= "<li>" . $data['nom'] . "</li>";
			
			$response .= "</ul>";
			
			 ;
		}


		exit($response);  //termine la condition
	
	}

?>
