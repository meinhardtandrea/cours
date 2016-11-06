<?php
session_start();

if(!(isset($_SESSION['valider']) || ($_SESSION['valider']!='OK'))){
    header ('location:identification.php');
    exit();
}

echo'Inscription reussie !';
?>
