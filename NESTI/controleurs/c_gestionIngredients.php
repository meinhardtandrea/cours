<?php

namespace NESTI\Controleurs {
        
    class gestionIngredients {
        
        public function voir_Categories_Ingredients() {}
    
        public function voir_Ingredients() {}
        
    }
}
$action = $_REQUEST['action'];

switch ($action){
    
    case 'voir_Categories_Ingredients':
        $les_categories = $pdo->getCategories_Ingredients();
        include "vues/v_Categories_Ingredients.php"; break;

    case 'voir_Ingredients':
        break;
}
?>

