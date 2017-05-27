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
else $alph="all";



function users($alph) {
include ("conf.ig.php");
echo '<h1>Liste des administrateurs</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="admins.php?action=add&alph='.$alph.'">+ Ajouter un administrateur</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

echo '<div id="alph">'."\n";
echo '<p><b>';
if($alph == 'A'){
echo '<a href="admins.php?alph=A&type='.$type.'" id="current">A</a> - ';
} else {
echo '<a href="admins.php?alph=A&type='.$type.'">A</a> - ';
}
if($alph == 'B'){
echo '<a href="admins.php?alph=B&type='.$type.'" id="current">B</a> - ';
} else {
echo '<a href="admins.php?alph=B&type='.$type.'">B</a> - ';
}
if($alph == 'C'){
echo '<a href="admins.php?alph=C&type='.$type.'" id="current">C</a> - ';
} else {
echo '<a href="admins.php?alph=C&type='.$type.'">C</a> - ';
}
if($alph == 'D'){
echo '<a href="admins.php?alph=D&type='.$type.'" id="current">D</a> - ';
} else {
echo '<a href="admins.php?alph=D&type='.$type.'">D</a> - ';
}
if($alph == 'E'){
echo '<a href="admins.php?alph=E&type='.$type.'" id="current">E</a> - ';
} else {
echo '<a href="admins.php?alph=E&type='.$type.'">E</a> - ';
}
if($alph == 'F'){
echo '<a href="admins.php?alph=F&type='.$type.'" id="current">F</a> - ';
} else {
echo '<a href="admins.php?alph=F&type='.$type.'">F</a> - ';
}
if($alph == 'G'){
echo '<a href="admins.php?alph=G&type='.$type.'" id="current">G</a> - ';
} else {
echo '<a href="admins.php?alph=G&type='.$type.'">G</a> - ';
}
if($alph == 'H'){
echo '<a href="admins.php?alph=H&type='.$type.'" id="current">H</a> - ';
} else {
echo '<a href="admins.php?alph=H&type='.$type.'">H</a> - ';
}
if($alph == 'I'){
echo '<a href="admins.php?alph=I&type='.$type.'" id="current">I</a> - ';
} else {
echo '<a href="admins.php?alph=I&type='.$type.'">I</a> - ';
}
if($alph == 'J'){
echo '<a href="admins.php?alph=J&type='.$type.'" id="current">J</a> - ';
} else {
echo '<a href="admins.php?alph=J&type='.$type.'">J</a> - ';
}
if($alph == 'K'){
echo '<a href="admins.php?alph=K&type='.$type.'" id="current">K</a> - ';
} else {
echo '<a href="admins.php?alph=K&type='.$type.'">K</a> - ';
}
if($alph == 'L'){
echo '<a href="admins.php?alph=L&type='.$type.'" id="current">L</a> - ';
} else {
echo '<a href="admins.php?alph=L&type='.$type.'">L</a> - ';
}
if($alph == 'M'){
echo '<a href="admins.php?alph=M&type='.$type.'" id="current">M</a> - ';
} else {
echo '<a href="admins.php?alph=M&type='.$type.'">M</a> - ';
}
if($alph == 'N'){
echo '<a href="admins.php?alph=N&type='.$type.'" id="current">N</a> - ';
} else {
echo '<a href="admins.php?alph=N&type='.$type.'">N</a> - ';
}
if($alph == 'O'){
echo '<a href="admins.php?alph=O&type='.$type.'" id="current">O</a> - ';
} else {
echo '<a href="admins.php?alph=O&type='.$type.'">O</a> - ';
}
if($alph == 'P'){
echo '<a href="admins.php?alph=P&type='.$type.'" id="current">P</a> - ';
} else {
echo '<a href="admins.php?alph=P&type='.$type.'">P</a> - ';
}
if($alph == 'Q'){
echo '<a href="admins.php?alph=Q&type='.$type.'" id="current">Q</a> - ';
} else {
echo '<a href="admins.php?alph=Q&type='.$type.'">Q</a> - ';
}
if($alph == 'R'){
echo '<a href="admins.php?alph=R&type='.$type.'" id="current">R</a> - ';
} else {
echo '<a href="admins.php?alph=R&type='.$type.'">R</a> - ';
}
if($alph == 'S'){
echo '<a href="admins.php?alph=S&type='.$type.'" id="current">S</a> - ';
} else {
echo '<a href="admins.php?alph=S&type='.$type.'">S</a> - ';
}
if($alph == 'T'){
echo '<a href="admins.php?alph=T&type='.$type.'" id="current">T</a> - ';
} else {
echo '<a href="admins.php?alph=T&type='.$type.'">T</a> - ';
}
if($alph == 'U'){
echo '<a href="admins.php?alph=U&type='.$type.'" id="current">U</a> - ';
} else {
echo '<a href="admins.php?alph=U&type='.$type.'">U</a> - ';
}
if($alph == 'V'){
echo '<a href="admins.php?alph=V&type='.$type.'" id="current">V</a> - ';
} else {
echo '<a href="admins.php?alph=V&type='.$type.'">V</a> - ';
}
if($alph == 'W'){
echo '<a href="admins.php?alph=W&type='.$type.'" id="current">W</a> - ';
} else {
echo '<a href="admins.php?alph=W&type='.$type.'">W</a> - ';
}
if($alph == 'X'){
echo '<a href="admins.php?alph=X&type='.$type.'" id="current">X</a> - ';
} else {
echo '<a href="admins.php?alph=X&type='.$type.'">X</a> - ';
}
if($alph == 'Y'){
echo '<a href="admins.php?alph=Y&type='.$type.'" id="current">Y</a> - ';
} else {
echo '<a href="admins.php?alph=Y&type='.$type.'">Y</a> - ';
}
if($alph == 'Z'){
echo '<a href="admins.php?alph=Z&type='.$type.'" id="current">Z</a> - ';
} else {
echo '<a href="admins.php?alph=Z&type='.$type.'">Z</a> - ';
}
if($alph == 'all'){
echo '<a href="admins.php?alph=all&type='.$type.'" id="current">TOUS</a>';
} else {
echo '<a href="admins.php?alph=all&type='.$type.'">TOUS</a>';
}
echo '</p>'."\n";
echo '</div>'."\n";

if (!$alph) {
$sql = "SELECT * FROM " .$table_users. "  WHERE user_access <= 3 AND user_name like 'A%' ORDER by user_name";
}
elseif ($alph=='all') {
$sql = "SELECT * FROM " .$table_users. " WHERE user_access <= 3 ORDER by user_name";
} else {
$sql = "SELECT * FROM " .$table_users. "  WHERE user_access <= 3 AND user_name like '$alph%' ORDER by user_name";
}

$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

if($res){

while($row = mysql_fetch_array($req)) {

$user_id = $row['user_id'];
$user_name = $row['user_name'];
$user_mail = $row['user_mail'];
$user_activation = $row['user_activation'];
$user_access = $row['user_access'];
$user_site = $row['user_site'];
$user_tel = $row['user_tel'];
$user_ville = $row['user_ville'];
$user_depcom = $row['user_depcom'];
$user_inscription = $row['user_inscription'];
$user_nl = $row['user_nl'];
$user_send = $row['user_send'];

$user_inscription = explode('-', $user_inscription);
if($user_inscription[1] == 1){
$user_inscription[1] = 'janvier';
} elseif ($user_inscription[1] == 2){
$user_inscription[1] = 'février';
} elseif ($user_inscription[1] == 3){
$user_inscription[1] = 'mars';
} elseif ($user_inscription[1] == 4){
$user_inscription[1] = 'avril';
} elseif ($user_inscription[1] == 5){
$user_inscription[1] = 'mai';
} elseif ($user_inscription[1] == 6){
$user_inscription[1] = 'juin';
} elseif ($user_inscription[1] == 7){
$user_inscription[1] = 'juillet';
} elseif ($user_inscription[1] == 8){
$user_inscription[1] = 'août';
} elseif ($user_inscription[1] == 9){
$user_inscription[1] = 'septembre';
} elseif ($user_inscription[1] == 10){
$user_inscription[1] = 'octobre';
} elseif ($user_inscription[1] == 11){
$user_inscription[1] = 'novembre';
} elseif ($user_inscription[1] == 12){
$user_inscription[1] = 'décembre';
}

echo '<div id="users">'."\n";
echo '<h1>'.$user_name.'</h1>'."\n";
echo '<p align="right">Inscrit le '.$user_inscription[2].' '.$user_inscription[1].' '.$user_inscription[0].'.</p>'."\n";
echo '<p><a href="mailto:'.$user_mail.'">'.$user_mail.'</a></p>'."\n";

echo '<p>Ville : <span class="user_type1">'.$user_ville.'</span></p>'."\n";

echo '<p>Depcom : <span class="user_type1">'.$user_depcom.'</span></p>'."\n";

if($user_tel){
echo '<p>Téléphone : <span class="user_type1">'.$user_tel.'</span></p>'."\n";
}

if($user_access == 2 AND $_SESSION['user_access'] == 1){
echo '<p align="right">[ <a href="admins.php?action=edit&user_id='.$user_id.'&alph='.$alph.'">Modifier</a> ] [ <a href="admins.php?action=del&user_id='.$user_id.'&alph='.$alph.'&confirm=av">Supprimer</a> ]</p>'."\n";
} elseif($user_access == 1 AND $_SESSION['user_access'] == 1) {
echo '<p align="right">[ <a href="admins.php?action=edit&user_id='.$user_id.'&alph='.$alph.'">Modifier</a> ]</p>'."\n";
} elseif($user_access == 1 AND $_SESSION['user_access'] == 2){
echo '<p align="right"></p>'."\n";
} elseif($user_access == 2 AND $_SESSION['user_access'] == 2 AND $_SESSION['pseudo'] == $user_name){
echo '<p align="right">[ <a href="admins.php?action=edit&user_id='.$user_id.'&alph='.$alph.'">Modifier</a> ]</p>'."\n";
} else {
echo '<p align="right"></p>'."\n";
}
echo '</div>';
}
} else {
echo '<div id="users">'."\n";
echo '<p>Aucun utilisateur...</p>'."\n";
echo '</div>';
}
}




