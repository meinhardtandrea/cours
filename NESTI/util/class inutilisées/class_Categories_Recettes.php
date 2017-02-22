<?php

class Categories_Recettes extends PdoNesti {
    
    private $_id_cat_rec;
    private $_lib_cat_rec;
    
    public function getCategories_Recettes(){
        $requete  = 'SELECT * FROM cat_recette;';
        $resultat = $this->_bdd->prepare($requete);
        $resultat->execute();
        
        $afficher = $resultat->fetchAll();
        return $afficher;
    }
}
?>