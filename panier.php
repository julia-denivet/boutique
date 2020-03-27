<?php
	session_start();
	require("fonctions/function_boutique.php");
?>
<html>
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="src/e_style.css"/>
	<title>Panier - Boutique</title>
</head>
	
<body>
    <section>
        <article>
            <div>
                
            </div>
            <div>
                Prodruits
            </div>
            <div>
                Prix
            </div>
            <div>
                Quantité
            </div>
            <div>
                Actions 
            </div>
        </article>
        <?php
			$var = new boutique();
			$var->panier();
        ?>
    </section>
    
</body>



</html>