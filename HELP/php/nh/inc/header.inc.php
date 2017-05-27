<?php
session_start ();
if (isset($_GET["err"])) $err = $_GET["err"];
else $err="";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
<title>TP DEV</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
if(!isset($_SESSION['pseudo'])) {
$form = '<form action="login.php" method="post">'."\n";
if($err == 1){ $form .=  '<p>Erreur d\'identifiant.</p>'."\n"; }
elseif($err == 2){ $form .=  '<p>Erreur de mot de passe.</p>'."\n"; }
elseif($err == 3){ $form .=  '<p>Erreur de traitement.</p>'."\n"; }
$form .=  '<p><label for="pseudo">Votre identifiant</label></p>'."\n";
$form .=  '<p><input type="text" name="user_name" id="pseudo" maxlength="250" size="32" value=""></p>'."\n";
$form .=  '<p><label for="user_pwd">Mot de passe</label></p>'."\n";
$form .=  '<p><input type="password" name="user_pwd" id="user_pwd" maxlength="32" size="32" value=""></p>'."\n";
$form .=  '<p><input type="submit" class="envoy" value="Connexion" /></p>'."\n";
$form .=  '</form>'."\n";
echo $form;
} else {
    echo 'Bienvenu '.$_SESSION['pseudo'].' (<a href="logout.php">out</a>).';
}
?>

<h1>Menu</h1>
<ul>
	<li><a href="index.php">Index</a></li>
	<li><a href="modulo.php">Modulo</a></li>
	<li><a href="premiers.php">Premiers</a></li>
	<li><a href="switch.php">Switch</a></li>
	<li><a href="tab.php">IMC</a></li>
	<li><a href="date.php">Heure</a></li>
	<li><a href="while.php">While</a></li>
	<li><a href="agenda.php">Agenda</a></li>
	<li><a href="multi.php">Multiplication</a></li>
	<li><a href="array1.php">Tableau 1</a></li>
	<li><a href="array2.php">Tableau 2</a></li>
	<li><a href="formConstante.php">Constante</a></li>
	<li><a href="page1.php">Cookies</a></li>
	<li><a href="session.php">Session</a></li>
	<li><a href="classes.php">Classes</a></li>
	<li><a href="compteb.php">Compte Bancaire (classes)</a></li>
	<li><a href="exosclasses.php">Exos (classes)</a></li>
	<li><a href="poo.php">Exos POO</a></li>
</ul>
