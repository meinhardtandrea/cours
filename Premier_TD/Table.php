<?php include 'Header.php';?>
<?php
$table='<table border="1">'; //Je crée un tableau avec une bordure visible.
$table.='<td></td>'; //Tableau .= des cellules
for($x=2;$x<=10;$x++){ //Je crée ma 1ère ligne. 1ère cellule = 2 ; j'ajoute 1 à la cellule suivante ; dernière cellule = 10. 
    $table.='<td>'.$x.'</td>'; //J'ai 1 valeur dans mes cellules.
}
for($y=2;$y<=10;$y++){ //Je crée ma 1ère colonne. 1ère cellule = 2 ; j'ajoute 1 à la cellule suivante ; dernière cellule = 10. 
    $table.='<tr>'; //Tableau .= des lignes
    $table.='<td>' .$y . '</td>'; //J'ai 1 valeur dans mes cellules.
    for($x=2;$x<=10;$x++){ //Travail sur mes lignes
        if($y%2==1){$couleur='orange';}
        if($y%2==0){$couleur='bluegreen';}
        if($x==$y){$table.='<td bgcolor ='. $couleur.' ><b>' . $y*$x . '</b></td>';}
        else {$table.='<td bgcolor ='. $couleur.'> '. $y*$x . '</td>';}
        
        if($x==1){
            $table.='<bgcolor=white>';
        }
    }
    $table.='</tr>';
    
}
$table.='</table>';
echo $table;
?>
<?php include 'Footer.php';?>