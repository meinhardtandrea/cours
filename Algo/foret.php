<?php
$tab = [[0,0,0,0,0,1],[0,1,0,1,1,0],[0,1,0,0,0,0],[0,1,0,0,1,0],[1,0,1,0,0,0],[1,1,0,0,0,1]];

function ajouteBordure($tab){
    $res = [[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0]];
    for( $i=1 ; $i<=6 ; $i++){
        for( $j=1 ; $j<=6 ; $j++){
            $res[$i][$j] = $tab[$i-1][$j-1];
        }
    }
    return $res;
}

function premiereCoupe($res){
    for( $i=0 ; $i<=7 ; $i++){
        for( $j=0 ; $j<=7 ; $j++){
            
            if( $res[$i][$j] == 1 && ($res[$i][$j-1] == 1 || $res[$i-1][$j] == 1 || $res[$i][$j+1] == 1 || $res[$i+1][$j] == 1)){
                
                if     ($res[$i][$j] == 1 && $res[$i][$j-1] == 1){ $res[$i][$j-1] += 1 ; }
                elseif ($res[$i][$j] == 1 && $res[$i-1][$j] == 1){ $res[$i-1][$j] += 1 ; }
                elseif ($res[$i][$j] == 1 && $res[$i][$j+1] == 1){ $res[$i][$j+1] += 1 ; }
                elseif ($res[$i][$j] == 1 && $res[$i+1][$j] == 1){ $res[$i+1][$j] += 1 ; }
                
            }
        }
    }
    return $res;
}

$foret = premiereCoupe(ajouteBordure($tab));


echo '<table>';
foreach ($foret as $v1){
    echo '<tr>';
    foreach($v1 as $v2){
        echo '<td>' . $v2 . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>