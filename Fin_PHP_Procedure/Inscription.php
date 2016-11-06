<?php
$identifiant=$_POST['identifiant'];
$motdepasse=$_POST['motdepasse'];

setcookie('inscription[identifiant]',$identifiant);
setcookie ('inscription[motdepasse]',$motdepasse);

echo'';
?>

<form>
    Identifiant : <input/>
    Mot de passe :
</form>