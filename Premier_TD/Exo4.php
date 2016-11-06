<?php

$n=$_POST['n'];
function carre($x){
    return $x*$x ;
}
$i=1;
while($i<=$n){
    echo'<li>' . $i . '<sup>2</sup>=' . carre($i) . '</li>'; 
    $i++;
}
?>