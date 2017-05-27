<?php
if(isset($_POST) && !empty($_POST['user_name']) && !empty($_POST['user_pwd'])) {
//extract($_POST);

$user_pwd = htmlspecialchars($_POST['user_pwd']);
$user_name = htmlspecialchars($_POST['user_name']);
$pseudoEnr = 'Nicolas';
$pwdEnr = 'kangourou';

if($pseudoEnr != $user_name) {
header ('location: session.php?err=1');
exit;
} elseif($pwdEnr != $user_pwd) {
header ('location: session.php?err=2');
exit;
} else {
session_start();
$_SESSION['pseudo'] = $user_name;
header ('location: session.php');
exit;
}

} else {
header ('location: session.php?err=3');
exit;
}
?>