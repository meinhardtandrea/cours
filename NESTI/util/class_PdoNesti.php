<?php

class PdoNesti {

    private $_bdd;
    // Instance unique (statique) de PdoNesti
    private static $_classPdoNesti = NULL;
    private $_host;
    private $_dbName;
    private $_user;
    private $_password;
    // Erreur
    private $_derniereErreur;

    /**
     * Le __construct privé empêche de pouvoir instancier PdoNesti dans d'autres classes qu'elle-même
     */
    private function __construct() {
        // Récupération des données de connexion mysql dans le tableau global config
        $conf_mysql = $GLOBALS['config']['mysql_connexion'];
        $this->_host = $conf_mysql['host'];
        $this->_dbName = $conf_mysql['dbname'];
        $this->_user = $conf_mysql['user'];
        $this->_password = $conf_mysql['password'];
        // Instanciation du PDO
        $this->_bdd = new PDO('mysql:host=' . $this->_host . ';dbname=' . $this->_dbName, $this->_user, $this->_password);
        $this->_bdd->query("SET CHARACTER SET utf8");
    }


    /**
     * Le seul moyen d'obtenir l'instance de PdoNesti est de passer par cette méthode
     */
    public static function getPdoNesti() {
        if (PdoNesti::$_classPdoNesti == NULL) {
            PdoNesti::$_classPdoNesti = new PdoNesti();
        }
        return PdoNesti::$_classPdoNesti;
    }
    
    /**
     * Execute et affiche le(s) erreur(s) suite à une demande de requête
     */
    private function execute_avec_affichage_erreur( PDOStatement $statement){
        $res= $statement->execute();
        if( $res === false){
            if($GLOBALS['config']['show_all_errors'] == true) {
                var_dump( $statement->errorCode(), $statement->errorInfo());
            }
            $this->_derniereErreur = $statement->errorInfo();
        } else {
            $this->_derniereErreur = null;
        }
        return $res;
    }

    public function get_last_error_code(){
        return $this->_derniereErreur[0];
    }
    
    public function enregistrerLogin( $nom, $prenom, $civ, $adresse, $cp, $ville, $login, $tel, $login, $mdp_hash) {
        $requete  = "INSERT INTO client (nom_cli,prenom_cli,civ_cli,adr_cli,cp_cli,ville_cli,email_cli,tel_cli,login_cli,mdp_cli) ";
        $requete .= "VALUES (:nom,:prenom,:civ,:adresse,:cp,:ville,:login,:tel,:login,:mdp_hash) ;";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->bindParam( ':nom', $nom);
        $resultat->bindParam( ':prenom', $prenom);
        $resultat->bindParam( ':civ', $civ);
        $resultat->bindParam( ':adresse', $adresse);
        $resultat->bindParam( ':cp', $cp);
        $resultat->bindParam( ':ville', $ville);
        $resultat->bindParam( ':login', $login);
        $resultat->bindParam( ':tel', $tel);
        $resultat->bindParam( ':mdp_hash', $mdp_hash);
        $resume = $this->execute_avec_affichage_erreur( $resultat);
        return $resume;
    }

    public function getMdp( $login) {
        $requete  = "SELECT mdp_cli FROM nesti.client WHERE login_cli = :login ;";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->bindParam( ':login', $login);
        $resume = $this->execute_avec_affichage_erreur( $resultat);

        while ($donnees = $resultat->fetch()) {
            return $donnees['mdp_cli'];
        }
    }
    
    public function enregistrerMdp( $login, $mdp_hash){
        $requete  = "UPDATE nesti.client ";
        $requete .= "SET mdp_cli=:mdp_hash";
        $requete .= "WHERE login_cli=:login ;";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->bindParam( ':login', $login);
        $resultat->bindParam( ':mdp_hash', $mdp_hash);
        $resume = $this->execute_avec_affichage_erreur( $resultat);
        return $resume;
    }

    public function getProfil( $login) {
        $requete  = "SELECT * FROM nesti.client WHERE login_cli = :login ;";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->bindParam( ':login', $login);
        $resume = $this->execute_avec_affichage_erreur( $resultat);
        
        $afficher = $resultat->fetchAll();
        return $afficher;
    }

