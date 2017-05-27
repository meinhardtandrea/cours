<?php
include('inc/header.inc.php');
include('inc/classes.inc.php');

$recette1 = new Ingredients();

echo $recette1->SendIng(1);

include('inc/footer.inc.php');
?>