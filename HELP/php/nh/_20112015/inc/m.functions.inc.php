<?php
function MessageErreur ($message) {
echo '<link href="style.css" rel="stylesheet" type="text/css">';
echo'<center><br>'.$message.'<br><br><a href="javascript:window.history.go(-1)" class="lien3">Retour</a></center><br>';
exit;
}




function Aff_text($res_rub_id,$mod_id,$res_rub_aff) {
include ("admin/conf.ig.php");

$sqlb = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' ORDER BY mod_position "; 
$reqb = mysql_query($sqlb) or die('Erreur SQL !'.$sqlb.'<br>'.mysql_error());
$resb = mysql_num_rows($reqb);

if($resb){
$rowb = mysql_fetch_array($reqb);

$mod_titreb = $rowb['mod_titre'];
$mod_texteb = $rowb['mod_texte'];
$mod_imgb = $rowb['mod_img'];
$mod_img_position = $rowb['mod_img_position'];
$mod_type = $rowb['mod_type'];
$mod_id = $rowb['mod_id'];
$mod_position = $rowb['mod_position'];
$mod_rub_aff = $rowb['mod_rub_aff'];
$mod_option1 = $rowb['mod_option1'];
$mod_option2 = $rowb['mod_option2'];

if($res_rub_aff == '2cols') {
$largetxt = '570';
$largetxt2 = '770';
} else {
$largetxt = '770';
$largetxt2 = '980';
}

if($mod_option2 == '1') {
echo '<div id="element_e">'."\n";
}

if($mod_option1 == 1){
echo '<h1>'.$mod_titreb.'</h1>'."\n";
}

if($mod_imgb){
if($mod_img_position == 2){
echo '<table>'."\n";
echo '<tr>'."\n";
echo '<td valign="top" width="'.$largetxt.'">'.$mod_texteb.'</td>'."\n";
echo '<td align="right" valign="top" width="210"><img src="files/files/'.$mod_imgb.'"></td>'."\n";
echo '</tr>'."\n";
echo '</table>'."\n";
} elseif($mod_img_position == 3) {
echo '<table>'."\n";
echo '<tr>'."\n";
echo '<td valign="top" width="'.$largetxt2.'">'.$mod_texteb.'</td>'."\n";
echo '</tr>'."\n";
echo '<tr>'."\n";
echo '<td align="center" valign="top" width="210"><img src="files/files/'.$mod_imgb.'"></td>'."\n";
echo '</tr>'."\n";
echo '</table>'."\n";
} else {
echo '<table>'."\n";
echo '<tr>'."\n";
echo '<td align="left" valign="top" width="210"><img src="files/files/'.$mod_imgb.'"></td>'."\n";
echo '<td valign="top" width="'.$largetxt.'">'.$mod_texteb.'</td>'."\n";
echo '</tr>'."\n";
echo '</table>'."\n";
}
} else {
echo $mod_texteb."\n";
}

if($mod_option2 == '1') {
echo '</div>'."\n";
}
}

}








