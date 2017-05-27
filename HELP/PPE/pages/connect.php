<?php
if(!isset($_SESSION['pseudo'])) {
$form = '<div id="element">';
$form .= '<form action="login.php?page='.$page.'" method="post" onsubmit="return VerifLogin(this)">'."\n";
if($err == 1){ $form .=  '<p><strong>Erreur d\'identifiant.</strong></p>'."\n"; }
elseif($err == 2){ $form .=  '<p><strong>Erreur de mot de passe.</strong></p>'."\n"; }
elseif($err == 3){ $form .=  '<p><strong>Erreur de traitement.</strong></p>'."\n"; }
//else{ $form .=  '<p>Votre compte</p>'."\n"; }
$form .= '<p><input type="text" name="user_name" id="user_name" maxlength="32" size="32" value="Votre identifiant" onblur="if(this.value==\'\') this.value=this.defaultValue" onFocus="if(this.value==this.defaultValue) this.value=\'\'"></p>'."\n";
$form .= '<p><input type="password" name="user_pwd" id="user_pwd" maxlength="32" size="32" value="Password" onblur="if(this.value==\'\') this.value=this.defaultValue" onFocus="if(this.value==this.defaultValue) this.value=\'\'"></p>'."\n";
$form .= '<p><input type="submit" class="envoy" value="Connexion" /></p>'."\n";
$form .= '</form>'."\n";
$form .= '</div>'."\n";
echo $form;
} else {
    echo '<div id="element">';
    echo 'Bienvenue <b>'.$_SESSION['pseudo'].'</b> <a href="logout.php?page='.$page.'"><img src="images/disconnect.png" title="Se d&eacute;connecter" alt="Se d&eacute;connecter" /></a>'."\n";
    echo '</div>'."\n";
}
?>