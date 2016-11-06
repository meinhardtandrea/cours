<?php

class compteBancaire {

    private $numCompte;
    private $solde;
    private $decouvert;
    private $titulaire;

    public function __construct($nom) {
        $this->numCompte .= $now;
        $this->solde = 0;
        $this->decouvert = 500;
        $uncompte = newcompte($nom);
        $now = date('Hi');
    }

    public function Titulaire() {
        return $this->titulaire;
    }

    public function NumCompte() {
        return $this->numCompte;
    }

    public function Decouvert() {
        return $this->decouvert;
    }

    public function Solde() {
        return $this->solde;
    }

// setters/mutateurs
    public function setDecouvert($val) {
        $this->decouvert = $val;
    }

    public function affichage($origin, $msg) {
        $affiche = 'vous avez ';
        $finaffiche = ' sur votre compte ' . $msg . ' &euro;<br/>';
        $finaffiche .= 'Vous &ecirc;tes ' . $this->titulaire . ' votre compte est le ';
        $finaffiche .= $this->numCompte;
        $finaffiche .= ', vous avez un solde actuel de ';
        $finaffiche .= $this->solde;
        $finaffiche .= ' &euro; et votre d&eacute;couvert autoris&eacute; est de ' .
                $this->decouvert . ' &euro;';
        switch ($origin) {
            case"debit":
                $affiche .= 'd&eacute;bit&eacute;';
                $affiche .= $finaffiche;
?>