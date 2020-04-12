<?php
	if(!empty($data['comp_adresse']))
	{
?>
		<div><?php echo $data['nom'], ' ', $data['prenom']; ?></div>
		<div><?php echo $data['adresse']; ?></div>
		<div><?php echo $data['comp_adresse']; ?></div>
		<div><?php echo $data['code_postal']; ?></div>
		<div><?php echo $data['ville']; ?></div>
		<div><?php echo $data['pays']; ?></div>
<?php
	}
	else
	{
?>
		<div><?php echo $data['nom'], ' ', $data['prenom']; ?></div>
		<div><?php echo $data['adresse']; ?></div>
		<div><?php echo $data['code_postal']; ?></div>
		<div><?php echo $data['ville']; ?></div>
		<div><?php echo $data['pays']; ?></div>
<?php
	}
?>