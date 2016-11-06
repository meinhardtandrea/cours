<?php
class compteBancaire {

    private $_numCompte;
    private $_solde;
    private $_decouvert;
    private $_titulaire;

    
// Accesseurs ou getters : (Permet de lire mes attributs)
    public function numCompte() {
        return $this->_numCompte;
    }
    public function solde() {
        return $this->_solde;
    }
    public function decouvert() {
        return $this->_decouvert;
    }
    public function titulaire() {
        return $this->_titulaire;
    }


// Mutateurs ou setters : (Permet de modifier les attributs)
    public function setNumCompte($numCompte){
        $this->_numCompte = $numCompte;
    }
    public function setSolde($solde){
        $this->_solde = $solde;
    }
    public function setDecouvert($decouvert) {
        $this->_decouvert = $decouvert;
    }
    public function setTitulaire($titulaire){
        $this->_titulaire = $titulaire;
    }


// Constructeur : (Permet d'initialiser les attributs)
    public function __construct($nom) { 
        $this->_titulaire = substr($nom,0,25);
        $this->_numCompte = substr($nom,0,3);
        $now = date('Hi');
        $this->_numCompte .= $now;
        $this->_solde = 0;
        $this->_decouvert = 500;
    }


// Methodes :
    public function affichage($origin, $msg) {
        $affiche = 'Vous avez ';
        $finaffiche = ' sur votre compte ' . $msg . ' &euro;<br/>';
        $finaffiche .= 'Vous &ecirc;tes ' . $this->_titulaire . ' votre compte est le ';
        $finaffiche .= $this->_numCompte;
        $finaffiche .= ', vous avez un solde actuel de ';
        $finaffiche .= $this->_solde;
        $finaffiche .= ' &euro; et votre d&eacute;couvert autoris&eacute; est de ' .
                $this->_decouvert . ' &euro;';
        switch ($origin) {
            case"debit":
                $affiche .= 'd&eacute;bit&eacute;';
                $affiche .= $finaffiche;

                break;
            case"credit":
                $affiche .= 'cr&eacute;dit&eacute;';
                $affiche .= $finaffiche;
                break;
            case"supdecouvert":
                $affiche = 'Vous ne pouvez retirer que ';
                $affiche .= $this->_decouvert + $this->_solde;
                $affiche .= '&euro; et non ' . $msg . '&euro;';
                break;
            default :
                $affiche = 'Erreur interne m&ethode incorrecte: ' . $origin;
                $affiche .= 'Vous avez saisi' . $msg;
        }
        echo $affiche . '<br/><br/>';
    }

    public function crediter($somme) {
        if ($somme > 0) {
            $this->_solde += $somme;
            $this->affichage('credit', $somme);
        } else {
            $this->affichage('cr&eacute;dit n&eacute;gatif', $somme);
        }
    }

    public function debiter($somme) {
        if ($somme > 0) {
            $soldemini = ($this->_decouvert + $this->_solde);
            $soldedemande = ($this->_solde + $somme);
            if ($soldemini >= $soldedemande) {
                $this->_solde -= $somme;
                $this->affichage('debit', $somme);
            } else {
                $this->affichage('supdecouvert', $somme);
            }
        } else {
            $this->affichage('d&eacute;bit n&eacute;gatif', $somme);
        }
    }

}

$compteR = new compteBancaire('Andréa');
$compteR->crediter(1500);
$compteR->debiter(450);
$compteR->crediter(25);
$compteR->debiter(2500);
$compteR->setDecouvert(2500);
$compteR->debiter(1500);
?>