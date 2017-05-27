<?php
include("inc/m.header.inc.php");

if (isset($_GET["send"])) $send = $_GET["send"];
else $send="";

function Form_insc($send) {

$user_name = stripslashes($_POST['name']);
$user_pwd = stripslashes($_POST['pwd']);
$pwd2 = stripslashes($_POST['pwd2']);
$user_ville = stripslashes($_POST['ville']);
$user_tel = stripslashes($_POST['tel']);
$user_mail = stripslashes($_POST['mail']);
//$user_type = $_POST['user_type'];
$depcom = $_POST['Depcom'];

if (isset($_POST["user_type"])) $user_type = $_POST["user_type"];
else $user_type="1";

echo '<div id="page_centre">'."\n";
echo '<div id="elements">'."\n";
echo '<a name="log"></a>'."\n";

echo '<h1>CREATION D\'UN COMPTE</h1>'."\n";
if($send == '7'){
echo '<p>Votre compte a été créé avec succès. Nos vous remercions de votre confiance. Vous pouvez désormais vous connecter à l\'espace membre et consulter vos diagnostics.</p>'."\n";
} else {
if($send == '8'){ echo '<p><span class="err2">ERREUR DE TRAITEMENT. MERCI DE RÉ-ESSAYER PLUS TARD.</span></p>'."\n"; };
if($send == '9'){ echo '<p><span class="err2">MERCI DE COCHER LA CASE: "Je ne suis pas un robot".</span></p>'."\n"; };
if($send == '10'){ echo '<p><span class="err2">Cet identifiant existe déjà, merci d\'en choisir un autre.</span></p>'."\n"; };
if($send == '11'){ echo '<p><span class="err2">Ce courriel est déjà utilisé, merci d\'en choisir un autre.</span></p>'."\n"; };
echo '<form action="m.inscription.html" method="post">'."\n";
echo '<h4><label for="name">Votre nom <span class="err">*</span></label></h4>'."\n";
if($send == '1'){ echo '<p><span class="err2">MERCI DE BIEN VOULOIR INDIQUER VOTRE NOM.</span></p>'."\n"; };
echo '<p><input type="text" name="name" id="name" maxlength="250" size="32" value="'.$user_name.'"></p>'."\n";
echo '<h4><label for="pwd">Mot de passe <span class="err">*</span></label></h4>'."\n";
if($send == '2'){ echo '<p><span class="err2">MERCI DE BIEN VOULOIR INDIQUER VOTRE MOT DE PASSE.</span></p>'."\n"; };
if($send == '3'){ echo '<p><span class="err2">LES MOTS DE PASSE NE CORRESPONDENT PAS.</span></p>'."\n"; };
echo '<p><input type="password" name="pwd" id="pwd" maxlength="32" size="32" value="'.$user_pwd.'"></p>'."\n";
echo '<h4><label for="pwd2">Mot de passe (confirmation) <span class="err">*</span></label></h4>'."\n";
echo '<p><input type="password" name="pwd2" id="pwd2" maxlength="32" size="32" value="'.$pwd2.'"></p>'."\n";
echo '<h4><label for="ville">Commune à diagnostiquer <span class="err">*</span></label></h4>'."\n";
if($send == '4'){ echo '<p><span class="err2">MERCI DE BIEN VOULOIR INDIQUER VOTRE COMMUNE.</span></p>'."\n"; };
if($send == '15'){
echo '<p><span class="err2">Notre système ne reconnait pas votre commune.<br/>Merci de sélectionner votre commune dans la liste.</span></p>'."\n";
echo '<p><input type="text" name="ville" id="ville" maxlength="250" size="32" value=""></p>'."\n";
} else {
echo '<p><input type="text" name="ville" id="ville" maxlength="250" size="32" value="'.$user_ville.'"></p>'."\n";
}
if($_POST['Depcom']){
echo '<p style="display:none;"><input type="text" name="Depcom" id="Depcom" value="'.$depcom.'" /></p>'."\n";
} else {
echo '<p style="display:none;"><input type="text" name="Depcom" id="Depcom" /></p>'."\n";
}
echo '<p>Un compte vous donne accès aux diagnostics d\'une seule commune. Contactez-nous pour avoir accès aux diagnostics de plusieurs communes.</p>'."\n";
echo '<h4><label for="user_type">Profil <span class="err">*</span></label></h4>'."\n";
if($send == '12'){ echo '<p><span class="err2">MERCI DE BIEN VOULOIR SELECTIONNER VOTRE PROFIL.</span></p>'."\n"; };
if($user_type == '1'){
echo '<p><input type="radio" name="user_type" value="1" id="1" checked="checked"/> <label class="radioCheck" for="1">Citoyen</label></p>'."\n";
} else {
echo '<p><input type="radio" name="user_type" value="1" id="1"/> <label class="radioCheck" for="1">Citoyen</label></p>'."\n";
}
if($user_type == '2'){
echo '<p><input type="radio" name="user_type" value="2" id="2" checked="checked"/> <label class="radioCheck" for="2">Collectivité (élu)</label></p>'."\n";
} else {
echo '<p><input type="radio" name="user_type" value="2" id="2"/> <label class="radioCheck" for="2">Collectivité (élu)</label></p>'."\n";
}
if($user_type == '3'){
echo '<p><input type="radio" name="user_type" value="3" id="3" checked="checked"/> <label class="radioCheck" for="3">Collectivité (technicien)</label></p>'."\n";
} else {
echo '<p><input type="radio" name="user_type" value="3" id="3"/> <label class="radioCheck" for="3">Collectivité (technicien)</label></p>'."\n";
}
if($user_type == '4'){
echo '<p><input type="radio" name="user_type" value="4" id="4" checked="checked"/> <label class="radioCheck" for="4">Entreprise</label></p>'."\n";
} else {
echo '<p><input type="radio" name="user_type" value="4" id="4"/> <label class="radioCheck" for="4">Entreprise</label></p>'."\n";
}
if($user_type == '5'){
echo '<p><input type="radio" name="user_type" value="5" id="5" checked="checked"/> <label class="radioCheck" for="5">Association</label></p>'."\n";
} else {
echo '<p><input type="radio" name="user_type" value="5" id="5"/> <label class="radioCheck" for="5">Association</label></p>'."\n";
}
if($user_type == '6'){
echo '<p><input type="radio" name="user_type" value="6" id="6" checked="checked"/> <label class="radioCheck" for="6">Autre</label></p>'."\n";
} else {
echo '<p><input type="radio" name="user_type" value="6" id="6"/> <label class="radioCheck" for="6">Autre</label></p>'."\n";
}
echo '<h4><label for="mail">Courriel <span class="err">*</span></label></h4>'."\n";
if($send == '6'){ echo '<p><span class="err2">MERCI DE BIEN VOULOIR INDIQUER VOTRE COURRIEL.</span></p>'."\n"; };
echo '<p><input type="text" name="mail" id="mail" maxlength="250" size="32" value="'.$user_mail.'"></p>'."\n";
echo '<h4><label for="tel">Téléphone</label></h4>'."\n";
if($send == '5'){ echo '<p><span class="err2">MERCI DE BIEN VOULOIR INDIQUER VOTRE TÉLÉPHONE.</span></p>'."\n"; };
echo '<p><input type="text" name="tel" id="tel" maxlength="20" size="32" value="'.$user_tel.'"></p>'."\n";
echo '<p><span class="err">*</span> Informations obligatoires</p>'."\n";
echo '<div class="g-recaptcha" data-sitekey="6LfpFQsTAAAAANypN_iUCcYsOp201l9nEagQYEQf"></div><br/>'."\n";
echo '<p><input type="submit" class="envoy" name="valider" value="Créer" /></p>'."\n";
echo '</form>'."\n";
echo '<script src="https://www.google.com/recaptcha/api.js"></script>'."\n";
}
echo '</div>'."\n";
echo '</div>'."\n";

}


