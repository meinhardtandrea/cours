<?php
session_start();

include("admin/conf.ig.php");
include("inc/m.functions.inc.php");

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
<meta name="viewport" content="width=device-width"/>
<meta name="keywords" content=""/>
<meta name="author" content="D-SIDD" />
<link href="css/mobile.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<link rel="Stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="inc/jquery.contenthover.js"></script>
<script type="text/javascript" src="inc/Ville_Depcom.js"></script>
<script type="text/javascript" src="inc/fiches.js"></script>
<script src="inc/jquery.BlackAndWhite.js"></script>
</head>
<body>

<div id="logo">
<a href="m.index.html"><img src="images/logo.jpg" height="60" title="Accueil" alt="Accueil"></a>
<h1>Le diagnostic territorial autrement</h1>
</div>

<div id="menu_nav">
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
echo '<li><a href="m.index-'.$rub_position.'.html" id="current">'.$rub_titre.'</a></li>'."\n";
} else {
echo '<li><a href="m.index-'.$rub_position.'.html">'.$rub_titre.'</a></li>'."\n";
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
echo '<li><a href="m.index-'.$rub_position.'.html" id="current">'.$rub_titre.'</a></li>'."\n";
} else {
echo '<li><a href="m.index-'.$rub_position.'.html">'.$rub_titre.'</a></li>'."\n";
}

}
echo '</ul>'."\n";
}
}
?>
</div>
</div>
<?php
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

echo '<div id="menuct">'."\n";
if (!$_SESSION['pseudo']) {
echo '<p><span class="connec"><a href="m.login.html#log" class="mybutton2">Votre compte</a></span></p>'."\n";
echo '<p><span class="connec"><a href="m.inscription.html#log" class="mybutton2">Créer un compte</a></p>'."\n";
} else {
echo '<p><span class="connec"><a href="inc/m.logout.php?page='.$page.'" class="mybutton2">Se déconnecter</a></span></p>'."\n";
}
echo '</div>'."\n";

echo '</div>'."\n";

?>
<div id="list_fiches"></div>
</div>

<div id="corps">
<?php
if ($rub_priv=='private' AND !$_SESSION['pseudo']) {
echo '<div id="elements">'."\n";
echo '<p><b>Vous n\'avez pas accès à cette page. Merci de vous identifier.</b></p>';
echo '</div>';
include('inc/m.footer.inc.php');
exit();
}
?>