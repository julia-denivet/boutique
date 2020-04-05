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
		
		public function commentaire()
		{
			echo'
			<form method="post">
				<input type="text" name="message" id="ajout_message_texte" placeholder="ÉCRIVEZ VOTRE MESSAGE"/>
				<button name="submit" type="submit" id="ajout_message_bouton">
					<img id="ajout_message_bouton_img" src="Images/pngtree-paper-plane-icon-vector-send-message-solid-logo-illustration-pictogram-isolated-image_315678.png"/>
				</button>
			</form>';
			
			if(isset($_REQUEST['submit']))
			{
				$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
				$utilisateur = $_SESSION['id'];
				$commentaire = $_POST['message'];
				$commentaire2 = addslashes($commentaire);
				if(!empty($commentaire))
				{
					$sql= "INSERT INTO commentaire (commentaire, id_utilisateur, date) VALUES ('$commentaire2', '$utilisateur', NOW())";
					mysqli_query($connexion, $sql);
					mysqli_close($connexion);
					echo "Votre commentaire à bien été publié";
				}
			}
		}
	}
?>