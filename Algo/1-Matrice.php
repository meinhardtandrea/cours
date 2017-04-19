<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
?>

<h2>Créer une matrice</h2>
<form name="etap1"method="post" action="1-Matrice.php">
    Le nombre de lignes :   <input type="number" name="nb_lignes"><br><br>
    Le nombre de colonnes : <input type="number" name="nb_colonnes"><br><br>
    <input type="submit" name="taille_matrice" value="OK">
</form>
<?php
if( isset( $_POST[ 'taille_matrice'])){
    $nb_lignes = $_POST['nb_lignes'];
    $nb_colonnes = $_POST['nb_colonnes'];
?>

<form name="etap2"method="post" action="1-Matrice.php">

<table> 
    <?php for( $i=0; $i<$nb_lignes ; $i++){ ?>    
    <tr>
        <?php for( $j=0; $j<$nb_colonnes ; $j++){ ?>
        <td>
            <input type="number" name="matrice[<?= $i; ?>][<?= $j; ?>]">
        </td>
        <?php } ?>
    </tr>
    <?php } ?>
</table>

    <input type="submit" name="valider" value="Afficher la matrice">
</form>



<?php
}

if( isset( $_POST[ 'matrice'])){
    

    $matrice = $_POST['matrice']; ?>


    <table>
        <?php foreach( $matrice as $ligne) { ?>    
        <tr>
            <?php foreach( $ligne as $valeur_colonne){ ?>
            <td>
                <?php echo (float)$valeur_colonne; ?>
            </td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>
<?php } ?>

