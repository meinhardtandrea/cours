<h1>Les types de données</h1>

<h2>Les chaînes de caractères (string)</h2>
<?php
$nom = 'Meinhardt';
$prenom = 'Andréa';
echo "Je m'appelle " . $prenom . ' ' . $nom . '. <br />';
?>

<h2>Les nombres entiers (int)</h2>
<?php
$age = 30; 
$age = 31;
echo "J'ai " . $age . 'ans. <br />';
echo "J'ai $age ans. <br />"; //ça marche mais on évite !
?>

<h2>Les nombres réels (float)</h2>
<?php
$prix = 10.50; //Mettre un point et non une virgule.
echo 'Je te dois ' . $prix . ' € mon pote ! <br />';
?>

<h2>Les booléens (bool)</h2>
<?php
$je_debute_en_php = true; 
$je_suis_bon_en_php = false;
?>

<h2>rien (NULL)</h2>
<?php
$pas_de_valeur = NULL;
//Cela sert simplement à indiquer que la variable ne contient rien, tout du moins pour le moment.
?>

<h2>Les opératioons de base</h2>
<?php
$nombre = 2 + 4; // $nombre prend la valeur 6
$nombre = 5 - 1; // $nombre prend la valeur 4
$nombre = 3 * 5; // $nombre prend la valeur 15
$nombre = 10 / 2; // $nombre prend la valeur 5


$nombre = 3 * 5 + 1; // $nombre prend la valeur 16
$nombre = (1 + 2) * 2; // $nombre prend la valeur 6


$nombre = 10;
$resultat = ($nombre + 5) * $nombre; // $resultat prend la valeur 150
?>

<h2>Le modulo</h2>
    <p>
        Il est possible de faire un autre type d'opération un peu moins connu : le modulo. Cela représente le reste de la division entière.
    </p>
    <p>
        Par exemple, 6 / 3 = 2 et il n'y a pas de reste. En revanche, 7 / 3 = 2 (car le nombre 3 « rentre » 2 fois dans le nombre 7) et il reste 1. Vous avez fait ce type de calculs à l'école primaire, souvenez-vous !    
    </p>
    <p>
        Le modulo permet justement de récupérer ce « reste ». Pour faire un calcul avec un modulo, on utilise le symbole %.
    </p>


Le modulo permet justement de récupérer ce « reste ». Pour faire un calcul avec un modulo, on utilise le symbole %.
<?php
$nombre = 10 % 5; // $nombre prend la valeur 0 car la division tombe juste
$nombre = 10 % 3; // $nombre prend la valeur 1 car il reste 1
?>

<h2>Et les autres opérations</h2>
<p>
    Je passe sous silence les opérations plus complexes telles que la racine carrée, l'exponentielle, la factorielle, etc. Toutes ces opérations peuvent être réalisées en PHP mais il faudra passer par ce qu'on appelle des fonctions, une notion que l'on découvrira plus tard. Les opérations basiques que l'on vient de voir sont amplement suffisantes pour la programmation PHP de tous les jours.
</p>