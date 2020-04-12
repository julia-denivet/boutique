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
			<form method="post" action="panier.php">
				<label>Quantité : 
					<select name="quantite">
						<optgroup label="Quantité"></optgroup>
					<?php

						for($i = 1; $i <= $data['stock']; $i++)
						{
							echo '<option value="', $i, '">', $i, '</option>';
						}
					?>
					</select>
				</label>
				<input type="hidden" name="id_produit" value="<?php echo $data["id"]; ?>"/>
				<input type="submit" name="ajout_panier" value="Ajouter au panier !" class='ajout_panier'/>
			</form>
<?php
		}
	}
	else
	{
		echo "<a href='connexion.php' class='ajout_panier'>Connectez-vous</a>";
	}
?>