function edit($user_id,$err,$alph) {
include ("conf.ig.php");

$sql = "SELECT * FROM " .$table_users. " WHERE user_id = '$user_id' "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);
if($res){
$row = mysql_fetch_array($req);

$user_id = $row['user_id'];
$user_name = $row['user_name'];
$user_mail = $row['user_mail'];
$user_activation = $row['user_activation'];
$user_access = $row['user_access'];
$user_site = $row['user_site'];
$user_entreprise = $row['user_entreprise'];
$user_nom = $row['user_nom'];
$user_prenom = $row['user_prenom'];
$user_inscription = $row['user_inscription'];
$user_pwd = $row['user_pwd'];
$user_nl = $row['user_nl'];
$user_tel = $row['user_tel'];
$user_depcom = $row['user_depcom'];
$user_ville = $row['user_ville'];

echo '<h1><a href="admins.php?alph='.$alph.'">Liste des administrateurs</a> > Modification de '.$user_name.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="admins.php?alph='.$alph.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

echo '<div id="form">'."\n";
echo '<form action="admins.php?action=rec_edit&user_id='.$user_id.'&alph='.$alph.'" method="post" name="pgenerate">'."\n";
echo '<input name="thelength" type="hidden" value="8" />'."\n";

if($err) { echo $err; }

echo '<h5>Identifiant :</h5>'."\n";
echo '<p>'.$user_name.'</p>'."\n";

echo '<h5>Mot de passe*</h5>'."\n";
echo '<p><input type="text" name="user_pwd" maxlength="32" size="32" value="'.$user_pwd.'">';
echo '<input type="button" value=" Générer " onClick="populateform(this.form.thelength.value)">';
echo '</p>'."\n";

echo '<h5>Courriel*</h5>'."\n";
echo '<p><input type="text" name="user_mail" maxlength="250" size="32" value="'.$user_mail.'"></p>'."\n";

echo '<h5>Ville</h5>'."\n";
echo '<p><input type="text" name="user_ville" maxlength="250" size="32" value="'.$user_ville.'"></p>'."\n";

echo '<h5>Depcom</h5>'."\n";
echo '<p><input type="text" name="user_depcom" maxlength="250" size="32" value="'.$user_depcom.'"></p>'."\n";

echo '<h5>Téléphone</h5>'."\n";
echo '<p><input type="text" name="user_tel" maxlength="20" size="32" value="'.$user_tel.'"></p>'."\n";

echo '<p>*Informations obligatoires</p>'."\n";

echo '<p><input type="image" class="envoy" src="images/boutons/b_suite.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";
}
}