function Aff_news($res_rub_id,$mod_id,$res_rub_aff,$page) {
include ("admin/conf.ig.php");


$sql_t = "SELECT * FROM " .$table_news. "
LEFT JOIN " .$table_users. " ON ".$table_news.".news_author = ".$table_users.".user_id
WHERE news_mod_id = '$mod_id' AND news_activation = 'active' ORDER BY news_date DESC, news_heure DESC LIMIT 0,2 ";
$req_t = mysql_query($sql_t) or die('Erreur SQL !'.$sql_t.'<br>'.mysql_error());
$res_t = mysql_num_rows($req_t);

if($res_t){

$grrr = 1;

while($row_t = mysql_fetch_array($req_t)) {

$news_pseudo = $row_t['user_name'];
$news_id = $row_t['news_id'];
$news_rub_id = $row_t['news_rub_id'];
$news_mod_id = $row_t['news_mod_id'];
$news_titre = $row_t['news_titre'];
$news_texte = $row_t['news_texte'];
$news_img = $row_t['news_img'];
$date = $row_t['news_date'];
$news_heure = $row_t['news_heure'];

$news_option1 = $row_t['news_option1'];
$news_option2 = $row_t['news_option2'];
$news_option3 = $row_t['news_option3'];

$date = explode('-', $date);
if($date[1] == 1){
$date[1] = 'janvier';
} elseif ($date[1] == 2){
$date[1] = 'février';
} elseif ($date[1] == 3){
$date[1] = 'mars';
} elseif ($date[1] == 4){
$date[1] = 'avril';
} elseif ($date[1] == 5){
$date[1] = 'mai';
} elseif ($date[1] == 6){
$date[1] = 'juin';
} elseif ($date[1] == 7){
$date[1] = 'juillet';
} elseif ($date[1] == 8){
$date[1] = 'août';
} elseif ($date[1] == 9){
$date[1] = 'septembre';
} elseif ($date[1] == 10){
$date[1] = 'octobre';
} elseif ($date[1] == 11){
$date[1] = 'novembre';
} elseif ($date[1] == 12){
$date[1] = 'décembre';
}

$max = 400;
$chaine = $news_texte;

  if(strlen($chaine)>=$max)
  {
  $chaine=substr($chaine,0,$max); 
  $espace=strrpos($chaine," "); 
  if($espace)
  $chaine=substr($chaine,0,$espace);
  $chaine .= '...';
  }

if($grrr == '1'){
echo '<div id="news_left">'."\n";
} else {
echo '<div id="news_right">'."\n";
}

echo '<div id="news">'."\n";

echo '<div id="news'.$grrr.'">'."\n";
if($news_img){
echo '<img src="files/news/'.$news_img.'">'."\n";
}

if($news_option1 == 1 AND $news_option2 == 1){
echo '<h2>Le '.$date[2].' '.$date[1].' '.$date[0].' à '.$news_heure.' par <b>'.$news_pseudo.'</b>.</h2>'."\n";
} elseif($news_option1 == 1 AND $news_option2 != 1) {
echo '<h2>Le '.$date[2].' '.$date[1].' '.$date[0].' à '.$news_heure.'.</h2>'."\n";
} elseif($news_option1 != 1 AND $news_option2 == 1) {
echo '<h2>Par <b>'.$news_pseudo.'</b>.</h2>'."\n";
} else {
echo '<div id="inter_news"></div>'."\n";
}
echo '<h1>'.$news_titre.'</h1>'."\n";
echo '</div>'."\n";

echo '<div class="contenthover">'."\n";

if($news_option1 == 1 AND $news_option2 == 1){
echo '<h2>Le '.$date[2].' '.$date[1].' '.$date[0].' à '.$news_heure.' par <b>'.$news_pseudo.'</b>.</h2>'."\n";
} elseif($news_option1 == 1 AND $news_option2 != 1) {
echo '<h2>Le '.$date[2].' '.$date[1].' '.$date[0].' à '.$news_heure.'.</h2>'."\n";
} elseif($news_option1 != 1 AND $news_option2 == 1) {
echo '<h2>Par <b>'.$news_pseudo.'</b>.</h2>'."\n";
}
echo '<h1>'.$news_titre.'</h1>'."\n";
echo '<p class="contenthover">'.$chaine.'</p>'."\n";

echo '<p class="contenthover"><a href="m.news-'.$page.'-'.$news_id.'.html" class="mybutton">Lire la suite</a></p>'."\n";

echo '</div>'."\n";

echo '</div>'."\n";

echo '</div>'."\n";


$grrr = $grrr + 1;
}
}


echo '<div id="list_fiches"></div>'."\n";

}








