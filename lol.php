
<?php
function test() {
    $foo = "valeur1";

    echo '$GLOBALS["foo"] dans le contexte global : ' . $GLOBALS["foo"] . "<br>";
    echo '$foo dans le contexte courant : ' . $foo . "<br>";
}

$foo = "valeur2";
test();
?>
