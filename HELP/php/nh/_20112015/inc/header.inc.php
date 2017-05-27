<?php
session_start();

include("admin/conf.ig.php");
include("inc/functions.inc.php");

if (isset($_GET["err"])) $err = $_GET["err"];
else $err="";

if (isset($_GET["page"])) $page = $_GET["page"];
else {
$sqlid = "SELECT * FROM " .$table_rub. " WHERE rub_activation = 'active' ORDER BY rub_position ";
$reqid = mysql_query($sqlid,$db) or die ('Erreur : '.mysql_error() );
$resid = mysql_num_rows($reqid);
if($resid){
$rowid = mysql_fetch_array($reqid);
$rub_id = $rowid['rub_id'];
$page = $rowid['rub_position'];
}
}


$sqlid = "SELECT * FROM " .$table_rub. " WHERE rub_position = '$page' ";
$reqid = mysql_query($sqlid,$db) or die ('Erreur : '.mysql_error() );
$resid = mysql_num_rows($reqid);
if($resid){
$rowid = mysql_fetch_array($reqid);
$rub_titre = $rowid['rub_titre'];
$rub_priv = $rowid['rub_priv'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
<title>D-SIDD - Le diagnostic territorial autrement</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content=""/>
<meta name="author" content="D-SIDD" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<link rel="Stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="inc/jquery.contenthover.js"></script>
<script type="text/javascript" src="inc/Ville_Depcom.js"></script>
<script type="text/javascript" src="inc/fiches.js"></script>
<script src="inc/jquery.BlackAndWhite.js"></script>
<script type="text/javascript">
  <!--
  if (screen.width <= 699) {
    window.location = "m.index.html";
  }
  //-->
</script>
</head>
<body>

<div id="page">

<div id="header">

<div id="logo">

<div id="logo_left">
<p><a href="index.html"><img src="images/logo.jpg" height="60" title="Accueil" alt="Accueil"></a></p>
<h1>Le diagnostic territorial autrement</h1>
</div>

<div id="logo_right">
<div id="login">
<?php
echo '<h1>ESPACE MEMBRE</h1>'."\n";

if (!$_SESSION['pseudo']) {
echo '<form action="login-'.$page.'.html" method="post">'."\n";
?>
<p><input type="text" name="pseudo" id="pseudo" maxlength="32" size="25" value="Identifiant" onFocus="if(this.value=='Identifiant')this.value='';" onBlur="myBlur(this)" /></p>
<p><input type="password" name="user_pwd" id="user_pwd" maxlength="32" size="25" value="Mot de passe" onFocus="if(this.value=='Mot de passe')this.value='';" onBlur="myBlur(this)" /> <input type="image" class="envoy2" name="valider" src="images/go.jpg" /></p>
</form>

<script type="text/javascript">
function myFocus(element) { 
if (element.value == element.defaultValue) 
{ element.value = ''; } } 

function myBlur(element) 
{ if (element.value == '') 
{ element.value = element.defaultValue; } } 
</script>
<?php
if($errlog==1){
echo '<p><span class="err">Erreur d\'authentification !</span></p>'."\n";
}
echo '<p>> <a href="inscription.html">Créer un compte</a></p>'."\n";

} else {
echo '<p><b>'.$_SESSION['pseudo'].'</b></p>'."\n";
echo '<p>> <a href="inc/logout.php?page='.$page.'">Se déconnecter</a></p>'."\n";
}
?>
</div>
</div>

</div>
</div>

<div id="menu_fond_top">
<div id="menuTop">
<?php
if (!$_SESSION['pseudo']) {
$sql = "SELECT * FROM " .$table_rub. " WHERE rub_activation = 'active' AND rub_priv = 'public' ORDER BY rub_position ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

if($res){
echo '<ul>'."\n";
while($row = mysql_fetch_array($req)){
$rub_id = $row['rub_id'];
$rub_position = $row['rub_position'];
$rub_titre = $row['rub_titre'];

if($rub_position==$page){
echo '<li><a href="index-'.$rub_position.'.html" id="current">'.$rub_titre.'</a></li>'."\n";
} else {
echo '<li><a href="index-'.$rub_position.'.html">'.$rub_titre.'</a></li>'."\n";
}

}
echo '</ul>'."\n";
}
} else {
$sql = "SELECT * FROM " .$table_rub. " WHERE rub_activation = 'active' ORDER BY rub_position ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

if($res){
echo '<ul>'."\n";
while($row = mysql_fetch_array($req)){
$rub_id = $row['rub_id'];
$rub_position = $row['rub_position'];
$rub_titre = $row['rub_titre'];

if($rub_position==$page){
echo '<li><a href="index-'.$rub_position.'.html" id="current">'.$rub_titre.'</a></li>'."\n";
} else {
echo '<li><a href="index-'.$rub_position.'.html">'.$rub_titre.'</a></li>'."\n";
}

}
echo '</ul>'."\n";
}
}

echo '</div>'."\n";
echo '<div id="menuRS">'."\n";

$sqlsn = "SELECT * FROM " .$table_networks. " WHERE sn_activation = 'active' ORDER BY sn_position DESC ";
$reqsn = mysql_query($sqlsn,$db) or die ('Erreur : '.mysql_error() );
$ressn = mysql_num_rows($reqsn);
if($ressn){
echo '<ul>'."\n";
while($rowsn = mysql_fetch_array($reqsn)){

$sn_titre = $rowsn['sn_titre'];
$sn_lien = $rowsn['sn_lien'];
$sn_img = $rowsn['sn_img'];

echo '<li><a href="'.$sn_lien.'" class="bwWrapper" target="_blank"><img src="files/images/'.$sn_img.'" title="'.$sn_titre.'" alt="'.$sn_titre.'" width="30"></a></li>'."\n";

}
echo '</ul>'."\n";
}
echo '</div>'."\n";
echo '</div>'."\n";

echo '<div id="corps">'."\n";

if ($rub_priv=='private' AND !$_SESSION['pseudo']) {
echo '<div id="elements">'."\n";
echo '<p><b>Vous n\'avez pas accès à cette page. Merci de vous identifier.</b></p>';
echo '</div>';
include('inc/footer.inc.php');
exit();
}
?>