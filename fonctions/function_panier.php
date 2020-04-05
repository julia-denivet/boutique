<?php
	class panier
	{
		private $host = "localhost";
		private $username = "root";
		private $password = "";
		private $db = "boutique";
		
		public function affichage_panier()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$sql = "SELECT nom, prix_ttc , img_folder, img,quantite, panier.id FROM panier INNER JOIN produit ON id_produit = produit.id  WHERE id_utilisateur = '".$_SESSION['id']."'";
			$req = mysqli_query($connexion, $sql);
			$prix = 0;
			while ($data = mysqli_fetch_assoc($req))
			{   
				$prix += (floatval($data['prix_ttc'])*intval($data['quantite']));
				$prixprod = floatval($data['prix_ttc']);
				
				include "script/block_panier.php";
			}
			
			if(isset($_POST['ajout_quantite']))
			{
				$quantite = $_POST['quantite2'] + $_POST['quantite'];

				$sql = "UPDATE panier SET quantite = '".$quantite."' WHERE id = '".$_POST['id']."'";
				$query = mysqli_query($connexion, $sql);
				echo "<meta http-equiv='refresh' content='0.5 ;URL='panier.php''>";
			}
			else if(isset($_POST['suppr_quantite']))
			{
				$quantite = $_POST['quantite2'] - $_POST['quantite'];
				
				if($quantite <= 0)
				{
					$sql = "DELETE FROM panier WHERE id = '".$_POST['id']."'";
					$resultat_supprimer = mysqli_query($connexion, $sql);
					header('Location: panier.php');
				}
				else{
					$sql = "UPDATE panier SET quantite = '".$quantite."' WHERE id = '".$_POST['id']."'";
					$query = mysqli_query($connexion, $sql);
					echo "<meta http-equiv='refresh' content='0.5 ;URL='panier.php''>";
				}
				
			}
			
			return $prix;
		}
		
		public function ajout_article($id_produit, $quantite, $user)
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			
			if(isset($id_produit) && isset($quantite) && isset($user))
			{
				$sql = "SELECT * FROM panier WHERE id_utilisateur = '".$user."' AND id_produit = '".$id_produit."'";
				$resultat = mysqli_query($connexion, $sql);
				$nombre_resultat = mysqli_num_rows($resultat);
				
				if($nombre_resultat == 1)
				{
					$data = mysqli_fetch_assoc($resultat);
					$quantite = $quantite + $data['quantite'];
					
					$sql = "UPDATE panier SET quantite = '".$quantite."' WHERE id = '".$data['id']."'";
					$query = mysqli_query($connexion, $sql);
				}
				else{
					$sql = "INSERT INTO panier (id_utilisateur, id_produit, quantite) VALUES (".$user.", ".$id_produit.", ".$quantite.");";
					$query = mysqli_query($connexion, $sql);
				}
			}
		}
	}
?>