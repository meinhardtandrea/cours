<?php
include("conf.ig.php");

if(isset($_POST) && !empty($_POST['user_name']) && !empty($_POST['user_pwd'])) {
extract($_POST);

$user_pwd = htmlspecialchars($_POST['user_pwd']);
$user_name = AddSlashes(htmlspecialchars($user_name));

$sql = "select user_id, user_pwd, user_access, user_activation FROM " . $table_users . " where user_name = '".$user_name."'";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$res = mysql_fetch_array($req);
$user_id = $res['user_id'];
$user_access = $res['user_access'];
$pwd = $res['user_pwd'];

if($res['user_activation'] != '1') {
header ('location: login.php?err=1');
exit;
} elseif($pwd != $user_pwd) {
header ('location: login.php?err=1');
exit;
} elseif($user_access != '1') {
header ('location: login.php?err=1');
exit;
} else {
session_start();
$_SESSION['id'] = $user_id;
$_SESSION['pseudo'] = stripslashes($user_name);
$_SESSION['user_access'] = $user_access;
header ('location: index.php');
exit;
}

} else {
header ('location: login.php?err=1');
exit;
}
?>