<?php
abstract class Artistes {
    protected $_prenom, $_nom ; 
    public function __construct($prenom, $nom) {
        $this->_prenom = $prenom ;
        $this->_nom = $nom ;
    }
    public function __get($name) { return $this->$name ; } 
    public function __set($name, $value) { $this->$name = $value ; }
}
class Realisateurs extends Artistes {
    private $_FilmsRealises ;    
    public function __construct($prenom, $nom, $filmsReal) {
        parent::__construct($prenom, $nom) ;
        $this->_FilmsRealises = $filmsReal ;
    }
    public function __get($name) { return $this->$name ; } 
    public function __set($name, $value) { $this->$name = $value ; }
    public function __toString() {
        $concat = $this->_prenom . ' ' ;
        $concat .= $this->_nom . ' a réalisé ' ;
        $concat .= $this->_FilmsRealises . '. ' ;
        return $concat . '<br>' ;
    }
}
class Acteurs extends Artistes {
    private $_FilmsJoues , $_cachet ;    
    public function __construct($prenom, $nom, $filmsJoues) {
        parent::__construct($prenom, $nom) ;
        $this->_FilmsJoues = $filmsJoues ;
    }
    public function __get($name) { return $this->$name ; } 
    public function __set($name, $value) { $this->$name = $value ; }
    public function __toString() {
        $array = array (
            '<b>Prénom : </b>' . $this->_prenom ,
            '<b>Nom : </b>' . $this->_nom ,
            '<b>Nom du film : </b>' . $this->_FilmsJoues ,
        ) ;
        $concat = "<br> Acteur " ;
        foreach ($array as $key => $valeur) {
            $concat .= '<br>- ' . $valeur ;
        }
        return $concat . '<br>' ;
    }
}
$tarentino = new Realisateurs('Quentin', 'Tarentino','Django');
echo $tarentino;
$tarentino->__set( '_FilmsRealises', 'Django Unchained');
echo $tarentino;
?>