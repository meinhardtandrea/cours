<?php
include('inc/header.inc.php');
//include('inc/function.inc.php');

$formulaire = '<form name="formulaire" method="post" action="switch.php">
    <p>Que souhaitez-vous boire ? (pastis, bière, limonade, jus, vodka)</p>
    <p><input name="boisson" type="text"></p>
    <p><input name="valider" type="submit" value="valider"></p>
</form>';

if(isset($_POST['valider'])){
    $boisson = $_POST['boisson'];
    switch($boisson){
        case 'pastis':
            echo '<p>A votre santé !</p>';
            break;
        
        case 'bière':
            echo '<p>A votre santé !</p>';
            break;
        
        case 'limonade':
            echo '<p>A votre santé !</p>';
            break;
        
        case 'jus':
            echo '<p>A votre santé !</p>';
            break;
        
        case 'vodka':
            echo '<p>A votre santé !</p>';
            break;
        
        default:
            echo '<p>Désolé, nous ne servons pas ce produit.</p>';
            echo $formulaire;
            
    }
} else {
echo $formulaire;
}
include('inc/footer.inc.php');
?>

