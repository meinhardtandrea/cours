<?php

class Media extends Recette {
    
    private $_id_med;
    private $_lib_med;
    private $_format;
    
    public function getImage_Recette($id_recette){
        $requete  = "SELECT * FROM media WHERE id_rec = '$id_recette';";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->execute();

        $afficher = $resultat->fetchAll();
        return $afficher;
    }
}
?>

