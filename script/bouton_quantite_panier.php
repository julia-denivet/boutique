<?php	
	if(isset($_SESSION['login'])) 
	{
?>	
		<form method="post" action="panier.php">
			<label>Quantité : </label>
			<select name="quantite">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
			<input type="hidden" name="id_produit" value="<?php echo $data["id"]; ?>"/>
			<input type="submit" name="ajout_panier" value="Ajouter au panier !" class='ajout_panier'/>
		</form>
<?php
	}
	else
	{
		echo "<a href='connexion.php' class='ajout_panier'>Connectez-vous</a>";
	}
?>