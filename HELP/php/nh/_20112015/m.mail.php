<?php
session_start();

if (isset($_GET["position"])) $position = $_GET["position"];
else $position="1";

if (isset($_GET["mod_id"])) $mod_id = $_GET["mod_id"];
else $mod_id="";

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

$exp = $_POST['mail'];

//$pseudo_us = stripslashes($_POST['pseudo_us']);

$nom_prenom = stripslashes($_POST['sujet']);
$msg = stripslashes($_POST['msg']);
$code_postal = stripslashes($_POST['code_postal']);


if (empty($_POST['mail'])) { header('Location: ./m.index-'.$position.'-1.html'); }
elseif (empty($_POST['sujet'])) { header('Location: ./m.index-'.$position.'-2.html'); }
elseif (empty($_POST['code_postal'])) { header('Location: ./m.index-'.$position.'-6.html'); }
elseif (empty($_POST['msg'])) { header('Location: ./m.index-'.$position.'-3.html'); }
elseif (!ereg("([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+)", $exp)) { header('Location: ./m.index-'.$position.'-4.html'); }
elseif (ereg("([a-zA-Z0-9._-]+@{1,}[a-zA-Z0-9._-]+\.[a-zA-Z]+)", $exp))
{

// envoi du message :

include("admin/conf.ig.php");

$sqly = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' ";
$reqy = mysql_query($sqly) or die('Erreur SQL !'.$sqly.'<br>'.mysql_error());
$rowy = mysql_fetch_array($reqy);

$destinataire = $rowy['mod_mail'];
$mod_rub_id = $rowy['mod_rub_id'];

$date = date("Y-m-d");
$heure = date("H\hi");

$entetedate  = date("D, j M Y H:i:s -0600");
$entetemail  = "From: $exp \n";
$entetemail .= "Cc:  \n";
$entetemail .= "Bcc: \n";
$entetemail .= "Reply-To: $exp \n";
$entetemail .= "X-Mailer: PHP/" . phpversion() . "\n" ;
$entetemail .= "Date: $entetedate";

mail(
    $destinataire,
    $nom_prenom,
"".$nom_prenom." \n
".$code_postal." \n
".$msg."",
    $entetemail
    );

$sujet = AddSlashes($sujet);
$msg = AddSlashes($msg);

$sql2 = "INSERT INTO " .$table_mail. "(mail_id, mail_rub_id, mail_mod_id, mail_mail, mail_titre, mail_texte, mail_date, mail_heure) VALUES 
('','mod_rub_id','$mod_id','$mail','$sujet','$msg','$date','$heure')";

$envoi = mysql_query($sql2);

if($envoi) { header('Location: ./m.index-'.$position.'-6.html'); }
else { header('Location: ./m.index-'.$position.'-7.html'); }


}

} else {
header('Location: ./m.index-'.$position.'-5.html');
}
}
?>