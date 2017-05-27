<?php
include('inc/header.inc.php');
//include('inc/function.inc.php');
include('fichierConstante.php');

$formulaire = '<form name="formulaire" method="post" action="traitConstante.php">';
$formulaire .= '<p>Votre nom : <input type="text" name="nom" maxlength="24"/></p>';
$formulaire .= '<p>Votre pr&eacute;nom : <input type="text" name="prenom" maxlength="20"/></p>';
$formulaire .= '<p><input type="submit" name="valider" value="Envoyer"/></p>';

echo $formulaire;

include('inc/footer.inc.php');
?>