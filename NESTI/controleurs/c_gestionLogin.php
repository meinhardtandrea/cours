<?php

require_once "util/Outils.php";
$action = $_REQUEST['action'];
switch ($action) {

    case 'je_veux_minscrire':
        include "vues/v_inscription.php";
        break;

    case 'je_veux_me_connecter':
        include "vues/v_connect.php";
        break;

    case 'je_veux_me_deconnecter':
        session_destroy();
        break;

    case 'enregistrer_inscription':

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $civ = filter_input(INPUT_POST, 'civ', FILTER_SANITIZE_STRING);
        $adresse = $_POST['adresse'];
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];
        $tel = $_POST['tel'];
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        $re_mdp = $_POST['re_mdp'];

        include "vues/v_inscription.php";

        if (empty($login) || empty($mdp) || empty($re_mdp)) {
            $message = '<br>Merci de remplir tous les champs. ';
            include "vues/v_message.php";

            if ($mdp != $re_mdp) {
                $message = '<br>Erreur de saisie du mot de passe. Veuillez réessayer. ';
                include "vues/v_message.php";
            }
        } else {

            $mdp_hash = Outils\hashMdp($mdp);
            if ($mdp_hash == NULL) {
                $message = 'Mot de passe non conforme. Merci de choisir un mot de passe contenant au moins 7 caractères. <br> ';
                include "vues/v_message.php";
            } else {
                $insert_dans_bdd = $pdo->enregistrerLogin($nom, $prenom, $civ, $adresse, $cp, $ville, $login, $tel, $login, $mdp_hash);

                if ($insert_dans_bdd !== TRUE) {
                    $message = 'Echec. Veuillez réessayer.';
                    include "vues/v_message.php";
                } else {
                    $message = 'Inscription réussie. ';
                    include "vues/v_message.php";
                    include "vues/v_connect.php";
                }
            }
        }
        break;

    case 'valider_connexion':
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        if (empty($login) || empty($mdp)) {
            $message = 'Merci de remplir tous les champs. ';
            include "vues/v_message.php";
            include "vues/v_connect.php";
        } else {

            $mdp_hash = Outils\hashMdp($mdp);
            $mdp_dans_bdd = $pdo->getMdp($login);
            if ($mdp_hash != $mdp_dans_bdd) {
                $message = 'Mauvais mot de passe.';
                include "vues/v_message.php";
                include "vues/v_connect.php";
            } else {
                $message = 'Connexion réussie.';
                include "vues/v_message.php";
                $_SESSION['login'] = $login;
            }
        }
        break;

    case 'gerer_mon_compte':
        $login = $_SESSION['login'];
        
        $afficher_profil = $pdo->getProfil($login);
        
        foreach ($afficher_profil as $element_profil) {
            $id      = $element_profil['id_cli'];
            $nom     = $element_profil['nom_cli'];
            $prenom  = $element_profil['prenom_cli'];
            $civ     = $element_profil['civ_cli'];
            $adresse = $element_profil['adr_cli'];
            $cp      = $element_profil['cp_cli'];
            $ville   = $element_profil['ville_cli'];
            $email   = $element_profil['email_cli'];
            $tel     = $element_profil['tel_cli'];
            $login   = $element_profil['login_cli'];
        }
        include "vues/v_Compte.php";
        break;

    case 'modifier_mon_compte':
        $login = $_SESSION['login'];
        
        $new_nom     = $_POST['nom'];
        $new_prenom  = $_POST['prenom'];
        $new_civ     = filter_input(INPUT_POST, 'civ', FILTER_SANITIZE_STRING);
        $new_adresse = $_POST['adresse'];
        $new_cp      = $_POST['cp'];
        $new_ville   = $_POST['ville'];
        $new_tel     = $_POST['tel'];
        $new_login   = $_POST['login'];
        
        $update_dans_bdd = $pdo->modifierProfil($login, $new_nom, $new_prenom, $new_civ, $new_adresse, $new_cp, $new_ville, $new_login, $new_tel);

        if ($update_dans_bdd !== TRUE) {
            $message = 'Echec. Veuillez réessayer.';
            include "vues/v_message.php";
        } else {
            $message = 'Sauvegarde réussie. ';
            include "vues/v_message.php";
        }
        break;

    case 'changer_mdp':
        include "vues/v_Compte_ChgerMdp.php";
        break;
    
    case 'enregistrer_new_mdp':
        $login = $_SESSION['login'];
        
        $mdp_actuel  = $_POST['mdp_actuel'];
        $mdp_nouveau = $_POST['mdp_nouveau'];
        $mdp_confirm = $_POST['mdp_confirm'];
        
        $mdp_dans_bdd = $pdo->getMdp($login);
        
        if (empty($mdp_actuel) || empty($mdp_nouveau) || empty($mdp_confirm)) {
            $message = '<br>Merci de remplir tous les champs. ';
            include "vues/v_message.php";
            
            if ( $mdp_actuel != $mdp_dans_bdd){
                $message = 'Mauvais mot de passe.';
                include "vues/v_message.php";
            }

            if ($mdp_nouveau != $mdp_confirm) {
                $message = '<br>Erreur de saisie du mot de passe. Veuillez réessayer. ';
                include "vues/v_message.php";
            }
        } else {
            $mdp = $mdp_nouveau;
            $mdp_hash = Outils\hashMdp($mdp);
            if ($mdp_hash == NULL) {
                $message = 'Mot de passe non conforme. Merci de choisir un mot de passe contenant au moins 7 caractères. <br> ';
                include "vues/v_message.php";
            } else {
                $update_dans_bdd = $pdo->enregistrerMdp($login, $mdp_hash);

                if ($update_dans_bdd !== TRUE) {
                    $message = 'Echec. Veuillez réessayer.';
                    include "vues/v_message.php";
                } else {
                    $message = 'Sauvegarde réussie. ';
                    include "vues/v_message.php";
                }
            }
        }
}
?>