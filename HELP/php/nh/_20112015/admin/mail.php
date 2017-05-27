<?php
include("inc/header.inc.php");


if(!isset($_SESSION['pseudo'])) {
echo '<p><font color="red">Vous n\'avez pas accès à ce service.<br />Merci de votre visite.</font></p>'."\n";
echo '</div>'."\n";
include("inc/footer.inc.php");
  exit;
}

if($_SESSION['user_access'] >= 3) {
echo '<p><font color="red">Vous n\'avez pas accès à ce service.<br />Merci de votre visite.</font></p>'."\n";
echo '</div>'."\n";
include("inc/footer.inc.php");
exit;
}

if (isset($_GET["user_id"])) $user_id = $_GET["user_id"];
else $user_id="";
if (isset($_GET["alph"])) $alph = $_GET["alph"];
else $alph="A";
if (isset($_GET["type"])) $type = $_GET["type"];
else $type="all";
if (isset($_GET["groupe_id"])) $groupe_id = $_GET["groupe_id"];
else $groupe_id="";
if (isset($_GET["cot"])) $cot = $_GET["cot"];
else $cot="";



function mail_user($alph,$type,$user_id) {
include ("conf.ig.php");

$sql = "SELECT * FROM " .$table_users. " WHERE user_id = '$user_id' ";
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

if($res){

$row = mysql_fetch_array($req);

$user_id = $row['user_id'];
$user_name = $row['user_name'];
$user_mail = $row['user_mail'];

echo '<h1>Envoi d\'un courriel à '.$user_name.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="users.php?alph='.$alph.'&type='.$type.'">< Retour aux adhérents</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

echo '<div id="form">'."\n";
echo '<form action="mail.php?action=send_mail&user_id='.$user_id.'&alph='.$alph.'&type='.$type.'" method="post">'."\n";

echo '<h5>Sujet</h5>'."\n";
echo '<p><input type="text" name="mail_subject" maxlength="250" size="32"></p>'."\n";

echo '<h5>Texte</h5>'."\n";
echo '<p><textarea cols="60" id="mail_text" name="mail_text" rows="10" ></textarea></p>'."\n";

echo '<p><input type="image" class="envoy" src="images/boutons/b_suite.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";


}

}

/////////////////////////////////////////////////////////////////////////////////////////////////





echo '<div id="pageleft">'."\n";

echo '<div id="element_left">'."\n";
echo '<h1>Statistiques :</h1>'."\n";

$sql = "SELECT * FROM " .$table_users. " WHERE user_access >= 4 ORDER BY user_access "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

if($res){
echo '<p>Total : <b>'.$res.'</b></p>'."\n";
} else {
echo '<p>Aucun adhérent.</p>'."\n";
}

$sql2 = "SELECT * FROM " .$table_users. " WHERE user_nl = 'active' AND user_access >= 4 ORDER BY user_access "; 
$req2 = mysql_query($sql2) or die('Erreur SQL !'.$sql2.'<br>'.mysql_error());
$res2 = mysql_num_rows($req2);

if($res2){
echo '<p>Abonnés à la newsletter : <b>'.$res2.'</b></p>'."\n";
} else {
echo '<p>Abonnés à la newsletter : <b>0</b></p>'."\n";
}

$sql3 = "SELECT * FROM " .$table_users. " WHERE user_type = '1' AND user_access >= 4 ORDER BY user_access "; 
$req3 = mysql_query($sql3) or die('Erreur SQL !'.$sql3.'<br>'.mysql_error());
$res3 = mysql_num_rows($req3);

if($res3){
echo '<p>Adhérents : <b>'.$res3.'</b></p>'."\n";
} else {
echo '<p>Adhérents : <b>0</b></p>'."\n";
}

$sql4 = "SELECT * FROM " .$table_users. " WHERE user_type = '2' AND user_access >= 4 ORDER BY user_access "; 
$req4 = mysql_query($sql4) or die('Erreur SQL !'.$sql4.'<br>'.mysql_error());
$res4 = mysql_num_rows($req4);

if($res4){
echo '<p>Adhérents cotisant : <b>'.$res4.'</b></p>'."\n";
} else {
echo '<p>Adhérents cotisant : <b>0</b></p>'."\n";
}

$sql5 = "SELECT * FROM " .$table_users. " WHERE user_type = '3' AND user_access >= 4 ORDER BY user_access "; 
$req5 = mysql_query($sql5) or die('Erreur SQL !'.$sql5.'<br>'.mysql_error());
$res5 = mysql_num_rows($req5);

if($res5){
echo '<p>Etudiants : <b>'.$res5.'</b></p>'."\n";
} else {
echo '<p>Etudiants : <b>0</b></p>'."\n";
}

$sql6 = "SELECT * FROM " .$table_users. " WHERE user_type = '4' AND user_access >= 4 ORDER BY user_access "; 
$req6 = mysql_query($sql6) or die('Erreur SQL !'.$sql6.'<br>'.mysql_error());
$res6 = mysql_num_rows($req6);