function Aff_form($res_rub_id,$mod_id,$res_rub_aff,$rub_position,$err) {
include ("admin/conf.ig.php");

if($err == '6'){
echo '<p>Votre message a été envoyé avec succès !</p>'."\n";
} else {

$sqlb = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' ORDER BY mod_position "; 
$reqb = mysql_query($sqlb) or die('Erreur SQL !'.$sqlb.'<br>'.mysql_error());
$resb = mysql_num_rows($reqb);

if($resb){
$rowb = mysql_fetch_array($reqb);

$mod_id = $rowb['mod_id'];
$mod_texte = $rowb['mod_texte'];

if($err == '5'){ echo '<p><span class="err2">Merci de cocher la case "Je ne suis pas un robot".</span></p>'."\n"; }
if($err == '7'){ echo '<p><span class="err2">Erreur de traitement.</span></p>'."\n"; }

echo '<form action="m.mail.php?position='.$rub_position.'&mod_id='.$mod_id.'" method="post">'."\n";

echo '<h4><label for="mail">Votre courriel <span class="err">*</span></label></h4>'."\n";
if($err == '1'){ echo '<p><span class="err2">Merci d\'indiquer votre courriel.</span></p>'."\n"; }
if($err == '4'){ echo '<p><span class="err2">Erreur dans votre courriel.</span></p>'."\n"; }
echo '<p><input type="text" name="mail" id="mail" maxlength="250" size="32" value=""></p>'."\n";

echo '<h4><label for="sujet">Nom - Prénom <span class="err">*</span></label></h4>'."\n";
if($err == '2'){ echo '<p><span class="err2">Merci d\'indiquer votre nom et prénom.</span></p>'."\n"; }
echo '<p><input type="text" name="sujet" id="sujet" maxlength="255" size="32" value=""></p>'."\n";

echo '<h4><label for="code_postal">Code postal <span class="err">*</span></label></h4>'."\n";
if($err == '6'){ echo '<p><span class="err2">Merci d\'indiquer votre code postal.</span></p>'."\n"; }
echo '<p><input type="text" name="code_postal" id="code_postal" maxlength="250" size="32" value=""></p>'."\n";

echo '<h4><label for="msg">Votre message <span class="err">*</span></label></h4>'."\n";
if($err == '3'){ echo '<p><span class="err2">Merci d\'indiquer un message.</span></p>'."\n"; }
echo '<p><textarea cols="32" id="msg" name="msg" rows="5" ></textarea></p>'."\n";

echo '<br/><div class="g-recaptcha" data-sitekey="6LfpFQsTAAAAANypN_iUCcYsOp201l9nEagQYEQf"></div><br/>'."\n";

echo '<p><span class="err">*Informations obligatoires</span><br/><br/></p>'."\n";

echo '<p><input type="submit" class="envoy" value="> Envoyer" /></p>'."\n";
echo '</form>'."\n";

echo '<script src="https://www.google.com/recaptcha/api.js"></script>'."\n";

if($mod_texte){
echo '<p><br/><br/>'.$mod_texte.'</p>'."\n";
}


}

}

}




