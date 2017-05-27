<?php
include('inc/header.inc.php');
//include('inc/function.inc.php');

$formulaire = '<form name="formulaire" method="post" action="while.php">
    <p>Quel est votre solde ?</p>
    <p><input name="solde" type="text"></p>
    <p><input name="valider" type="submit" value="valider"></p>
</form>';

if(isset($_POST['valider'])){
    $solde = $_POST['solde'];
    while($solde <= 1000){
            echo $solde.'<br/>';
            $solde = $solde + 10;
    }
} else {
echo $formulaire;
}
include('inc/footer.inc.php');
?>

