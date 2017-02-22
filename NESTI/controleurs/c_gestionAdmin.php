<?php
$action = $_REQUEST['action'];

switch ($action){
    
    case 'nouveau':
        break;
    case 'modifier':
        break;
    case 'supprimer':
        break;
    case 'voir_Categories_Admin':
        include "vues/v_Categories_Admin.php" ;
        $categorie_admin = $_REQUEST['categorie'];
        switch($categorie_admin){
            case 'ingredient':
                include "vues/v_Admin_Ingredient.php" ;
                break;
            case 'recette':
                $les_categories = $pdo->getCategories_Recettes();
                include "vues/v_Admin_Recette.php" ;
                break;
            case 'cours':
                include "vues/v_Admin_Cours.php" ;
                break;
        }
        break;
    case 'enregistrer_recette':
        break;
}
?>