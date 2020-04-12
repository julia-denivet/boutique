<section class="aff_produit_panier">	
	<div  class="panier_colonne"><img class="produit_img" src="<?php echo $data['img_folder']."/".$data['img'] ?>"></div>

	<div class="panier_colonne"><a href="produit.php?id=<?php echo $data['id_produit']; ?>"><?php echo $data['nom']; ?></a></div>

	<div class="panier_colonne"><?php echo $data['prix_ttc']; ?> €</div>
	
	<div class="panier_colonne">
		<form method="post">
			<input type="hidden" name="quantite2" value="<?php echo $data['quantite']; ?>"/>
			<input type="hidden" name="id" value="<?php echo $data['id_panier']; ?>"/>
			<input type="hidden" name="stock" value="<?php echo $data['stock']; ?>"/>
			<input type="submit" name="suppr_quantite" value="-"/>
			<h2><?php echo $data['quantite']; ?></h2>
			<input type="submit" name="ajout_quantite" value="+"/>
		</form>
	</div>

	<div class="panier_colonne_suppr">
		<a href="panier.php?suppr=<?php echo $data['id_panier'] ;?>"><img class="suppr_img" src="Image/Logo/del.png"></a>
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