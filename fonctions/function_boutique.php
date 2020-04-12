<?php
	class boutique
	{
		private $host = "localhost";
		private $username = "root";
		private $password = "";
		private $db = "boutique";
		
		public function favoris()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$requete = "SELECT * FROM favoris INNER JOIN produit ON produit.id = favoris.id_produit";
			$sql = mysqli_query($connexion, $requete);
			
			while($data = mysqli_fetch_array($sql))
			{
				include "script/block_produit.php";
			}
		}
		
		public function name_categorie($id)
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$requete2 = "SELECT name FROM categorie WHERE id = '".$id."'";
			$sql2 = mysqli_query($connexion, $requete2);
			$data2 = mysqli_fetch_array($sql2);
			return $data2;
		}
		
		public function produit_par_categorie($id)
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$requete = "SELECT * FROM produit WHERE id_categorie = '".$id."' OR id_sous_categorie = '".$id."'";
			$sql = mysqli_query($connexion, $requete);
			while($data = mysqli_fetch_array($sql))
			{
				include "script/block_produit.php";
			}
		}
		
		public function produit($id)
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$requete = "SELECT * FROM produit WHERE id = '".$id."'";
			$sql = mysqli_query($connexion, $requete);
			$data = mysqli_fetch_array($sql);
			return $data;
		}
		
		public function ajout_commentaire_produit($id)
		{
			echo'
			<form method="post">
				<textarea name="commentaire" placeholder="ÉCRIVEZ VOTRE MESSAGE"></textarea>
				<input type="submit" name="ajout_commentaire" value="AJOUTER"/>
			</form>';
			
			if(isset($_POST['ajout_commentaire']))
			{
				$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
				$utilisateur = $_SESSION['id'];
				$commentaire = $_POST['commentaire'];
				$commentaire2 = htmlentities($commentaire, ENT_QUOTES);
				if(!empty($commentaire))
				{
					$sql = "INSERT INTO commentaire (commentaire, id_article, id_utilisateur, date) VALUES ('$commentaire2', '$id', '$utilisateur', NOW())";
					mysqli_query($connexion, $sql);
					echo "<meta http-equiv='refresh' content='0 ;URL='''>";
				}
			}
		}
		
		public function affichage_commentaire_produit($id)
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$sql = "SELECT * FROM commentaire WHERE id_article = '".$id."' ORDER BY date DESC";
			$query = mysqli_query($connexion, $sql);
			
			while($data = mysqli_fetch_assoc($query))
			{
				include "script/block_commentaire.php";
			}
		}
	}
?>