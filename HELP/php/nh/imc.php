
    <!--<h1>Calcul de votre IMC:</h1>
    <form name="imc" method="post" action="imc.php">
        <p>Entrez votre pr&eacute;nom: <input name="prenom" type="text"></p>
        <p>Entrez votre taille: <input name="taille" type="number" step="0.01"></p>
        <p>Entrez votre poids: <input name="poids" type="number"></p>
        <p><input name="valider" type="submit" value="OK"></p>
    </form>-->

<?php
include('inc/header.inc.php');

if(!isset($_POST['valider'])){
    echo '<p>Erreur.</p>';
} else {
    $prenom=filter_input(INPUT_POST,'prenom');
    $taille=filter_input(INPUT_POST,'taille');
    $poids=filter_input(INPUT_POST,'poids');
    if($prenom==false){
        echo 'Veuillez remplir le pr&eacute;nom.';
    }elseif ($taille==false) {
        echo 'Veuillez entrer votre taille.';
    }elseif ($poids==false) {
        echo 'Veuillez entrer votre poids.';
    }  else {       
        
    $imc=$poids/($taille*$taille);
    echo '<p>Bonjour '.$prenom.'</p>';
    echo '<p>Votre IMC (indice de masse corporelle) est exactement : '. round($imc,2).'</p>';
    if($imc<16.5) {
        echo '<p>Vous &ecirc;tes en d&eacute;nutrition.</p>';
    }elseif($imc >= 16.5 && $imc < 18.5){
        echo 'Vous &ecirc;tes maigre.' ;       
    } elseif ($imc>=18.5 && $imc<25) {
        echo 'Vous avez une corpulence normale.';
    } elseif ($imc>=25 && $imc<30) {
        echo 'Vous &ecirc;tes en surpoids.';
    } elseif ($imc>=30 && $imc<35) {
        echo 'Vous en ob&eacute;sit&eacute; mod&eacute;r&eacute;e.';
    } elseif ($imc>=35 && $imc<40) {
        echo 'Vous &ecirc;tes en ob&eacute;sit&eacute; s&eacute;v&egrave;re.';
    } elseif ($imc>=40) {
        echo 'Vous &ecirc;tes en ob&eacute;sit&eacute; morbide.';
    }
 }
}
include('inc/footer.inc.php');
?>
   