if(isset($_POST['valider'])){
require 'inc/recaptchalib.php';

$secret = "6LfpFQsTAAAAAHkoF8ytPoAtMo4-v0wT3bjEUlxq";
$siteKey = '6LfpFQsTAAAAANypN_iUCcYsOp201l9nEagQYEQf';

$reCaptcha = new ReCaptcha($secret);

if(isset($_POST["g-recaptcha-response"])) {
    $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
        );

if ($resp != null && $resp->success) {

$user_name = stripslashes($_POST['name']);
$user_pwd = stripslashes($_POST['pwd']);
$pwd2 = stripslashes($_POST['pwd2']);
$user_ville = stripslashes($_POST['ville']);
$user_tel = stripslashes($_POST['tel']);
$user_mail = stripslashes($_POST['mail']);
$user_type = $_POST['user_type'];
$depcom = $_POST['Depcom'];

$sql = "SELECT * FROM " . $table_users . " WHERE user_name = '$user_name' ";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$res = mysql_fetch_array($req);

$sql3 = "SELECT * FROM " . $table_users . " WHERE user_mail = '$user_mail' ";
$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
$res3 = mysql_fetch_array($req3);

if (empty($depcom)) {
$user_ville = str_replace ( ' ', '-', $user_ville);
$sql4 = "SELECT * FROM Infos_Communes WHERE libéllé like '$user_ville' ORDER BY population_commune DESC ";
$req4 = mysql_query($sql4) or die('Erreur SQL !'.$sql4.'<br>'.mysql_error());
$res4 = mysql_num_rows($req4);
if($res4 == 1){
$row4 = mysql_fetch_array($req4);
$depcom = $row4['code'];
$user_ville = $row4['libéllé'];
}
}

if (empty($user_name)) {
$send = '1';
Form_insc($send);
}
elseif ($res) {
$send = '10';
Form_insc($send);
}
elseif ($res3) {
$send = '11';
Form_insc($send);
}
elseif (empty($user_pwd) OR empty($pwd2)) {
$send = '2';
Form_insc($send);
}
elseif ($user_pwd != $pwd2) {
$send = '3';
Form_insc($send);
}
elseif (empty($user_ville)) {
$send = '4';
Form_insc($send);
}
elseif (empty($depcom)) {
$send = '15';
Form_insc($send);
}
elseif (!ereg("([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+)", $user_mail)) {
$send = '6';
Form_insc($send);
}
elseif (ereg("([a-zA-Z0-9._-]+@{1,}[a-zA-Z0-9._-]+\.[a-zA-Z]+)", $user_mail))
{
$date = date("Y-m-d");
$heure = date("H\hi");
$user_name = AddSlashes($user_name);
$user_pwd = AddSlashes($user_pwd);
$user_ville = AddSlashes($user_ville);
$user_tel = AddSlashes($user_tel);
$user_mail = AddSlashes($user_mail);
$user_activation = '1';

$sql2 = "INSERT INTO " .$table_users. "(user_id, user_name, user_pwd, user_ville, user_type, user_depcom, user_tel, user_mail, user_inscription, user_heure, user_activation) VALUES 
('','$user_name','$user_pwd','$user_ville','$user_type','$depcom','$user_tel','$user_mail','$date','$heure','$user_activation')";

$envoi = mysql_query($sql2);


$mail_users = $user_mail;

$from_email  = "d.sidd.projet@gmail.com";
$from_email2  = "nicolas@digiforge.fr";
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
Nous vous rappelons votre identifiant: \n
Identifiant : ".$user_name." \n \n
Nous proposons régulièrement de nouveaux diagnostics sur des thématiques revues sous l'angle de l'économie collaborative. N'hésitez pas à consulter notre site internet http://d-sidd.com/ et nous faire vos retours. \n
A très bientôt, \n
Arnaud Milet et Marie Thoreux
Co-porteurs du projet D-SIDD
Le diagnostic territorial autrement
06.38.59.74.85 / 06.26.87.24.14
d.sidd.projet@gmail.com",
    $entetemail
    );

if($user_type == 2){
$profil = 'Collectivité (élu)';
} elseif($user_type == 3){
$profil = 'Collectivité (technicien)';
} elseif($user_type == 4){
$profil = 'Entreprise';
} elseif($user_type == 5){
$profil = 'Association';
} elseif($user_type == 6){
$profil = 'Autre';
} elseif($user_type == 1){
$profil = 'Citoyen';
} else {
$profil = 'Citoyen';
}

mail(
    $from_email,
    'Nouveau compte D-SIDD',
"Bonjour, \n
Un nouveau compte a été créé sur le site D-SIDD.com: \n
Identifiant : ".$user_name." \n
Profil : ".$profil." \n
Commune : ".$user_ville." \n
Depcom : ".$depcom." \n
Courriel : ".$user_mail." \n
Arnaud Milet et Marie Thoreux
Co-porteurs du projet D-SIDD
Le diagnostic territorial autrement
06.38.59.74.85 / 06.26.87.24.14
d.sidd.projet@gmail.com",
    $entetemail
    );

if($envoi) {
$send = '7';
Form_insc($send);
} else {
$send = '8';
Form_insc($send);
}

}

} else {
$send = '9';
Form_insc($send);
}
}


} else {
Form_insc($send);
}


include("inc/m.footer.inc.php");
?>