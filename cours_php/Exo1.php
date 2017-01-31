<?php
class ville{
    
    // Test
    
    private $_nom;
    private $_departement;
    
    public function nom(){
        return $this-> _nom;
    }
    public function departement(){
        return $this-> _departement;
    }
    
    public function setNom(){
        $this-> _nom = $nom;
    }
    public function setDepartement(){
        $this-> _departement = $departement;
    }

    public function affichage(){
        echo 'La ville '. $this-> _nom . 'est dans le departement ' . $this-> _departement . '.<br />';
    }
}
$ville1 = new ville();
$ville1->setNom('Montpellier');
echo'<br />';
$ville1->setDepartement('Herault');
echo'<br />';
$ville1-> affichage();
echo'<br />';

?>