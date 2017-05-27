<?php


session_start();

require_once("util/nesti.init.php");
if ($GLOBALS['config']['show_all_errors'] == true) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

require_once("util/class_PdoNesti.php");
$pdo = PdoNesti::getPdoNesti();
include "vues/v_entete.php";
include "vues/v_bandeau.php";

if (!isset($_REQUEST['uc'])) {
    $uc = 'accueil';
} else {
    $uc = $_REQUEST['uc'];
}
switch ($uc) {
//Menu
    case 'accueil':
        include "vues/v_accueil.php";
        break;
    case 'gestionIngredients':
        include "controleurs/c_gestionIngredients.php";
        break;
    case 'gestionRecettes':
        include "controleurs/c_gestionRecettes.php";
        break;
    case 'gestionCours':
        include "controleurs/c_gestionCours.php";
        break;
    case 'gestionAdmin':
        include "controleurs/c_gestionAdmin.php";
        break;
//Inscription, Connexion, Déconnexion et Gestion compte
    case 'login':
        include "controleurs/c_gestionLogin.php";
        break;
}
include "vues/v_pied.php";
?>