function Aff_fiches($res_rub_id,$mod_id,$res_rub_aff) {
include ("admin/conf.ig.php");

$sql = "SELECT * FROM " .$table_fiches. " WHERE fch_activation = 'active' ORDER by fch_une DESC, fch_date DESC, fch_heure DESC";
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

if($res){
$row = mysql_fetch_array($req);

$fch_id = $row['fch_id'];
$fch_titre = $row['fch_titre'];
$fch_texte = $row['fch_texte'];
$fch_lien = $row['fch_lien'];
$fch_img = $row['fch_img'];
$fch_date = $row['fch_date'];
$fch_heure = $row['fch_heure'];
$fch_une = $row['fch_une'];
$fch_statut = $row['fch_statut'];

echo '<div id="alaune">'."\n";
echo '<div id="fiches">'."\n";
echo '<div id="d7">'."\n";
if($fch_img){
echo '<img src="files/fiches/'.$fch_img.'">'."\n";
}
echo '<h1>'.$fch_titre.'</h1>'."\n";
echo '</div>'."\n";

echo '<div class="contenthover">'."\n";
echo '<h1>'.$fch_titre.'</h1>'."\n";
echo '<p class="contenthover">'.$fch_texte.'</p>'."\n";

if($fch_statut == 'ec'){
echo '<p class="contenthover"><a href="#" class="mybutton">À venir...</a></p>'."\n";
} else {
//echo '<p class="contenthover"><a href="fiche-'.$fch_id.'.html" class="mybutton">Obtenir un diagnostic</a></p>'."\n";
echo '<p class="contenthover"><a href="'.$fch_lien.'" class="mybutton">Obtenir un diagnostic</a></p>'."\n";
}
echo '</div>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";
} else {
echo '<div id="fiches">'."\n";
echo '<p>Aucune fiche.</p>'."\n";
echo '</div>';
}

$sqlb = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' ORDER BY mod_position "; 
$reqb = mysql_query($sqlb) or die('Erreur SQL !'.$sqlb.'<br>'.mysql_error());
$resb = mysql_num_rows($reqb);

if($resb){
$rowb = mysql_fetch_array($reqb);

$mod_titreb = $rowb['mod_titre'];
$mod_texteb = $rowb['mod_texte'];
$mod_imgb = $rowb['mod_img'];
$mod_type = $rowb['mod_type'];
$mod_id = $rowb['mod_id'];
$mod_position = $rowb['mod_position'];
$mod_rub_aff = $rowb['mod_rub_aff'];
$mod_option1 = $rowb['mod_option1'];
$mod_option2 = $rowb['mod_option2'];

echo '<div id="fiches_info">'."\n";


if($mod_option1 == 1){
echo '<h1>'.$mod_titreb.'</h1>'."\n";
}
echo $mod_texteb."\n";
if($mod_imgb){
echo '<p><img src="files/images/'.$mod_imgb.'" height="80"></p>'."\n";
echo '<p><span class="inscrip"><a href="m.inscription.html" class="mybutton">Inscrivez-vous</a></span></p>'."\n";
}

echo '</div>'."\n";
}

echo '<div id="list_fiches"></div>'."\n";

$sqlx = "SELECT * FROM " .$table_fiches. " WHERE fch_activation = 'active' AND fch_une = 'normal' ORDER by fch_date DESC, fch_heure DESC LIMIT 0,3";
$reqx = mysql_query($sqlx) or die('Erreur SQL !'.$sqlx.'<br>'.mysql_error());
$resx = mysql_num_rows($reqx);

if($resx){
$grrr = 1;
$altgrr = 1;
while($rowx = mysql_fetch_array($reqx)){

$fch_id = $rowx['fch_id'];
$fch_titre = $rowx['fch_titre'];
$fch_texte = $rowx['fch_texte'];
$fch_lien = $rowx['fch_lien'];
$fch_img = $rowx['fch_img'];
$fch_date = $rowx['fch_date'];
$fch_heure = $rowx['fch_heure'];
$fch_une = $rowx['fch_une'];
$fch_statut = $rowx['fch_statut'];

if($grrr == '3'){
echo '<div id="fiches_right">'."\n";
} else {
echo '<div id="fiches_left">'."\n";
}
echo '<div id="fiches">'."\n";
echo '<div id="d'.$altgrr.'">'."\n";

if($fch_img){
echo '<img src="files/fiches/'.$fch_img.'" >'."\n";
}

echo '<h1>'.$fch_titre.'</h1>'."\n";

echo '</div>';

echo '<div class="contenthover">'."\n";
echo '<h1>'.$fch_titre.'</h1>'."\n";
echo '<p class="contenthover">'.$fch_texte.'</p>'."\n";

if($fch_statut == 'ec'){
echo '<p class="contenthover"><a href="#" class="mybutton">À venir...</a></p>'."\n";
} else {
echo '<p class="contenthover"><a href="'.$fch_lien.'" class="mybutton">Obtenir un diagnostic</a></p>'."\n";
}

echo '</div>'."\n";

echo '</div>';

echo '</div>';

$grrr = $grrr + 1;
$altgrr = $altgrr + 1;
}
}


echo '<div id="list_fiches"></div>'."\n";

$sqlx = "SELECT * FROM " .$table_fiches. " WHERE fch_activation = 'active' AND fch_une = 'normal' ORDER by fch_date DESC, fch_heure DESC LIMIT 3,6";
$reqx = mysql_query($sqlx) or die('Erreur SQL !'.$sqlx.'<br>'.mysql_error());
$resx = mysql_num_rows($reqx);

if($resx){
$grrr = 1;
$altgrr2 = 4;
while($rowx = mysql_fetch_array($reqx)){

$fch_id = $rowx['fch_id'];
$fch_titre = $rowx['fch_titre'];
$fch_texte = $rowx['fch_texte'];
$fch_lien = $rowx['fch_lien'];
$fch_img = $rowx['fch_img'];
$fch_date = $rowx['fch_date'];
$fch_heure = $rowx['fch_heure'];
$fch_une = $rowx['fch_une'];
$fch_statut = $rowx['fch_statut'];

if($grrr == '3'){
echo '<div id="fiches_right">'."\n";
} else {
echo '<div id="fiches_left">'."\n";
}
echo '<div id="fiches">'."\n";

echo '<div id="d'.$altgrr2.'">'."\n";

if($fch_img){
echo '<img src="files/fiches/'.$fch_img.'">'."\n";
}

echo '<h1>'.$fch_titre.'</h1>'."\n";

echo '</div>';

echo '<div class="contenthover">'."\n";
echo '<h1>'.$fch_titre.'</h1>'."\n";
echo '<p class="contenthover">'.$fch_texte.'</p>'."\n";

if($fch_statut == 'ec'){
echo '<p class="contenthover"><a href="#" class="mybutton">À venir...</a></p>'."\n";
} else {
echo '<p class="contenthover"><a href="'.$fch_lien.'" class="mybutton">Obtenir un diagnostic</a></p>'."\n";
}

echo '</div>'."\n";

echo '</div>';

echo '</div>';

$grrr = $grrr + 1;
$altgrr2 = $altgrr2 + 1;
}
}

}
?>