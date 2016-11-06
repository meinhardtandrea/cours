<?php
class Train {
    public $vitesse= 0;
    public $enMarche= FALSE;
    
    public function Ralentir ($vit){
        if((($this-> vitesse-$vit) <= $vit) && $this-> enMarche== TRUE){
            $this-> vitesse=  $this->vitesse;
            return $this-> vitesse;
        }
        else{
            $this-> vitesse= 0;
            $this->enMarche=FALSE;
        }
    }    
    
    public function Accelerer ($vit){
        if($this-> vitesse<= 100){
            $this-> vitesse+= $vit;
            return $this-> vitesse;
        }
        else{
            echo 'Désolé, vous avez atteint la vitesse maximale.';
        }
    }
    public function Stopper (){
        $this-> vitesse= 0;
    }
    public function Demarrer (){
        $this-> vitesse= 0;   
    public function Monter (){
        $this->vitesse= 0;
    }
}
}
$train888=new Train();
$train888->Accelerer(50);

echo '';
?>