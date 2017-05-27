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



function users($alph,$type,$cot) {
include ("conf.ig.php");
echo '<h1>Liste des adhérents</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="users.php?action=add&alph='.$alph.'&type='.$type.'">+ Ajouter un adhérent</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

echo '<div id="alph">'."\n";
echo '<p><br/><b>';
if($type == 1){
echo '<a href="users.php?alph='.$alph.'&type=1" id="current">Citoyen</a> - ';
} else {
echo '<a href="users.php?alph='.$alph.'&type=1">Citoyen</a> - ';
}
if($type == 2){
echo '<a href="users.php?alph='.$alph.'&type=2" id="current">Collectivité (élu)</a> - ';
} else {
echo '<a href="users.php?alph='.$alph.'&type=2">Collectivité (élu)</a> - ';
}
if($type == 3){
echo '<a href="users.php?alph='.$alph.'&type=3" id="current">Collectivité (technicien)</a> - ';
} else {
echo '<a href="users.php?alph='.$alph.'&type=3">Collectivité (technicien)</a> - ';
}
if($type == 4){
echo '<a href="users.php?alph='.$alph.'&type=4" id="current">Entreprise</a> - ';
} else {
echo '<a href="users.php?alph='.$alph.'&type=4">Entreprise</a> - ';
}
if($type == 5){
echo '<a href="users.php?alph='.$alph.'&type=5" id="current">Association</a> - ';
} else {
echo '<a href="users.php?alph='.$alph.'&type=5">Association</a> - ';
}
if($type == 6){
echo '<a href="users.php?alph='.$alph.'&type=6" id="current">Autre</a> - ';
} else {
echo '<a href="users.php?alph='.$alph.'&type=6">Autre</a> - ';
}
if($type == 'all'){
echo '<a href="users.php?alph='.$alph.'&type=all" id="current">TOUS</a>';
} else {
echo '<a href="users.php?alph='.$alph.'&type=all">TOUS</a>';
}
echo '</p>'."\n";
echo '</div>'."\n";

echo '<div id="alph">'."\n";
echo '<p><b>';
if($alph == 'A'){
echo '<a href="users.php?alph=A&type='.$type.'" id="current">A</a> - ';
} else {
echo '<a href="users.php?alph=A&type='.$type.'">A</a> - ';
}
if($alph == 'B'){
echo '<a href="users.php?alph=B&type='.$type.'" id="current">B</a> - ';
} else {
echo '<a href="users.php?alph=B&type='.$type.'">B</a> - ';
}
if($alph == 'C'){
echo '<a href="users.php?alph=C&type='.$type.'" id="current">C</a> - ';
} else {
echo '<a href="users.php?alph=C&type='.$type.'">C</a> - ';
}
if($alph == 'D'){
echo '<a href="users.php?alph=D&type='.$type.'" id="current">D</a> - ';
} else {
echo '<a href="users.php?alph=D&type='.$type.'">D</a> - ';
}
if($alph == 'E'){
echo '<a href="users.php?alph=E&type='.$type.'" id="current">E</a> - ';
} else {
echo '<a href="users.php?alph=E&type='.$type.'">E</a> - ';
}
if($alph == 'F'){
echo '<a href="users.php?alph=F&type='.$type.'" id="current">F</a> - ';
} else {
echo '<a href="users.php?alph=F&type='.$type.'">F</a> - ';
}
if($alph == 'G'){
echo '<a href="users.php?alph=G&type='.$type.'" id="current">G</a> - ';
} else {
echo '<a href="users.php?alph=G&type='.$type.'">G</a> - ';
}
if($alph == 'H'){
echo '<a href="users.php?alph=H&type='.$type.'" id="current">H</a> - ';
} else {
echo '<a href="users.php?alph=H&type='.$type.'">H</a> - ';
}
if($alph == 'I'){
echo '<a href="users.php?alph=I&type='.$type.'" id="current">I</a> - ';
} else {
echo '<a href="users.php?alph=I&type='.$type.'">I</a> - ';
}
if($alph == 'J'){
echo '<a href="users.php?alph=J&type='.$type.'" id="current">J</a> - ';
} else {
echo '<a href="users.php?alph=J&type='.$type.'">J</a> - ';
}
if($alph == 'K'){
echo '<a href="users.php?alph=K&type='.$type.'" id="current">K</a> - ';
} else {
echo '<a href="users.php?alph=K&type='.$type.'">K</a> - ';
}
if($alph == 'L'){
echo '<a href="users.php?alph=L&type='.$type.'" id="current">L</a> - ';
} else {
echo '<a href="users.php?alph=L&type='.$type.'">L</a> - ';
}
if($alph == 'M'){
echo '<a href="users.php?alph=M&type='.$type.'" id="current">M</a> - ';
} else {
echo '<a href="users.php?alph=M&type='.$type.'">M</a> - ';
}
if($alph == 'N'){
echo '<a href="users.php?alph=N&type='.$type.'" id="current">N</a> - ';
} else {
echo '<a href="users.php?alph=N&type='.$type.'">N</a> - ';
}
if($alph == 'O'){
echo '<a href="users.php?alph=O&type='.$type.'" id="current">O</a> - ';
} else {
echo '<a href="users.php?alph=O&type='.$type.'">O</a> - ';
}
if($alph == 'P'){
echo '<a href="users.php?alph=P&type='.$type.'" id="current">P</a> - ';
} else {
echo '<a href="users.php?alph=P&type='.$type.'">P</a> - ';
}
if($alph == 'Q'){
echo '<a href="users.php?alph=Q&type='.$type.'" id="current">Q</a> - ';
} else {
echo '<a href="users.php?alph=Q&type='.$type.'">Q</a> - ';
}
if($alph == 'R'){
echo '<a href="users.php?alph=R&type='.$type.'" id="current">R</a> - ';
} else {
echo '<a href="users.php?alph=R&type='.$type.'">R</a> - ';
}
if($alph == 'S'){
echo '<a href="users.php?alph=S&type='.$type.'" id="current">S</a> - ';
} else {
echo '<a href="users.php?alph=S&type='.$type.'">S</a> - ';
}
if($alph == 'T'){
echo '<a href="users.php?alph=T&type='.$type.'" id="current">T</a> - ';
} else {
echo '<a href="users.php?alph=T&type='.$type.'">T</a> - ';
}
if($alph == 'U'){
echo '<a href="users.php?alph=U&type='.$type.'" id="current">U</a> - ';
} else {
echo '<a href="users.php?alph=U&type='.$type.'">U</a> - ';
}
if($alph == 'V'){
echo '<a href="users.php?alph=V&type='.$type.'" id="current">V</a> - ';
} else {
echo '<a href="users.php?alph=V&type='.$type.'">V</a> - ';
}
if($alph == 'W'){
echo '<a href="users.php?alph=W&type='.$type.'" id="current">W</a> - ';
} else {
echo '<a href="users.php?alph=W&type='.$type.'">W</a> - ';
}
if($alph == 'X'){
echo '<a href="users.php?alph=X&type='.$type.'" id="current">X</a> - ';
} else {
echo '<a href="users.php?alph=X&type='.$type.'">X</a> - ';
}
if($alph == 'Y'){
echo '<a href="users.php?alph=Y&type='.$type.'" id="current">Y</a> - ';
} else {
echo '<a href="users.php?alph=Y&type='.$type.'">Y</a> - ';
}
if($alph == 'Z'){
echo '<a href="users.php?alph=Z&type='.$type.'" id="current">Z</a> - ';
} else {
echo '<a href="users.php?alph=Z&type='.$type.'">Z</a> - ';
}
if($alph == 'all'){
echo '<a href="users.php?alph=all&type='.$type.'" id="current">TOUS</a>';
} else {
echo '<a href="users.php?alph=all&type='.$type.'">TOUS</a>';
}
echo '</p>'."\n";
echo '</div>'."\n";

if ($type == 'all') {
if (!$alph) {
$sql = "SELECT * FROM " .$table_users. "  WHERE user_access >= 4 AND user_name like 'A%' ORDER by user_name";
}
elseif ($alph=='all') {
$sql = "SELECT * FROM " .$table_users. " WHERE user_access >= 4 ORDER by user_name";
} else {
$sql = "SELECT * FROM " .$table_users. "  WHERE user_access >= 4 AND user_name like '$alph%' ORDER by user_name";
}
} else {
if (!$alph) {
$sql = "SELECT * FROM " .$table_users. "  WHERE user_access >= 4 AND user_type = '$type' AND user_name like 'A%' ORDER by user_name";
}
elseif ($alph=='all') {
$sql = "SELECT * FROM " .$table_users. " WHERE user_access >= 4 AND user_type = '$type' ORDER by user_name";
} else {
$sql = "SELECT * FROM " .$table_users. "  WHERE user_access >= 4 AND user_type = '$type' AND user_name like '$alph%' ORDER by user_name";
}
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
$user_nom = $row['user_nom'];
$user_prenom = $row['user_prenom'];
$user_inscription = $row['user_inscription'];
$user_heure = $row['user_heure'];
$user_send = $row['user_send'];
$user_type = $row['user_type'];
$user_ville = $row['user_ville'];
$user_depcom = $row['user_depcom'];
$user_tel = $row['user_tel'];

if(!$user_heure){ $user_heure = '00h00'; }

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

echo '<p align="right">Inscrit le '.$user_inscription[2].' '.$user_inscription[1].' '.$user_inscription[0].' à '.$user_heure.'.</p>'."\n";

echo '<table>'."\n";
echo '<tr>'."\n";
echo '<td valign="top" width="50%">'."\n";

echo '<p>Courriel : <a href="mailto:'.$user_mail.'">'.$user_mail.'</a></p>'."\n";
if($user_type == 2){
echo '<p>Profil : <span class="user_type1">Collectivité (élu)</span></p>'."\n";
} elseif($user_type == 3){
echo '<p>Profil : <span class="user_type1">Collectivité (technicien)</span></p>'."\n";
} elseif($user_type == 4){
echo '<p>Profil : <span class="user_type1">Entreprise</span></p>'."\n";
} elseif($user_type == 5){
echo '<p>Profil : <span class="user_type1">Association</span></p>'."\n";
} elseif($user_type == 6){
echo '<p>Profil : <span class="user_type1">Autre</span></p>'."\n";
} elseif($user_type == 1){
echo '<p>Profil : <span class="user_type1">Citoyen</span></p>'."\n";
} else {
echo '<p>Profil : <span class="user_type1">Citoyen</span></p>'."\n";
}
echo '<p>Ville : <span class="user_type1">'.$user_ville.'</span></p>'."\n";
echo '<p>Depcom : <span class="user_type1">'.$user_depcom.'</span></p>'."\n";
if($user_tel){
echo '<p>Téléphone : <span class="user_type1">'.$user_tel.'</span></p>'."\n";
}

echo '</td>'."\n";
echo '<td valign="top" width="50%">'."\n";

$sqlb = "SELECT * FROM " .$table_log. " WHERE log_user_id = '$user_id' ORDER BY log_date DESC, log_heure DESC LIMIT 0,10 "; 
$reqb = mysql_query($sqlb) or die('Erreur SQL !'.$sqlb.'<br>'.mysql_error());
$resb = mysql_num_rows($reqb);

if($resb){
echo '<p>Dernières connexions :</p>'."\n";
echo '<p>'."\n";
while($rowb = mysql_fetch_array($reqb)) {
$log_date = $rowb['log_date'];
$log_heure = $rowb['log_heure'];

$log_date = explode('-', $log_date);
if($log_date[1] == 1){
$log_date[1] = 'janvier';
} elseif ($log_date[1] == 2){
$log_date[1] = 'février';
} elseif ($log_date[1] == 3){
$log_date[1] = 'mars';
} elseif ($log_date[1] == 4){
$log_date[1] = 'avril';
} elseif ($log_date[1] == 5){
$log_date[1] = 'mai';
} elseif ($log_date[1] == 6){
$log_date[1] = 'juin';
} elseif ($log_date[1] == 7){
$log_date[1] = 'juillet';
} elseif ($log_date[1] == 8){
$log_date[1] = 'août';
} elseif ($log_date[1] == 9){
$log_date[1] = 'septembre';
} elseif ($log_date[1] == 10){
$log_date[1] = 'octobre';
} elseif ($log_date[1] == 11){
$log_date[1] = 'novembre';
} elseif ($log_date[1] == 12){
$log_date[1] = 'décembre';
}

echo '- Le '.$log_date[2].' '.$log_date[1].' '.$log_date[0].' à '.$log_heure.'.<br/>'."\n";
}
echo '</p>'."\n";
} else {
echo '<p>L\'utilisateur ne s\'est jamais connecté.</p>'."\n";
}
echo '</td>'."\n";
echo '</tr>'."\n";
echo '</table>'."\n";

echo '<p align="right">[ <a href="users.php?action=edit&user_id='.$user_id.'&alph='.$alph.'&type='.$type.'">Modifier</a> ] [ <a href="users.php?action=del&user_id='.$user_id.'&alph='.$alph.'&type='.$type.'&confirm=av">Supprimer</a> ]</p>'."\n";
echo '</div>';
}
} else {
echo '<div id="users">'."\n";
echo '<p>Aucun utilisateur...</p>'."\n";
echo '</div>';
}
}




