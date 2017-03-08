<?php



for( $i=0 ; $i<=11 ; $i++){
    for( $j=0 ; $j<=11 ; $j++){
        $leMonde[$i][$j]=0;
    }
}



function generer($leMonde){

    for( $i=1 ; $i<=10 ; $i++){
        for( $j=1 ; $j<=10 ; $j++){
            $leMonde[$i][$j] = (int)mt_rand(0,1);
        }
    }
    return $leMonde;
}


function calculer($tableau, $ligne, $colonne){
    $n = 0;
    for( $i = $ligne-1 ; $i <= $ligne+1 ; $i++){
        for( $j = $colonne-1 ; $j <= $colonne+1 ; $j++){
            $n += $tableau[$i][$j];
        }
    }
    $n -= $tableau[$i][$j];
    return $n;
}


$res = generer($leMonde);


echo '<table>';
foreach($res as $v1){
    echo '<tr>';
    foreach($v1 as $v2){
        echo '<td>' . $v2 . '<td>';
    }
    echo '</tr>';
}
echo '</table>';

$plu = calculer($tableau, (int)12, (int)12);
echo $plu . 'nbjj';



?>
