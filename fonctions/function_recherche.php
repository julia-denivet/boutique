<?php
	class barre_recherche
	{
		private $host = "localhost";
		private $username = "root";
		private $password = "";
		private $db = "boutique";
		
		public function recherche($recherche)
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			if(isset($recherche) AND !empty($recherche))
			{
				$recherche = htmlspecialchars($recherche);
				$requete = "SELECT * FROM produit WHERE nom LIKE '%".$recherche."%' ORDER BY id DESC";
			}
			else
			{
				$requete = "SELECT * FROM produit ORDER BY id DESC";
			}
			
			$sql = mysqli_query($connexion, $requete);
			
			while($data = mysqli_fetch_array($sql))
			{
				include "script/block_produit.php";
			}
		}
	}
?>