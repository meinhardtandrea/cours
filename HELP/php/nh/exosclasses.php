<?php
include('inc/header.inc.php');
include('inc/classes.inc.php');

echo '<h2>Exo1 et 2:</h2>';

$ville1 = new Ville('Montpellier','34');
$ville2 = new Ville('Le Havre','76');

echo $ville1->affVille();
echo $ville2->affVille();

echo '<h2>Exo3:</h2>';

$personne1 = new Personne('Hébert','Nicolas','Montpellier');
echo $personne1->getPersonne();
$personne1->setAdresse('Le Havre');
echo $personne1->getPersonne();

include('inc/footer.inc.php');
?>