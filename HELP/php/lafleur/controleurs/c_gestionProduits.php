<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'login': {
            if (isset($_POST) && !empty($_POST['nom']) && !empty($_POST['mdp'])) {

                $nom = htmlspecialchars($_POST['nom']);
                $mdp = htmlspecialchars($_POST['mdp']);

                $pdo = PdoLafleur::getPdoLafleur();
                $pwdEnr = $pdo->verifAdmin($nom);

                if (strlen($mdp) > 64 or strlen($nom) > 38) {
			$message = "Erreur de longueur mot de passe";
			include ("vues/v_message.php");
                } elseif ($pwdEnr != $mdp) {
			$message = "Erreur de mot de passe";
			include ("vues/v_message.php");
                } else {
                    $_SESSION['nom'] = $nom;
			$message = "Bienvenue dans l'administration !";
			include ("vues/v_message.php");
                    exit;
                }
            }
            break;
        }
}



if (!isset($_SESSION['nom'])) {
    echo '<form action="'.$_SERVER['PHP_SELF'].'?uc=administrer&action=login" method="post">'."\n";
    echo '<p><input type="text" name="nom" id="nom" maxlength="32" size="25" /></p>'."\n";
    echo '<p><input type="password" name="mdp" id="mdp" maxlength="32" size="25" /></p>'."\n";
    echo '<p><input type="submit" name="valider" value="Valider" /></p>'."\n";
    echo '</form>'."\n";
} else {
    
}







?>