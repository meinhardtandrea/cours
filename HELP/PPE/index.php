<?php
include("inc/header.inc.php");

switch($page){

    case '2':
        echo '<div id="element">'."\n";
        include("pages/ingredients.php");
        echo '</div>'."\n";
    break;

    case '3':
        echo '<div id="element">'."\n";
        include("pages/recettes.php");
        echo '</div>'."\n";
    break;

    case '8':
        include("pages/inscription.php");
    break;

    case '9':
        include("pages/connect.php");
    break;

    default:
        echo '<div id="element">'."\n";
        echo '<p>En cours de construction !</p>';
        echo '</div>'."\n";
}

include("inc/footer.inc.php");
?>