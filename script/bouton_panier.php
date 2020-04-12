<?php	
	if(isset($_SESSION['login'])) 
	{
		if($data['stock'] == 0)
		{
			echo "<h3>Produit indisponible</h3>";
		}
		else
		{
?>	
			<form method='post' action='panier.php'>
				<input type='hidden' name='quantite' value='1'/>
				<input type='hidden' name='id_produit' value='<?php echo $data['id']; ?>'/>
				<input type='submit' name="ajout_panier" value='Ajouter au panier !' class='ajout_panier'/>
			</form>
<?php
		}
	}
	else
	{
		echo "<a href='connexion.php' class='ajout_panier'>Connectez-vous</a>";
	}
?>