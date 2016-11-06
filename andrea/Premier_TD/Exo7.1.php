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


$pseudo=$_GET['pseudo'];
if(isset($personnes[$pseudo])){
    $Fiche_indentite=$personnes[$pseudo];
    echo 'Vous êtes ' . $Fiche_indentite['prenom'] . ' ' . $Fiche_indentite['nom'] . '.</br>';
    echo 'Vous avez ' . $Fiche_indentite['age'] . 'ans.</br>';
    echo 'Vous habitez ' . $Fiche_indentite['ville'] . '.</br>';
}
else{
    echo "Désolé, votre pseudonyme n'apparaît pas dans la liste.";
}
?>

<?php
include 'Footer.php';
?>
