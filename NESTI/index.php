<?php
session_start();
require_once("util/class_PdoNesti.php");
include "vues/v_entete.php";
include "vues/v_bandeau.php";

//Gérer le menu vie un switch
if( !isset ( $_REQUEST['uc'])){
    $uc = 'accueil';
}else{
    $uc = $_REQUEST['uc'];
}

$pdo = PdoNesti::getPdoNesti();

switch ( $uc){
    case 'login':
        include "controleurs/c_gestionLogin.php"; break;
    
    case 'accueil':
        include "vues/v_accueil.php"; break;   
    case 'gestionIngredients':
        include "controleurs/c_gestionIngredients.php"; break;
    case 'gestionRecettes':
        include "controleurs/c_gestionRecettes.php"; break;
    case 'gestionCours':
        include "controleurs/c_gestionCours.php"; break;
    case 'gestionAdmin':
        include "controleurs/c_gestionAdmin.php"; break;
    case 'gestionCompte':
        include "controleurs/c_gestionCompte.php"; break;
    }

include "vues/v_pied.php";
?>