<?php

class compteBancaire {

    private $_numCompte ;
    private $_solde ;
    private $_decouvert ;
    private $_titulaire ;

    public function __construct($nom) {
        $this->_numCompte .= $now ;
        $this->_solde = 0 ;
        $this->_decouvert = 500 ;
        $uncompte = newcompte($nom);
        $now = date('Hi');
    }

    public function Titulaire() {
        return $this->_titulaire ;
    }

    public function NumCompte() {
        return $this->_numCompte ;
    }

    public function Decouvert() {
        return $this->_decouvert ;
    }

    public function Solde() {
        return $this->_solde ;
    }

// setters/mutateurs
    public function setDecouvert($val) {
        $this->_decouvert = $val ;
    }

    public function affichage($msg) {
        $affiche  = 'Vous avez sur votre compte ' . $msg . ' euros. <br/>' ;
        $affiche .= 'Vous êtes ' . $this->titulaire . '. <br />' ;
        $affiche .= 'Votre compte est le ' . $this->numCompte . '. <br />' ;
        $affiche .= 'Vous avez un solde actuel de ' . $this->solde . '. euros. <br />' ;
        $affiche .= 'Votre découvert autorisé est de ' . $this->decouvert . ' euros. <br />';
    }
}
?>