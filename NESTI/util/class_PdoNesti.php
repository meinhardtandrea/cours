<?php

class PdoNesti {
    
    private $_bdd;
    // Instance unique (statique) de PdoNesti
    private static $_classPdoNesti = NULL;
    private $_host;// = 'localhost';
    private $_dbName;// = 'nesti';
    private $_user;// = 'root';
    private $_password;// = '';
    
    /**
     * Le __construct privé empêche de pouvoir instancier PdoNesti dans d'autres classes qu'elle-même
     */
    private function __construct(){
        // Récupération des données de connexion mysql dans le tableau global config
        $conf_mysql= $GLOBALS[ 'config'][ 'mysql_connexion'];
        $this->_host= $conf_mysql[ 'host'];
        $this->_dbName= $conf_mysql[ 'dbname'];
        $this->_user= $conf_mysql[ 'user'];
        $this->_password= $conf_mysql[ 'password'];
        // Instanciation du PDO
        $this->_bdd = new PDO( 'mysql:host=' . $this->_host . ';dbname=' . $this->_dbName, $this->_user, $this->_password);
        $this->_bdd->query("SET CHARACTER SET utf8");
    }
    public function __destruct() {
        $this->_bdd = NULL;
    }

    /**
     * Le seul moyen d'obtenir l'instance de PdoNesti est de passer par cette méthode
     */
    public static function getPdoNesti(){
        if(PdoNesti::$_classPdoNesti == NULL){
            PdoNesti::$_classPdoNesti = new PdoNesti();
        }
        return PdoNesti::$_classPdoNesti;
    }
    
    public function enregistrerLogin($nom,$prenom,$civ,$adresse,$cp,$ville,$login,$tel,$login,$mdp_hash){
        $requete  = "INSERT INTO client (nom_cli,prenom_cli,civ_cli,adr_cli,cp_cli,ville_cli,email_cli,tel_cli,login_cli,mdp_cli) ";
        $requete .= "VALUES ('$nom','$prenom','$civ','$adresse','$cp','$ville','$login','$tel','$login','$mdp_hash')";
        $resultat = $this->_bdd->prepare($requete);
        $resume = $resultat->execute();
        return $resume;
    }
    public function getMdp($login){
        $requete  = "SELECT mdp_cli FROM nesti.client WHERE login_cli = '$login';";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->execute();
        
        while($donnees = $resultat->fetch()){
            return $donnees['mdp_cli'];
        }
    }
    
    public function getCategories_Ingredients(){
        $requete = 'SELECT * FROM cat_ingredient';
        $resultat = $this->_bdd->prepare($requete);
        $resultat->execute();
        
        $afficher = $resultat->fetchAll();
        return $afficher;
    }
    public function getIngredients($id_recette){
        $requete = "SELECT * FROM ingredient WHERE id_rec = '$id_recette';";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->execute();
        
        $afficher = $resultat->fetchAll();
        return $afficher;
    }
    public function getCategories_Recettes(){
        $requete = 'SELECT * FROM cat_recette';
        $resultat = $this->_bdd->prepare($requete);
        $resultat->execute();
        
        $afficher = $resultat->fetchAll();
        return $afficher;
    }
    public function getRecettes($id_categorie_recette){
        $requete = "SELECT * FROM recette WHERE id_cat_rec = '$id_categorie_recette';";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->execute();
        
        $afficher = $resultat->fetchAll();
        return $afficher;
    }
}
?>
