<h1>Les fonctions</h1>

    <h2>Créer ses propres fonction</h2>

<?php
function cube($cote){
    $volume = $cote * $cote * $cote;
    return $volume;
}
$volume=cube(4); 
//La fonction cube(4) est appelée avec le paramètre 4.
//Le résultat renvoyé par la fonction est stockée dans la variable $volume.

echo "Le volume d'un cube dont les côtés font 4 cm de longueur est de " . $volume . ' cm<sup>3</sup>.<br />'
?>
 
    
    
    <h2>Les fonctions prêtes à l'emploi</h2>
    <a href="http://fr.php.net/manual/fr/funcref.php" target="_blank">Voir le répertoire des fonctions PHP</a>
    <h3>Traitement des chaînes de caractères </h3>
    <b>strlen : longueur d'une chaîne</b><br/>
    
<?php
$phrase = 'Bonjour tout le monde ! Je suis une phrase !';
$longueur = strlen($phrase);

echo 'La phrase ci-dessous comporte ' . $longueur . ' caractères :<br />' . $phrase;
?>

    <br/><br/><b>str_replace : rechercher et remplacer</b>
    
<?php
$ma_variable = str_replace('b', 'p', 'bim bam boum');

echo '<br/>' . $ma_variable;
?>

    <br/><br/><b>str_shuffle : mélanger les lettres</b>
    
<?php
$chaine = 'Cette chaîne va être mélangée !';
$chaine = str_shuffle($chaine);

echo '<br/>' . $chaine;
?>

    <br/><br/><b>strtolower : écrire en minuscule</b>

<?php
$chaine = 'COMMENT CA JE CRIE TROP FORT ???';
$chaine = strtolower($chaine);
 
echo '<br/>' . $chaine;
?>

    <br/><br/><b>strtoupper : écrire en majuscule</b>
<?php
$chaine = 'quoi je parle pas assez fort ?';
$chaine = strtoupper($chaine);
 
echo '<br/>' . $chaine;
?>

