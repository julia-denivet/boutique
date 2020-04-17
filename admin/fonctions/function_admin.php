<?php
	class admin
	{
		private $host = "localhost";
		private $username = "root";
		private $password = "";
		private $db = "boutique";
		
		/* FAVORIS */
		
		public function gestion_favoris()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$requete = "SELECT * FROM favoris INNER JOIN produit ON produit.id = favoris.id_produit";
			$sql = mysqli_query($connexion, $requete);
			
			while($data = mysqli_fetch_array($sql))
			{
				echo '
				<section class="admin_affichage_list">
					<h4 class="name">', $data['nom'] ,'</h4>
					<form method="post" class="form_favoris">
						<select class="liste_produit_favoris"  name="liste_produit">';
							$requete2 = "SELECT id, nom FROM produit";
							$sql2 = mysqli_query($connexion, $requete2);

							while($data2 = mysqli_fetch_array($sql2))
							{	
								if($data['id'] == $data2['id'])
								{
									echo "<option value='", $data2['id'] ,"' selected>", $data2['nom'] ,"</option>";
								}
								else
								{
									echo "<option value='", $data2['id'] ,"'>", $data2['nom'] ,"</option>";
								}
							}
						echo '
						</select>
						<input type="hidden" name="id_favoris" value="', $data['0'] ,'"/>
						<input type="submit" class="modif_img" name="modif_favoris" value="Modifier"/>
					</form>
				</section>
				';
				if(isset($_POST['modif_favoris']))
				{
					$this->modifier_favoris($_POST['liste_produit'], $_POST['id_favoris'], $_POST['modif_favoris']);
				}
			}
		}
		
		public function modifier_favoris($list_produit, $id_favoris, $modif_favoris)
		{
			if(isset($modif_favoris))
			{
				$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
				$requete = "UPDATE favoris SET id_produit='".$list_produit."' WHERE id='".$id_favoris."'";
				mysqli_query($connexion, $requete);
				echo "<meta http-equiv='refresh' content='0.5 ;URL='admin.php''>";
			}
		}
		
		/* PRODUITS */
		
		public function gestion_produit()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$requete = "SELECT * FROM produit ORDER BY id DESC";
			$sql = mysqli_query($connexion, $requete);
			
			while($data = mysqli_fetch_array($sql))
			{
				echo '
				<section class="admin_affichage_list">
					<h4 class="name"><a href=../produit.php?id=', $data['id'] ,'>', $data['nom'] ,'</a></h4>
					<h4 class="prix">', $data['prix_ttc'] ,' €</h4>
					<a href="modifier_produit.php?id='.$data['id'].'" class="modif_img"></a>
					<form method="post">
						<input type="hidden" name="id_produit" value="', $data['id'] ,'"/>
						<input type="hidden" name="nom_produit" value="', $data['nom'] ,'"/>
						<input type="submit" name="suppr_produit" class="admin_suppr_img">
					</form>
				</section>
				';
			}
			if(isset($_POST['suppr_produit']))
			{
				$this->suppr_produit($_POST['id_produit'], $_POST['nom_produit'], $_POST['suppr_produit']);
			}
		}
		
		public function data_produit($id)
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$requete = "SELECT * FROM produit WHERE id='".$id."'";
			$sql = mysqli_query($connexion, $requete);
			$data = mysqli_fetch_assoc($sql);
			return($data);
		}
		
		public function ajouter_produit($bouton, $nom, $description, $sous_categorie, $prix_ht, $prix_ttc, $stock, $tmp_file, $type_file, $name_file)
		{
			if(isset($bouton))
			{
				if(!empty($nom) && !empty($description) && !empty($sous_categorie) && !empty($prix_ht) && !empty($prix_ttc) && !empty($stock) && !empty($tmp_file) && !empty($type_file) && !empty($name_file))
				{
					$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
					$nouveau_produit = "SELECT id FROM produit WHERE nom = '".$nom."'";
					$resultat = mysqli_query ($connexion, $nouveau_produit);
					$nombre_produit = mysqli_num_rows($resultat);

					if($nombre_produit < 1)
					{
						if(is_uploaded_file($tmp_file))
						{
							mkdir("../Image/Boutique/".$nom."");
							$content_dir = "../Image/Boutique/".$nom."/";
							move_uploaded_file($tmp_file, $content_dir . $name_file);
							$content_dir = "Image/Boutique/".$nom;

							$description = htmlentities($description, ENT_QUOTES);

							$requete2 = "SELECT id_parent FROM categorie WHERE id = '".$sous_categorie."'";
							$sql2 = mysqli_query($connexion, $requete2);
							$data2 = mysqli_fetch_array($sql2);
							$categorie = $data2['id_parent'];

							$requete= "INSERT INTO produit (nom, description, prix_ht, prix_ttc, stock, img_folder, img, id_categorie, id_sous_categorie) VALUES ('$nom', '$description', '$prix_ht', '$prix_ttc', '$stock', '$content_dir', '$name_file', '$categorie', '$sous_categorie')";
							mysqli_query($connexion, $requete);
							mysqli_close($connexion);
							header('Location: admin.php');
						}
						else
						{
							echo "L'image est introuvable";
						}
					}
					else
					{
						echo "Le produit $nom est déjà enregistré";
					}
				}
				else
				{
					echo "Veuillez remplir toutes les casses";
				}
			}
		}
		
		public function modif_produit($id, $bouton, $nom, $description, $sous_categorie, $prix_ht, $prix_ttc, $stock, $tmp_file, $type_file, $name_file)
		{
			$data = $this->data_produit($id);
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			if(isset($bouton))
			{
				if($nom != $data['nom'])
				{
					$requete = "UPDATE produit SET nom='".$nom."' WHERE id='".$id."'";
					$sql = mysqli_query($connexion, $requete);
				}
				
				if($description != $data['description'])
				{
					$description = htmlentities($description, ENT_QUOTES);
					$requete = "UPDATE produit SET description='".$description."' WHERE id='".$id."'";
					$sql = mysqli_query($connexion, $requete);
				}
				
				if($sous_categorie != $data['id_sous_categorie'])
				{
					$requete2 = "SELECT id_parent FROM categorie WHERE id = '".$sous_categorie."'";
					$sql2 = mysqli_query($connexion, $requete2);
					$data2 = mysqli_fetch_array($sql2);
					$categorie = $data2['id_parent'];
					
					$requete = "UPDATE produit SET id_sous_categorie = '".$sous_categorie."', id_categorie = '".$categorie."' WHERE id='".$id."'";
					$sql = mysqli_query($connexion, $requete);
				}
				
				if($prix_ht != $data['prix_ht'])
				{
					$requete = "UPDATE produit SET prix_ht='".$prix_ht."' WHERE id='".$id."'";
					$sql = mysqli_query($connexion, $requete);
				}
				
				if($prix_ttc != $data['prix_ttc'])
				{
					$requete = "UPDATE produit SET prix_ttc='".$prix_ttc."' WHERE id='".$id."'";
					$sql = mysqli_query($connexion, $requete);
				}
				
				if($stock != $data['stock'])
				{
					$requete = "UPDATE produit SET stock='".$stock."' WHERE id='".$id."'";
					$sql = mysqli_query($connexion, $requete);
				}
				
				if(is_uploaded_file($tmp_file))
				{
					$content_dir = $data['img_folder'];
					$anc_img = $data['img'];
					$suppr_img = "../$content_dir/$anc_img";
					unlink($suppr_img);
					$new_img = "../$content_dir/$name_file";
					move_uploaded_file($tmp_file, $new_img);
					$requete = "UPDATE produit SET img='".$name_file."' WHERE id='".$id."'";
					$sql = mysqli_query($connexion, $requete);
				}
				
				echo "<meta http-equiv='refresh' content='0.5 ;URL='admin.php''>";
			}
		}
		
		public function suppr_produit($id_produit, $nom_produit, $suppr_produit)
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			if(isset($suppr_produit))
			{
				$sql = "SELECT id FROM favoris WHERE id_produit = '".$id_produit."'";
				$resultat = mysqli_query($connexion, $sql);
				$nombre_favoris = mysqli_num_rows($resultat);
				if($nombre_favoris == 0)
				{
					$dossier = "../Image/Boutique/".$nom_produit."";
					$this->suppr_dossier($dossier);
					$sql2 = "DELETE FROM produit WHERE id = '".$id_produit."'";
					$resultat_supprimer = mysqli_query($connexion, $sql2);
					echo "<meta http-equiv='refresh' content='0.5 ;URL='admin.php''>";
				}
				else
				{
					echo "Votre produit $nom_produit est un favoris, vous ne pouvez donc pas le supprimer";
				}
			}
		}
		
		public function suppr_dossier($dossier) 
		{
			if (is_dir($dossier))
			{
				$objects = scandir($dossier);
				foreach ($objects as $object)
				{
					if ($object != "." && $object != "..")
					{
						if (filetype($dossier."/".$object) == "dir") rmdir($dossier."/".$object);else unlink($dossier."/".$object);
					}
				}
				reset($objects);
				rmdir($dossier);
			}
		}
		
		/* CATEGORIES */
		
		public function gestion_categorie()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$requete = "SELECT * FROM categorie WHERE id_parent = '0' ORDER BY name";
			$sql = mysqli_query($connexion, $requete);
			
			while($data = mysqli_fetch_array($sql))
			{
				echo '
				<section class="admin_affichage_list">
					<h4 class="name"><a href="../boutique.php?id=', $data['id'] ,'">', $data['name'] ,'</a></h4>
					<form method="post">
						<input type="hidden" name="id_cat" value="', $data['id'] ,'"/>
						<input type="submit" name="suppr_categorie" class="admin_suppr_img">
					</form>
				</section>
				';
				
				$requete2 = "SELECT * FROM categorie WHERE id_parent = '".$data['id']."' ORDER BY name";
				$sql2 = mysqli_query($connexion, $requete2);
				
				while($data2 = mysqli_fetch_array($sql2))
				{
					echo '
					<section class="admin_affichage_list">
						<h4 class="sous_name"><a href="../boutique.php?id=', $data2['id'] ,'">', $data2['name'] ,'</a></h4>
						<form method="post">
							<input type="hidden" name="id_cat" value="', $data2['id'] ,'"/>
							<input type="submit" name="suppr_categorie" class="admin_suppr_img">
						</form>
					</section>
					';
				}
			}
			if(isset($_POST['suppr_categorie']))
			{
				$this->suppr_categorie($_POST['id_cat'], $_POST['suppr_categorie']);
			}
		}
		
		public function suppr_categorie($id_categorie, $suppr_categorie)
		{
			if(isset($suppr_categorie))
			{
				$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
				$sql = "DELETE categorie, produit FROM categorie LEFT JOIN produit ON (categorie.id = produit.id_categorie) WHERE categorie.id = '".$id_categorie."'";
				$resultat_supprimer = mysqli_query($connexion, $sql);
				echo "<meta http-equiv='refresh' content='0.5 ;URL='admin.php''>";
			}
		}
		
		public function ajout_categorie($ajout_categorie, $name_categorie, $categorie)
		{
			if(isset($ajout_categorie))
			{
				if(!empty($name_categorie) && isset($categorie))
				{
					$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
					$nouvelle_categorie = "SELECT id FROM categorie WHERE name = '".$name_categorie."' AND id_parent = '".$categorie."'";
					$resultat = mysqli_query($connexion, $nouvelle_categorie);
					$nombre_categorie = mysqli_num_rows($resultat);
					if($nombre_categorie == 0)
					{
						$requete = "INSERT INTO categorie (name, id_parent) VALUES ('$name_categorie', $categorie)";
						$sql = mysqli_query($connexion, $requete);
					}
					else
					{
						echo "La catégorie $name_categorie existe déjà";
					}
				}
			}
		}
		
		public function liste_categorie()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$requete = "SELECT * FROM categorie WHERE id_parent = '0' ORDER BY name";
			$sql = mysqli_query($connexion, $requete);
			
			while($data = mysqli_fetch_array($sql))
			{
				echo "<option value='", $data['id'] ,"'>", $data['name'] ,"</option>";
			}
		}
		
		public function liste_sous_categorie($id_sous_categorie)
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$requete = "SELECT * FROM categorie WHERE id_parent = '0' ORDER BY name";
			$sql = mysqli_query($connexion, $requete);
			
			while($data = mysqli_fetch_array($sql))
			{
				echo "<optgroup label=", $data['name'] ,">";
					
				$requete2 = "SELECT * FROM categorie WHERE id_parent = '".$data['id']."' ORDER BY name";
				$sql2 = mysqli_query($connexion, $requete2);
				
				while($data2 = mysqli_fetch_array($sql2))
				{
					if($id_sous_categorie == $data2['id'])
					{
						echo "<option value='", $data2['id'] ,"' selected>", $data2['name'] ,"</option>";
					}
					else
					{
						echo "<option value='", $data2['id'] ,"'>", $data2['name'] ,"</option>";
					}	
				}
				echo "</optgroup>";
			}
		}
		
		/* UTILISATEURS */
		
		public function gestion_utilisateur()
		{
			$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
			$requete = "SELECT * FROM utilisateurs";
			$sql = mysqli_query($connexion, $requete);
			
			while($data = mysqli_fetch_array($sql))
			{
				echo '
				<section class="admin_affichage_list">
					<h4 class="name">', $data['login'] ,'</h4>
					<form method="post" class="form_utilisateurs">
						<select class="liste_produit_utilisateurs"  name="liste_droits">';
							$requete2 = "SELECT id, nom FROM droits";
							$sql2 = mysqli_query($connexion, $requete2);

							while($data2 = mysqli_fetch_array($sql2))
							{	
								if($data['id_droits'] == $data2['id'])
								{
									echo "<option value='", $data2['id'] ,"' selected>", $data2['nom'] ,"</option>";
								}
								else
								{
									echo "<option value='", $data2['id'] ,"'>", $data2['nom'] ,"</option>";
								}
							}
						echo '
						</select>
						<input type="hidden" name="id_utilisateur" value="', $data['id'] ,'"/>
						<input type="submit" class="modif_img" name="modif_droits" value="Modifier"/>
						<input type="submit" name="suppr_utilisateur" class="admin_suppr_img">
					</form>
				</section>
				';
			}
			if(isset($_POST['modif_droits']))
			{
				$this->modifier_utilisateur($_POST['liste_droits'], $_POST['id_utilisateur'], $_POST['modif_droits']);
			}
			
			if(isset($_POST['suppr_utilisateur']))
			{
				$this->suppr_utilisateur($_POST['id_utilisateur'], $_POST['suppr_utilisateur']);
			}
		}
		
		public function modifier_utilisateur($liste_droits, $id_utilisateur, $modif_droits)
		{
			if(isset($modif_droits))
			{
				$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
				$requete = "UPDATE utilisateurs SET id_droits='".$liste_droits."' WHERE id='".$id_utilisateur."'";
				mysqli_query($connexion, $requete);
				echo "<meta http-equiv='refresh' content='0.5 ;URL='admin.php''>";
			}
		}
		
		public function suppr_utilisateur($id_utilisateur, $suppr_utilisateur)
		{
			if(isset($suppr_utilisateur))
			{
				$connexion = mysqli_connect($this->host, $this->username, $this->password, $this->db);
				$sql = "DELETE utilisateurs, panier FROM utilisateurs LEFT JOIN panier ON (utilisateurs.id = panier.id_utilisateur) WHERE utilisateurs.id = '".$_POST['id_utilisateur']."'";
				$resultat_supprimer = mysqli_query($connexion, $sql);
				echo "<meta http-equiv='refresh' content='0.5 ;URL='admin.php''>";
			}
		}
	}
?>