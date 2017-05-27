<?php
//include("classes/recettes.class.php");
include("inc/conf.ig.php");

$sql = 'SELECT ing_id, ing_nom FROM ingredient ORDER BY ing_nom';

try
{
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$host.';dbname='.$bdd, $user, $pwd, $pdo_options);
$reponse = $bdd->query($sql);
while ($donnees = $reponse->fetch())
{
echo $donnees["ing_id"].' - ';
echo ucfirst(utf8_encode($donnees["ing_nom"])).'<br/>';
}
$reponse->closeCursor();
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
?>