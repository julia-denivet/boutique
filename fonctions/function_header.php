<?php
	class header
	{
		private $host = "localhost";
		private $username = "root";
		private $password = "";
		private $db = "boutique";
		
		public function categorie()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$requete = "SELECT * FROM categorie";
			$sql = mysqli_query($connexion, $requete);
			
			while($data = mysqli_fetch_array($sql))
			{
				echo "<li><a href='boutique.php?id=", $data["id"] ,"'>", $data["name"] ,"</a></li>";
			}
		}
	}
?>