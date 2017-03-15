<?php
// Récupération de la variable d'environnement du système
$env= 'default';
if( getenv( 'NESTI_ENV_NAME') !== false && getenv( 'NESTI_ENV_NAME') !== ''){
    $env= getenv( 'NESTI_ENV_NAME');
}
// Transmission de la valeur trouvée (ou 'default' si non trouvée) à une constante utilisable par mon programme
define( 'NESTI_ENV_NAME', $env);

// Initialisation d'un tableau de conf accessible globalement
$conf_all= parse_ini_file( 'util/config.ini', true);
$GLOBALS[ 'config']= $conf_all[ NESTI_ENV_NAME];        
