<?php	
	if(isset($_SESSION['login']))
	{
?>
		<form method='post' action='panier.php'>
			<input type='hidden' name='quantite' value='1'/>
			<input type='hidden' name='id_produit' value='<?php echo $data['id']; ?>'/>
			<input type='submit' value='Ajouter au panier !' class='ajout_panier'/>
		</form>
<?php
	}
	else
	{
		echo "<a href='connexion.php' class='ajout_panier'>Connectez-vous</a>";
	}
?>