<?php
session_start();

include("../admin/conf.ig.php");

$id = $_SESSION['id'];

$sql = "SELECT * FROM " .$table_users. " WHERE user_id = '$id' "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sqlb.'<br>'.mysql_error());
$res = mysql_num_rows($req);

if($res){
$row = mysql_fetch_array($req);

$user_access = $row['user_access'];
$verif_pwd = $row['user_pwd'];

$pwd = stripslashes(htmlspecialchars($_POST['pwd']));
$user_pwd = stripslashes(htmlspecialchars($_POST['pwd1']));
$pwd2 = stripslashes(htmlspecialchars($_POST['pwd2']));
$user_ville = stripslashes(htmlspecialchars($_POST['ville']));
$user_tel = stripslashes(htmlspecialchars($_POST['tel']));
$user_mail = stripslashes(htmlspecialchars($_POST['mail']));

//if (empty($user_name)) { header('Location: ../compte-1.html'); }
//elseif (empty($user_pwd) OR empty($pwd2)) { header('Location: ../compte-2.html'); }
if ($user_access == '1') { header('Location: ../compte-1.html'); }
//elseif (empty($user_ville)) { header('Location: ../compte-2.html'); }
elseif (empty($user_tel)) { header('Location: ../compte-3.html'); }
elseif (!ereg("([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+)", $user_mail)) { header('Location: ../compte-4.html'); }
elseif (ereg("([a-zA-Z0-9._-]+@{1,}[a-zA-Z0-9._-]+\.[a-zA-Z]+)", $user_mail))
{

if(isset($pwd) AND isset($user_pwd)){
if($pwd != $verif_pwd){
header('Location: ../compte-7.html');
}
elseif($user_pwd != $pwd2){
header('Location: ../compte-7.html');
} else {
$user_pwd = AddSlashes($user_pwd);
$sql1 = "UPDATE " .$table_users. " SET user_pwd = '$user_pwd' WHERE user_id = '$id'" or die ("erreur"); 
mysql_query($sql1) or die('Erreur SQL !'.$sql1.'<br>'.mysql_error());
$envoi1 = mysql_query($sql1);
}
}

$user_ville = AddSlashes($user_ville);
$user_tel = AddSlashes($user_tel);
$user_mail = AddSlashes($user_mail);

$sql2 = "UPDATE " .$table_users. " SET user_tel = '$user_tel', user_mail = '$user_mail' WHERE user_id = '$id'" or die ("erreur"); 
mysql_query($sql2) or die('Erreur SQL !'.$sql2.'<br>'.mysql_error());

$envoi = mysql_query($sql2);

if($envoi) { header('Location: ../compte-5.html'); }
else { header('Location: ../compte-6.html'); }



}
} else { header('Location: ../compte-6.html'); }
?>