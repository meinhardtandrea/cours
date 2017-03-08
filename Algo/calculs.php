
<?php
$nb_lignes = 6;
$nb_colonnes = 3;

$tableau [$nb_lignes][$nb_colonnes];

$n = 0;
?>

<table>
    <?php for( $i=1; $i<=$nb_lignes ; $i++){ ?>    
    <tr>
        <?php for( $j=1; $j<=$nb_colonnes ; $j++){ ?>
        <td>
            <?php 
            $n += 1;
            echo $n;
            ?>
        </td>
        <?php } ?>
    </tr>
    <?php } ?>
</table>