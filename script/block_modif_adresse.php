<?php
	mysqli_data_seek($query, 0);
	while($data = mysqli_fetch_assoc($query))
	{ 
?>
	<div class="profil_adresse">
		<form method="post">
			<input type="hidden" name="id_adresse" value="<?php echo $data['id_adresse'] ?>"/>
			<input type="text" name="nom" placeholder="NOM" value="<?php echo $data['nom_adresse']; ?>"/>
			<input type="text" name="prenom" placeholder="PRENOM" value="<?php echo $data['prenom_adresse']; ?>"/>
			<input type="text" name="adresse" placeholder="ADRESSE" value="<?php echo $data['adresse']; ?>"/>
			<input type="text" name="comp_adresse" placeholder="COMPLEMENT D'ADRESSE" value="<?php echo $data['comp_adresse']; ?>"/>
			<input type="text" name="code_postal" placeholder="CODE POSTAL" value="<?php echo $data['code_postal']; ?>"/>
			<input type="text" name="ville" placeholder="VILLE" value="<?php echo $data['ville']; ?>"/>
			<input type="text" name="pays" placeholder="PAYS" value="<?php echo $data['pays']; ?>"/>
			<input type="submit" value="MODIFIER" name="modifier_adresse"/>
			<input type="submit" value="SUPPRIMER" name="supprimer_adresse"/>
		</form>
	</div>
<?php
 	$var->modif_adresse($data['nom_adresse'], $data['prenom_adresse'], $data['adresse'], $data['comp_adresse'], $data['code_postal'], $data['ville'], $data['pays']);
	$var->suppr_adresse();
	}
?>
