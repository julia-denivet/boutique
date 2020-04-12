<?php
	$sql2 = "SELECT login FROM utilisateurs WHERE id = '".$data['id_utilisateur']."'";
	$query2 = mysqli_query($connexion, $sql2);
	$data_utilisateur = mysqli_fetch_assoc($query2);
?>
<div class="affichage_commentaire">
	<div class="affichage_commentaire_header">
		<h3><?php echo $data_utilisateur['login']; ?></h3>
		<h5><?php echo $data['date']; ?></h5>
	</div>
	<div class="affichage_commentaire_texte">
		<p><?php echo $data['commentaire']; ?></p>
	</div>
</div>