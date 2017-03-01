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
        
        $titre_recette     = $_POST['titre_recette'];
        $id_cat_rec        = $_POST['categorie_recette'];
        $chapo_recette     = $_POST['chapo_recette'];
        $date              = $_POST['date'];
        $nb_pers           = $_POST['nb_pers'];
        $tps_prepa         = $_POST['tps_prepa'];
        $tps_cuisson       = $_POST['tps_cuisson'];
        $difficulte        = $_POST['difficulte'];
        $text_recette      = $_POST['text_recette'];
        
        
        if( empty($titre_recette) || empty($id_cat_rec) || empty($chapo_recette) || empty($date) || empty($nb_pers) || empty($tps_prepa) || empty($tps_cuisson) || empty($difficulte) || empty($text_recette)){
            
            $message = '<br>Merci de remplir tous les champs. ';
            include "vues/v_message.php";
            $les_categories = $pdo->getCategories_Recettes();
            include "vues/v_Admin_Recette.php" ;
            
        }else{
            
            $insert_dans_bdd = $pdo->enregistrerRecette($titre_recette,$chapo_recette,$date,$nb_pers,$tps_prepa,$tps_cuisson,$difficulte,$text_recette,$id_cat_rec);
               
               if($insert_dans_bdd !== TRUE){
                   $message = 'Echec. Veuillez réessayer.';
                   include "vues/v_message.php";
                   
               }else{
                   $message = 'Votre fiche recette a été créée avec succès. ';
                    include "vues/v_message.php";
               }
        }
        break;
}
?>