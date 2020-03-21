<?php
session_start();

require("function.php");
$var = new boutique();
$req = $var->panier();

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
            
            while ($data = mysqli_fetch_assoc($req))
             {   
            
        ?>
            <article>
                <div>
                    <img src="">
                </div>

                <div>
                    <?php  echo $data['nom'] ?>
                </div>

                <div>
                    <?php  echo $data['prix'] ?>
                </div>

                <div>
                    1
                </div>
                
                <div>
                    <img src="del.png">
                </div>
            </article>
     <?php 
             }
     ?>
    </section>
    <div>
        Grand Total : <span> 3030,20€ </span>
    </div>
    
</body>



</html>