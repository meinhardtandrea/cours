<h2>Créer la première matrice</h2>
<form name="etap1" method="post" action="1-Matrice multi.php">
    Nombre de lignes :  <input type="number" name="nb_lignes"><br><br>
    Nombre de colonnes: <input type="number" name="nb_cols"><br><br>
    <input type="submit" name="taille_matrice1" value="Remplir la première matrice">
</form>

<?php
if( isset($_POST['taille_matrice1'])){
    $_POST['nb_lignes'] = $nb_lignes;
    $_POST['nb_cols'] = $nb_cols;
?>

<form name="etap2" method="post" action="1-Matrice multi.php">
    <table>
    <?php for( $i= 0 ; $i< $nb_lignes ; $i++){ ?>
        <tr>
        <?php for( $j= 0 ; $j< $nb_cols ; $j++){ ?>
            <td>
            <input type="submit" name="mat1[<?= $i; ?>][<?= $j; ?>]">
            </td>
        <?php } ?>
        </tr>
    <?php } ?>
    </table>
    <input type="submit" name="afficher_matrice1" value="Afficher la première matrice">
</form>
<?php } 

if( isset($_POST['afficher_matrice1'])){ 
    
    if( isset($_POST['mat1'])){
        $matrice1 = $_POST['mat1']; ?>
    
<table>
    
    <?php foreach( $matrice1 as $v1){ ?>
        <tr>
        <?php foreach( $v1 as $v2){ ?>
            <td><?= $v2 ; ?></td>
        <?php } ?>
        </tr>
    <?php } ?>
        
</table>
<?php }} ?>


<h2>Créer la deuxième matrice</h2>

Nombre de lignes : <?php echo $nb_cols; ?><br><br>
Nombre de colonnes: <?php echo $nb_lignes; ?><br><br>

<form method="post" action="1-Matrice multi.php">
    <input type="submit" name="taille_matrice2" value="Remplir la deuxième matrice">
</form>

<?php
if( isset($_POST['taille_matrice2'])){
    echo '<form>';
    echo '<table>';
    for( $i= 0 ; $i< $nb_cols ; $i++){
        echo '<tr>';
        for( $j= 0 ; $j< $nb_lignes ; $j++){
            echo '<td>' ;
            echo '<input type="submit" name="mat2['. $i . ']['. $j . ']">';
            echo '</td>'; 
        }
        echo '</tr>';
    }
    echo '</table>';
    echo '<input type="submit" name="afficher_matrice2" value="Afficher la deuxième matrice">';
    echo '</form>';
}
if( isset($_POST['afficher_matrice2'])){
    echo '<table>';
    for( $i= 0 ; $i< $nb_cols ; $i++){
        echo '<tr>';
        for( $j= 0 ; $j< $nb_lignes ; $j++){
            $_POST['mat2['. $i . ']['. $j . ']'] = $mat2[$i][$j];
            echo '<td>' ;
            echo $mat2[$i][$j];
            echo '</td>'; 
        }
        echo '</tr>';
    }
echo '</table>';
?>

<h2>Multiplier 2 matrices</h2>

<?php
$res = [];
echo '<table>';
for( $i= 0 ; $i< $nb_lignes ; $i++){
    $res[$i] = [] ;
    echo '<tr>';
    
    for( $j= 0 ; $j< $nb_cols ; $j++){
        $res[$i][$j] = 0;
        
        for( $k= 0 ; $k< $nb_cols ; $k++){
            $res[$i][$j] += $mat1[$i][$k] * $mat2[$k][$j];
            echo '<td>' ;
            echo $res[$i][$j];
            echo '</td>';
        }
    }   
}
    echo '</tr>';
}
echo '</table>';
?>