<?php
$insc = '<form action="" method="post" onsubmit="return VerifLogin(this)">'."\n";
if($err == 1){ $insc .=  '<p><strong>Erreur d\'identifiant.</strong></p>'."\n"; }
elseif($err == 2){ $insc .=  '<p><strong>Erreur de mot de passe.</strong></p>'."\n"; }
elseif($err == 3){ $insc .=  '<p><strong>Erreur de traitement.</strong></p>'."\n"; }
$insc .=  '<p><input type="text" name="user_name" id="user_login" maxlength="32" size="32" value="Votre identifiant" onblur="if(this.value==\'\') this.value=this.defaultValue" onFocus="if(this.value==this.defaultValue) this.value=\'\'"></p>'."\n";
$insc .=  '<p><input type="text" name="user_mail" id="user_mail" maxlength="64" size="32" value="Votre courriel" onblur="if(this.value==\'\') this.value=this.defaultValue" onFocus="if(this.value==this.defaultValue) this.value=\'\'"></p>'."\n";
$insc .=  '<p><input type="submit" class="envoy" value="S\'inscrire" /></p>'."\n";
$insc .=  '</form>'."\n";

echo '<div id="element">'."\n";

if(isset($_POST) && !empty($_POST['user_name']) && !empty($_POST['user_mail'])) {

$user_pwd = htmlspecialchars($_POST['user_mail']);
$user_name = htmlspecialchars($_POST['user_name']);
$pseudoEnr = 'admin';
$pwdEnr = 'admin';

if(strlen($user_mail) > 64 or strlen($user_name) > 32){
header ('location: index-'.$page.'-1.html');
exit;
}elseif($pseudoEnr != $user_name) {
header ('location: index-'.$page.'-1.html');
exit;
} elseif($pwdEnr != $user_mail) {
header ('location: index-'.$page.'-2.html');
exit;
} else {
session_start();
$_SESSION['pseudo'] = $user_name;
header ('location: index-'.$page.'.html');
exit;
}

} else {
echo $insc;
}

echo '</div>'."\n";
?>