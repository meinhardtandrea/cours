<?php
class Train {
    public $_vitesse = 0 ;
    public $_enMarche = FALSE ;
    
    public function Ralentir($vit){
        if( ( ($this->_vitesse-$vit) <= $vit ) && $this->_enMarche == TRUE ){
            $this->_vitesse =  $this->_vitesse ;
            return $this->_vitesse ;
        }
        else{
            $this->_vitesse = 0 ;
            $this->_enMarche = FALSE ;
        }
    }    
    
    public function Accelerer($vit){
        if($this->_vitesse <= 100){
            $this->_vitesse += $vit ;
            return $this->_vitesse ;
        }
        else{
            echo 'Désolé, vous avez atteint la vitesse maximale.' ;
        }
    }
    public function Stopper(){
        $this->_vitesse = 0 ;
    }
    public function Demarrer(){ 
        $this->_vitesse = 0 ;  
    } 
    public function Monter(){
        $this->_vitesse = 0 ;
    }
}

$train888 = new Train() ;
$train888->Accelerer(50) ;
?>