if($res6){
echo '<p>Partenaires : <b>'.$res6.'</b></p>'."\n";
} else {
echo '<p>Partenaires : <b>0</b></p>'."\n";
}

$sql7 = "SELECT * FROM " .$table_users. " WHERE user_type_pers = '1' AND user_access >= 4 ORDER BY user_access "; 
$req7 = mysql_query($sql7) or die('Erreur SQL !'.$sql7.'<br>'.mysql_error());
$res7 = mysql_num_rows($req7);

if($res7){
echo '<p>Personnes physique : <b>'.$res7.'</b></p>'."\n";
} else {
echo '<p>Personnes physique : <b>0</b></p>'."\n";
}

$sql8 = "SELECT * FROM " .$table_users. " WHERE user_type_pers = '2' AND user_access >= 4 ORDER BY user_access "; 
$req8 = mysql_query($sql8) or die('Erreur SQL !'.$sql8.'<br>'.mysql_error());
$res8 = mysql_num_rows($req8);

if($res8){
echo '<p>Personnes morale : <b>'.$res8.'</b></p>'."\n";
} else {
echo '<p>Personnes morale : <b>0</b></p>'."\n";
}

echo '<h1><br/><br/>Cotisations :</h1>'."\n";

$sql9 = "SELECT * FROM " .$table_users. " WHERE user_type != '1' AND user_access >= 4 AND user_access >= 4 ORDER BY user_access "; 
$req9 = mysql_query($sql9) or die('Erreur SQL !'.$sql9.'<br>'.mysql_error());
$res9 = mysql_num_rows($req9);

if($res9){
echo '<p>Cotisans : <b>'.$res9.'</b></p>'."\n";
} else {
echo '<p>Cotisans : <b>0</b></p>'."\n";
}

$today_an = date("Y");

$sql10 = "SELECT * FROM " .$table_users. " WHERE user_type != '1' AND user_access >= 4 AND user_cot_date = '0000-00-00' ORDER BY user_access "; 
$req10 = mysql_query($sql10) or die('Erreur SQL !'.$sql10.'<br>'.mysql_error());
$res10 = mysql_num_rows($req10);

if($res10){
echo '<p>Cotisations non réglées : <b>'.$res10.'</b> [ <a href="users.php?alph='.$alph.'&type='.$type.'&cot=1">Voir</a> ]</p>'."\n";
} else {
echo '<p>Cotisations non réglées : <b>0</b></p>'."\n";
}




echo '</div>'."\n";


echo '<div id="element_left">'."\n";
echo '<h1><a href="groupes.php">Groupes :</a></h1>'."\n";

$sql = "SELECT * FROM " .$table_groupes. "  ORDER by groupe_titre";
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

if($res){
while($row = mysql_fetch_array($req)) {
$groupe_id = $row['groupe_id'];
$groupe_titre = $row['groupe_titre'];

$sqlc = "SELECT * FROM " .$table_cross. " WHERE cross_groupe_id = '$groupe_id' ";
$reqc = mysql_query($sqlc) or die('Erreur SQL !'.$sqlc.'<br>'.mysql_error());
$resc = mysql_num_rows($reqc);

echo '<p>- <a href="groupes.php?action=view&groupe_id='.$groupe_id.'">'.$groupe_titre.'</a> ('.$resc.')</p>'."\n";
}
}
echo '<p><br/>[ <a href="groupes.php?action=add">Ajouter un groupe</a> ]</p>'."\n";

echo '</div>'."\n";




echo '</div>'."\n";

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

echo '<div id="pageright">'."\n";


if(!empty($_GET['action'])){
switch($_GET['action']){






    case 'send_mail':

extract($_POST,EXTR_OVERWRITE);

$sql = "SELECT * FROM " .$table_users. " WHERE user_id = '$user_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_fetch_array($req);

$mail_users = $res['user_mail'];

$mail_text = strip_tags($mail_text);

$from_email  = "nicolas@digiforge.fr";
$entetedate  = date("D, j M Y H:i:s -0600");
$entetemail  = "From: $from_email \n";
$entetemail .= "Cc:  \n";
$entetemail .= "Bcc: \n";
$entetemail .= "Reply-To: $from_email \n";
$entetemail .= "X-Mailer: PHP/" . phpversion() . "\n" ;
$entetemail .= "Date: $entetedate";

mail(
    $mail_users,
    $mail_subject,
"".$mail_text." \n \n
Cordialement, \n
D-SIDD \n
adresse 1 \n
Tél.: xx xx xx xx xx \n
adresse 2 \n
adresse 3 \n
34000 MONTPELLIER",
    $entetemail
    );

echo '<p align="center"><br/><b>Courriel envoyé avec succès !</b></p>';
echo '<p align="center"><br/><a href="users.php?action=send_mail&user_id='.$user_id.'&alph='.$alph.'&type='.$type.'"><img src="images/boutons/b_back.gif" border="0" alt="Retour" title="Retour"></a></p>'."\n";

    break;



default:
mail_user($alph,$type,$user_id);
break;
}




} else {
mail_user($alph,$type,$user_id);
}


echo '</div>'."\n";

include("inc/footer.inc.php");
?>