<?php
include("inc/conf.ig.php");
if (isset($_GET["page"])) $page = $_GET["page"];
else $page="1";
/*
        $salt = 'nico';
        $pwd = 'nico';
        echo $password = hash('sha256', $salt . $pwd);
*/
if(isset($_POST) && !empty($_POST['user_name']) && !empty($_POST['user_pwd'])) {

$salt = 'nico';
$user_pwd = htmlspecialchars($_POST['user_pwd']);
$user_pwd = hash('sha256', $salt . $user_pwd);
$user_name = htmlspecialchars($_POST['user_name']);

$sql = 'SELECT client_pwd FROM clients WHERE client_pseudo = :login';

$req = $bdd->prepare($sql);
$req->bindParam(':login', $user_name, PDO::PARAM_STR);
$req->execute();
$data = $req->fetch();
$pwdEnr = $data['client_pwd'];

$req->closeCursor();

if(strlen($user_pwd) > 64 or strlen($user_name) > 38){
header ('location: index-'.$page.'-1.html');
exit;
} elseif($pwdEnr != $user_pwd) {
header ('location: index-'.$page.'-2.html');
exit;
} else {
session_start();
$_SESSION['pseudo'] = $user_name;
header ('location: index-'.$page.'.html');
exit;
}

} else {
header ('location: index-'.$page.'-3.html');
exit;
}
?>