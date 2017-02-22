<?php

class Categories_Ingredients extends PdoNesti {
    
    private $_id_cat_ing;
    private $_lib_cat_ing;    
    
    public function getCategories_Ingredients(){
        $requete  = 'SELECT * FROM cat_ingredient;';
        $resultat = $this->_bdd->prepare($requete);
        $resultat->execute();
        
        $afficher = $resultat->fetchAll();
        return $afficher;
    } 
}
?>