function edit($user_id,$err,$alph,$type) {
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
$user_type = $row['user_type'];
$user_ville = $row['user_ville'];
$user_depcom = $row['user_depcom'];
$user_tel = $row['user_tel'];

echo '<h1><a href="users.php?alph='.$alph.'&type='.$type.'">Liste des adhérents</a> > Modification de '.$user_name.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="users.php?alph='.$alph.'&type='.$type.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

echo '<div id="form">'."\n";
echo '<form action="users.php?action=rec_edit&user_id='.$user_id.'&alph='.$alph.'&type='.$type.'" method="post" name="pgenerate">'."\n";
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

echo '<h5>Type d\'adhérent</h5>'."\n";
echo '<p>'."\n";
if($user_type == 1){
echo '<input type="radio" name="user_type" value="1" id="1" checked="checked" /> <label for="1">Citoyen</label><br />'."\n";
} else {
echo '<input type="radio" name="user_type" value="1" id="1" /> <label for="1">Citoyen</label><br />'."\n";
}
if($user_type == 2){
echo '<input type="radio" name="user_type" value="2" id="2" checked="checked" /> <label for="2">Collectivité (élu)</label><br />'."\n";
} else {
echo '<input type="radio" name="user_type" value="2" id="2" /> <label for="2">Collectivité (élu)</label><br />'."\n";
}
if($user_type == 3){
echo '<input type="radio" name="user_type" value="3" id="3" checked="checked" /> <label for="3">Collectivité (technicien)</label><br />'."\n";
} else {
echo '<input type="radio" name="user_type" value="3" id="3" /> <label for="3">Collectivité (technicien)</label><br />'."\n";
}
if($user_type == 4){
echo '<input type="radio" name="user_type" value="4" id="4" checked="checked" /> <label for="4">Entreprise</label><br />'."\n";
} else {
echo '<input type="radio" name="user_type" value="4" id="4" /> <label for="4">Entreprise</label><br />'."\n";
}
if($user_type == 5){
echo '<input type="radio" name="user_type" value="5" id="5" checked="checked" /> <label for="5">Association</label><br />'."\n";
} else {
echo '<input type="radio" name="user_type" value="5" id="5" /> <label for="5">Association</label><br />'."\n";
}
if($user_type == 6){
echo '<input type="radio" name="user_type" value="6" id="6" checked="checked" /> <label for="6">Autre</label><br />'."\n";
} else {
echo '<input type="radio" name="user_type" value="6" id="6" /> <label for="6">Autre</label><br />'."\n";
}
echo '</p>'."\n";

echo '<h5>Ville</h5>'."\n";
echo '<p><input type="text" name="user_ville" maxlength="250" size="32" value="'.$user_ville.'"></p>'."\n";

echo '<h5>Depcom</h5>'."\n";
echo '<p><input type="text" name="user_depcom" maxlength="250" size="32" value="'.$user_depcom.'"></p>'."\n";

echo '<h5>Téléphone</h5>'."\n";
echo '<p><input type="text" name="user_tel" maxlength="20" size="32" value="'.$user_tel.'"></p>'."\n";

//echo '<h5>Re-saisir le mot de passe*</h5>'."\n";
//echo '<p><input type="password" name="pwd3" maxlength="32" size="32"></p>'."\n";

echo '<p>*Informations obligatoires</p>'."\n";

echo '<p><input type="image" class="envoy" src="images/boutons/b_suite.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";
}
}




