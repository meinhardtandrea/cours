<?php
include("inc/header.inc.php");

if (isset($_GET["send"])) $send = $_GET["send"];
else $send="";

echo '<div id="page_centre">'."\n";
echo '<div id="elements">'."\n";

echo '<h1>MODIFIER VOTRE COMPTE</h1>'."\n";

if($send == '5'){

echo '<p>Votre compte a été modifié avec succès.</p>'."\n";

} else {
$id = $_SESSION['id'];

$sql = "SELECT * FROM " .$table_users. " WHERE user_id = '$id' "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sqlb.'<br>'.mysql_error());
$res = mysql_num_rows($req);

if($res){
$row = mysql_fetch_array($req);

$user_mail = $row['user_mail'];
$user_ville = $row['user_ville'];
$user_tel = $row['user_tel'];


if($send == '1'){ echo '<p><span class="err">VOUS NE POUVEZ PAS MODIFIER CE COMPTE.</span></p>'."\n"; };
if($send == '6'){ echo '<p><span class="err">ERREUR DE TRAITEMENT. MERCI DE RÉ-ESSAYER PLUS TARD.</span></p>'."\n"; };

echo '<form action="inc/edit_insc.php" method="post">'."\n";

if($send == '2'){ echo '<p><br/><span class="err">MERCI DE BIEN VOULOIR INDIQUER VOTRE MOT DE PASSE.</span></p>'."\n"; };
if($send == '7'){ echo '<p><br/><span class="err">LES MOTS DE PASSE NE CORRESPONDENT PAS.</span></p>'."\n"; };

echo '<h4><label for="pwd">Ancien mot de passe</label></h4>'."\n";
echo '<p><input type="password" name="pwd" id="pwd" maxlength="32" size="32" value=""></p>'."\n";

if($send == '7'){ echo '<p><br/><span class="err">LES MOTS DE PASSE NE CORRESPONDENT PAS.</span></p>'."\n"; };

echo '<h4><label for="pwd1">Nouveau mot de passe</label></h4>'."\n";
echo '<p><input type="password" name="pwd1" id="pwd1" maxlength="32" size="32" value=""></p>'."\n";

echo '<h4><label for="pwd2">Nouveau mot de passe (confirmation)</label></h4>'."\n";
echo '<p><input type="password" name="pwd2" id="pwd2" maxlength="32" size="32" value=""></p>'."\n";
/*
if($send == '2'){ echo '<p><br/><span class="err">MERCI DE BIEN VOULOIR INDIQUER VOTRE VILLE.</span></p>'."\n"; };

echo '<h4><label for="ville">Ville <span class="err">*</span></label></h4>'."\n";
echo '<p><input type="text" name="ville" id="ville" maxlength="250" size="32" value="'.$user_ville.'"></p>'."\n";
*/
if($send == '3'){ echo '<p><br/><span class="err">MERCI DE BIEN VOULOIR INDIQUER VOTRE TÉLÉPHONE.</span></p>'."\n"; };

echo '<h4><label for="tel">Téléphone</label></h4>'."\n";
echo '<p><input type="text" name="tel" id="tel" maxlength="20" size="32" value="'.$user_tel.'"></p>'."\n";

if($send == '4'){ echo '<p><br/><span class="err">MERCI DE BIEN VOULOIR INDIQUER VOTRE COURRIEL.</span></p>'."\n"; };

echo '<h4><label for="mail">Courriel <span class="err">*</span></label></h4>'."\n";
echo '<p><input type="text" name="mail" id="mail" maxlength="250" size="32" value="'.$user_mail.'"></p>'."\n";

echo '<p><br/><span class="err">*Informations obligatoires</span><br/><br/></p>'."\n";

echo '<p><input type="submit" class="envoy" value="Modifier" /></p>'."\n";
echo '</form>'."\n";
} else {
echo '<p><span class="err">ERREUR DE TRAITEMENT !</span></p>'."\n";
}
}

echo '</div>'."\n";
echo '</div>'."\n";


include("inc/footer.inc.php");
?>