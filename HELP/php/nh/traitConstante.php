<?php
include('inc/header.inc.php');
include('inc/function.inc.php');
include('fichierConstante.php');

$min_length = 2;
$max_length_nom = 24;
$max_length_prenom = 20;

$testConst = testerConstante($min_length, $max_length_nom, $max_length_prenom);

echo $testConst;

include('inc/footer.inc.php');
?>