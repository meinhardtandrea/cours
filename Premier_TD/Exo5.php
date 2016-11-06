<?php
include'Header.php';
?>


<?php
$mois=array('JANVIER','FEVRIER','MARS','AVRIL','MAI','JUIN','JUILLET','AOUT','SEPTEMBRE','OCTOBRE','NOVEMBRE','DECEMBRE');
$nb_jours=array(
    'JANVIER'=>'31',
    'FEVRIER'=>'28',
    'MARS'=>'31',
    'AVRIL'=>'30',
    'MAI'=>'31',
    'JUIN'=>'30',
    'JUILLET'=>'31',
    'AOUT'=>'31',
    'SEPTEMBRE'=>'30',
    'OCTOBRE'=>'31',
    'NOVEMBRE'=>'30',
    'DECEMBRE'=>'31');

$table='<table border="1">';
foreach ($nb_jours as $key => $value){
        $table.='<tr><td>' . $key . ' </td><td> ' . $value . '</td>';
        $table.='</tr>';
}
$table.='</table>';
echo $table ;
?>


<?php
include'Footer.php';
?>