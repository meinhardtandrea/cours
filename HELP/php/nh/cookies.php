<?php
include('inc/header.inc.php');
include('inc/function.inc.php');

setcookie('cookie[taille]', '194', time()+3600, "/~rasmus/", "127.0.0.1", 1);
setcookie('cookie[pointure]', '45', time()+3600, "/~rasmus/", "127.0.0.1", 1);
setcookie('cookie[poids]', '90', time()+3600, "/~rasmus/", "127.0.0.1", 1);

foreach($_COOKIE['cookie'] as $name => $value){
    $name = htmlspecialchars($name);
    $value = htmlspecialchars($value);        
    echo "$name : $value <br />\n";
}

include('inc/footer.inc.php');
?>