function add_user($err,$alph) {
include ("conf.ig.php");

echo '<h1><a href="admins.php?alph='.$alph.'">Liste des administrateurs</a> > Ajout d\'un administrateur</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="admins.php?alph='.$alph.'">< Retour</a></li>'."\n";
echo '<li><a href="admins.php?action=add&alph='.$alph.'">+ Ajouter un administrateur</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

echo '<div id="form">'."\n";
echo '<form action="admins.php?action=rec_add&alph='.$alph.'" method="post" name="pgenerate">'."\n";
echo '<input name="thelength" type="hidden" value="8" />'."\n";

if($err) { echo $err; }

echo '<h5>Identifiant*</h5>'."\n";
echo '<p><input type="text" name="user_name" maxlength="32" size="32"></p>'."\n";

echo '<h5>Mot de passe*</h5>'."\n";
echo '<p><input type="text" name="user_pwd" maxlength="32" size="32">';
echo '<input type="button" value=" Générer " onClick="populateform(this.form.thelength.value)">';
echo '</p>'."\n";

echo '<h5>Courriel*</h5>'."\n";
echo '<p><input type="text" name="user_mail" maxlength="250" size="32"></p>'."\n";

echo '<h5>Ville</h5>'."\n";
echo '<p><input type="text" name="user_ville" maxlength="250" size="32"></p>'."\n";

echo '<h5>Depcom</h5>'."\n";
echo '<p><input type="text" name="user_depcom" maxlength="250" size="32"></p>'."\n";

echo '<h5>Téléphone</h5>'."\n";
echo '<p><input type="text" name="user_tel" maxlength="20" size="32"></p>'."\n";

echo '<p>*Informations obligatoires</p>'."\n";

echo '<p><input type="image" class="envoy" src="images/boutons/b_suite.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";

}

