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
			$requete = "SELECT * FROM categorie WHERE id_parent = '0' ORDER BY name";
			$sql = mysqli_query($connexion, $requete);
			
			while($data = mysqli_fetch_array($sql))
			{
				echo "
				<li class='sous_deroulant'><a href='../boutique.php?id=", $data["id"] ,"'>", $data["name"] ,"</a>
					<ul class='sous_sous'>";
						$requete2 = "SELECT * FROM categorie WHERE id_parent = '".$data['id']."' ORDER BY name";
						$sql2 = mysqli_query($connexion, $requete2);

						while($data2 = mysqli_fetch_array($sql2))
						{
							echo "<li><a href='../boutique.php?id=", $data2["id"] ,"'>", $data2["name"] ,"</a></li>";
						}
					echo 
					"</ul>
				</li>";
			}
		}
	}
?>