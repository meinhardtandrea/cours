<h1>Les boucles</h1>

    <h2>while</h2>
    <p>Exemple 1</p>
<?php
$i=1;
while ($i<=100){
echo $i . ")- Je ne dois pas regarder les mouches voler quand j'apprends le PHP.<br />"; 
$i=$i+1;
}
?>
    <p>Exemple 2</p>
<?php
$i=1;
while ($i<=100){
echo $i . ")- Je ne dois pas regarder les mouches voler quand j'apprends le PHP.<br />"; 
$i++;
}
?>

    <h2>for</h2>
    <p>Exemple 1</p>
<?php
for( $i=100 ; $i>=1 ; $i-- ){
    echo $i . ")- Je ne dois pas regarder les mouches voler quand j'apprends le PHP.<br />";
}
?>