<?php
	class commande
	{
		private $host = "localhost";
		private $username = "root";
		private $password = "";
        private $db = "boutique";
		
		public function data_commande()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$sql = "SELECT nom, prix_ttc, img_folder, img, quantite FROM panier INNER JOIN produit ON id_produit = produit.id  WHERE id_utilisateur = '".$_SESSION['id']."'";
			$req = mysqli_query($connexion, $sql);
			return $req;
		}
		
		public function affichage_commande()
		{
			$req = $this->data_commande();
			while ($data = mysqli_fetch_assoc($req))
			{
				include "script/block_commande.php";
			}
		}
		
		public function adresse_commande_facturation()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$sql = "SELECT * FROM adresse WHERE id_utilisateur = '".$_SESSION['id']."'";
			$req = mysqli_query($connexion, $sql);
			while ($data = mysqli_fetch_assoc($req))
			{
				if(!empty($data['comp_adresse']))
				{
					$adresse = $data['nom'].' '.$data['prenom'].'\n'.$data['adresse'].'\n'.$data['comp_adresse'].'\n'.$data['code_postal'].' '.$data['ville'].'\n'.$data['pays'];
				}
				else
				{
					$adresse = $data['nom'].'\n'.$data['prenom'].'\n'.$data['adresse'].'\n'.$data['code_postal'].' '.$data['ville'].'\n'.$data['pays'];
				}
				
				echo "
					<label class='adresse_commande'>
						<input type='radio' name='adresse_facturation' value='", $adresse,"'/>
				"; 
						include 'script/block_adresse.php';
				echo "
					</label>
				";
			}
		}
		
		public function adresse_commande_livraison()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$sql = "SELECT * FROM adresse WHERE id_utilisateur = '".$_SESSION['id']."'";
			$req = mysqli_query($connexion, $sql);
			while ($data = mysqli_fetch_assoc($req))
			{
				if(!empty($data['comp_adresse']))
				{
					$adresse = $data['nom'].' '.$data['prenom'].'\n'.$data['adresse'].'\n'.$data['comp_adresse'].'\n'.$data['code_postal'].' '.$data['ville'].'\n'.$data['pays'];
				}
				else
				{
					$adresse = $data['nom'].'\n'.$data['prenom'].'\n'.$data['adresse'].'\n'.$data['code_postal'].' '.$data['ville'].'\n'.$data['pays'];
				}
				
				echo "
					<label class='adresse_commande'>
						<input type='radio' name='adresse_livraison' value='", $adresse,"'/>
				";
						include 'script/block_adresse.php';
				echo "
					</label>
				";
			}
		}
		
		public function paiment_commande()
		{
			echo "
				<label>
					<input type='radio' name='paiement' value='Carte Bleue'/>
					<img src='Image/Logo/logo-carte-bleue.png' class='img_commande'/>
				</label>
				<label>
					<input type='radio' name='paiement' value='Paypal'/>
					<img src='Image/Logo/Paypal.png' class='img_commande'/>
				</label>
			";
		}
		
		public function validation_commande()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			
			if(isset($_POST['valid_command']))
			{
				if(isset($_POST['adresse_facturation']) && isset($_POST['adresse_livraison']) && isset($_POST['paiement']))
				{
					date_default_timezone_set('UTC');
					$numero_commande = $_SESSION['id'].date(dNHis);
					$adresse_facturation = htmlentities($_POST['adresse_facturation'], ENT_QUOTES);
					$adresse_livraison = htmlentities($_POST['adresse_livraison'], ENT_QUOTES);
					$sql = "INSERT INTO commande (id_utilisateur, numero_commande, date, prix, adresse_facturation, adresse_livraison, paiement) VALUES ('".$_SESSION['id']."', '".$numero_commande."', NOW(), '".$_POST['prix']."', '".$adresse_facturation."', '".$adresse_livraison."', '".$_POST['paiement']."')";
					$query = mysqli_query($connexion, $sql);
					$req = $this->data_commande();
					while ($data = mysqli_fetch_assoc($req))
					{
						$sql = "INSERT INTO commande_produit (numero_commande, nom, prix, quantite) VALUES ('".$numero_commande."', '".$data['nom']."', '".$data['prix_ttc']."', '".$data['quantite']."')";
						$query = mysqli_query($connexion, $sql);
					}
					$sql = "DELETE FROM panier WHERE id_utilisateur = '".$_SESSION['id']."'";
					mysqli_query($connexion, $sql);
				}
				else
				{
					echo "Veuillez remplir tout les champs !";
				}
			}
		}
	}
?>