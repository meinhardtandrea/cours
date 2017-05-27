<?php

function premiers($nombre) {
    $flag=0;
    for ($i = 2; $i <sqrt($nombre); $i++) {
        if ($nombre % $i == 0) {
            $verdict = ' n\'est un pas nombre premier.';
            $flag=1;
            break;
        }
        }
        if($flag==0){
            $verdict = 'est un nombre premier.';
        }
        if($nombre==0 || $nombre==1){
            $verdict = ' n\'est un pas nombre premier.';
        }
        
    
    return $verdict;
}