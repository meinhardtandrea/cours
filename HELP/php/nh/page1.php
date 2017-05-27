<?php
include('inc/header.inc.php');
include('inc/function.inc.php');

if (isset($_POST["nom"])) $nom = $_POST["nom"];
else $nom="";
if (isset($_POST["prenom"])) $prenom = $_POST["prenom"];
else $prenom="";

if($nom && $prenom) {
setcookie('identifiant[nom]', $nom);
setcookie('identifiant[prenom]', $prenom);
echo '<p><a href="page2.php">page suivante</a></p>';
} else {
$form = '<form action="'.$_SERVER['PHP_SELF'].'" method="post">'."\n";
$form .=  '<p><label for="nom">Votre nom</label></p>'."\n";
$form .=  '<p><input type="text" name="nom" id="nom" maxlength="255" size="32" value=""></p>'."\n";
$form .=  '<p><label for="prenom">Votre pr&eacute;nom</label></p>'."\n";
$form .=  '<p><input type="text" name="prenom" id="prenom" maxlength="255" size="32" value=""></p>'."\n";
$form .=  '<p><input type="submit" value="Envoyer" /></p>'."\n";
$form .=  '</form>'."\n";
echo $form;
}

include('inc/footer.inc.php');
?>