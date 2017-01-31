<?php
class Personnage {
    
//Les attributs :
    
    private $_force = 20;
    private $_degats = 5;
    private $_localisation;
    private $_experience = 10;
    
//Les accesseurs ou getters :
    
    public function force(){ //Accesseur ou getter renvoie la valeur de l'attribut force.
        return $this-> _force;
    }
    public function degats(){
        return $this-> _degats;
    }
    public function localisation(){
        return $this-> _localisation;
    }
    public function experience(){
        return $this-> _experience;
    }

//Les mutateurs ou setters :

    public function setForce(){
        $this-> _force = $force;
    }
    public function setDegats(){
        $this-> _degats = $degats;
    }
    public function setLocalisation(){
        $this->_localisation = $localisation;
    }

    public function setExperience(){
        $this->_experience = $experience;
    }

//Les methodes :
    
    public function parler(){
        echo 'Je suis le heros.<br />';
    }
    public function afficherExperience(){
        echo $this-> _experience . '<br />'; //Donne-moi la valeur de l'attribut $_experience.
    }
    public function frapper(Personnage $persoAfrapper){ //$persoAfrapper est ce qu'on appelle un paramètre. Un paramètre doit être un objet. On spécifie qu'il est du type Personnage (nom de la classe).
         echo $persoAfrapper-> _degats += $this-> _force . '<br />'; // Inflige (degats+force) !
    }
    public function gagnerExperience(){
        echo $this-> _experience++ . '<br />';
    }

}
$perso1 = new Personnage;
$perso2 = new Personnage;

$perso1-> parler(); //Affiche le message : Je suis le héros.
$perso1-> afficherExperience(); //Afficher le total de points d'experience = 10
$perso1-> gagnerExperience(); //Mon perso gagne +1 en expérience = 10+1
echo '<br />';

$perso1-> frapper($perso2); //20+5
echo '<br />';
$perso1-> gagnerExperience(); //11+1

echo '<br />';

$perso2-> frapper($perso1); //20+5
echo '<br />';
$perso2->gagnerExperience(); //10+1

echo '<br />';

?>
