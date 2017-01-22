<h1>Les tableaux</h1>
    <h2>Construire un tableau numéroté</h2>

<?php
//1e méthode pour créer un tableau numéroté :
$prenoms = ['François', 'Michel', 'Nicole', 'Véronique', 'Benoît'];

//2e méthode, on le crée case par case :
$prenoms[0] = 'François';
$prenoms[1] = 'Michel';
$prenoms[2] = 'Nicole';
$prenoms[3] = 'Véronique';
$prenoms[4] = 'Benoît';

//Afficher un tableau numéroté :
echo $prenoms[1] . '<br /><br />'; //Affiche Michel

for ($numero = 0; $numero < 5; $numero++){
    echo $prenoms[$numero] . '<br />';
}
?>

    <h2>Construire un tableau associatif</h2>

<?php
$personnes=[
    
    'mdupond'=>['prenom'=>'Martin','nom'=>'Dupond','âge'=>'25','ville'=>'Paris'],
    'jm'=>['prenom'=>'Jean','nom'=>'Martin','âge'=>'20','ville'=>'Villetaneuse'],
    'toto'=>['prenom'=>'Tom','nom'=>'Tonge','âge'=>'18','ville'=>'Epinay'],
    'arn'=>['prenom'=>'Arnaud','nom'=>'Dupond','âge'=>'33','ville'=>'Paris'],
    'email'=>['prenom'=>'Emilie','nom'=>'Ailta','âge'=>'46','ville'=>'Villetaneuse'],
    'dask'=>['prenom'=>'Damien','nom'=>'Askier','âge'=>'7','ville'=>'Villetaneuse'],
    ];

var_dump($personnes);

$table='<table>';
$table.=
        '<tr>'
        . '<td>PRENOM</td>'
        . '<td>NOM</td>'
        . '<td>ÂGE</td>'
        . '<td>VILLE</td>'
        . '</tr>';
$table.='<tr>';
foreach($personnes as $key1 => $value1){ 
//$key1 contient : mdupont, jm, toto, ...
//$value1 contient : [prenom, ... , Paris]
    foreach($value1 as $key2 => $value2){
    //$key2 contient : prenom, nom, âge, ...
    //$value2 contient : Martin, Dupond, 25, ...
        $table.='<td>' . $value2. '</td>' ;
    }
    $table.='</tr>';
}
$table.='</table>';
echo $table;
?>