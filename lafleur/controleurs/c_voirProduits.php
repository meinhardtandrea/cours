<?php
initPanier();

$action = $_REQUEST[ 'action'];

switch( $action) {
    
    case 'voirCategories': 
            $lesCategories = $pdo->getLesCategories();
            include( "vues/v_categories.php");
            break;
    
    case 'voirProduits' : 
            $lesCategories = $pdo->getLesCategories();
            include( "vues/v_categories.php");
            
            $idCategorie = $_REQUEST[ 'categorie'];
            $lesProduits = $pdo->getLesProduitsDeCategorie( $idCategorie);
            include( "vues/v_produits.php");
            break;
    
    case 'ajouterAuPanier' : 
            $idProduit   = $_REQUEST[ 'produit'];
            $idCategorie = $_REQUEST[ 'categorie'];
            
            $ok = ajouterAuPanier( $idProduit);
            if( !$ok) {
                $message = "Cet article est déjà dans le panier !!";
                include( "vues/v_message.php");
            }
            
            $lesCategories = $pdo->getLesCategories();
            include( "vues/v_categories.php");
            
            $lesProduits = $pdo->getLesProduitsDeCategorie( $idCategorie);
            include( "vues/v_produits.php");
            break;
    
}
?>

