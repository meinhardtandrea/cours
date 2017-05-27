<?php
function tableMulti(){
$multi = '<table>';
$i = 1;
while($i <= 9){
$n = 1;
    if($i%2==1){ $bg = '#eee'; } else { $bg = '#fff'; }
    $multi .= '<tr bgcolor="'.$bg.'">';
while($n <= 9){
    $res = $i * $n;
    if($n == 1 && $i == 1){
    $multi .= '<th bgcolor="#DF7401"></th>';
    } elseif($n == 1 || $i == 1){
    $multi .= '<th bgcolor="#DF7401">'.$res.'</th>';
    } elseif($n == $i){
    $multi .= '<td><b>'.$res.'</b></td>';
    } else {
    $multi .= '<td>'.$res.'</td>';
    }
    $n = $n + 1;
    }
    $multi .= '</tr>';
    $i++;
}
$multi .= '</table>';
return $multi;
}


function tableMois(){
$mois = array(
    'Janvier' => 31,
    'F&eacute;vrier' => 29,
    'Mars' => 31,
    'Avril' => 30,
    'Mai' => 31,
    'Juin' => 30,
    'Juillet' => 31,
    'Ao&ucirc;t' => 31,
    'Septembre' => 30,
    'Octobre' => 31,
    'Novembre' => 30,
    'D&eacute;cembre' => 31
    );
$aff = '<table>';
foreach($mois as  $cle => $element){
    $aff .= '<tr><td>'.$cle.'</td><td>'.$element.'</td></tr>';
}
$aff .= '</table>';
return $aff;
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

?>
