<?php

if( isset( $_REQUEST['action'])){
    $action = $_REQUEST['action'];
}else{
    $action = 'connexion';
}

switch($action){
    case 'connexion':
        include 'vues/v_connexion.php';
    break;
    case 'validConnexion':
        
    break;
}











?>