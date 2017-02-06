<?php

require_once "util/Outils.php";

$action = $_REQUEST['action'];

switch ($action){
   
    case 'je_veux_minscrire':
        include "vues/v_inscription.php"; break;
    
    case 'je_veux_me_connecter':
        include "vues/v_connect.php"; break;
   
    case 'enregistrer_inscription':
        
        $nom    = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $civ    = filter_input( INPUT_POST, 'civ', FILTER_SANITIZE_STRING);
        $adresse= $_POST['adresse'];
        $cp     = $_POST['cp'];
        $ville  = $_POST['ville'];
        $tel    = $_POST['tel'];
        $login  = $_POST['login'];
        $mdp    = $_POST['mdp'];
        $re_mdp = $_POST['re_mdp'];
        
        include "vues/v_inscription.php";
        
        if( empty($login) || empty($mdp) || empty($re_mdp)){
            $message = '<br>Merci de remplir tous les champs. ';
            include "vues/v_message.php";
            
            if( $mdp != $re_mdp){
                $message = '<br>Erreur de saisie du mot de passe. Veuillez réessayer. ';
                include "vues/v_message.php";
            }
            
        }else{
            
            $proteger = Outils\hashMdp($mdp);
            if($proteger == NULL){
               $message = 'Mot de passe non conforme. Merci de choisir un mot de passe contenant au moins 7 caractères. <br> ';
               include "vues/v_message.php";
            
            }else{
               $insert_dans_bdd = $pdo->enregistrerLogin($nom,$prenom,$civ,$adresse,$cp,$ville,$login,$tel,$login,$proteger);
               
               if($insert_dans_bdd !== TRUE){
                   $message = 'Echec. Veuillez réessayer.';
                   include "vues/v_message.php";
                   
               }else{
                   $message = 'Inscription réussie. ';
                    include "vues/v_message.php";
                    echo '<a href="index.php?uc=login&action=je_veux_me_connecter"> Me connecter </a>';
               }
            }
        }
        break;
    
    case 'valider_connexion':

        $login  = $_POST['login'];
        $mdp    = $_POST['mdp'];

        if( empty($login) || empty($mdp)){
            $message = 'Merci de remplir tous les champs. ';
            include "vues/v_message.php";
        }else{

            $message = 'Connexion réussie. ';
            include "vues/v_message.php";

        }

    //faire appel à une fonction 
    break;
}
?>
