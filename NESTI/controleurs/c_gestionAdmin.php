<?php

$action = $_REQUEST['action'];
switch ($action){

//Menu>>Accès Administrateur
//              -Gérer une Fiche Ingrédient >> Créer/Modifier/Supprimer
//              -Gérer une Fiche Recette    >> Créer/Modifier/Supprimer
//              -Gérer les cours            >> Créer/Modifier/Supprimer
    case 'voir_Categories_Admin':
        $categorie_admin = $_REQUEST['categorie'];
        switch($categorie_admin){
            
            case 'ingredient':
                include "vues/v_Boutons_Admin.php" ;
                $choix =  @$_REQUEST['choix'];
                switch ($choix){
                    case 'creer':
                        include "vues/v_Admin_Creer_Ingredient.php" ;
                        break;
                    case 'modifier':
                        include "vues/v_Admin_Select_Ingredient.php" ;
                        break;
                    case 'supprimer':
                        include "vues/v_Admin_Suppr_Ingredient.php" ;
                        break;
                } break;
            
            case 'recette':
                include "vues/v_Boutons_Admin.php" ;
                $choix =  @$_REQUEST['choix'];
                switch ($choix){
                    case 'creer':
                        $les_categories = $pdo->getCategories_Recettes();
                        include "vues/v_Admin_Creer_Recette.php" ;
                        break;
                    case 'modifier':
                        $les_recettes = $pdo->getAllRecettes();
                        include "vues/v_Admin_Select_Recette.php" ;
                        break;
                    case 'supprimer':
                        $les_recettes = $pdo->getAllRecettes();
                        include "vues/v_Admin_Suppr_Recette.php" ;
                        break;
                } break;                
                
            case 'cours':
                include "vues/v_Boutons_Admin.php" ;
                $choix =  @$_REQUEST['choix'];
                switch ($choix){
                    case 'creer':
                        include "vues/v_Admin_Creer_Cours.php" ;
                        break;
                    case 'modifier':
                        
                        include "vues/v_Admin_Select_Cours.php" ;
                        break;
                    case 'supprimer':
                        include "vues/v_Admin_Suppr_Cours.php" ;
                        break;
                }                
                break;
        }
        break;

//Créer une Fiche Recette /étape 1
    case 'enregistrer_recette':
        
        $titre_recette     = $_POST[ 'titre_recette'];
        $id_cat_rec        = $_POST[ 'categorie_recette'];
        $chapo_recette     = $_POST[ 'chapo_recette'];
        $nb_pers           = $_POST[ 'nb_pers'];
        $tps_prepa         = $_POST[ 'tps_prepa'];
        $tps_cuisson       = $_POST[ 'tps_cuisson'];
        $difficulte        = $_POST[ 'difficulte'];
        $text_recette      = $_POST[ 'text_recette'];
        
        
        if( empty($titre_recette) || empty($id_cat_rec) || empty($chapo_recette) || empty($nb_pers) || empty($tps_prepa) || empty($tps_cuisson) || empty($difficulte) || empty($text_recette)){
            
            $message = '<br>Merci de remplir tous les champs. ';
            include "vues/v_message.php";
            $les_categories = $pdo->getCategories_Recettes();
            include "vues/v_Admin_Creer_Recette.php" ;
            
        }else{
            
            $insert_dans_bdd = $pdo->enregistrerRecette($titre_recette,$chapo_recette,$nb_pers,$tps_prepa,$tps_cuisson,$difficulte,$text_recette,$id_cat_rec);
               
               if($insert_dans_bdd !== TRUE){
                   if( $pdo->get_last_error_code() == '23000'){
                        $message = 'Votre recette existe dans notre base de données.';
                        include "vues/v_message.php";
                        include "vues/v_Admin_Modif_Recette.php" ;
                   }else{
                        $message = 'Echec. Veuillez réessayer.';
                        include "vues/v_message.php";
                        $les_categories = $pdo->getCategories_Recettes();
                        include "vues/v_Admin_Creer_Recette.php" ;
                   }
               }else{
                   $id_recette     = $pdo->getId_newRecette( $titre_recette);
                   $les_categories = $pdo->getCategories_Ingredients();
                   include "vues/v_Admin_Creer_Recette2.php";
               }
        }
        break;

//Créer une Fiche Recette /étape 2        
    case 'enregistrer_ingredients':

        $id_recette         = $_POST[ 'id_recette'];
        $lib_ingredients    = $_POST[ 'lib_ingredient'];
        $id_cat_ingredients = $_POST[ 'categorie_ingredient'];
        $quantites          = $_POST[ 'quantite'];
        
        $insert_error = false;
        
        for( $i=0 ; $i<count($lib_ingredients) ; $i++){
            
            $lib_ingredient    = $lib_ingredients[ $i];
            $id_cat_ingredient = $id_cat_ingredients[ $i];
            $quantite          = $quantites[ $i];
            
            $insert1_dans_bdd  = $pdo->enregistrerIngredient( $lib_ingredient, $id_cat_ingredient, $id_recette);
            $id_ingredient     = $pdo->getDernierId();
            $insert2_dans_bdd  = $pdo->enregistrerQuantite( $quantite, $id_ingredient); 
            
            if( $insert1_dans_bdd !== TRUE || $insert2_dans_bdd !== TRUE){
                $message = 'Echec. Veuillez réessayer.';
                include "vues/v_message.php";
                $les_categories = $pdo->getCategories_Ingredients();
                include "vues/v_Admin_Creer_Recette2.php" ;
                $insert_error = true;
                break;
            }
        }
        if( ! $insert_error ){
            include "vues/v_Admin_Creer_Recette3.php";
        }
        break;
 
//Créer une Fiche Recette /étape 3
    case 'enregistrer_media':
        
        $nom_image    = $_POST[ 'nom_image'];
        $format_image = $_POST[ 'format_image'];
        $id_recette   = $_POST[ 'id_recette'];
        
        if( empty( $nom_image) || empty( $format_image)){
            
            $message = '<br>Merci de remplir tous les champs. ';
            include "vues/v_message.php";
            include "vues/v_Admin_Creer_Recette3.php" ;
            
        }else{
            
            $insert_dans_bdd = $pdo->enregistrerMedia( $nom_image, $format_image, $id_recette);
               
               if( $insert_dans_bdd !== TRUE){
                    $message = 'Echec. Veuillez réessayer.';
                    include "vues/v_message.php";
                    include "vues/v_Admin_Creer_Recette3.php" ;
               }else{
                    $message = 'Sauvegarde réussie.';
                    include "vues/v_message.php";
               }
        }
        break;

//Modifier une Fiche Recette /sélectionner une recette
    case 'modifier_recette':
        $id_recette = $_POST[ 'select_recette']; 
        
        $ma_recette = $pdo->getMaRecette( $id_recette);
        foreach ( $ma_recette as $un_champ) {
            $id_recette     = $un_champ[ 'id_rec'];
            $titre_recette  = $un_champ[ 'lib_rec'];
            $chapo_recette  = $un_champ[ 'chapo_rec'];
            $nb_pers        = $un_champ[ 'nb_pers'];
            $tps_prepa      = $un_champ[ 'tps_prepa'];
            $tps_cuisson    = $un_champ[ 'tps_cuisson'];
            $difficulte     = $un_champ[ 'difficulte'];
            $text_recette   = $un_champ[ 'texte'];
            $id_cat_recette = $un_champ[ 'id_cat_rec'];
        }
        
        //$les_categories = $pdo->getCategories_Recettes();
        include "vues/v_Admin_Modif_Recette.php" ;
        break;
 
//Modifier une Fiche Recette /étape1
    case 'enregistrer_modif_recette':
        
        $id_recette    = $_POST[ 'id_recette'];
        $titre_recette = $_POST[ 'titre_recette'];
        $id_cat_recette= $_POST[ 'categorie_recette'];
        $chapo_recette = $_POST[ 'chapo_recette'];
        $nb_pers       = $_POST[ 'nb_pers'];
        $tps_prepa     = $_POST[ 'tps_prepa'];
        $tps_cuisson   = $_POST[ 'tps_cuisson'];
        $difficulte    = $_POST[ 'difficulte'];
        $text_recette  = $_POST[ 'text_recette'];
        
        if( empty( $id_cat_recette) || empty( $chapo_recette) || empty( $nb_pers) || empty( $tps_prepa) || empty( $tps_cuisson) || empty( $difficulte) || empty( $text_recette)){
            
            $message = '<br>Merci de remplir tous les champs. ';
            include "vues/v_message.php";
            
            $ma_recette = $pdo->getMaRecette( $id_recette);
            foreach ( $ma_recette as $un_champ) {
                $id_recette     = $un_champ[ 'id_rec'];
                $titre_recette  = $un_champ[ 'lib_rec'];
                $chapo_recette  = $un_champ[ 'chapo_rec'];
                $nb_pers        = $un_champ[ 'nb_pers'];
                $tps_prepa      = $un_champ[ 'tps_prepa'];
                $tps_cuisson    = $un_champ[ 'tps_cuisson'];
                $difficulte     = $un_champ[ 'difficulte'];
                $text_recette   = $un_champ[ 'texte'];
                $id_cat_recette = $un_champ[ 'id_cat_rec'];
            }
            $les_categories = $pdo->getCategories_Recettes();
            include "vues/v_Admin_Modif_Recette.php" ;
            
        }else{
            
            $update_dans_bdd = $pdo->modifierRecette( $id_recette, $titre_recette, $chapo_recette, $nb_pers, $tps_prepa, $tps_cuisson, $difficulte, $text_recette, $id_cat_recette);
               
               if($update_dans_bdd !== TRUE){
                    $message = 'Echec. Veuillez réessayer.';
                    include "vues/v_message.php";
                    
                    $ma_recette = $pdo->getMaRecette( $id_recette);
                    foreach ( $ma_recette as $un_champ) {
                        $id_recette     = $un_champ[ 'id_rec'];
                        $titre_recette  = $un_champ[ 'lib_rec'];
                        $chapo_recette  = $un_champ[ 'chapo_rec'];
                        $nb_pers        = $un_champ[ 'nb_pers'];
                        $tps_prepa      = $un_champ[ 'tps_prepa'];
                        $tps_cuisson    = $un_champ[ 'tps_cuisson'];
                        $difficulte     = $un_champ[ 'difficulte'];
                        $text_recette   = $un_champ[ 'texte'];
                        $id_cat_recette = $un_champ[ 'id_cat_rec'];
                    }
                    $les_categories = $pdo->getCategories_Recettes();
                    include "vues/v_Admin_Modif_Recette.php" ;
               }else{
                    $les_categories = $pdo->getCategories_Ingredients();
                    $mes_ingredients = $pdo->getIngredients_MaRecette( $id_recette);
                    include "vues/v_Admin_Modif_Recette2.php";
               }
        }
        break;
 
//Modifier une Fiche Recette /étape2 >> récupérer les ingrédients dans la BDD et les modifier
    case 'modifier_ingredients':

        $id_recette        = $_POST[ 'id_recette'];
        $id_ingredient     = $_POST[ 'id_ingredient'];
        $id_cat_ingredient = $_POST[ 'id_cat_ingredient'];
        $quantite          = $_POST[ 'quantite'];
        $lib_ingredient    = $_POST[ 'lib_ingredient'];
        
        if( empty( $lib_ingredient)) {
            
            $message = "<br>Merci de saisir un nom d'ingrédient.";
            include "vues/v_message.php";
            
            $les_categories = $pdo->getCategories_Ingredients();
            $mes_ingredients = $pdo->getIngredients_MaRecette( $id_recette);
            include "vues/v_Admin_Modif_Recette2.php" ;
            
        }else{ 
            $update1_dans_bdd = $pdo->updateIngredient( $id_ingredient, $lib_ingredient, $id_cat_ingredient, $id_recette);
            $update2_dans_bdd = $pdo->updateQuantite( $quantite, $id_ingredient);
            if( $update1_dans_bdd !== TRUE || $update2_dans_bdd !== TRUE){
                $message = 'Echec. Veuillez réessayer.';
                include "vues/v_message.php";
                $ma_recette = $pdo->getMaRecette( $id_recette);
                foreach ( $ma_recette as $un_champ) {
                    $id_recette     = $un_champ[ 'id_rec'];
                    $titre_recette  = $un_champ[ 'lib_rec'];
                    $chapo_recette  = $un_champ[ 'chapo_rec'];
                    $nb_pers        = $un_champ[ 'nb_pers'];
                    $tps_prepa      = $un_champ[ 'tps_prepa'];
                    $tps_cuisson    = $un_champ[ 'tps_cuisson'];
                    $difficulte     = $un_champ[ 'difficulte'];
                    $text_recette   = $un_champ[ 'texte'];
                    $id_cat_recette = $un_champ[ 'id_cat_rec'];
                }
                $les_categories = $pdo->getCategories_Ingredients();
                $mes_ingredients = $pdo->getIngredients_MaRecette( $id_recette);
                include "vues/v_Admin_Modif_Recette2.php" ;
            }else{
                $message = 'Sauvegarde réussie.';
                include "vues/v_message.php";
                $ma_recette = $pdo->getMaRecette( $id_recette);
                foreach ( $ma_recette as $un_champ) {
                    $id_recette     = $un_champ[ 'id_rec'];
                    $titre_recette  = $un_champ[ 'lib_rec'];
                    $chapo_recette  = $un_champ[ 'chapo_rec'];
                    $nb_pers        = $un_champ[ 'nb_pers'];
                    $tps_prepa      = $un_champ[ 'tps_prepa'];
                    $tps_cuisson    = $un_champ[ 'tps_cuisson'];
                    $difficulte     = $un_champ[ 'difficulte'];
                    $text_recette   = $un_champ[ 'texte'];
                    $id_cat_recette = $un_champ[ 'id_cat_rec'];
                }
                $les_categories = $pdo->getCategories_Ingredients();
                $mes_ingredients = $pdo->getIngredients_MaRecette( $id_recette);
                include "vues/v_Admin_Modif_Recette2.php" ;
            }
        }
        break;

//Modifier une Fiche Recette /étape2 >> récupérer les ingrédients dans la BDD et les supprimer        
    case 'modif_supprimer_ingredients':
        $id_recette    = $_GET[ 'id_recette'];
        $id_ingredient = $_GET[ 'id_ingredient'];
        $id_quantite   = $_GET[ 'id_quantite'];
        
        $delete1_dans_bdd = $pdo->deleteIngredient( $id_ingredient, $id_recette);
        $delete2_dans_bdd = $pdo->deleteQuantite( $id_quantite, $id_ingredient);
        if( $delete1_dans_bdd !== TRUE || $delete2_dans_bdd !== TRUE){
                    $message = 'Echec. Veuillez réessayer.';
                    include "vues/v_message.php";
                    $ma_recette = $pdo->getMaRecette( $id_recette);
                    foreach ( $ma_recette as $un_champ) {
                        $id_recette     = $un_champ[ 'id_rec'];
                        $titre_recette  = $un_champ[ 'lib_rec'];
                        $chapo_recette  = $un_champ[ 'chapo_rec'];
                        $nb_pers        = $un_champ[ 'nb_pers'];
                        $tps_prepa      = $un_champ[ 'tps_prepa'];
                        $tps_cuisson    = $un_champ[ 'tps_cuisson'];
                        $difficulte     = $un_champ[ 'difficulte'];
                        $text_recette   = $un_champ[ 'texte'];
                        $id_cat_recette = $un_champ[ 'id_cat_rec'];
                    }
                    $les_categories = $pdo->getCategories_Ingredients();
                    $mes_ingredients = $pdo->getIngredients_MaRecette( $id_recette);
                    include "vues/v_Admin_Modif_Recette2.php" ;
                }else{
                    $message = 'Sauvegarde réussie.';
                    include "vues/v_message.php";
                    $ma_recette = $pdo->getMaRecette( $id_recette);
                    foreach ( $ma_recette as $un_champ) {
                        $id_recette     = $un_champ[ 'id_rec'];
                        $titre_recette  = $un_champ[ 'lib_rec'];
                        $chapo_recette  = $un_champ[ 'chapo_rec'];
                        $nb_pers        = $un_champ[ 'nb_pers'];
                        $tps_prepa      = $un_champ[ 'tps_prepa'];
                        $tps_cuisson    = $un_champ[ 'tps_cuisson'];
                        $difficulte     = $un_champ[ 'difficulte'];
                        $text_recette   = $un_champ[ 'texte'];
                        $id_cat_recette = $un_champ[ 'id_cat_rec'];
                    }
                    $les_categories = $pdo->getCategories_Ingredients();
                    $mes_ingredients = $pdo->getIngredients_MaRecette( $id_recette);
                    include "vues/v_Admin_Modif_Recette2.php" ;
                }
        break;

//Modifier une Fiche Recette /étape2 >> ajouter de nouveaux ingrédients    
    case 'modif_rajouter_ingredients':
        $id_recette         = $_POST[ 'id_recette'];
        $lib_ingredients    = $_POST[ 'lib_ingredient'];
        $id_cat_ingredients = $_POST[ 'categorie_ingredient'];
        $quantites          = $_POST[ 'quantite'];
        
        $insert_error = false;
        
        for( $i=0 ; $i<count($lib_ingredients) ; $i++){
            
            $lib_ingredient    = $lib_ingredients[ $i];
            $id_cat_ingredient = $id_cat_ingredients[ $i];
            $quantite          = $quantites[ $i];
            
            $insert1_dans_bdd  = $pdo->enregistrerIngredient( $lib_ingredient, $id_cat_ingredient, $id_recette);
            $id_ingredient     = $pdo->getDernierId();
            $insert2_dans_bdd  = $pdo->enregistrerQuantite( $quantite, $id_ingredient); 
            
            if( $insert1_dans_bdd !== TRUE || $insert2_dans_bdd !== TRUE){
                $message = 'Echec. Veuillez réessayer.';
                include "vues/v_message.php";
                $ma_recette = $pdo->getMaRecette( $id_recette);
                foreach ( $ma_recette as $un_champ) {
                    $id_recette     = $un_champ[ 'id_rec'];
                    $titre_recette  = $un_champ[ 'lib_rec'];
                    $chapo_recette  = $un_champ[ 'chapo_rec'];
                    $nb_pers        = $un_champ[ 'nb_pers'];
                    $tps_prepa      = $un_champ[ 'tps_prepa'];
                    $tps_cuisson    = $un_champ[ 'tps_cuisson'];
                    $difficulte     = $un_champ[ 'difficulte'];
                    $text_recette   = $un_champ[ 'texte'];
                    $id_cat_recette = $un_champ[ 'id_cat_rec'];
                }
                $les_categories = $pdo->getCategories_Ingredients();
                $mes_ingredients = $pdo->getIngredients_MaRecette( $id_recette);
                include "vues/v_Admin_Modif_Recette2.php" ;
                $insert_error = true;
                break;
            }
        }
        if( ! $insert_error ){
            $message = 'Vos données ont été sauvegardées avec succès.';
            include "vues/v_message.php";
            $ma_recette = $pdo->getMaRecette( $id_recette);
            foreach ( $ma_recette as $un_champ) {
                $id_recette     = $un_champ[ 'id_rec'];
                $titre_recette  = $un_champ[ 'lib_rec'];
                $chapo_recette  = $un_champ[ 'chapo_rec'];
                $nb_pers        = $un_champ[ 'nb_pers'];
                $tps_prepa      = $un_champ[ 'tps_prepa'];
                $tps_cuisson    = $un_champ[ 'tps_cuisson'];
                $difficulte     = $un_champ[ 'difficulte'];
                $text_recette   = $un_champ[ 'texte'];
                $id_cat_recette = $un_champ[ 'id_cat_rec'];
            }
            $les_categories = $pdo->getCategories_Ingredients();
            $mes_ingredients = $pdo->getIngredients_MaRecette( $id_recette);
            include "vues/v_Admin_Modif_Recette2.php" ;
        }
        break;

//Modifier une Fiche Recette /étape2 >> passer à l'étape 3
    case 'finaliser_modif_ingredients':
        $id_recette    = $_POST[ 'id_recette'];
        $titre_recette = $_POST[ 'titre_recette'];
        $mes_images    = $pdo->getAllImages();
        include "vues/v_Admin_Modif_Recette3.php";
        break;

//Modifier une Fiche Recette /étape3
    case 'modifier_media':
        
        $id_recette    = $_POST[ 'id_recette'];
        $titre_recette = $_POST[ 'titre_recette'];
        $nom_image     = $_POST[ 'nom_image'];
        $format_image  = $_POST[ 'format_image'];
        
        if( empty( $nom_image) || empty( $format_image)){
            
            $message = '<br>Merci de remplir tous les champs. ';
            include "vues/v_message.php";
            include "vues/v_Admin_Modif_Recette3.php" ;
            
        }else{
            
            $insert_dans_bdd = $pdo->enregistrerMedia( $nom_image, $format_image, $id_recette);
               
               if( $insert_dans_bdd !== TRUE){
                    $message = 'Echec. Veuillez réessayer.';
                    include "vues/v_message.php";
                    include "vues/v_Admin_Modif_Recette3.php" ;
               }else{
                    $message = 'Sauvegarde réussie.';
                    include "vues/v_message.php";
               }
        }
        break;

//Supprimer une Fiche Recette
    case 'supprimer_recette':
        $id_recette = $_POST[ 'select_recette'];
        
        $delete_dans_bdd = $pdo->deleteRecette( $id_recette);
        if( $delete_dans_bdd !== TRUE){
                    $message = 'Echec. Veuillez réessayer.';
                    include "vues/v_message.php";
                    $les_recettes = $pdo->getAllRecettes();
                    include "vues/v_Admin_Suppr_Recette.php" ;
               }else{
                    $message = 'Votre recette a été supprimée avec succès.';
                    include "vues/v_message.php";
               }
        break;
}
?>