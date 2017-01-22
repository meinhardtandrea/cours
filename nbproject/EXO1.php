 <?php
class Ville {
   
    private $_nom ;
    private $_departement ;
    private $_numeroDPT ;
   
    public function __construct($nom, $departement, $numeroDPT){

        $this->_ville = $nom ;
        $this->_departement = $departement ;
        $this->_numeroDPT + $numeroDPT ;
   }
    public function Aff() { 
        return $msg = 'Ville' . $this->_nom . ' est dans le departement ' . $this->_departement ;
    }
}
    ?>