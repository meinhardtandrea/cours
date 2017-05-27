<?php
include('inc/header.inc.php');
include('inc/function.inc.php');

if (isset($_GET["search"])) $search = $_GET["search"];
else $search="";

$personnes = array(
'mdupond'=> array('prenom' => 'Martin', 'nom' => 'Dupond', 'age' => 25, 'ville' => 'Paris'), 
'jm'=> array('prenom' => 'Jean', 'nom' => 'Martin', 'age' => 20, 'ville' => 'Villetaneuse'), 
'toto'=> array('prenom' => 'Tom', 'nom' => 'Tonge', 'age' => 18, 'ville' => 'Epinay'),
'arn'=> array ('prenom' => 'Arnaud', 'nom' => 'Dupond', 'age' => 33, 'ville' => 'Paris'), 
'email'=> array('prenom'=>'Emilie', 'nom'=>'Ailta', 'age'=>46, 'ville'=>'Villetaneuse'),
'dask'=>array('prenom'=>'Damien','nom'=>'Askier','age'=>7,'ville'=>'Villetaneuse') 
);

$aff = '<table border="1">'."\n";
$aff .= '<tr>'."\n";
$aff .= '<th>prenom</th><th>nom</th><th>age</th><th>ville</th><th></th>'."\n";
$aff .= '</tr>'."\n";
$i = 0;
foreach($personnes as $valeur){
	if($i%2==0){
		$aff .= '<tr class="row1">'."\n";
		} else {
		$aff .= '<tr class="row2">'."\n";
		}
	foreach($valeur as $cle => $valeur2){
		$aff .= '<td>'.$valeur2.'</td>'."\n";
		}
$aff .= '<td><a href="array2.php?search='.$valeur2.'">Voir la ville</a></td></tr>'."\n";
$i++;
}
$aff .= '</table><br/><br/>'."\n";

echo $aff;

if($search){
$aff2 = '<table border="1">'."\n";
$aff2 .= '<tr>'."\n";
$aff2 .= '<th>prenom</th><th>nom</th><th>age</th><th>ville</th>'."\n";
$aff2 .= '</tr>'."\n";
$i = 0;
foreach($personnes as $valeur) {
	if($i%2==0){
		$aff2 .= '<tr class="row1">'."\n";
		} else {
		$aff2 .= '<tr class="row2">'."\n";
		}
	foreach($valeur as $cle => $valeur2){
    if(in_array($search, $valeur)) {
		$aff2 .= '<td>'.$valeur2.'</td>'."\n";
    }
		}
$aff2 .= '</tr>'."\n";
$i++;
}
$aff2 .= '</table>'."\n";
echo $aff2;
}
//var_dump($personnes);
include('inc/footer.inc.php');
?>