<?php
session_start();

if(!(isset($_SESSION['valider']) || ($_SESSION['valider']!='OK'))){
    header ('location:2-connexion.php');
    exit();
}
?>

<?php

$f=  fopen('2-bddinsc.txt','r');



fclose($f);

echo 'Bravo, connexion reussie !'; 
?>

