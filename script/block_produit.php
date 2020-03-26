<section id="produits_list_colonne">
	<a href="produit.php?id=<?php echo $data["id"] ?>" class="img_produit">
		<img alt="<?php echo $data["nom"] ?>" src=<?php echo $data["img_folder"]?>/<?php echo $data["img"]?> class="img_produit_img"/>
	</a>
	<div class='text_produit'>
		<a href="produit.php?id=<?php echo $data["id"] ?>"><h2><?php echo $data["nom"] ?></h2></a>
		<h3><?php echo $data["prix_ttc"] ?> € TTC</h3>
		<h4><?php echo $data["prix_ht"] ?> € HT</h4>
	</div>
	<a href='' class='ajout_panier'>Ajouter au panier</a>
</section>