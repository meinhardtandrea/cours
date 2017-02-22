<?php

class Recette extends Categories_Recettes {
    
    private $_id_rec;
    private $_lib_rec;
    private $_chapo_rec;
    private $_date;
    private $_nb_pers;
    private $_tps_prepa;
    private $_tps_cuisson;
    private $_difficulte;
    private $_texte;
    
    public function getRecettes($id_categorie_recette){
        $requete  = "SELECT * FROM recette WHERE id_cat_rec = '$id_categorie_recette';";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->execute();
        
        $afficher = $resultat->fetchAll();
        return $afficher;
    }
}
?>
