<section class="aff_produit_panier">	
	<div  class="panier_colonne"><img class="produit_img" src="<?php echo $data['img_folder']."/".$data['img'] ?>"></div>

	<div class="panier_colonne"><?php echo $data['nom']; ?></div>

	<div class="panier_colonne"><?php echo $data['prix_ttc']; ?> €</div>

	<div class="panier_colonne"><?php echo $data['quantite']; ?></div>
	
	<div class="panier_colonne">
		<form method="post">
			<select name="quantite">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
			<input type="hidden" name="quantite2" value="<?php echo $data['quantite']; ?>"/>
			<input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>
			<div>
				<input type="submit" name="ajout_quantite" value="Ajouter"/>
				<input type="submit" name="suppr_quantite" value="Supprimer"/>
			</div>
		</form>
	</div>

	<div class="panier_colonne_suppr">
		<a href="panier.php?suppr=<?php echo $data['id'] ;?>"><img class="suppr_img" src="Image/Logo/del.png"></a>
		<?php
			if(isset($_GET['suppr']))
			{
				$sql = "DELETE FROM panier WHERE id = '".$_GET['suppr']."'";
				$resultat_supprimer = mysqli_query($connexion, $sql);
				header('Location: panier.php');
			}
		?>
	</div>
</section>