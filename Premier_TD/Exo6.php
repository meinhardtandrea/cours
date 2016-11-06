<?php
include 'Header.php';
?>
<?php
$personnes= [
    
    'mdupond'=> [
        'prenom'=>'Martin',
        'nom'=>'Dupond',
        'age'=>25,
        'ville'=>'Paris'
        ],     
    'jm'=> [
        'prenom'=>'Jean',
        'nom'=>'Martin',
        'age'=>20,
        'ville'=>'Villetaneuse'
        ],     
    'toto'=> [
        'prenom'=>'Tom',
        'nom'=>'Tonge',
        'age'=>18,
        'ville'=>'Epinay'
        ],           
    'arn'=> [
        'prenom'=>'Arnaud',
        'nom'=>'Dupond',
        'age'=>33,
        'ville'=>'Paris'
        ],         
    'email'=> [
        'prenom'=>'Emilie',
        'nom'=>'Ailta',
        'age'=>46,
        'ville'=>'Villetaneuse'
        ], 
    'dask'=> [
        'prenom'=>'Damien',
        'nom'=>'Askier',
        'age'=>7,
        'ville'=>'Villetaneuse'
        ]   
    
    ];


$table='<table id="exo6" cellpadding=8px>';
$table.='<tr>'
        . '<th>PRENOM</th>'
        . '<th>NOM</th>'
        . '<th>ÂGE</th>'
        . '<th>VILLE</th>'
        . '</tr>';

$i=0;

foreach($personnes as $key_1 => $Value_1){
    
    if($i%2==0){
        $class='ligne_paire';
    }
    else{
        $class='ligne_impaire';
    }
    
    $table.='<tr class="' . $class . '">';
    
    foreach($Value_1 as $key_2 => $Value_2){
        $table.='<td>' . $Value_2 . '</td>';
    }
    $table.='</tr>';  
    $i++;
}
$table.='</table>';
echo $table;
?>
<?php
include 'Footer.php';
?>
