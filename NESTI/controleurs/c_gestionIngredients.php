<?php
$action = $_REQUEST['action'];

switch ($action){
    case 'voir_Categories_Ingredients':
        $les_categories = $pdo->getCategories_Ingredients();
        include "vues/v_Categories_Ingredients.php";
        break;
    case 'voir_Ingredients':
        break;
    case 'ajouter_Panier':
        break;
}
?>

