<h2>CATÉGORIES</h2>

<section id="admin_ajout_categorie">
	<form method="post">
		<input type="text" id="name_categorie" name="name_categorie" placeholder="NOM CATÉGORIE"/>
		<select id="select_categorie" name="categorie">
			<option value="0">Catégorie</option>
			<optgroup label="Catégorie">
				<?php $var->liste_categorie(""); ?>
			</optgroup>
		</select>
		<input type="submit" id="bouton_categorie" name="ajout_categorie" value="Ajouter catégorie">
	</form>
	<?php 
		if(isset($_POST['ajout_categorie']))
		{
			$var->ajout_categorie($_POST['ajout_categorie'], $_POST['name_categorie'], $_POST['categorie']);
		}
	?>
</section>

<section class="admin_affichage">
	<?php $var->gestion_categorie(); ?>
</section>