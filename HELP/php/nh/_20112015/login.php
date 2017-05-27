<?php
include("inc/header.inc.php");


function Form_login($errlog,$page) {

echo '<div id="page_centre">'."\n";
echo '<div id="elements">'."\n";

echo '<h1>Connexion à votre compte</h1>'."\n";

if($errlog == '1'){ echo '<p><span class="err">ERREUR DE CONNEXION. MERCI DE VERIFIER VOTRE IDENTIFIANT ET VOTRE MOT DE PASSE.</span></p>'."\n"; }

echo '<form action="login-'.$page.'.html" method="post">'."\n";
echo '<h4><label for="pseudo">Votre identifiant</label></h4>'."\n";
echo '<p><input type="text" name="pseudo" id="pseudo" maxlength="250" size="32" value=""></p>'."\n";
echo '<h4><label for="user_pwd">Mot de passe</label></h4>'."\n";
echo '<p><input type="password" name="user_pwd" id="user_pwd" maxlength="32" size="32" value=""></p>'."\n";
echo '<p><input type="submit" class="envoy" value="Connexion" /></p>'."\n";
echo '</form>'."\n";

echo '</div>'."\n";
echo '</div>'."\n";

}


function Form_recup($errrec,$page) {

echo '<div id="page_centre">'."\n";
echo '<div id="elements">'."\n";

echo '<h1>Récupérer vos identifiants</h1>'."\n";

if($errrec == '1'){ echo '<p><span class="err">Cette adresse n\'existe pas.</span></p>'."\n"; }

echo '<form action="login-'.$page.'.html" method="post">'."\n";
echo '<p>Votre courriel : <input type="text" name="user_mail" id="user_mail" maxlength="250" size="32" value="">
<input type="submit" class="envoy" name="recup" value="Récupérer" /></p>'."\n";
echo '</form>'."\n";

echo '</div>'."\n";
echo '</div>'."\n";

}


if(isset($_POST['recup'])){

$user_mail = AddSlashes($_POST['user_mail']);

$sql = "SELECT * FROM " .$table_users. " WHERE user_mail = '$user_mail' "; 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

if($res) {
$row = mysql_fetch_array($req);

$mail_users = $row['user_mail'];
$user_name = $row['user_name'];
$user_pwd = $row['user_pwd'];

$from_email  = "d.sidd.projet@gmail.com";
$entetedate  = date("D, j M Y H:i:s -0600");
$entetemail  = "From: $from_email \n";
$entetemail .= "Cc:  \n";
$entetemail .= "Bcc: \n";
$entetemail .= "Reply-To: $from_email \n";
$entetemail .= "X-Mailer: PHP/" . phpversion() . "\n" ;
$entetemail .= "Date: $entetedate";

mail(
    $mail_users,
    'Votre compte D-SIDD',
"Bonjour, \n
Vous vous êtes inscrit en tant que membre de D-SIDD et nous vous en remercions. Vous pouvez désormais accéder à l'ensemble des diagnostics du territoire pour lequel vous vous êtes inscrit.  \n
Nous vous rappelons votre identifiant et votre mot de passe: \n
Identifiant : ".$user_name." \n
Mot de passe : ".$user_pwd." \n \n
Nous proposons régulièrement de nouveaux diagnostics sur des thématiques revues sous l'angle de l'économie collaborative. N'hésitez pas à consulter notre site internet http://d-sidd.com/ et nous faire vos retours. \n
A très bientôt, \n
Arnaud Milet et Marie Thoreux
Co-porteurs du projet D-SIDD
Le diagnostic territorial autrement
06.38.59.74.85 / 06.26.87.24.14
d.sidd.projet@gmail.com",
    $entetemail
    );

header ('location: index-'.$page.'.html');
exit;

} else {
$errrec = '1';
Form_recup($errrec,$page);
}
} else {

if(isset($_POST) && !empty($_POST['pseudo']) && !empty($_POST['user_pwd'])) {
extract($_POST);
$pseudo = AddSlashes($_POST['pseudo']);
$user_pwd = AddSlashes($_POST['user_pwd']);

$sql = "select * FROM " . $table_users . " where user_name = '".$pseudo."'";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$res = mysql_fetch_array($req);
$user_id = $res['user_id'];
$user_access = $res['user_access'];
$depcom = $res['user_depcom'];
$pwd = $res['user_pwd'];

if($res['user_activation'] != '1') {
$errlog = '1';
Form_login($errlog,$page);
Form_recup($errrec,$page);
} elseif($pwd != $user_pwd) {
$errlog = '1';
Form_login($errlog,$page);
Form_recup($errrec,$page);
} else {
$log_date = date("Y-m-d");
$log_heure = date("H\hi");

$sql_log = "INSERT INTO " .$table_log. "(log_id, log_user_id, log_date, log_heure) VALUES 
('','$user_id','$log_date','$log_heure')";
mysql_query($sql_log) or die('Erreur SQL !'.$sql_log.'<br>'.mysql_error());

session_start();
$_SESSION['id'] = $user_id;
$_SESSION['pseudo'] = stripslashes($pseudo);
$_SESSION['depcom'] = $depcom;
$_SESSION['user_access'] = $user_access;
header ('location: index-'.$page.'.html');
exit;
}

} else {
$errlog = '1';
Form_login($errlog,$page);
Form_recup($errrec,$page);
}

}
include("inc/footer.inc.php");
?>