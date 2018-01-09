<?php
/* Déclaration des variables */
$date = date("l d F Y"); // Déclaration d'une variable $date qui prend pour valeur la fonction date avec les paramètres le jour (nom + numéro) le mois et l'année
$heure = date("H"); // Déclaration d'une variable $heure qui prend pour valeur la fonction date avec le paramètre Heure
$minutes  = date("i"); // Déclaration d'une variable $minutes qui prend pour valeur la fonction date avec le paramètre minutes
// $boissons = array("Thé Menthe","Chocolat","Café","Expresso"); // Déclaration d'une variable $boissons qui prend pour valeur la fonction tableau comprenant les paramètres des 4 boissons
 // Déclaration d'un variable $messageAttente qui prend pour valeur la chaine de caractères du message d'attente
$argentInsere = 0; // Déclaration de la variable $argentInsere qui prend pour valeur 0

function connection()
{
  try{      
  $bdd = new PDO('mysql:host=localhost;dbname=machineacafe;charset=utf8', 'thomas', '220492',
  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }  
  catch (Exception $e){
  die('Errreur: ' . $e->getMessage());
  }
    return $bdd;
}

function drinkChoice(){
  $bdd = connection();
  $menu = "";
$drinkName = $bdd->query('SELECT * FROM boisson');
while ($drinkTab = $drinkName->fetch())
{
    $menu .= "<option>" . $drinkTab["nomBoisson"] . "</option>";
}
return $menu;
$drinkName->closeCursor();

}

function boissonBdd()
{
  $bdd = connection();
  $choiceUser ="";
  $i=0;
  $messageAttente = "Vous voulez un café ou bien ?";
  $choice = $bdd->prepare('SELECT nomBoisson, nomIngredients, Quantite
    FROM ingredients
    JOIN boisson_has_ingredients ON ingredients.CodeIngredients = boisson_has_ingredients.Ingredients_CodeIngredients
    JOIN boisson ON boisson.CodeBoisson = boisson_has_ingredients.Boisson_CodeBoisson
    WHERE nomBoisson = :nomBoisson');

  if (isset($_POST["choixBoisson"]) AND !empty($_POST["choixSucre"])) 
  { 
    $choice->execute(array('nomBoisson' => $_POST["choixBoisson"]));
    while ($tabChoice = $choice->fetch()) 
    {
      if ($i==0)
      {
        $i=1;
        $choiceUser .= $tabChoice["nomBoisson"] . " " . '<br/>';
      };
      $choiceUser .= $tabChoice["nomIngredients"] . " :" . $tabChoice["Quantite"] . "<br/>";
    } 
    $choiceUser .= "Sucres " . $_POST["choixSucre"];
  }
  else
  {
    echo $messageAttente;
  }
  return $choiceUser;
};

function ajouterSucre($recetteTab, $nbSucres) {
  if ($nbSucres == 1) {
    array_push($recetteTab, " Sucre x " . $nbSucres);
  } else if ($nbSucres > 1) {
    array_push($recetteTab, " Sucres x " . $nbSucres);
  } else if ($nbSucres == 0) {
    array_push($recetteTab, " Sans sucre");
  };
  return $recetteTab;
};


  $monTableau = array ("rouge", "bleu", "jaune"); 

  echo $monTableau[0] . "<br/>" ;
  $monTableau[1] = 'vert';
  echo $monTableau[1];
?> 