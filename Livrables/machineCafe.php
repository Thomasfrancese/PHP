<?php
include "fonctions.php"; 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="stylesheet.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="script.js"></script>
    </head>
    <body>
        <div id="Date">
            
            <p>Nous sommes le <?= $date?></p> <p>et il est <?=$heure?>:<?=$minutes?></p> 
            <!-- Appel variable date et heure -->       
        </div>

            <h1>Choix et prix des boissons</h1>

    <form method="post" action="machineCafe.php">
                <select name="choixBoisson">
                    <option>Choissisez votre boisson</option>

                    <?= drinkChoice()?>

                </select>
                <input type="number" min="0" max="5" name="choixSucre" placeholder="Combien de sucres ?"/>
                <input type="submit" value="Valider"/>
    </form>
        
        <?= boissonBdd()?>

    </body>
</html>