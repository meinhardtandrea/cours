<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
<title>DIGIFORGE :: ALPHA 0.3</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="description" content="" />
<meta name="keywords" content=""/>
<meta name="author" content="DigiForge, NelweeN" />
<meta name="robots" content="all, index, follow" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="login">
<?php
include("conf.ig.php");

if (isset($_GET["err"])) $err = htmlspecialchars($_GET["err"]);
else $err="";

function login($err) {
echo '<h1>ADMINISTRATION DU SITE</h1>'."\n";
if($err==1){
echo '<p><span class="err">Erreur d\'authentification !</span></p>'."\n";
}
echo '<form action="loginproc.php" method="post">'."\n";
echo '<p><label for="user_name">Nom d\'utilisateur</label></p>'."\n";
echo '<p><input type="text" name="user_name" id="user_name" maxlength="32" size="20" /></p>'."\n";
echo '<p><label for="user_pwd">Mot de passe</label></p>'."\n";
echo '<p><input type="password" name="user_pwd" id="user_pwd" maxlength="32" size="20" /> <input type="submit" value="ok" /></p>'."\n";
echo '</form>'."\n";
}

login($err);

?>
</div>

</body>
</html>