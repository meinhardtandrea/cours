<?php

class Client extends PdoNesti {
    
    private $_id_cli;
    private $_nom_cli;
    private $_prenom_cli;
    private $_civ_cli;
    private $_adr_cli;
    private $_cp_cli;
    private $_ville_cli;
    private $_email_cli;
    private $_tel_cli;
    private $_login_cli;
    private $_mdp_cli;
    

    public function enregistrerLogin($nom,$prenom,$civ,$adresse,$cp,$ville,$login,$tel,$login,$mdp_hash){
        $requete  = "INSERT INTO client (nom_cli,prenom_cli,civ_cli,adr_cli,cp_cli,ville_cli,email_cli,tel_cli,login_cli,mdp_cli) ";
        $requete .= "VALUES ('$nom','$prenom','$civ','$adresse','$cp','$ville','$login','$tel','$login','$mdp_hash');";
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
}
?>
