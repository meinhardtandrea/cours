<?php
include 'Header.php';
?>


<?php
$personnes=array(
    
    'mdupond'=>array('prenom'=>'Martin','nom'=>'Dupond','âge'=>'25','ville'=>'Paris'),
    'jm'=>array('prenom'=>'Jean','nom'=>'Martin','âge'=>'20','ville'=>'Villetaneuse'),
    'toto'=>array('prenom'=>'Tom','nom'=>'Tonge','âge'=>'18','ville'=>'Epinay'),
    'arn'=>array('prenom'=>'Arnaud','nom'=>'Dupond','âge'=>'33','ville'=>'Paris'),
    'email'=>array('prenom'=>'Emilie','nom'=>'Ailta','âge'=>'46','ville'=>'Villetaneuse'),
    'dask'=>array('prenom'=>'Damien','nom'=>'Askier','âge'=>'7','ville'=>'Villetaneuse'),
    );

var_dump($personnes);

$table='<table border="7">';
$table.='<tr><td class="ligne1-tableau">PRENOM</td><td class="ligne1-tableau">NOM</td><td class="ligne1-tableau">ÂGE</td><td class="ligne1-tableau">VILLE</td></tr>';
$table.='<tr>';
foreach($personnes as $key => $value){
    foreach($value as $element => $identity){
        $table.='<td>' . $identity. '</td>' ;
    }
    $table.='</tr>';
}
$table.='</table>';
echo $table;
?>



<?php
include 'Footer.php';
?>