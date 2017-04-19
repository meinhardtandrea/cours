<?php

namespace NESTI\Controleurs {
        
    class gestionRecettes {
        
        public function voir_Categories_Recettes(){}
        
        public function voir_Recettes(){}
        
    }
}
$action = $_REQUEST['action'];

switch ($action){
    
    case 'voir_Categories_Recettes':
        $les_categories = $pdo->getCategories_Recettes();
        include "vues/v_Categories_Recettes.php"; break;
    
    case 'voir_Recettes':
        $les_categories = $pdo->getCategories_Recettes();
        include "vues/v_Categories_Recettes.php";
        
        $categorie_recette = $_REQUEST['categorie'];
        
        foreach ($les_categories as $une_categorie) {
            $id_categorie_recette  = $une_categorie['id_cat_rec'];
            $lib_categorie_recette = $une_categorie['lib_cat_rec'];
            
            switch ($categorie_recette){
                case $id_categorie_recette :
                    include "vues/v_Bandeau_Categorie_Recette.php" ;
                    $les_recettes = $pdo->getRecettes($id_categorie_recette);
                    
                    foreach ($les_recettes as $une_recette){
                        $id_recette   = $une_recette['id_rec'];
                        $titre_rec   = $une_recette['lib_rec'];
                        $chapo_rec   = $une_recette['chapo_rec'];
                        $date_rec    = $une_recette['date'];
                        $nb_pers     = $une_recette['nb_pers'];
                        $tps_prepa   = $une_recette['tps_prepa'];
                        $tps_cuisson = $une_recette['tps_cuisson'];
                        $difficulte  = $une_recette['difficulte'];
                        $texte       = $une_recette['texte'];
                        
                        $quantites_des_ingredients = $pdo->getQuantite_Ingredient($id_recette);
                        $les_images                = $pdo->getImage_Recette($id_recette);
                        include("vues/v_Fiche_Recette.php");
                    }
                    break;
            }
        }
}
?>

