<?php
require 'recaptchalib.php';
include("../admin/conf.ig.php");

$secret = "6LfpFQsTAAAAAHkoF8ytPoAtMo4-v0wT3bjEUlxq";
$siteKey = '6LfpFQsTAAAAANypN_iUCcYsOp201l9nEagQYEQf';

$reCaptcha = new ReCaptcha($secret);

if(isset($_POST["g-recaptcha-response"])) {
    $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
        );

if ($resp != null && $resp->success) {

$user_name = stripslashes(htmlspecialchars($_POST['name']));
$user_pwd = stripslashes(htmlspecialchars($_POST['pwd']));
$pwd2 = stripslashes(htmlspecialchars($_POST['pwd2']));
$user_ville = stripslashes(htmlspecialchars($_POST['ville']));
$user_tel = stripslashes(htmlspecialchars($_POST['tel']));
$user_mail = stripslashes(htmlspecialchars($_POST['mail']));
$user_type = $_POST['user_type'];
$depcom = $_POST['Depcom'];


$sql = "SELECT * FROM " . $table_users . " WHERE user_name = '$user_name' ";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$res = mysql_fetch_array($req);

$sql3 = "SELECT * FROM " . $table_users . " WHERE user_mail = '$user_mail' ";
$req3 = mysql_query($sql3) or die('Erreur SQL !<br>'.$sql3.'<br>'.mysql_error());
$res3 = mysql_fetch_array($req3);


if (empty($user_name)) { header('Location: ../inscription-1.html'); }
elseif ($res) { header('Location: ../inscription-10.html'); }
elseif ($res3) { header('Location: ../inscription-11.html'); }
elseif (empty($user_pwd) OR empty($pwd2)) { header('Location: ../inscription-2.html'); }
elseif ($user_pwd != $pwd2) { header('Location: ../inscription-3.html'); }
elseif (empty($user_ville)) { header('Location: ../inscription-4.html'); }
elseif (!ereg("([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+)", $user_mail)) { header('Location: ../inscription-6.html'); }
elseif (ereg("([a-zA-Z0-9._-]+@{1,}[a-zA-Z0-9._-]+\.[a-zA-Z]+)", $user_mail))
{

// envoi du message :


$date = date("Y-m-d");

$user_name = AddSlashes($user_name);
$user_pwd = AddSlashes($user_pwd);
$user_ville = AddSlashes($user_ville);
$user_tel = AddSlashes($user_tel);
$user_mail = AddSlashes($user_mail);

$user_activation = '1';

$sql2 = "INSERT INTO " .$table_users. "(user_id, user_name, user_pwd, user_ville, user_type, user_depcom, user_tel, user_mail, user_inscription, user_activation) VALUES 
('','$user_name','$user_pwd','$user_ville','$user_type','$depcom','$user_tel','$user_mail','$date','$user_activation')";

$envoi = mysql_query($sql2);


$mail_users = $user_mail;

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

if($envoi) { header('Location: ../inscription-7.html'); }
else { header('Location: ../inscription-8.html'); }


}

} else {
header('Location: ../inscription-9.html');
}
}
?>