    public function modifierProfil( $login, $new_nom, $new_prenom, $new_civ, $new_adresse, $new_cp, $new_ville, $new_login, $new_tel) {
        $requete  = "UPDATE nesti.client ";
        $requete .= " SET nom_cli=:new_nom,prenom_cli=:new_prenom,civ_cli=:new_civ,adr_cli=:new_adresse,cp_cli=:new_cp,ville_cli=:new_ville,email_cli=:new_login1,tel_cli=:new_tel,login_cli=:new_login2";
        $requete .= " WHERE login_cli=:login ;";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->bindParam( ':new_nom', $new_nom);
        $resultat->bindParam( ':new_prenom', $new_prenom);
        $resultat->bindParam( ':new_civ', $new_civ);
        $resultat->bindParam( ':new_adresse', $new_adresse);
        $resultat->bindParam( ':new_cp', $new_cp);
        $resultat->bindParam( ':new_ville', $new_ville);
        $resultat->bindParam( ':new_login1', $new_login);
        $resultat->bindParam( ':new_login2', $new_login);
        $resultat->bindParam( ':new_tel', $new_tel);
        $resultat->bindParam( ':login', $login);
        $resume = $this->execute_avec_affichage_erreur( $resultat);
        return $resume;
    }

    public function getCategories_Ingredients() {
        $requete  = 'SELECT * FROM cat_ingredient ;';
        $resultat = $this->_bdd->prepare($requete);
        $resume = $this->execute_avec_affichage_erreur( $resultat);

        $afficher = $resultat->fetchAll();
        return $afficher;
    }

    public function getId_newIngredient( $lib_ingredient){
        $requete =  "SELECT id_ing FROM ingredient WHERE lib_ing = :lib_ingredient ;";
        $resultat = $this->_bdd->prepare( $requete);
        $resultat->bindParam( ':lib_ingredient', $lib_ingredient);
        $resume = $this->execute_avec_affichage_erreur( $resultat);
        while ($donnees = $resultat->fetch()) {
            return $donnees['id_inggetId_newIngredient'];
        }
        return null;
    }
    
    public function enregistrerIngredient( $lib_ingredient,$id_cat_ingredient,$id_recette) {
        $requete  = "INSERT INTO ingredient (lib_ing,id_cat_ing,id_rec) ";
        $requete .= "VALUES (:lib_ingredient,:id_cat_ingredient,:id_recette) ;";
        $resultat = $this->_bdd->prepare( $requete);
        $resultat->bindParam( ':lib_ingredient', $lib_ingredient);
        $resultat->bindParam( ':id_cat_ingredient', $id_cat_ingredient);
        $resultat->bindParam( ':id_recette', $id_recette);
        $resume = $this->execute_avec_affichage_erreur( $resultat);
        return $resume;
    }

    public function updateIngredient( $id_ingredient, $lib_ingredient, $id_cat_ingredient, $id_recette) {
        $requete  = "UPDATE nesti.ingredient ";
        $requete .= " SET lib_ing=:lib_ingredient,id_cat_ing=:id_cat_ingredient,id_rec=:id_recette";
        $requete .= " WHERE id_rec=:id_recette";
        $requete .= " AND id_ing=:id_ingredient ;";
        $resultat = $this->_bdd->prepare( $requete);
        $resultat->bindParam( ':id_ingredient', $id_ingredient);
        $resultat->bindParam( ':lib_ingredient', $lib_ingredient);
        $resultat->bindParam( ':id_cat_ingredient', $id_cat_ingredient);
        $resultat->bindParam( ':id_recette', $id_recette);
        $resume = $this->execute_avec_affichage_erreur( $resultat);
        return $resume;
    }
    
    public function deleteIngredient( $id_ingredient, $id_recette) {
        $requete  = "DELETE FROM nesti.ingredient ";
        $requete .= " WHERE id_ing=:id_ingredient";
        $requete .= " AND id_rec=:id_recette ;";
        $resultat = $this->_bdd->prepare( $requete);
        $resultat->bindParam( ':id_ingredient', $id_ingredient);
        $resultat->bindParam( ':id_recette', $id_recette);
        $resume = $this->execute_avec_affichage_erreur( $resultat);
        return $resume;
    }

    public function getIngredients_MaRecette( $id_recette) {
        $requete  = "SELECT ingredient.*, cat_ingredient.lib_cat_ing";
        $requete .= " FROM nesti.ingredient";
        $requete .= " JOIN nesti.cat_ingredient on ingredient.id_cat_ing = cat_ingredient.id_cat_ing";
        $requete .= " WHERE ingredient.id_rec = :id_recette ;";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->bindParam( ':id_recette', $id_recette);
        $resume = $this->execute_avec_affichage_erreur( $resultat);

        $afficher = $resultat->fetchAll();
        return $afficher;
    }
    
    public function getQuantite_Ingredient( $id_recette) {
        $requete  = "SELECT mesure.quantite, ingredient.lib_ing ";
        $requete .= "FROM nesti.mesure ";
        $requete .= "JOIN nesti.ingredient on mesure.id_ing = ingredient.id_ing ";
        $requete .= "WHERE ingredient.id_rec = :id_recette ;";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->bindParam( ':id_recette', $id_recette);
        $resume = $this->execute_avec_affichage_erreur( $resultat);

        $afficher = $resultat->fetchAll();
        return $afficher;
    }
    
