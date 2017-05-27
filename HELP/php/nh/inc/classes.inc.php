<?php
class CategorieRecette {
    private $CodeCateg;
    private $NomCateg;
    
    public function __construct(){
        $this->CodeCateg = 1;
        $this->NomCateg = '';
    }
    
}


class Recette extends CategorieRecette {
    private $ingredients;
    private $difficulte;
    private $nb_personnes;
    private $datecrea;
    private $texte;
    private $nom;
    private $numero;
    public static $compteur = 0;
    
    public function __construct($nom){
        $this->nom = $nom;
        $this->difficulte = 1;
        $this->nb_personnes = 0;
        self::$compteur++;
        $this->numero =  self::$compteur;
        $this->datecrea = date("j/m/Y");
        $this->ingredients = array('1','2','3','4'); 
    }
    
    public function setTexte($texte){
        $this->texte = str($texte);
    }
    
    public function setIngredient($ing){
        $this->ingredients = array_push($this->ingredients,$ing);
    }
    
    public function setDifficulte($diff){
        $this->difficulte = $diff;
    }
    
    public function setNbPersonnes($nbpersonnes){
        $this->nb_personnes = $nbpersonnes;
    }
    
    public function Affichage(){
        $aff = '<p>Nom : '.$this->nom.'</p>';
        $aff .= '<p>Date : '.$this->datecrea.'</p>';
        $aff .= '<p>Difficulté : '.$this->difficulte.'</p>';
        $aff .= '<p>Texte : '.$this->texte.'</p>';
        $aff .= '<p>Nombre de personnes : '.$this->nb_personnes.'</p>';
        return $aff;
    }
    
    public function getIng(){
        $aff = '<p>Liste des ingrédients :';
        $aff .= '<ul>';
        foreach($this->ingredients as $index => $val){
            $aff .= '<li>'.$val.'</li>';
        }
        $aff .= '</ul></p>';
        return $aff;
    }
}



class Ingredients{
    private $AllIng = array('sel','poivre','huile','farine');
    
    public function SendIng($indices){
        $ingRecette='';
        $tab = explode('-',$indices);
        foreach($tab as $index => $val){
            $ingRecette .= $this->AllIng[$val].',';
        }
        return $ingRecette;
}
}





class Personne{
    private $nom;
    private $prenom;
    private $adresse;
    
    public function __construct($nom,$prenom,$adresse){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
    }
    
    public function getPersonne(){
        $aff = '<p>'.$this->nom.' '.$this->prenom.' habite à '.$this->adresse.'.</p>';
        return $aff;
    }
    
    public function setAdresse($adresse){
        $this->adresse = $adresse;
    }
    
    public function __destruct(){
        echo '<p>Fin (__destruct)</p>';
    }
}

class Ville{
    private $nom;
    private $dep;
    
    public function __construct($ville,$dep){
        $this->ville = $ville;
        $this->dep = $dep;
    }
    
    public function affVille(){
        $aff = '<p>Ville: '.$this->ville.'<br/>Département: '.$this->dep.'</p>';
        
        return $aff;
    }
}


class compteBancaire{
    private $numero;
    private $solde;
    private $nom;
    private $decouvert;
    private $numcompte;
    public static $nb_compte = 0;

    public function __construct($nom){
        $now = date('Hi');
        self::$nb_compte++;
        $this->numcompte=self::$nb_compte;
        $this->nom=substr($nom , 0,25);
        $this->numero=substr($nom , 0,3);
        $this->numero.=$now;
        $this->numero.=self::$nb_compte;
        $this->solde=0;
        $this->decouvert=-500;
    }
    
    public function affichage($origin,$mes){
        if($origin == 'credit'){
            $aff = '<p>Vous avez crédité votre compte de '.$mes.' &euro;. Compte numéro '.$this->numcompte.'.<br/>';
            $aff .= 'Vous êtes '.$this->nom.', votre compte est le '.$this->numero.', vous avez un solde de '.$this->solde.' après crédit de '.$mes.' et votre découvert autorisé est de '.$this->decouvert.'.</p>';
            echo $aff;
        } elseif($origin == 'debit'){
            $aff = '<p>Vous avez débité votre compte de '.$mes.' &euro;. Compte numéro '.$this->numcompte.'.<br/>';
            $aff .= 'Vous êtes '.$this->nom.', votre compte est le '.$this->numero.', vous avez un solde de '.$this->solde.' après débit de '.$mes.' et votre découvert autorisé est de '.$this->decouvert.'.</p>';
            echo $aff;
        } elseif($origin == 'insuf'){
            $aff = '<p>Opération impossible. Vous avez tenté de débiter votre compte de '.$mes.' &euro;. Compte numéro '.$this->numcompte.'.<br/>';
            $aff .= 'Vous êtes '.$this->nom.', votre compte est le '.$this->numero.', vous avez un solde de '.$this->solde.' après débit de '.$mes.' et votre découvert autorisé est de '.$this->decouvert.'.</p>';
            echo $aff;
        } elseif($origin == 'defdec'){
            $aff = '<p>Votre autorisation de découvert est désormais de '.$mes.' &euro;.</p>';
            echo $aff;
        } else {
            $aff = '<p>Erreur de traitement.</p>';
            echo $aff;
        }
    }
    
    public function crediter($cred){
        $this->solde+=$cred;
        $this->affichage('credit',$cred);
    }
    
    public function debiter($cred){
        if($this->solde - $cred > $this->decouvert){
            $this->solde-=$cred;
            $this->affichage('debit',$cred);
        } else {
            $this->affichage('insuf',$cred);
        }
    }
    
    public function setDecouvert($dec){
        $this->decouvert=$dec;
        $this->affichage('defdec',$dec);
    }
}


class IngRecette{
    private $AllIngRec = array('0-2-3','1-3','0-1-3');
    
    public function Sendlist($indice){
        return $this->AllIngRec[$indice];
    }
}

class TestRecette{
    public $AllRec=array('crepes','soupe','poulet');
    
    public function SendRec($indice){
        return $this->AllRec[$indice];
    }
}



class Train {
    private $vitesse;
    private $enMarche;
    const VITESSE_MAX = 100;
    public static $nb_trains = 0;

    public function __construct(){
        $this->vitesse=0;
        $this->enMarche=FALSE;
        self::$nb_trains++;
    }

    public function __destruct(){
        self::$nb_trains--;
    }


    public function Ralentir($vit){
        if(($this->vitesse - $vit) > 0){
            $this->vitesse-=$vit;
            $this->enMarche = TRUE;
        } else { 
            $this->vitesse = 0;
            $this->enMarche = FALSE;
            }
        return $this->vitesse;
    }
    
    public function Accelerer($vit){
        if(($this->vitesse + $vit) <= self::VITESSE_MAX){
            $this->vitesse+=$vit;
        } else {
            $this->vitesse = self::VITESSE_MAX;
            }
        if($this->vitesse > 0) $this->enMarche = TRUE;
        return $this->vitesse;
    }
    
    public function Stopper(){
        $this->vitesse = 0;
        $this->enMarche = FALSE;
        return $this->vitesse;
    }
    
    public function Monter(){
        if($this->enMarche == FALSE){ 
            $monter = '<p>Vous pouvez monter ou descendre du train.</p>';
        } else {
            $monter = '<p>Vous ne pouvez pas monter ou descendre du train.</p>';
        }
        return $monter;
    }
}
?>