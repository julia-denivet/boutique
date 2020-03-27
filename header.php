<?php
	require "fonctions/function_header.php";
	$header = new header;
?>

<nav>
	<ul>
		<li><a href="index.php">ACCUEIL</a></li>
		<li class="deroulant"><a>BOUTIQUE</a>
			<ul class="sous">
				<?php $header->categorie(); ?>
			</ul>
		</li>
	</ul>
	<img alt="logo_camara" id="logo_camara" src="Image/Logo/camara_brest_ok2.png"/>
	<ul>
		<li><a href="contact.php">CONTACT</a></li>
		<li><a href="panier.php">PANIER</a></li>
	</ul>
</nav>