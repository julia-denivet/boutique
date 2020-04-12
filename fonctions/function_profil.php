<?php
    class profile 
    {
        private $host = "localhost";
		private $username = "root";
		private $password = "";
        private $db = "boutique";
		
		public function donnees_profil()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$sql = "SELECT adresse.id AS id_adresse, login, password, utilisateurs.nom, utilisateurs.prenom, adresse.nom AS nom_adresse, adresse.prenom AS prenom_adresse, email, adresse, comp_adresse, code_postal, ville, pays FROM utilisateurs INNER JOIN adresse ON utilisateurs.id = adresse.id_utilisateur WHERE utilisateurs.id = '".$_SESSION['id']."'";
			$query = mysqli_query($connexion, $sql);
			return $query;
		}
		
		public function donnees_profil_liste_commande()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$sql = "SELECT * FROM commande WHERE id_utilisateur = '".$_SESSION['id']."'";
			$query = mysqli_query($connexion, $sql);
			return $query;
		}
		
		public function donnees_profil_commande()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$sql = "SELECT commande.numero_commande, date, commande.prix AS prix_total, adresse_facturation, adresse_livraison, nom, commande_produit.prix AS prix_produit, quantite FROM commande INNER JOIN commande_produit ON commande.numero_commande = commande_produit.numero_commande WHERE commande.id_utilisateur = '".$_SESSION['id']."'";
			$query = mysqli_query($connexion, $sql);
			return $query;
		}
        
        public function modif_profil($login, $email, $prenom, $nom, $password)
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			
			if(isset($_POST['modifier_profil'])) 
			{
				if($_POST['login'] != $login)
				{
					$nouveau_login = "SELECT id FROM utilisateurs WHERE login='".$_POST['login']."'";
					$resultat = mysqli_query ($connexion, $nouveau_login);
					$nombrelogin = mysqli_num_rows($resultat);

					if($nombrelogin < 1)
					{
						$sql = "UPDATE utilisateurs SET login = '".$_POST['login']."' WHERE id = '".$_SESSION['id']."'";
						mysqli_query($connexion, $sql);
						$_SESSION['login'] = $_POST['login'];
						echo "Vos données bien été modifié !";
					}
					else
					{
						echo "Le pseudo ".$_POST['login']." n'est pas disponible";
					}
				}
				
				if($_POST['passe'] != $password)
				{
					$passe = password_hash($_POST['passe'], PASSWORD_DEFAULT);
				    $sql = "UPDATE utilisateurs SET password = '$passe' WHERE id = '".$_SESSION['id']."'";
				    mysqli_query($connexion, $sql);
					echo "Vos données bien été modifié !";

                }

                if($_POST['prenom'] != $prenom)
                {
                    $sql = "UPDATE utilisateurs SET prenom ='".$_POST['prenom']."' WHERE id = '".$_SESSION['id']."'";
                    mysqli_query($connexion, $sql);
                    echo "Vos données bien été modifié !";
                }

                if($_POST['nom'] != $nom)
			    {
					$sql = "UPDATE utilisateurs SET nom = '".$_POST['nom']."' WHERE id = '".$_SESSION['id']."'";
					mysqli_query($connexion, $sql);
					echo "Vos données bien été modifié !";
			    }
                
                if($_POST['email'] != $email)
				{
					if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $_POST['email']))
					{
						$nouveau_mail = "SELECT id FROM utilisateurs WHERE email='".$_POST['email']."'";
						$resultat = mysqli_query ($connexion, $nouveau_mail);
						$nombre_mail = mysqli_num_rows($resultat);

						if($nombre_mail < 1)
						{
							$sql = "UPDATE utilisateurs SET email = '".$_POST['email']."' WHERE id = '".$_SESSION['id']."'";
							mysqli_query($connexion	, $sql);
							echo "Vos données bien été modifié !";
						}
						else
						{
							echo "Le mail ".$_POST['email']." existe déja";
						}
					}
					else
					{
						echo "Veuillez remplir correctement votre email";
					}
				}
				echo "<meta http-equiv='refresh' content='0 ;URL='admin.php''>";
			}
		}
		
		public function modif_adresse($nom, $prenom, $adresse, $comp_adresse, $code_postal, $ville, $pays)
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			
			if(isset($_POST['modifier_adresse']))
			{
				if($_POST['nom'] != $nom)
				{
					$sql = "UPDATE adresse SET nom ='".$_POST['nom']."' WHERE id = '".$_POST['id_adresse']."'";
					mysqli_query($connexion, $sql);
				}
				
				if($_POST['prenom'] != $prenom)
				{
					$sql = "UPDATE adresse SET prenom ='".$_POST['prenom']."' WHERE id = '".$_POST['id_adresse']."'";
					mysqli_query($connexion, $sql);
				}
				
				if($_POST['adresse'] != $adresse)
				{
					$sql = "UPDATE adresse SET adresse ='".$_POST['adresse']."' WHERE id = '".$_POST['id_adresse']."'";
					mysqli_query($connexion, $sql);
				}
				
				if($_POST['comp_adresse'] != $comp_adresse)
				{
					$sql = "UPDATE adresse SET comp_adresse ='".$_POST['comp_adresse']."' WHERE id = '".$_POST['id_adresse']."'";
					mysqli_query($connexion, $sql);
				}
				
				if($_POST['code_postal'] != $code_postal)
				{
					$sql = "UPDATE adresse SET code_postal ='".$_POST['code_postal']."' WHERE id = '".$_POST['id_adresse']."'";
					mysqli_query($connexion, $sql);
				}
				
				if($_POST['ville'] != $ville)
				{
					$sql = "UPDATE adresse SET ville ='".$_POST['ville']."' WHERE id = '".$_POST['id_adresse']."'";
					mysqli_query($connexion, $sql);
				}
				
				if($_POST['pays'] != $pays)
				{
					$sql = "UPDATE adresse SET pays ='".$_POST['pays']."' WHERE id = '".$_POST['id_adresse']."'";
					mysqli_query($connexion, $sql);
				}
				
				echo "<meta http-equiv='refresh' content='0 ;URL='prodil.php''>";
			}
		}
		
		public function suppr_adresse()
		{
			if(isset($_POST['supprimer_adresse']))
			{
				$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
				$sql = "DELETE FROM adresse WHERE id = ".$_POST['id_adresse']."";
				mysqli_query($connexion, $sql);
				header('location: profil.php');
			}
		}
		
		public function ajout_adresse()
		{
			if(isset($_POST['ajouter_adresse']))
			{
				$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
				$sql = "INSERT INTO adresse (id_utilisateur, nom, prenom, adresse, comp_adresse, code_postal, ville, pays) VALUES ('".$_SESSION['id']."', '".$_POST['nom']."', '".$_POST['prenom']."', '".$_POST['adresse']."', '".$_POST['comp_adresse']."', '".$_POST['code_postal']."', '".$_POST['ville']."', '".$_POST['pays']."')";
				mysqli_query($connexion, $sql);
				echo "<meta http-equiv='refresh' content='0 ;URL='prodil.php''>";
			}
		}
	}
?>