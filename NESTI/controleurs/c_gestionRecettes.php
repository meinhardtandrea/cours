<?php
$action = $_REQUEST['action'];

switch ($action){
    
    case 'voir_Categories_Recettes':
        $les_categories = $pdo->getCategories_Recettes();
        include "vues/v_Categories_Recettes.php"; break;
    
    case 'voir_Recettes':
        $les_categories = $pdo->getCategories_Recettes();
        include "vues/v_Categories_Recettes.php";
        $categorie_recette = $_REQUEST['categorie'];
        $les_recettes = $pdo->getRecettes($id_categorie_recette);
        $les_ingrédients= $pdo->getIngredients($id_recette);
        include("vues/v_Fiche_Recette.php");
        break;
}
?>

