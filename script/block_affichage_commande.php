<div class="affichage_liste_commande_titre affichage_liste_commande">
	<div><h4>Numéro de commande</h4></div>
	<div><h4>Date</h4></div>
	<div><h4>Prix total</h4></div>
	<div><h4>Moyen de paiment</h4></div>
</div>
<?php
	$query2 = $var->donnees_profil_liste_commande();
	while($data = mysqli_fetch_assoc($query2))
	{
?>
		<div class="affichage_liste_commande">
			<div><a href="fiche_commande.php?num_commande=<?php echo $data['numero_commande'] ?>"/><?php echo $data['numero_commande']; ?></a></div>
			<div><?php echo date('d/m/Y', strtotime($data['date'])); ?></div>
			<div><?php echo $data['prix']; ?> €</div>
			<div><?php echo $data['paiement']; ?></div>
		</div>
<?php
	}
?>