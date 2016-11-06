<?php

class Personne{
    private $nom;
    private$prenom;
    private $adresse;
   public function __construct($nom,$prenom,$adresse){
       $this->nom=$nom;
        $this->prenom=$prenom;
       $this->adresse=$adresse;
   publi funcion get personne(){
       
       $aff= $this->nom.' '.$ths->prenom.'habite'.$this->adresse;
       return $aff
   }      
       public function setadresse($adresse){
           $this->adresse= $adresse       }
   }
}

