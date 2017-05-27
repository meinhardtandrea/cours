<?php
include('inc/header.inc.php');
include('inc/classes.inc.php');

$recettef = new SuperRecette('Crêpes');
$recettef->setIngredient(5);
echo $recettef->Affichage();
echo $recettef->getIng();

include('inc/footer.inc.php');
?>