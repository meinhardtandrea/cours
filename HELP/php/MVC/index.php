<?php
include("inc/header.inc.php");
        echo '<div id="element">'."\n";



switch($page){

    case $page:
include("start.php");
    break;

    default:
        echo '<p>En cours de construction !</p>';
}

echo '</div>'."\n";
include("inc/footer.inc.php");
?>