/////////////////////////////////////////////////////////////////////////////////////////////////





echo '<div id="pageleft">'."\n";

echo '<div id="element_left">'."\n";
$sql = "SELECT * FROM " .$table_users. " WHERE user_access <= 3 ORDER BY user_access "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

echo '<h1>Statistiques :</h1>'."\n";

if($res){
echo '<p>Administrateurs : <b>'.$res.'</b></p>'."\n";
} else {
echo '<p>Aucun administrateur.</p>'."\n";
}

echo '</div>'."\n";

echo '<div id="infos">'."\n";
echo '<h1>Infos :</h1>'."\n";
echo '<p>Seul l\'utilisateur <b>admin</b> peut éditer et supprimer tous les comptes administrateurs.</p>'."\n";
echo '<p>Un administrateur normal pourra uniquement éditer son propre compte.</p>'."\n";
echo '<p>Le compte <b>admin</b> ne peut être supprimé.</p>'."\n";
echo '</div>'."\n";

echo '</div>'."\n";

echo '<div id="pageright">'."\n";


if(!empty($_GET['action'])){
switch($_GET['action']){




case 'edit':
edit($user_id,$err,$alph);
break;




case 'add':
add_user($err,$alph);
break;






    case 'rec_add':

extract($_POST,EXTR_OVERWRITE);

if(empty($user_name) OR empty($user_pwd) OR empty($user_mail)) 
{
$err = '<p align="center"><font color="red">Attention, il y a un champ vide !<br /><br /></font></p>'."\n";
add_user($err,$alph);
} elseif(!ereg("\.",$user_mail) || !ereg("@",$user_mail)) {
$err = '<p align="center"><font color="red">Attention, merci de donner un E-Mail correct !<br /><br /></font></p>'."\n";
add_user($err,$alph);
} else {

$sql = "SELECT user_id FROM " .$table_users. " WHERE user_name='$user_name'"; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

if($res) {
$err = '<p align="center"><font color="red">Désolé mais cet utilisateur existe déjà !<br /><br /></font></p>'."\n";
add_user($err,$alph);
} else {
$user_date_inscription = date("Y-m-d");

$user_name = AddSlashes($user_name);
$user_pwd = AddSlashes($user_pwd);
$user_ville = AddSlashes($user_ville);
$user_depcom = AddSlashes($user_depcom);
$user_tel = AddSlashes($user_tel);

$sql = "INSERT INTO " .$table_users. "(user_id, user_name, user_pwd, user_mail, user_ville, user_depcom, user_tel, user_activation, 
user_inscription, user_access) VALUES 
('','$user_name','$user_pwd','$user_mail','$user_ville','$user_depcom','$user_tel','1','$user_date_inscription','2')";
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<p align="center"><br/><b>Utilisateur ajouté avec succès !</b></p>';
echo '<p align="center"><br/><a href="admins.php?alph='.$alph.'"><img src="images/boutons/b_back.gif" border="0" alt="Retour" title="Retour"></a></p>'."\n";
}
}
    break;






    case 'rec_edit':

extract($_POST,EXTR_OVERWRITE);

if(empty($user_pwd) OR empty($user_mail)) 
{
$err = '<p align="center"><font color="red">Attention, il y a un champ vide !<br /><br /></font></p>'."\n";
edit($user_id,$err,$alph);
} elseif(!ereg("\.",$user_mail) || !ereg("@",$user_mail)) {
$err = '<p align="center"><font color="red">Attention, merci de donner un E-Mail correct !<br /><br /></font></p>'."\n";
edit($user_id,$err,$alph);
} else {

$sql = "SELECT * FROM " .$table_users. " WHERE user_id = '$user_id' "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);
if($res){
$row = mysql_fetch_array($req);

$user_name = $row['user_name'];
$user_access = $row['user_access'];

echo '<h1><a href="admins.php?alph='.$alph.'">Liste des administrateurs</a> > Modification de '.$user_name.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="admins.php?alph='.$alph.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";
}

if($row['user_pwd'] != $user_pwd){
$user_send = '';
} elseif($row['user_pwd'] == $user_pwd AND $row['user_send'] != 'active') {
$user_send = '';
} else {
$user_send = '';
}

$user_pwd = AddSlashes($user_pwd);
$user_ville = AddSlashes($user_ville);
$user_depcom = AddSlashes($user_depcom);
$user_tel = AddSlashes($user_tel);


if($_SESSION['user_access'] == 1){
$sql = "UPDATE " .$table_users. " SET user_pwd = '$user_pwd', user_mail = '$user_mail', user_ville = '$user_ville', user_depcom = '$user_depcom', 
user_tel = '$user_tel' WHERE user_id = '$user_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
} elseif($user_access == 2 AND $_SESSION['user_access'] == 2 AND $_SESSION['pseudo'] == $user_name){
$sql = "UPDATE " .$table_users. " SET user_pwd = '$user_pwd', user_mail = '$user_mail', user_ville = '$user_ville', user_depcom = '$user_depcom', 
user_tel = '$user_tel' WHERE user_id = '$user_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
} else {
header ('location: admins.php');
exit;
}


echo '<p align="center"><br /><br /><b>Administrateur édité avec succès !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="admins.php?alph='.$alph.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
}
    break;




    case 'send':

