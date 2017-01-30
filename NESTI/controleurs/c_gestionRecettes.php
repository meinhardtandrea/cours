<?php
$action = $_REQUEST['action'];

switch ($action){
    case 'voir_Categories_Recettes':
        $les_categories = $pdo->getCategories_Recettes();
        include "vues/v_Categories_Recettes.php";
        break;
    case 'voir_Recettes':
        break;
}
?>

