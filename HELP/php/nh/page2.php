<?php
include('inc/header.inc.php');
include('inc/function.inc.php');

if(isset($_COOKIE['identifiant'])){
foreach($_COOKIE['identifiant'] as $name => $value){
    $name = htmlspecialchars($name);
    $value = htmlspecialchars($value);        
    echo "$name : $value <br />\n";
}
setcookie('identifiant[nom]', 'HEBERT', time() - 3600);
setcookie('identifiant[prenom]', 'Nicolas', time() - 3600);
}

include('inc/footer.inc.php');
?>
