<?php
include('inc/header.inc.php');
include('inc/function.inc.php');

if(!isset($_SESSION['pseudo'])) {
    echo '<p>Vous n\'avez pas accès à cette page</p>';
} else {
    echo '<p>Bienvenue !</p>';
    }

include('inc/footer.inc.php');
?>