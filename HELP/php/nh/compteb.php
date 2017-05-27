<?php
include('inc/header.inc.php');
include('inc/classes.inc.php');

$compte = new compteBancaire('Nicolas');
$compte2 = new compteBancaire('David');
$compte->crediter(1500);
$compte->debiter(450);
$compte->crediter(25);
$compte->debiter(2500);
$compte->setDecouvert(-2500);
$compte->debiter(1500);

$compte2->crediter(1500);

include('inc/footer.inc.php');
?>