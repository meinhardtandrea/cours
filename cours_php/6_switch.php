<?php
include 'Header.html';
?>
<form name="Formulaire_imc" method="POST" action="6_switch.php">
            Entrez votre prénom : <input type="text" name="prenom"/><br/><br/>
            Entrez votre taille (sous la forme 1.70) : <input type="text" name="taille"/><br/><br/>
            Entrez votre poids (en kilos) : <input type="number" name="poids"/><br/><br/>
            <input type="submit" name="valider" value="OK"/><br/>
        </form>
        <br><br>

<?php
if(isset($_POST['valider'])){
    $prenom=$_POST['prenom'];
    $taille=$_POST['taille'];
    $poids=$_POST['poids'];
    $imc=$poids/($taille*$taille);
    echo'Bonjour ' .$prenom. ',<br/>Votre IMC (indice de masse corporelle) est de : ' . round($imc,2) . '.<br/>' ;
    if($imc<16.5){
        $verdict='Vous êtes en état de dénutrition.';
    }
    elseif($imc<18.5){ 
        $verdict='Vous êtes de corpulence maigre.'; 
    }
    elseif ($imc<25) {
        $verdict='Vous êtes de corpulence normale.';
    }
    elseif ($imc<30) {
        $verdict='Vous êtes en surpoids.';
    }
    elseif ($imc<35) {
        $verdict="Vous êtes en état d'obésité modérée.";
    }
    elseif ($imc<40) {
        $verdict="Vous êtes en état d'obésité sévère.";    
    }
    else {
        $verdict="Vous êtes en état d'obésité morbide.";
    }
    echo $verdict . '</br></br></br>';
}
           
if(isset($imc)){   
    switch ($imc){
        case $imc<16.5 : //dénutritution
            echo '<a href="http://www.anorexie-et-boulimie.fr">Nous pouvons vous aider.</a>';
            break;
        case $imc<18.5 : //maigre
        case $imc<25 : //normal
            echo'MANGEZ ! BOUGEZ !';
            break;
        case $imc<30 : //surpoids
        case $imc<35 : //obésité modéré
        case $imc<40 : //obésité sévère
            echo 'Mangez 5 fruits et légumes par jour ! </br> Pratiquez une activité sportive régulièrement.';
            break;
        default :
            echo '<a href="http://www.cnao.fr/">Nous pouvons vous aider.</a>';
            break;
    }
}
else{
    echo'';
}
        ?>

<?php
include 'Footer.html';
?>