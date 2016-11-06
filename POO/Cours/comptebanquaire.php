<?php
class compteBancaire{
private $numCompte ;
private $solde ;
private $decouvert ;
private $titulaire ;
public function __construct($nom){ //le constructeur
$this->titulaire= substr($nom,0,25);
$this->numCompte=substr($nom,0,3);
$now=date('Hi');
$this->numCompte.=$now;
$this->solde=0;
$this->decouvert=500;
}
// getters/accesseurs
public function Titulaire(){ return $this->titulaire;}
public function NumCompte() {return $this->numCompte;}
public function Decouvert() {return $this->decouvert;}
public function Solde() {return $this->solde;}
// setters/mutateurs
public function setDecouvert($val) {
$this->decouvert=$val;}
public function affichage($origin, $msg){
$affiche='vous avez ';
$finaffiche=' sur votre compte '.$msg.' &euro;<br/>';
$finaffiche.='Vous &ecirc;tes '.$this->titulaire.' votre compte est le ';
$finaffiche.=$this->numCompte;
$finaffiche.=', vous avez un solde actuel de ';
$finaffiche.=$this->solde;
$finaffiche.=' &euro; et votre d&eacute;couvert autoris&eacute; est de '.
$this->decouvert.' &euro;';
switch ($origin){
case"debit":
$affiche.='d&eacute;bit&eacute;';
$affiche.=$finaffiche;

break;
case"credit":
$affiche.='cr&eacute;dit&eacute;';
$affiche.=$finaffiche;
break;
case"supdecouvert":
$affiche='Vous ne pouvez retirer que ';
$affiche.=$this->decouvert+$this->solde;
$affiche.='&euro; et non '.$msg.'&euro;';
break;
default :
$affiche='Erreur interne m&ethode incorrecte: '.$origin;
$affiche.='Vous avez saisi'.$msg;
}
echo $affiche.'<br/><br/>';
}
public function crediter($somme){
if ($somme>0){
$this->solde+=$somme;
$this->affichage('credit',$somme);
}else{ $this->affichage('cr&eacute;dit n&eacute;gatif',$somme);}
}
public function debiter($somme){
if ($somme>0){
$soldemini=($this->decouvert + $this->solde);
$soldedemande=($this->solde+$somme);
if($soldemini>=$soldedemande){
$this->solde-=$somme;
$this->affichage('debit',$somme);
}else{$this->affichage('supdecouvert',$somme);}
}else{ $this->affichage('d&eacute;bit n&eacute;gatif',$somme);}
}
}
$compteR = new compteBancaire('Robert');
$compteR->crediter(1500);
$compteR->debiter(450);
$compteR->crediter(25);
$compteR->debiter(2500);
$compteR->setDecouvert(2500);
$compteR->debiter(1500);
?>