<?php

class Personne{
    private $_nom ;
    private $_prenom ;
    private $_adresse ;
    public function __construct($nom, $prenom, $adresse){
       $this->nom = $nom ;
       $this->prenom = $prenom ;
       $this->adresse = $adresse ;
    }
   public function getPersonne(){
       $aff = $this->_nom . ' ' . $this->_prenom . ' habite ' . $this->_adresse ;
       return $aff;
   }      
    public function setAdresse($adresse){
           $this->adresse= $adresse ;                     
    }
}

