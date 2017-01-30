<?php

class PdoNesti {
    
    private static $_bdd;
    private static $_classPdoNesti = NULL;
    private static $_host = 'mysql:host=localhost';
    private static $_dbName = 'dbname=nesti';
    private static $_user = 'root';
    private static $_password = 'root';
    
    public function __construct(){
        PdoNesti::$_bdd = new PDO(PdoNesti::$_host . ';' . PdoNesti::$_dbName, PdoNesti::$_user, PdoNesti::$_password);
        PdoNesti::$_bdd->query("SET CHARACTER SET utf8");
    }
    public function __destruct() {
        PdoNesti::$_bdd = NULL;
    }
    
    public static function getPdoNesti(){
        if(PdoNesti::$_classPdoNesti == NULL){
            PdoNesti::$_classPdoNesti = new PdoNesti();
        }
        return PdoNesti::$_classPdoNesti;
    }

    public function getCategories_Ingredients(){
        $requete = 'SELECT * FROM cat_ingredient';
        $resultat = PdoNesti::$_bdd->prepare($requete);
        $resultat->execute();
        
        $afficher = $resultat->fetchAll();
        return $afficher;
    }
    public function getCategories_Recettes(){
        $requete = 'SELECT * FROM cat_recette';
        $resultat = PdoNesti::$_bdd->prepare($requete);
        $resultat->execute();
        
        $afficher = $resultat->fetchAll();
        return $afficher;
    }
}
?>
