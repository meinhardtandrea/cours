<?php
$host = 'localhost';
$user = 'root';
$pwd = '';
$bdd = 'bts';

$sql = 'SELECT * FROM etudiant WHERE nom = :vorname ';
//$var = 'Moses';

$aff = '<form action="'.$_SERVER['PHP_SELF'].'" method="post">'."\n";
$aff.= 'Votre nom : <input type="text" name="nom"> '."\n";
$aff.= '<input type="submit" name="Valider" > '."\n";
$aff.= '</form> '."\n";

echo $aff;

if(isset($_POST['nom'])){
$var = $_POST['nom'];
try
{
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$host.';dbname='.$bdd, $user, $pwd, $pdo_options);
$reponse = $bdd->prepare($sql);
$reponse->bindvalue(':vorname',$var, PDO::PARAM_STR);
$reponse->execute();
while ($donnees = $reponse->fetch()){
echo $donnees["id"].' - ';
echo ucfirst(utf8_encode($donnees["nom"])).' '.ucfirst(utf8_encode($donnees["prenom"])).'<br/>';
}
$reponse->closeCursor();
}
catch (Exception $e)
{
die('Erreur : '.$e->getMessage());
}
}