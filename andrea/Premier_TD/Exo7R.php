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

$petit_nom=$_POST['petit_nom'];
if(isset($personnes[$petit_nom])){
    $Fiche_identite=$personnes[$petit_nom];
    echo 'Vous êtes ' . $Fiche_identite['prenom'] . ' ' . $Fiche_identite['nom'] . '.</br>';
    echo 'Vous avez ' . $Fiche_identite['age'] . 'ans.</br>';
    echo 'Vous habitez ' . $Fiche_identite['ville'] . '.';
}
else{
    echo "Désolé, votre pseudonyme n'est pas dans la liste.";
}
?>