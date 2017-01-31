<?php

$nombre = $_POST['nombre'];
$cle = 0;
for ($i = 0; $i < 16; $i++) {
    $chiffre = $nombre[$i];
    $chiffre = (int) $chiffre;

    if ($i % 2 == 0) {
        $produit = $chiffre * 2;

        if ($produit > 9) {
            $dizaine = floor($produit / 10);
            $unite = $produit - ($dizaine * 10);
            $plus = $dizaine + $unite;
            $cle += $plus;
        } else {
            $cle += $produit;
        }
    } else {
        $produit = $chiffre * 1;
        $cle += $produit;
    }
}
echo 'Votre clé = ' . $cle;
if ($cle % 10 == 0) {
    echo '<br>La clé est un multiple de 10. Votre numéro de carte est <b>valide</b>. ';
} else {
    echo "<br>La clé n'est pas un multiple de 10. Votre numéro de carte <b>n'est pas valide</b>. ";
}
?>
