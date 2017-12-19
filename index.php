            <?php
            $date = date("d-m-Y"); //Je créé une variable qui prend pour valeur la fonction date et qui prend pour paramètres le jour, le mois et l'année.
            $heure = date("H:i"); //Je créé une variable qui prend pour valeur la fonction date et qui prend pour paramètres l'heure et les minutes'.
            $compteur = 0; // Variable compteur qui est égale a 0
            $boissons = array("Expresso","Chocolat","Cappuccino","Thé menthe");
            //Variable tableau qui prend pour valeur la fonction array qui contient les paramètres des boissons.
            $list = ""; // je créé une variable qui prend pour valeur une chaine de caractère
            sort($boissons); //fonction qui trie le tableau et qui contient pour paramètre la variable boissons
            foreach ($boissons as $boissonList){ //Boucle itére chaque éléments du tableau
                $list = $list. "<p>$boissonList</p>";//Variable list qui prend pour valeur list + la varibale boissonList en paragraphe 
            };                        
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

            <p>Nous sommes le <?= $date?></p> <p>et il est <?=$heure?></p> 
            <!-- Appel variable date et heure -->       

        </div>

            <h1>Choix des boissons</h1>

        <div id="ListBoissons">

            <p><?=$list?></p>
            <!-- Appel variable list -->

        </div>

        <div id="attente">   

            <p>En attente</p>
            <!-- Affiche En attente -->

        </div>

        <div id="argentInser">

            <p>Vous avez insérée <?=$compteur?> €</p>
            <!-- Appel variable compteur -->

        </div>          

    </body>
</html>