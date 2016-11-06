<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Personnage {
    
    private $_force;
    private $_degats;
    private $_experience;
    private $_localisation;
    
    
// Accesseurs ou getters : (Permet de lire mes attributs)
    public function force(){
        return $this->_force;
    }    
    public function degats(){
        return $this->_degats;
    }
    public function experience(){
        return $this->_experience;
    }
    public function localisation(){
        return $this->_localisation;
    }   
 
 
// Mutateurs ou setters : (Permet de modifier mes attributs.)
    public function setForce($force){
        $this->_force = $force;
    }
    public function setExperience($experience){
        $this->_experience = $experience;
    }
    public function setDegats($degats){
        $this->_degats = $degats;
    }
    public function setLocalisation($localisation){
        $this->_localisation = $localisation;
    }
  
    
// Constructeur : (Permet d'initialiser mes attributs.)
    public function __construct($force,$degats){ //!!! METTRE 2 UNDERSCORES !!!
        $this->setForce($force);
        $this->setDegats($degats);
        $this->_experience = 1;
    }

    
// Methodes :
    
    public function parler(){
        echo 'Je suis le héros.<br />';
    }
    public function deplacer(){
        
    }
    public function frapper($persoAfrapper){
        $persoAfrapper->_degats += $this->_force; //Quand persoA->frapper(persoB), calcul dégats+force donne le nouveau total de dégâts du persoB
    }
    public function gagnerExperience(){
        echo $this->_experience++ . '<br />';
    }
    public function afficherExperience(){
        echo $this->_experience . '<br />';
    }
}
?>