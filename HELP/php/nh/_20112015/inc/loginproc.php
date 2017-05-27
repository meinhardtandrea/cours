<?php
include("../admin/conf.ig.php");

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
header ('location: ../index-'.$page.'.html?errlog=1');
exit;
} elseif($pwd != $user_pwd) {
header ('location: ../index-'.$page.'.html?errlog=1');
exit;
} else {
session_start();
$_SESSION['id'] = $user_id;
$_SESSION['pseudo'] = stripslashes($pseudo);
$_SESSION['depcom'] = $depcom;
$_SESSION['user_access'] = $user_access;
header ('location: ../index-'.$page.'.html');
exit;
}

} else {
header ('location: ../index-'.$page.'.html?errlog=1');
exit;
}
?>