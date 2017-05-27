<?php
function testerConstante($min_length, $max_length_nom, $max_length_prenom){
if (isset($_POST["nom"])) $nom = strtoupper($_POST["nom"]);
else $nom="";
if (isset($_POST["prenom"])) $prenom = strtolower($_POST["prenom"]);
else $prenom="";

if((isset($_POST['valider']) and isset($nom) and isset($prenom)) and (ctype_alpha($nom) and ctype_alpha($prenom))){
        if(strlen($nom) < $min_length or strlen($nom > $max_length_nom)){ $testConst = '<p>Erreur de saisie dans le nom</p>'."\n"; }
        elseif(strlen($prenom) < $min_length or strlen($prenom > $max_length_prenom)){ $testConst = '<p>Erreur de saisie dans le prenom</p>'."\n"; }
        else {
            $testConst = '<p>'. ACCUEIL .' '. $nom .' '. $prenom .' '. SIO .'.</p>'."\n";
        }
    } else {
        $testConst = '<p>Erreur de saisie</p>'."\n";
    }

return $testConst;
}


function afficher_heure(){
$heure = date('G');
if($heure >= 8 && $heure < 12){
    $affiche = 'Je travaille.';
} elseif($heure >= 12 && $heure < 13){
    $affiche = 'Je mange.';    
} elseif($heure >= 13 && $heure < 14){
    $affiche = 'Je somnole.';    
} elseif($heure >= 14 && $heure < 18){
    $affiche = 'J\'essaie de travailler.';    
}else{
    $affiche = 'Je dors.';    
}
return $affiche;
}


function Tableau($max){
$tab = '<table border="1">';
for($i=0;$i<$max;$i++){
    if($i%2==1){ $bg = '#cacaca'; } else { $bg = '#fff'; }
   $tab .= '<tr bgcolor="'.$bg.'"><td>'.$i.'</td><td>'.$i.'</td><td>'.$i.'</td><td>'.$i.'</td><td>'.$i.'</td></tr>';
}
$tab .= '</table>';

return $tab;
}


function multi() {
$aff = '<table>'."\n";
$i = 1;
while($i <= 9){
	if($i%2 == 1){
	$aff .= '<tr class="row1">'."\n";
	} else {
	$aff .= '<tr class="row2">'."\n";
	}
	$n = 1;
		while($n <= 9){
		if($i == 1 && $n == 1){
			$aff .= '<td class="row1"></td>'."\n";
		}	elseif($i == 1 || $n == 1){
			$aff .= '<td class="row1"><b>'.$i * $n.'</b></td>'."\n";
		} elseif($i == $n){
			$aff .= '<td><b>'.$i * $n.'</b></td>'."\n";
		} else {
			$aff .= '<td>'.$i * $n.'</td>'."\n";
		}
			$n++;
		}
	$aff .= '</tr>'."\n";
	$i++;
}
$aff .= '</table>'."\n";

    return $aff;
}

?>
