<?php
class compteBancaire{
    private $_numCpt;
    private $_solde;
    private $_titulaire;
    private $_decouvert;
    

    public function crediter(){
        
    }
    public function debiter(){
        
    }
    public function modifDecouv(){
        
    }
    public function affichage($origin,$msg){
        
    }
}

$andrea = new compteBancaire('mei1512',0,'MEINHARDT',0);
$andrea-> crediter(1500);
$andrea-> debiter(450);
$andrea-> crediter(25);
$andrea-> debiter(2500);
$andrea-> modifDecouv(2500);
$andrea-> debiter(1500);

?>