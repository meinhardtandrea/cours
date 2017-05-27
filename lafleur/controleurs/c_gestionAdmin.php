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
        
        if ( isset( $_POST) && !empty( $_POST[ 'identifiant']) && !empty( $_POST[ 'mdp'])) {

                $identifiant = $_POST[ 'identifiant'];
                $mdp         = $_POST[ 'mdp'];
                
                $mdp_dans_bdd = $pdo->getMdp( $identifiant);

                if ( $mdp_dans_bdd != $mdp) {
			$message = "Erreur de mot de passe";
			include "vues/v_message.php";
                } else {
                    $_SESSION[ 'identifiant'] = $identifiant;
                    if( !isset( $_SESSION[ 'identifiant'])) {
                        $message = "Problème de configuration de votre session. Veuillez réessayer.";
			include "vues/v_message.php";
                        include 'vues/v_connexionCorrige.php';
                    } else {
                        $message = "Bienvenue dans l'administration !";
                        include "vues/v_message.php";
                    }
                }
            }
    break;
}

?>