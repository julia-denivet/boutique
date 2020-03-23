<?php
	session_start();
	require("function.php");
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
    <div>
        Grand Total : <span> 3030,20€ </span>
    </div>
    
</body>



</html>