    public function enregistrerQuantite( $quantite,$id_ingredient) {
        $requete  = "INSERT INTO mesure (quantite,id_ing) ";
        $requete .= "VALUES (:quantite,:id_ingredient);";
        $resultat = $this->_bdd->prepare( $requete);
        $resultat->bindParam( ':quantite', $quantite);
        $resultat->bindParam( ':id_ingredient', $id_ingredient);
        $resume = $this->execute_avec_affichage_erreur( $resultat);
        return $resume;
    }

    public function updateQuantite( $quantite, $id_ingredient) {
        $requete  = "UPDATE nesti.mesure";
        $requete .= " SET quantite=:quantite";
        $requete .= " WHERE id_ing=:id_ingredient ;";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->bindParam( ':quantite', $quantite);
        $resultat->bindParam( ':id_ingredient', $id_ingredient);
        $resume = $this->execute_avec_affichage_erreur( $resultat);
        return $resume;
    }
    
    public function deleteQuantite( $id_quantite, $id_ingredient) {
        $requete  = "DELETE FROM nesti.mesure";
        $requete .= " WHERE id_ing=:id_ingredient";
        $requete .= " AND id_mes=:id_quantite ;";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->bindParam( ':id_quantite', $id_quantite);
        $resultat->bindParam( ':id_ingredient', $id_ingredient);
        $resume = $this->execute_avec_affichage_erreur( $resultat);
        return $resume;
    }

    public function getQuantites_MaRecette( $id_ingredient) {
        $requete  = "SELECT * FROM mesure WHERE id_ing = :id_ingredient ;";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->bindParam( ':id_ingredient', $id_ingredient);
        $resume = $this->execute_avec_affichage_erreur( $resultat);

        $afficher = $resultat->fetchAll();
        return $afficher;
    }

    public function getCategories_Recettes() {
        $requete  = 'SELECT * FROM cat_recette ;';
        $resultat = $this->_bdd->prepare($requete);
        $resume = $this->execute_avec_affichage_erreur( $resultat);

        $afficher = $resultat->fetchAll();
        return $afficher;
    }
    
    public function getAllRecettes() {
        $requete  = "SELECT * FROM recette ;";
        $resultat = $this->_bdd->prepare($requete);
        $resume = $this->execute_avec_affichage_erreur( $resultat);

        $afficher = $resultat->fetchAll();
        return $afficher;
    }
    
    public function getRecettes( $id_categorie_recette) {
        $requete  = "SELECT * FROM recette WHERE id_cat_rec = :id_categorie_recette ;";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->bindParam( ':id_categorie_recette', $id_categorie_recette);
        $resume = $this->execute_avec_affichage_erreur( $resultat);

        $afficher = $resultat->fetchAll();
        return $afficher;
    }
    
    public function getMaRecette( $id_recette) {
        $requete  = "SELECT * FROM recette WHERE id_rec = :id_recette ;";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->bindParam( ':id_recette', $id_recette);
        $resume = $this->execute_avec_affichage_erreur( $resultat);

        $afficher = $resultat->fetchAll();
        return $afficher;
    }
    
    public function getRecettesDESC() {
        $requete  = "SELECT * FROM recette ORDER BY id_rec DESC;;";
        $resultat = $this->_bdd->prepare($requete);
        $resume = $this->execute_avec_affichage_erreur( $resultat);

        $afficher = $resultat->fetchAll();
        return $afficher;
    }

    public function enregistrerRecette( $titre_recette, $chapo_recette, $nb_pers, $tps_prepa, $tps_cuisson, $difficulte, $text_recette, $id_cat_rec) {
        date_default_timezone_set( 'Europe/Paris');
        $date = date( 'Y-m-d');
        $requete  = "INSERT INTO recette (lib_rec,chapo_rec,date,nb_pers,tps_prepa,tps_cuisson,difficulte,texte,id_cat_rec) ";
        $requete .= "VALUES (:titre_recette,:chapo_recette,:date,:nb_pers,:tps_prepa,:tps_cuisson,:difficulte,:text_recette,:id_cat_rec) ;";
        $resultat = $this->_bdd->prepare( $requete);
        $resultat->bindParam( ':titre_recette', $titre_recette);
        $resultat->bindParam( ':chapo_recette', $chapo_recette);
        $resultat->bindParam( ':date', $date);
        $resultat->bindParam( ':nb_pers', $nb_pers);
        $resultat->bindParam( ':tps_prepa', $tps_prepa);
        $resultat->bindParam( ':tps_cuisson', $tps_cuisson);
        $resultat->bindParam( ':difficulte', $difficulte);
        $resultat->bindParam( ':text_recette', $text_recette);
        $resultat->bindParam( ':id_cat_rec', $id_cat_rec);
        $resume = $this->execute_avec_affichage_erreur( $resultat);
        return $resume;
    }
    
