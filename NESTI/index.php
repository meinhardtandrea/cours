<?php
session_start();
include "vues/v_entete.php";
include 'vues/v_bandeau.php';

//Gérer le menu vie un switch
if( !isset ( $_REQUEST['uc'])){
    $uc = 'accueil';
}else{
    $uc = $_REQUEST['uc'];
}


switch ( $uc){
    case 'accueil':
        include 'vues/v_accueil.php'; break;   
    case 'gestionIngredients':
        include 'controleurs/c_gestionIngredients'; break;
    case 'gestionRecettes':
        include 'controleurs/c_gestionRecettes'; break;
    case 'gestionCours':
        include 'controleurs/c_gestionCours'; break;
    case 'gestionAdmin':
        include 'controleurs/c_gestionAdmin'; break;
    case 'gestionCompte':
        include 'controleurs/c_gestionCompte'; break;
    }

include "vues/v_pied.php";
?>