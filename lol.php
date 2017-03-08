<?php
$mon_string= "Pic<w<>>>cscqsc[[[ < lol";
// nettoyage des carctères spéciaux "classiques" +-=!(){}[]^"~*?:\/
$q= addcslashes ( $mon_string ,  '+-=!(){}[]^"~*?:\/' );
// suppression < et >
$q= preg_replace("#[><]#", "", $q);
echo $q;