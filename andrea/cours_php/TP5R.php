<?php
$nombre=$_POST['nombre'];
echo 'Vous avez saisi ' . $nombre . '.<br /><br />';
if($nombre<1 or $nombre>10000){
    echo '<br />Votre saisie est incorrecte. Merci de choisir un nombre compris entre 1 et 10 000.';
}

$premier=true;

for($i=2;$i<$nombre;$i++){
    echo '<br />-- test de ' . $nombre . '/<font color=blue>' . $i . '</font>= ' . round($nombre/$i,2);
    if($nombre%$i==0){
        echo '<br /><font color=green>-- !! On a un multiple de ' . $nombre . '.</font>';
        $premier=false;
        break;
    }
}
echo "<br />";
if($premier==true){
    $verdict= $nombre . " est un nombre premier."; 
} else {
    $verdict= $nombre . " n'est pas un nombre premier."; 
}
echo '<br />' . $verdict;
?>