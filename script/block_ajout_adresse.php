<div class="profil_adresse">
	<form method="post">
		<input type="text" name="nom" placeholder="NOM"/>
		<input type="text" name="prenom" placeholder="PRENOM"/>
		<input type="text" name="adresse" placeholder="ADRESSE"/>
		<input type="text" name="comp_adresse" placeholder="COMPLEMENT D'ADRESSE"/>
		<input type="text" name="code_postal" placeholder="CODE POSTAL"/>
		<input type="text" name="ville" placeholder="VILLE"/>
		<input type="text" name="pays" placeholder="PAYS"/>
		<input type="submit" value="AJOUTER" name="ajouter_adresse"/>
		<?php $var->ajout_adresse(); ?>
	</form>
</div>