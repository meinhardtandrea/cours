<?php
include('inc/header.inc.php');
include('inc/function.inc.php');

$annee = array(
	'Janvier' => 31,
	'F&eacute;vrier' => 29,
	'Mars' => 31,
	'Avril' => 30,
	'Mai' => 31,
	'Juin' => 30,
	'Juillet' => 31,
	'Ao&ucirc;t' => 31,
	'Septembre' => 30,
	'Octobre' => 31,
	'Novembre' => 30,
	'D&eacute;cembre' => 31
	);

	$aff = '<ul>'."\n";
foreach($annee as $cle => $valeur){
	$aff .= '<li>'.$cle.' => '.$valeur.'</li>'."\n";
}
	$aff .= '</ul>'."\n";

echo $aff;
include('inc/footer.inc.php');
?>