    public function getId_newRecette( $titre_recette) {
        $requete =  "SELECT id_rec FROM nesti.recette WHERE lib_rec = :titre_recette ;";
        $resultat = $this->_bdd->prepare( $requete);
        $resultat->bindParam( ':titre_recette', $titre_recette);
        $resume = $this->execute_avec_affichage_erreur( $resultat);
        
        while ($donnees = $resultat->fetch()) {
            return $donnees['id_rec'];
        }
    }
    
    public function modifierRecette( $id_recette,$titre_recette,$chapo_recette,$nb_pers,$tps_prepa,$tps_cuisson,$difficulte,$text_recette,$id_cat_recette) {
        $requete  = "UPDATE nesti.recette ";
        $requete .= " SET id_rec=:id_recette,lib_rec=:titre_recette,chapo_rec=:chapo_recette,nb_pers=:nb_pers,tps_prepa=:tps_prepa,tps_cuisson=:tps_cuisson,difficulte=:difficulte,texte=:text_recette,id_cat_rec=:id_cat_recette";
        $requete .= " WHERE id_rec=:id_recette ;";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->bindParam( ':id_recette', $id_recette);
        $resultat->bindParam( ':titre_recette', $titre_recette);
        $resultat->bindParam( ':chapo_recette', $chapo_recette);
        $resultat->bindParam( ':nb_pers', $nb_pers);
        $resultat->bindParam( ':tps_prepa', $tps_prepa);
        $resultat->bindParam( ':tps_cuisson', $tps_cuisson);
        $resultat->bindParam( ':difficulte', $difficulte);
        $resultat->bindParam( ':text_recette', $text_recette);
        $resultat->bindParam( ':id_cat_recette', $id_cat_recette);
        $resume = $this->execute_avec_affichage_erreur( $resultat);
        return $resume;
    }
    
    public function deleteRecette( $id_recette) {
        $requete  = "DELETE FROM nesti.recette";
        $requete .= " WHERE id_rec=:id_recette ;";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->bindParam( ':id_recette', $id_recette);
        $resume = $this->execute_avec_affichage_erreur( $resultat);
        return $resume;
    }

    public function getImage_Recette( $id_recette) {
        $requete  = "SELECT * FROM media WHERE id_rec = :id_recette ;";
        $resultat = $this->_bdd->prepare( $requete);
        $resultat->bindParam( ':id_recette', $id_recette);
        $resume = $this->execute_avec_affichage_erreur( $resultat);
        
        $afficher = $resultat->fetchAll();
        return $afficher;
    }
    
    public function getAllImages() {
        $requete  = "SELECT * FROM media ;";
        $resultat = $this->_bdd->prepare($requete);
        $resume = $this->execute_avec_affichage_erreur( $resultat);

        $afficher = $resultat->fetchAll();
        return $afficher;
    }

    public function enregistrerMedia( $nom_image, $format_image, $id_recette) {
        $requete  = "INSERT INTO media (lib_med,format,id_rec) ";
        $requete .= "VALUES (:nom_image,:format_image,:id_recette) ;";
        $resultat = $this->_bdd->prepare( $requete);
        $resultat->bindParam( ':nom_image', $nom_image);
        $resultat->bindParam( ':format_image', $format_image);
        $resultat->bindParam( ':id_recette', $id_recette);
        $resume = $this->execute_avec_affichage_erreur( $resultat);
        return $resume;
    }
    
    public function updateMedia( $id_image, $nom_image, $format_image, $id_recette) {
        $requete  = "UPDATE nesti.media";
        $requete .= " SET lib_med=:nom_image,format=:format_image";
        $requete .= " WHERE id_rec=:id_recette";
        $requete .= " AND id_med=:id_image ;";
        $resultat = $this->_bdd->prepare($requete);
        $resultat->bindParam( ':id_image', $id_image);
        $resultat->bindParam( ':nom_image', $nom_image);
        $resultat->bindParam( ':format_image', $format_image);
        $resultat->bindParam( ':id_recette', $id_recette);
        $resume = $this->execute_avec_affichage_erreur( $resultat);
        return $resume;
    }

    public function getDernierId() {
        return $this->_bdd->lastInsertId();
    }
    
}

?>