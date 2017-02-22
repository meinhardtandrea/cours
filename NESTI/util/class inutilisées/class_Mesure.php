<?php

class Mesure extends Recette {
    
    private $_id_mes;
    private $_quantite;
    
    public function getQuantite_Ingredient($id_recette){
        $requete  = "SELECT mesure.quantite, ingredient.lib_ing ";
        $requete .= "FROM nesti.mesure ";
        $requete .= "JOIN nesti.ingredient on mesure.id_ing = ingredient.id_ing ";
        $requete .= "WHERE mesure.id_rec = '$id_recette';";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->execute();

        $afficher = $resultat->fetchAll();
        return $afficher;
    }
}
?>

