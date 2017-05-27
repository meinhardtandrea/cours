<?php
abstract class Artistes {
    protected $prenom;
    protected $nom;

    public function __construct($prenom,$nom){
        $this->prenom = $prenom;
        $this->nom = $nom;
    }
    public function __set($var, $valeur) { $this->$var = $valeur; }
    public function __get($var) { return $this->$var; }
}

class Acteurs extends Artistes {
    private $tFilmsJoues = array();
    private $cachet;
    
    public function __construct($prenom, $nom, $tFilms){
        $this->tFilmsJoues = $tFilms;
        parent::__construct($prenom, $nom);
    }
    public function __set($var, $valeur) { $this->$var = $valeur; }
    public function __get($var) { return $this->$var; }
    public function __toString(){
        $aff = $this->prenom.' '.$this->nom.' a joué dans :<br/>';
        foreach($this->tFilmsJoues as $valeur){
            $aff .= $valeur.'<br/>';
        }
    return $aff;
    }
}

class Realisateurs extends Artistes {
    private $tFilmsRealises = array();    
    public function __construct($prenom, $nom, $tFilms){
        $this->tFilmsRealises = $tFilms;
        parent::__construct($prenom, $nom);
    }
    public function __set($var, $valeur) { $this->$var = $valeur; }
    public function __get($var) { return $this->$var; }
    public function __toString(){
        $aff = $this->prenom.' '.$this->nom.' a réalisé :<br/>';
        foreach($this->tFilmsRealises as $valeur){
            $aff .= $valeur.'<br/>';
        }
    return $aff;
    }
}

$films = array('Paris Texas','Blade Runner','Si loin si proche');
echo $acteur1 = new Acteurs('El','Nico',['Paris Texas','Blade Runner','Si loin si proche']);
$acteur1->__set('tFilmsJoues',['Paris Texas','Blade Runner','Si loin si proche','Blabla']);
echo '<br/>'.$acteur1;



?>