<?php

$tab1[0][0] = '1';
$tab1[0][1] = '2';
$tab1[1][0] = '3';
$tab1[1][1] = '4';
$tab2[0][0] = '4';
$tab2[0][1] = '3';
$tab2[1][0] = '2';
$tab2[1][1] = '1';

$nb_val_Lignes0 = 2;
$nb_val_Lignes1 = 2;
$nb_val_Colonnes0 = 2;
$nb_val_Colonnes1 = 2;

$tabRes = array();

echo '<table>';
for ($i = 0 ; $i < $nb_val_Lignes0; $i++) {
    
    $tabRes[$i] = array();
    //TRACE
    //$tabRes[0] = ;
    //$tabRes[1] = ;
    //$tabRes = [[],[]];
    echo '<tr>';
    
    for ($j = 0; $j < $nb_val_Colonnes1; $j++) {
        
        $tabRes[$i][$j] = 0;
        
        for ($k = 0; $k < $nb_val_Colonnes0; $k++) {
            
            $tabRes[$i][$j] += $tab1[$i][$k] * $tab2[$k][$j];
            
        }
        echo '<td>' . $tabRes[$i][$j] . '</td>';
        
        }
        echo '</tr>';
    }
echo '</table>';

?>