function add_user($err,$alph,$type) {
include ("conf.ig.php");

echo '<h1><a href="users.php?alph='.$alph.'&type='.$type.'">Liste des adhérents</a> > Ajout d\'un utilisateur</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="users.php?alph='.$alph.'&type='.$type.'">< Retour</a></li>'."\n";
echo '<li><a href="users.php?action=add&alph='.$alph.'&type='.$type.'">+ Ajouter un utilisateur</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

echo '<div id="form">'."\n";
echo '<form action="users.php?action=rec_add&alph='.$alph.'&type='.$type.'" method="post" name="pgenerate">'."\n";
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

echo '<h5>Type d\'adhérent</h5>'."\n";
echo '<p>'."\n";
echo '<input type="radio" name="user_type" value="1" id="1" checked="checked" /> <label for="1">Citoyen</label><br />'."\n";
echo '<input type="radio" name="user_type" value="2" id="2" /> <label for="2">Collectivité (élu)</label><br />'."\n";
echo '<input type="radio" name="user_type" value="3" id="3" /> <label for="3">Collectivité (technicien)</label><br />'."\n";
echo '<input type="radio" name="user_type" value="4" id="4" /> <label for="4">Entreprise</label><br />'."\n";
echo '<input type="radio" name="user_type" value="5" id="5" /> <label for="5">Association</label><br />'."\n";
echo '<input type="radio" name="user_type" value="6" id="6" /> <label for="6">Autre</label><br />'."\n";
echo '</p>'."\n";

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

$sql3 = "SELECT * FROM " .$table_users. " WHERE user_type = '1' AND user_access >= 4 ORDER BY user_access "; 
$req3 = mysql_query($sql3) or die('Erreur SQL !'.$sql3.'<br>'.mysql_error());
$res3 = mysql_num_rows($req3);

if($res3){
echo '<p>Citoyens : <b>'.$res3.'</b></p>'."\n";
} else {
echo '<p>Citoyens : <b>0</b></p>'."\n";
}

$sql4 = "SELECT * FROM " .$table_users. " WHERE user_type = '2' AND user_access >= 4 ORDER BY user_access "; 
$req4 = mysql_query($sql4) or die('Erreur SQL !'.$sql4.'<br>'.mysql_error());
$res4 = mysql_num_rows($req4);

if($res4){
echo '<p>Collectivité (élu) : <b>'.$res4.'</b></p>'."\n";
} else {
echo '<p>Collectivité (élu) : <b>0</b></p>'."\n";
}

$sql5 = "SELECT * FROM " .$table_users. " WHERE user_type = '3' AND user_access >= 4 ORDER BY user_access "; 
$req5 = mysql_query($sql5) or die('Erreur SQL !'.$sql5.'<br>'.mysql_error());
$res5 = mysql_num_rows($req5);

if($res5){
echo '<p>Collectivité (technicien) : <b>'.$res5.'</b></p>'."\n";
} else {
echo '<p>Collectivité (technicien) : <b>0</b></p>'."\n";
}

$sql6 = "SELECT * FROM " .$table_users. " WHERE user_type = '4' AND user_access >= 4 ORDER BY user_access "; 
$req6 = mysql_query($sql6) or die('Erreur SQL !'.$sql6.'<br>'.mysql_error());
$res6 = mysql_num_rows($req6);

if($res6){
echo '<p>Entreprises : <b>'.$res6.'</b></p>'."\n";
} else {
echo '<p>Entreprises : <b>0</b></p>'."\n";
}

$sql7 = "SELECT * FROM " .$table_users. " WHERE user_type = '5' AND user_access >= 4 ORDER BY user_access "; 
$req7 = mysql_query($sql7) or die('Erreur SQL !'.$sql7.'<br>'.mysql_error());
$res7 = mysql_num_rows($req7);

if($res7){
echo '<p>Associations : <b>'.$res7.'</b></p>'."\n";
} else {
echo '<p>Associations : <b>0</b></p>'."\n";
}

$sql8 = "SELECT * FROM " .$table_users. " WHERE user_type = '6' AND user_access >= 4 ORDER BY user_access "; 
$req8 = mysql_query($sql8) or die('Erreur SQL !'.$sql8.'<br>'.mysql_error());
$res8 = mysql_num_rows($req8);

if($res8){
echo '<p>Autres : <b>'.$res8.'</b></p>'."\n";
} else {
echo '<p>Autres : <b>0</b></p>'."\n";
}



echo '</div>'."\n";



echo '</div>'."\n";

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

echo '<div id="pageright">'."\n";


if(!empty($_GET['action'])){
switch($_GET['action']){




case 'edit':
edit($user_id,$err,$alph,$type);
break;




case 'add':
add_user($err,$alph,$type);
break;






    case 'rec_add':

extract($_POST,EXTR_OVERWRITE);

$user_name = AddSlashes($user_name);
$user_pwd = AddSlashes($user_pwd);
$user_ville = AddSlashes($user_ville);
$user_depcom = AddSlashes($user_depcom);
$user_tel = AddSlashes($user_tel);

if(empty($user_name) OR empty($user_pwd) OR empty($user_mail)) 
{
$err = '<p align="center"><font color="red">Attention, il y a un champ vide !<br /><br /></font></p>'."\n";
add_user($err,$alph,$type);
} elseif(!ereg("\.",$user_mail) || !ereg("@",$user_mail)) {
$err = '<p align="center"><font color="red">Attention, merci de donner un E-Mail correct !<br /><br /></font></p>'."\n";
add_user($err,$alph,$type);
} else {

$sql = "SELECT user_id FROM " .$table_users. " WHERE user_name='$user_name'"; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

if($res) {
$err = '<p align="center"><font color="red">Désolé mais cet utilisateur existe déjà !<br /><br /></font></p>'."\n";
add_user($err,$alph,$type);
} else {
$user_date_inscription = date("Y-m-d");
$heure = date("H\hi");


$sql = "INSERT INTO " .$table_users. "(user_id, user_name, user_pwd, user_mail, user_ville, user_depcom, user_tel, user_activation, 
user_inscription, user_heure, user_access, user_type) VALUES 
('','$user_name','$user_pwd','$user_mail','$user_ville','$user_depcom','$user_tel','1','$user_date_inscription','$heure','5',
'$user_type')";
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<p align="center"><br/><b>Utilisateur ajouté avec succès !</b></p>';
echo '<p align="center"><br/><a href="users.php?alph='.$alph.'&type='.$type.'"><img src="images/boutons/b_back.gif" border="0" alt="Retour" title="Retour"></a></p>'."\n";
}
}
    break;






    case 'rec_edit':

extract($_POST,EXTR_OVERWRITE);

$user_pwd = AddSlashes($user_pwd);
$user_ville = AddSlashes($user_ville);
$user_depcom = AddSlashes($user_depcom);
$user_tel = AddSlashes($user_tel);

if(empty($user_pwd) OR empty($user_mail)) 
{
$err = '<p align="center"><font color="red">Attention, il y a un champ vide !<br /><br /></font></p>'."\n";
edit($user_id,$err,$alph,$type);
} elseif(!ereg("\.",$user_mail) || !ereg("@",$user_mail)) {
$err = '<p align="center"><font color="red">Attention, merci de donner un E-Mail correct !<br /><br /></font></p>'."\n";
edit($user_id,$err,$alph,$type);
} else {

$sql = "SELECT * FROM " .$table_users. " WHERE user_id = '$user_id' "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);
if($res){
$row = mysql_fetch_array($req);

$user_name = $row['user_name'];
$user_send = $row['user_send'];

echo '<h1><a href="users.php?alph='.$alph.'">Liste des adhérents</a> > Modification de '.$user_name.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="users.php?alph='.$alph.'">< Retour</a></li>'."\n";
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


$sql = "UPDATE " .$table_users. " SET user_pwd = '$user_pwd', user_mail = '$user_mail', user_ville = '$user_ville', user_depcom = '$user_depcom', 
user_tel = '$user_tel', user_send = '$user_send', user_type = '$user_type' WHERE user_id = '$user_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<p align="center"><br /><br /><b>Adhérent édité avec succès !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="users.php?alph='.$alph.'&type='.$type.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
}
    break;




    case 'send':

$sql = "SELECT * FROM " .$table_users. " WHERE user_id = '$user_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_fetch_array($req);

$mail_users = $res['user_mail'];

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
Vous faites partie des clients fideles, vous pouvez desormais acceder à votre compte en ligne et suivre les actualités depuis notre site internet sur la page d'accueil (http://www.d-sidd.com). \n
Ci-joint votre identifiant et votre mot de passe: \n
Identifiant : ".$res['user_name']." \n
Mot de passe : ".$res['user_pwd']." \n \n
Cordialement, \n
D-SIDD \n
MONTPELLIER",
    $entetemail
    );

$user_send = 'active';
$sql2 = "UPDATE " . $table_users . " SET user_send = '$user_send' WHERE user_id = '$user_id'"; 
mysql_query($sql2) or die('Erreur SQL !'.$sql2.'<br>'.mysql_error());

users($alph,$type,$cot);

    break;





    case 'del':

$sql = "SELECT * FROM " .$table_users. " WHERE user_id = '$user_id' "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);
if($res){
$row = mysql_fetch_array($req);

$user_id = $row['user_id'];
$user_name = $row['user_name'];

echo '<h1><a href="users.php?alph='.$alph.'&type='.$type.'">Liste des adhérents</a> > Suppression de '.$user_name.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="users.php?alph='.$alph.'&type='.$type.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";
}

if (isset($_GET["confirm"])) $confirm = $_GET["confirm"];
else $confirm="";

switch($confirm)
    {
    case 'av':
echo '<p align="center"><br/><br/>Voulez-vous supprimer l\'adhérent <b>'.$user_name.'</b> ?<br/><br/></p>';
echo '<p align="center"><a href="users.php?action=del&user_id='.$user_id.'&alph='.$alph.'&type='.$type.'&confirm=oui"><img src="images/boutons/b_oui.jpg"></a> <a href="javascript:window.history.go(-1)"><img src="images/boutons/b_non.jpg"></a></p>';
break;

    case 'oui':

mysql_query("DELETE FROM " .$table_users. " WHERE user_id='$user_id'") or die("</br>Erreur de suppression");
 
echo '<p align="center"><br /><br /><b>Adhérent supprimé avec succès !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="users.php?alph='.$alph.'&type='.$type.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";

break;

default: 
echo '<p>Erreur de traitement</p>'; 
break;
    }
    break;



default:
users($alph,$type,$cot);
break;
}




} else {
users($alph,$type,$cot);
}


echo '</div>'."\n";

include("inc/footer.inc.php");
?>