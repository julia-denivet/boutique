<div id="modif_profil">
	<form method="post">
		<?php $data = mysqli_fetch_assoc($query); ?>
		<input type="text" name="login" placeholder="LOGIN" value="<?php echo $data['login'] ?>"/>
		<input type="mail" name="email" placeholder="E-MAIL" value="<?php echo $data['email'] ?>"/>
		<input type="text" name="prenom" placeholder="PRENOM" value="<?php echo $data['prenom'] ?>"/>
		<input type="text" name="nom" placeholder="NOM" value="<?php echo $data['nom'] ?>" >
		<input type="password" name="passe" placeholder="MOT DE PASSE" value="<?php echo $data['password'] ?>"/>
		<input type="password" name="passe2" placeholder="CONFIRMATION MOT DE PASSE" value="<?php echo $data['password'] ?>"/>
		<input type="submit" value="MODIFIER" name="modifier_profil"/>
		<?php
			$var->modif_profil($data['login'], $data['email'], $data['prenom'], $data['nom'], $data['password']);
		?>
	</form>
</div>