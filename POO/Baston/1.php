<?php
class Personnage {
    
// Accesseurs ou getters :
    private $_force;
    private $_degats;
    private $_experience;
    private $_localisation;
    
// Mutateurs ou setters :
    public function setForce(){
        $this->_force = $force;
    }
    public function setExperience(){
        $this->_experience = $experience;
    }

// Methodes :
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
    public function parler(){
        echo 'Je suis le héros.';
    }
    public function deplacer(){
        
    }
    public function frapper($persoAfrapper){
        $persoAfrapper-> _degats += $this-> _force;
    }
    public function gagnerExperience(){
        $this-> _experience++;
    }
    public function afficherExperience(){
        $this-> _experience;
    }

}

$perso1= new Personnage();
$perso2= new Personnage();

$perso1->setForce(10);
$perso1->setExperience(2);

$perso2->setForce(90);
$perso2->setExperience(23);

$perso1-> parler();
$perso1-> afficherExperience();

$perso1-> frapper($perso2);
$perso1-> gagnerExperience();

$perso2-> frapper($perso1);
$perso2-> gagnerExperience();

echo 'Le personnage 1 a ' . $perso1->force() . ' de force, contrairement au personnage 2  qui a ' . $perso2->force() . ' de force.<br />';
echo 'Le personnage 1 a ' . $perso1->experience() . " d'expérience, contrairement au personnage 2  qui a " . $perso2->experience() . " d'expérience.<br />";
echo 'Le personnage 1 a ' . $perso1->degats() . ' de dégâts, contrairement au personnage 2  qui a ' . $perso2->degats() . ' de dégâts.<br />';
?>