$sql = "SELECT * FROM " .$table_users. " WHERE user_id = '$user_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_fetch_array($req);

$mail_users = $res['user_mail'];

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
    'Votre compte D-SIDD',
"Bonjour, \n
Vous faites partie des clients fideles, vous pouvez desormais acceder à votre compte en ligne et suivre les actualités depuis notre site internet sur la page d'accueil (http://www.d-sidd.com). \n
Ci-joint votre identifiant et votre mot de passe: \n
Identifiant : ".$res['user_name']." \n
Mot de passe : ".$res['user_pwd']." \n \n
Cordialement, \n
D-SIDD \n
adresse 1 \n
Tél.: xx xx xx xx xx \n
adresse 2 \n
adresse 3 \n
34000 MONTPELLIER",
    $entetemail
    );

$user_send = 'active';
$sql2 = "UPDATE " . $table_users . " SET user_send = '$user_send' WHERE user_id = '$user_id'"; 
mysql_query($sql2) or die('Erreur SQL !'.$sql2.'<br>'.mysql_error());

users($alph);

    break;





    case 'del':

$sql = "SELECT * FROM " .$table_users. " WHERE user_id = '$user_id' "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);
if($res){
$row = mysql_fetch_array($req);

$user_id = $row['user_id'];
$user_name = $row['user_name'];
$user_access = $row['user_access'];

echo '<h1><a href="admins.php?alph='.$alph.'">Liste des administrateurs</a> > Suppression de '.$user_name.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="admins.php?alph='.$alph.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";
}

if (isset($_GET["confirm"])) $confirm = $_GET["confirm"];
else $confirm="";

switch($confirm)
    {
    case 'av':
echo '<p align="center"><br/><br/>Voulez-vous supprimer l\'administrateur <b>'.$user_name.'</b> ?<br/><br/></p>';
echo '<p align="center"><a href="admins.php?action=del&user_id='.$user_id.'&alph='.$alph.'&confirm=oui"><img src="images/boutons/b_oui.jpg"></a> <a href="javascript:window.history.go(-1)"><img src="images/boutons/b_non.jpg"></a></p>';
break;

    case 'oui':


if($user_access == 2 AND $_SESSION['user_access'] == 1){
mysql_query("DELETE FROM " .$table_users. " WHERE user_id='$user_id'") or die("</br>Erreur de suppression");
} else {
header ('location: admins.php');
exit;
}

echo '<p align="center"><br /><br /><b>Administrateur supprimé avec succès !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="admins.php?alph='.$alph.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";

break;

default: 
echo '<p>Erreur de traitement</p>'; 
break;
    }
    break;



default:
users($alph);
break;
}




} else {
users($alph);
}


echo '</div>'."\n";

include("inc/footer.inc.php");
?>