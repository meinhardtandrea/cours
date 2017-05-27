<?php
include("inc/header.inc.php");

if(!isset($_SESSION['pseudo'])) {
echo '<p><font color="red">Vous n\'avez pas accès à ce service.<br />Merci de votre visite.</font></p>'."\n";
echo '</div>'."\n";
include("inc/footer.inc.php");
  exit;
}

if($_SESSION['user_access'] >= 3) {
echo '<p><font color="red">Vous n\'avez pas accès à ce service.<br />Merci de votre visite.</font></p>'."\n";
echo '</div>'."\n";
include("inc/footer.inc.php");
exit;
}

if (isset($_GET["rub_id"])) $rub_id = $_GET["rub_id"];
else $rub_id="";
if (isset($_GET["mod_id"])) $mod_id = $_GET["mod_id"];
else $mod_id="";
if (isset($_GET["news_id"])) $news_id = $_GET["news_id"];
else $news_id="";
if (isset($_GET["img_id"])) $img_id = $_GET["img_id"];
else $img_id="";
if (isset($_GET["pdf_id"])) $pdf_id = $_GET["pdf_id"];
else $pdf_id="";
if (isset($_GET["position"])) $position = $_GET["position"];
else $position="";

///////////Fonctions///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function aff_files($rub_id) {
include ("conf.ig.php");

$sqlt = "SELECT * FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];
$rub_aff = $rowt['rub_aff'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > '.$rub_titre.'</h1>'."\n";


if($rub_aff == '2cols'){
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_index.php">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";


$sql = "SELECT * FROM " .$table_modules. " WHERE mod_rub_id = '$rub_id' AND mod_rub_aff != 'right' ORDER BY mod_position ";
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

echo '<div id="aff_left">'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?action=add_f&rub_id='.$rub_id.'&aff=left">+ Ajouter un élément</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

if($res){

while($row = mysql_fetch_array($req)) {

$mod_id = $row['mod_id'];
$mod_type = $row['mod_type'];
$mod_titre = $row['mod_titre'];
$mod_texte = $row['mod_texte'];
$mod_img = $row['mod_img'];
$mod_img_position = $row['mod_img_position'];
$mod_activation = $row['mod_activation'];
$mod_mail = $row['mod_mail'];
$mod_position = $row['mod_position'];

$mod_option1 = $row['mod_option1'];
//$mod_option2 = $row['mod_option2'];


echo '<div id="aff_left_el">'."\n";

if($mod_option1 == 1){
echo '<h1>'.$mod_titre.'</h1>'."\n";
}

if($mod_type == 'text'){
$lk_action = 'add_txt';

if($mod_img){
if($mod_img_position == 2){
echo '<table>'."\n";
echo '<tr>'."\n";
echo '<td valign="top">'.$mod_texte.'</td>'."\n";
echo '<td align="right" valign="top" width="210"><img src="../files/files/'.$mod_img.'"></td>'."\n";
echo '</tr>'."\n";
echo '</table>'."\n";
} elseif($mod_img_position == 3) {
echo '<table>'."\n";
echo '<tr>'."\n";
echo '<td valign="top">'.$mod_texte.'</td>'."\n";
echo '</tr>'."\n";
echo '<tr>'."\n";
echo '<td align="center" valign="top" width="210"><img src="../files/files/'.$mod_img.'"></td>'."\n";
echo '</tr>'."\n";
echo '</table>'."\n";
} else {
echo '<table>'."\n";
echo '<tr>'."\n";
echo '<td align="right" valign="top" width="210"><img src="../files/files/'.$mod_img.'"></td>'."\n";
echo '<td valign="top">'.$mod_texte.'</td>'."\n";
echo '</tr>'."\n";
echo '</table>'."\n";
}
} else {
echo $mod_texte."\n";
}
} elseif($mod_type == 'pdf'){
$lk_action = 'add_pdf';

$sql_i = "SELECT * FROM " .$table_pdf. " WHERE pdf_rub_id = '$rub_id' AND pdf_mod_id = '$mod_id' ORDER BY pdf_position "; 
$req_i = mysql_query($sql_i,$db) or die ('Erreur : '.mysql_error() );
$res_i = mysql_num_rows($req_i);
if($res_i){
while($row_i = mysql_fetch_array($req_i)) {
$pdf_name = $row_i['pdf_name'];
$pdf_titre = $row_i['pdf_titre'];

if ($pdf_titre) {
echo '<p><img src="images/icones/pdf.png" title="Fichier PDF" alt="Fichier PDF" align="absmiddle"> <a href="../files/pdf/'.$pdf_name.'" width="115" height="100" title="'.$pdf_titre.'" alt="'.$pdf_titre.'" target="_blank">'.$pdf_titre.'</p>'."\n";
} else {
echo '<p><img src="images/icones/pdf.png" title="Fichier PDF" alt="Fichier PDF" align="absmiddle"> <a href="../files/pdf/'.$pdf_name.'" width="115" height="100" title="'.$pdf_name.'" alt="'.$pdf_name.'" target="_blank">'.$pdf_name.'</p>'."\n";
}

}

}

} elseif($mod_type == 'fiches'){
$lk_action = 'add_fiches';

echo $mod_texte."\n";
if($mod_img){
echo '<img src="../files/images/'.$mod_img.'">'."\n";
}


} elseif($mod_type == 'image'){
$lk_action = 'add_image';
if($mod_img){
echo '<img src="../files/images/'.$mod_img.'" width="600">'."\n";
}
} elseif($mod_type == 'contact'){
$lk_action = 'add_form';
if($mod_mail){
echo '<p>Formulaire de contact : <b>'.$mod_mail.'</b></p>'."\n";
}
if($mod_texte){
echo '<p>'.$mod_texte.'</p>'."\n";
}
} elseif($mod_type == 'news'){
$lk_action = 'add_news';

echo '<p align="right">[ <a href="gs_modules.php?action=add_news2&rub_id='.$rub_id.'&mod_id='.$mod_id.'">Ajouter une actualité</a> ]</p>'."\n";

$sql_i = "SELECT * FROM " .$table_news. " 
LEFT JOIN " .$table_users. " ON ".$table_news.".news_author = ".$table_users.".user_id
WHERE news_mod_id = '$mod_id' ORDER BY news_date DESC, news_heure DESC ";
$req_i = mysql_query($sql_i,$db) or die ('Erreur : '.mysql_error() );
$res_i = mysql_num_rows($req_i);
if($res_i){
while($row_i = mysql_fetch_array($req_i)) {

$news_pseudo = $row_i['user_name'];

$news_id = $row_i['news_id'];
$news_titre = $row_i['news_titre'];
$news_texte = $row_i['news_texte'];
$news_img = $row_i['news_img'];
$date = $row_i['news_date'];
$news_heure = $row_i['news_heure'];
$news_activation = $row_i['news_activation'];

$news_option1 = $row_i['news_option1'];
$news_option2 = $row_i['news_option2'];

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


echo '<div id="aff_news">'."\n";

echo '<h1>'.$news_titre.'<a name="'.$news_id.'"></a></h1>'."\n";

if($news_option1 == 1 AND $news_option2 == 1){
echo '<p><span class="date">Le '.$date[2].' '.$date[1].' '.$date[0].' à '.$news_heure.' par '.$news_pseudo.'.</span></p>'."\n";
} elseif($news_option1 == 1 AND $news_option2 != 1) {
echo '<p><span class="date">Le '.$date[2].' '.$date[1].' '.$date[0].' à '.$news_heure.'.</span></p>'."\n";
} elseif($news_option1 != 1 AND $news_option2 == 1) {
echo '<p><span class="date">Par '.$news_pseudo.'.</span></p>'."\n";
}

if($news_img){
echo '<table>'."\n";
echo '<tr>'."\n";
echo '<td valign="top" width="210"><img src="../files/news/'.$news_img.'" width="200"></td>'."\n";
echo '<td valign="top">'.$news_texte.'</td>'."\n";
echo '</tr>'."\n";
echo '</table>'."\n";
} else {
echo $news_texte."\n";
}

if($news_activation == 'nonactive'){
$trans_active = '<a href="gs_modules.php?action=act_on_news&rub_id='.$rub_id.'&mod_id='.$mod_id.'&news_id='.$news_id.'"><img src="images/icones/off.gif" title="Activer l\'actualité" alt="Activer l\'actualité" align="absmiddle"></a>';
} else {
$trans_active = '<a href="gs_modules.php?action=act_off_news&rub_id='.$rub_id.'&mod_id='.$mod_id.'&news_id='.$news_id.'"><img src="images/icones/on.gif" title="Désactiver l\'actualité" alt="Désactiver l\'actualité" align="absmiddle"></a>';
}

echo '<p align="right">[ <a href="gs_modules.php?action=edit_news&rub_id='.$rub_id.'&mod_id='.$mod_id.'&news_id='.$news_id.'">Editer</a> ] [ <a href="gs_modules.php?action=del_news&rub_id='.$rub_id.'&mod_id='.$mod_id.'&news_id='.$news_id.'&confirm=av">Supprimer</a> ] '.$trans_active.'</p>'."\n";

echo '</div>'."\n";


}
} else {
echo '<p>Aucune actualité pour le moment...</p>'."\n";
}

}


if($mod_activation == 'nonactive'){
$trans_active = '<a href="gs_modules.php?action=act_on&rub_id='.$rub_id.'&mod_id='.$mod_id.'"><img src="images/icones/off.gif" title="Activer l\'élément" alt="Activer l\'élément" align="absmiddle"></a>';
} else {
$trans_active = '<a href="gs_modules.php?action=act_off&rub_id='.$rub_id.'&mod_id='.$mod_id.'"><img src="images/icones/on.gif" title="Désactiver l\'élément" alt="Désactiver l\'élément" align="absmiddle"></a>';
}

if ($res == 1) {
$trans_move = '';
} elseif ($mod_position == 1) {
$trans_move = '[ <a href="gs_modules.php?action=moved&rub_id='.$rub_id.'&mod_id='.$mod_id.'&position='.$mod_position.'&aff=left"><img src="images/icones/bullet_arrow_bottom.png" alt="Descendre" title="Descendre"></a> ]'."\n";
} elseif ($mod_position == $res) {
$trans_move = '[ <a href="gs_modules.php?action=moveup&rub_id='.$rub_id.'&mod_id='.$mod_id.'&position='.$mod_position.'&aff=left"><img src="images/icones/bullet_arrow_top.png" alt="Monter" title="Monter"></a> ]'."\n";
} else {
$trans_move = '[ <a href="gs_modules.php?action=moveup&rub_id='.$rub_id.'&mod_id='.$mod_id.'&position='.$mod_position.'&aff=left"><img src="images/icones/bullet_arrow_top.png" alt="Monter" title="Monter"></a> <a href="gs_modules.php?action=moved&rub_id='.$rub_id.'&mod_id='.$mod_id.'&position='.$mod_position.'&aff=left"><img src="images/icones/bullet_arrow_bottom.png" alt="Descendre" title="Descendre"></a> ]'."\n";
}

echo '<p align="right">'.$trans_move.' [ <a href="gs_modules.php?action='.$lk_action.'&rub_id='.$rub_id.'&mod_id='.$mod_id.'">Editer</a> ] [ <a href="gs_modules.php?action=del&rub_id='.$rub_id.'&mod_id='.$mod_id.'&confirm=av">Supprimer</a> ] '.$trans_active.'</p>'."\n";

echo '</div>'."\n";
}

} else {
echo '<p>Cette partie est actuellement vide...</p>'."\n";
}
echo '</div>'."\n";


$sql = "SELECT * FROM " .$table_modules. " WHERE mod_rub_id = '$rub_id' AND mod_rub_aff = 'right' ORDER BY mod_position ";
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

echo '<div id="aff_right">'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?action=add_f&rub_id='.$rub_id.'&aff=right">+ Ajouter un élément</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

if($res){

while($row = mysql_fetch_array($req)) {

$mod_id = $row['mod_id'];
$mod_type = $row['mod_type'];
$mod_titre = $row['mod_titre'];
$mod_texte = $row['mod_texte'];
$mod_img = $row['mod_img'];
$mod_img_position = $row['mod_img_position'];
$mod_activation = $row['mod_activation'];
$mod_mail = $row['mod_mail'];
$mod_position = $row['mod_position'];

$mod_option1 = $row['mod_option1'];
//$mod_option2 = $row['mod_option2'];


echo '<div id="aff_left_el">'."\n";

if($mod_option1 == 1){
echo '<h1>'.$mod_titre.'</h1>'."\n";
}

if($mod_type == 'text'){
$lk_action = 'add_txt';

echo $mod_texte."\n";

} elseif($mod_type == 'fiches'){
$lk_action = 'add_fiches';

if($mod_img){
echo '<img src="../files/images/'.$mod_img.'">'."\n";
}


} elseif($mod_type == 'pdf'){
$lk_action = 'add_pdf';

$sql_i = "SELECT * FROM " .$table_pdf. " WHERE pdf_rub_id = '$rub_id' AND pdf_mod_id = '$mod_id' ORDER BY pdf_position "; 
$req_i = mysql_query($sql_i,$db) or die ('Erreur : '.mysql_error() );
$res_i = mysql_num_rows($req_i);
if($res_i){
while($row_i = mysql_fetch_array($req_i)) {
$pdf_name = $row_i['pdf_name'];
$pdf_titre = $row_i['pdf_titre'];

if ($pdf_titre) {
echo '<p><img src="images/icones/pdf.png" title="Fichier PDF" alt="Fichier PDF" align="absmiddle"> <a href="../files/pdf/'.$pdf_name.'" width="115" height="100" title="'.$pdf_titre.'" alt="'.$pdf_titre.'" target="_blank">'.$pdf_titre.'</p>'."\n";
} else {
echo '<p><img src="images/icones/pdf.png" title="Fichier PDF" alt="Fichier PDF" align="absmiddle"> <a href="../files/pdf/'.$pdf_name.'" width="115" height="100" title="'.$pdf_name.'" alt="'.$pdf_name.'" target="_blank">'.$pdf_name.'</p>'."\n";
}

}

}

} elseif($mod_type == 'image'){
$lk_action = 'add_image';
if($mod_img){
echo '<img src="../files/images/'.$mod_img.'" width="275">'."\n";
}
}


if($mod_activation == 'nonactive'){
$trans_active = '<a href="gs_modules.php?action=act_on&rub_id='.$rub_id.'&mod_id='.$mod_id.'"><img src="images/icones/off.gif" title="Activer l\'élément" alt="Activer l\'élément" align="absmiddle"></a>';
} else {
$trans_active = '<a href="gs_modules.php?action=act_off&rub_id='.$rub_id.'&mod_id='.$mod_id.'"><img src="images/icones/on.gif" title="Désactiver l\'élément" alt="Désactiver l\'élément" align="absmiddle"></a>';
}

if ($res == 1) {
$trans_move = '';
} elseif ($mod_position == 1) {
$trans_move = '[ <a href="gs_modules.php?action=moved&rub_id='.$rub_id.'&mod_id='.$mod_id.'&position='.$mod_position.'&aff=right"><img src="images/icones/bullet_arrow_bottom.png" alt="Descendre" title="Descendre"></a> ]'."\n";
} elseif ($mod_position == $res) {
$trans_move = '[ <a href="gs_modules.php?action=moveup&rub_id='.$rub_id.'&mod_id='.$mod_id.'&position='.$mod_position.'&aff=right"><img src="images/icones/bullet_arrow_top.png" alt="Monter" title="Monter"></a> ]'."\n";
} else {
$trans_move = '[ <a href="gs_modules.php?action=moveup&rub_id='.$rub_id.'&mod_id='.$mod_id.'&position='.$mod_position.'&aff=right"><img src="images/icones/bullet_arrow_top.png" alt="Monter" title="Monter"></a> <a href="gs_modules.php?action=moved&rub_id='.$rub_id.'&mod_id='.$mod_id.'&position='.$mod_position.'&aff=right"><img src="images/icones/bullet_arrow_bottom.png" alt="Descendre" title="Descendre"></a> ]'."\n";
}

echo '<p align="right">'.$trans_move.' [ <a href="gs_modules.php?action='.$lk_action.'&rub_id='.$rub_id.'&mod_id='.$mod_id.'">Editer</a> ] [ <a href="gs_modules.php?action=del&rub_id='.$rub_id.'&mod_id='.$mod_id.'&confirm=av">Supprimer</a> ] '.$trans_active.'</p>'."\n";

echo '</div>'."\n";
}

} else {
echo '<p>Cette partie est actuellement vide...</p>'."\n";
}
echo '</div>'."\n";

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
} else {
echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_index.php">< Retour</a></li>'."\n";
echo '<li><a href="gs_modules.php?action=add_f&rub_id='.$rub_id.'">+ Ajouter un élément</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";


$sql = "SELECT * FROM " .$table_modules. " WHERE mod_rub_id = '$rub_id' AND mod_rub_aff != 'right' ORDER BY mod_position ";
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

if($res){

while($row = mysql_fetch_array($req)) {

$mod_id = $row['mod_id'];
$mod_type = $row['mod_type'];
$mod_titre = $row['mod_titre'];
$mod_texte = $row['mod_texte'];
$mod_img = $row['mod_img'];
$mod_img_position = $row['mod_img_position'];
$mod_activation = $row['mod_activation'];
$mod_mail = $row['mod_mail'];
$mod_position = $row['mod_position'];

$mod_option1 = $row['mod_option1'];
//$mod_option2 = $row['mod_option2'];


echo '<div id="aff_centre_el">'."\n";

if($mod_option1 == 1){
echo '<h1>'.$mod_titre.'</h1>'."\n";
}

if($mod_type == 'text'){
$lk_action = 'add_txt';

if($mod_img){
if($mod_img_position == 2){
echo '<table>'."\n";
echo '<tr>'."\n";
echo '<td valign="top">'.$mod_texte.'</td>'."\n";
echo '<td align="right" valign="top" width="210"><img src="../files/files/'.$mod_img.'"></td>'."\n";
echo '</tr>'."\n";
echo '</table>'."\n";
} elseif($mod_img_position == 3) {
echo '<table>'."\n";
echo '<tr>'."\n";
echo '<td valign="top">'.$mod_texte.'</td>'."\n";
echo '</tr>'."\n";
echo '<tr>'."\n";
echo '<td align="center" valign="top" width="210"><img src="../files/files/'.$mod_img.'"></td>'."\n";
echo '</tr>'."\n";
echo '</table>'."\n";
} else {
echo '<table>'."\n";
echo '<tr>'."\n";
echo '<td align="right" valign="top" width="210"><img src="../files/files/'.$mod_img.'"></td>'."\n";
echo '<td valign="top">'.$mod_texte.'</td>'."\n";
echo '</tr>'."\n";
echo '</table>'."\n";
}
} else {
echo $mod_texte."\n";
}
} elseif($mod_type == 'fiches'){
$lk_action = 'add_fiches';

echo $mod_texte."\n";

if($mod_img){
echo '<img src="../files/images/'.$mod_img.'">'."\n";
}


} elseif($mod_type == 'pdf'){
$lk_action = 'add_pdf';

$sql_i = "SELECT * FROM " .$table_pdf. " WHERE pdf_rub_id = '$rub_id' AND pdf_mod_id = '$mod_id' ORDER BY pdf_position "; 
$req_i = mysql_query($sql_i,$db) or die ('Erreur : '.mysql_error() );
$res_i = mysql_num_rows($req_i);
if($res_i){
while($row_i = mysql_fetch_array($req_i)) {
$pdf_name = $row_i['pdf_name'];
$pdf_titre = $row_i['pdf_titre'];

if ($pdf_titre) {
echo '<p><img src="images/icones/pdf.png" title="Fichier PDF" alt="Fichier PDF" align="absmiddle"> <a href="../files/pdf/'.$pdf_name.'" width="115" height="100" title="'.$pdf_titre.'" alt="'.$pdf_titre.'" target="_blank">'.$pdf_titre.'</p>'."\n";
} else {
echo '<p><img src="images/icones/pdf.png" title="Fichier PDF" alt="Fichier PDF" align="absmiddle"> <a href="../files/pdf/'.$pdf_name.'" width="115" height="100" title="'.$pdf_name.'" alt="'.$pdf_name.'" target="_blank">'.$pdf_name.'</p>'."\n";
}

}

}

} elseif($mod_type == 'image'){
$lk_action = 'add_image';
if($mod_img){
echo '<img src="../files/images/'.$mod_img.'" width="600">'."\n";
}
}  elseif($mod_type == 'contact'){
$lk_action = 'add_form';
if($mod_mail){
echo '<p>Formulaire de contact : <b>'.$mod_mail.'</b></p>'."\n";
}
if($mod_texte){
echo '<p>'.$mod_texte.'</p>'."\n";
}
} elseif($mod_type == 'news'){
$lk_action = 'add_news';

echo '<p align="right">[ <a href="gs_modules.php?action=add_news2&rub_id='.$rub_id.'&mod_id='.$mod_id.'">Ajouter une actualité</a> ]</p>'."\n";

$sql_i = "SELECT * FROM " .$table_news. " 
LEFT JOIN " .$table_users. " ON ".$table_news.".news_author = ".$table_users.".user_id
WHERE news_mod_id = '$mod_id' ORDER BY news_date DESC, news_heure DESC ";
$req_i = mysql_query($sql_i,$db) or die ('Erreur : '.mysql_error() );
$res_i = mysql_num_rows($req_i);
if($res_i){
while($row_i = mysql_fetch_array($req_i)) {

$news_pseudo = $row_i['user_name'];

$news_id = $row_i['news_id'];
$news_titre = $row_i['news_titre'];
$news_texte = $row_i['news_texte'];
$news_img = $row_i['news_img'];
$date = $row_i['news_date'];
$news_heure = $row_i['news_heure'];
$news_activation = $row_i['news_activation'];

$news_option1 = $row_i['news_option1'];
$news_option2 = $row_i['news_option2'];

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


echo '<div id="aff_news">'."\n";

echo '<h1>'.$news_titre.'<a name="'.$news_id.'"></a></h1>'."\n";

if($news_option1 == 1 AND $news_option2 == 1){
echo '<p><span class="date">Le '.$date[2].' '.$date[1].' '.$date[0].' à '.$news_heure.' par '.$news_pseudo.'.</span></p>'."\n";
} elseif($news_option1 == 1 AND $news_option2 != 1) {
echo '<p><span class="date">Le '.$date[2].' '.$date[1].' '.$date[0].' à '.$news_heure.'.</span></p>'."\n";
} elseif($news_option1 != 1 AND $news_option2 == 1) {
echo '<p><span class="date">Par '.$news_pseudo.'.</span></p>'."\n";
}

if($news_img){
echo '<table>'."\n";
echo '<tr>'."\n";
echo '<td valign="top" width="210"><img src="../files/news/'.$news_img.'" width="200"></td>'."\n";
echo '<td valign="top">'.$news_texte.'</td>'."\n";
echo '</tr>'."\n";
echo '</table>'."\n";
} else {
echo $news_texte."\n";
}

if($news_activation == 'nonactive'){
$trans_active = '<a href="gs_modules.php?action=act_on_news&rub_id='.$rub_id.'&mod_id='.$mod_id.'&news_id='.$news_id.'"><img src="images/icones/off.gif" title="Activer l\'actualité" alt="Activer l\'actualité" align="absmiddle"></a>';
} else {
$trans_active = '<a href="gs_modules.php?action=act_off_news&rub_id='.$rub_id.'&mod_id='.$mod_id.'&news_id='.$news_id.'"><img src="images/icones/on.gif" title="Désactiver l\'actualité" alt="Désactiver l\'actualité" align="absmiddle"></a>';
}

echo '<p align="right">[ <a href="gs_modules.php?action=edit_news&rub_id='.$rub_id.'&mod_id='.$mod_id.'&news_id='.$news_id.'">Editer</a> ] [ <a href="gs_modules.php?action=del_news&rub_id='.$rub_id.'&mod_id='.$mod_id.'&news_id='.$news_id.'&confirm=av">Supprimer</a> ] '.$trans_active.'</p>'."\n";

echo '</div>'."\n";


}
} else {
echo '<p>Aucune actualité pour le moment...</p>'."\n";
}

}


if($mod_activation == 'nonactive'){
$trans_active = '<a href="gs_modules.php?action=act_on&rub_id='.$rub_id.'&mod_id='.$mod_id.'"><img src="images/icones/off.gif" title="Activer l\'élément" alt="Activer l\'élément" align="absmiddle"></a>';
} else {
$trans_active = '<a href="gs_modules.php?action=act_off&rub_id='.$rub_id.'&mod_id='.$mod_id.'"><img src="images/icones/on.gif" title="Désactiver l\'élément" alt="Désactiver l\'élément" align="absmiddle"></a>';
}

if ($res == 1) {
$trans_move = '';
} elseif ($mod_position == 1) {
$trans_move = '[ <a href="gs_modules.php?action=moved&rub_id='.$rub_id.'&mod_id='.$mod_id.'&position='.$mod_position.'"><img src="images/icones/bullet_arrow_bottom.png" alt="Descendre" title="Descendre"></a> ]'."\n";
} elseif ($mod_position == $res) {
$trans_move = '[ <a href="gs_modules.php?action=moveup&rub_id='.$rub_id.'&mod_id='.$mod_id.'&position='.$mod_position.'"><img src="images/icones/bullet_arrow_top.png" alt="Monter" title="Monter"></a> ]'."\n";
} else {
$trans_move = '[ <a href="gs_modules.php?action=moveup&rub_id='.$rub_id.'&mod_id='.$mod_id.'&position='.$mod_position.'"><img src="images/icones/bullet_arrow_top.png" alt="Monter" title="Monter"></a> <a href="gs_modules.php?action=moved&rub_id='.$rub_id.'&mod_id='.$mod_id.'&position='.$mod_position.'"><img src="images/icones/bullet_arrow_bottom.png" alt="Descendre" title="Descendre"></a> ]'."\n";
}

echo '<p align="right">'.$trans_move.' [ <a href="gs_modules.php?action='.$lk_action.'&rub_id='.$rub_id.'&mod_id='.$mod_id.'">Editer</a> ] [ <a href="gs_modules.php?action=del&rub_id='.$rub_id.'&mod_id='.$mod_id.'&confirm=av">Supprimer</a> ] '.$trans_active.'</p>'."\n";

echo '</div>'."\n";
}

} else {
echo '<p>Cette rubrique est actuellement complètement vide...</p>'."\n";
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
}




function Add_f($rub_id) {
include ("conf.ig.php");

if (isset($_GET["aff"])) $aff = $_GET["aff"];
else $aff="";

echo '<div id="form">'."\n";
echo '<form action="gs_modules.php?action=rec_f&rub_id='.$rub_id.'&aff='.$aff.'" method="post">'."\n";

echo '<h5>Titre de l\'élément <span class="comment">(80 caractères au maximum)</span></h5>'."\n";
echo '<p><input type="text" class="text" name="mod_titre" maxlength="80" size="40"></p>'."\n";

echo '<h5>Type</label></h5>'."\n";
if ($aff == 'right') {
echo '<p><input type="radio" name="mod_type" value="text" id="1" checked="checked"/> <label class="radioCheck" for="1">Texte</label></p>'."\n";
echo '<p><input type="radio" name="mod_type" value="image" id="2"/> <label class="radioCheck" for="2">Image</label></p>'."\n";
echo '<p><input type="radio" name="mod_type" value="pdf" id="3"/> <label class="radioCheck" for="3">Fichiers PDF</label></p>'."\n";
} else {
echo '<p><input type="radio" name="mod_type" value="text" id="1" checked="checked"/> <label class="radioCheck" for="1">Texte</label></p>'."\n";
echo '<p><input type="radio" name="mod_type" value="news" id="7"/> <label class="radioCheck" for="7">Actualités</label></p>'."\n";
echo '<p><input type="radio" name="mod_type" value="image" id="2"/> <label class="radioCheck" for="2">Image</label></p>'."\n";
echo '<p><input type="radio" name="mod_type" value="pdf" id="3"/> <label class="radioCheck" for="3">Fichiers PDF</label></p>'."\n";
//echo '<p><input type="radio" name="mod_type" value="galerie" id="3"/> <label class="radioCheck" for="3">Galerie d\'images</label></p>'."\n";
echo '<p><input type="radio" name="mod_type" value="contact" id="4"/> <label class="radioCheck" for="4">Formulaire de contact</label></p>'."\n";
echo '<p><input type="radio" name="mod_type" value="fiches" id="8"/> <label class="radioCheck" for="8">Fiches</label></p>'."\n";
}

echo '<h5>Activation</label></h5>'."\n";
echo '<p><input type="radio" name="mod_activation" value="active" id="5" checked="checked"/> <label class="radioCheck" for="5">Activer</label></p>'."\n";
echo '<p><input type="radio" name="mod_activation" value="nonactive" id="6"/> <label class="radioCheck" for="6">Désactiver</label></p>'."\n";

echo '<p><input type="image" class="envoy" src="images/boutons/b_suite.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";

}




function Add_txt($rub_id,$mod_id) {
include ("conf.ig.php");

if (isset($_GET["aff"])) $aff = $_GET["aff"];
else $aff="";

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_img_position = $rowt['mod_img_position'];

$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<div id="form">'."\n";



if ($aff != 'right') {
echo '<form action="gs_modules.php?action=add_txt_rec&rub_id='.$rub_id.'&mod_id='.$mod_id.'" method="post" enctype="multipart/form-data">'."\n";
echo '<input type="hidden" name="MAX_FILE_SIZE" value="8000000">'."\n";

echo '<h5>Titre</h5>'."\n";
echo '<p><input type="text" class="text" name="mod_titre" maxlength="80" size="40" value="'.$mod_titre.'"></p>'."\n";

echo '<h5>Texte</h5>'."\n";
if($mod_texte){
echo '<p><textarea cols="60" id="mod_texte" name="mod_texte" rows="10" >'.$mod_texte.'</textarea></p>'."\n";
} else {
echo '<p><textarea cols="60" id="mod_texte" name="mod_texte" rows="10" ></textarea></p>'."\n";
}

echo '<h5>Image</h5>'."\n";
if($mod_img){
echo '<p><img src="../files/files/'.$mod_img.'"></p>'."\n";
echo '<p>[ <a href="gs_modules.php?action=del_mod_img&rub_id='.$rub_id.'&mod_id='.$mod_id.'">Supprimer l\'image</a> ]</p>'."\n";
} else {
echo '<p><input class="text" type="file" name="img" /></p>'."\n";
}

echo '<h5>Positionnement de l\'image</h5>'."\n";
if($mod_img_position){
echo '<p>'."\n";
if($mod_img_position == 1){
echo '<input type="radio" name="mod_img_position" value="1" id="1" checked="checked" /> <label for="1">Gauche</label><br />'."\n";
} else {
echo '<input type="radio" name="mod_img_position" value="1" id="1" /> <label for="1">Gauche</label><br />'."\n";
}
if($mod_img_position == 2){
echo '<input type="radio" name="mod_img_position" value="2" id="2" checked="checked" /> <label for="2">Droite</label><br />'."\n";
} else {
echo '<input type="radio" name="mod_img_position" value="2" id="2" /> <label for="2">Droite</label><br />'."\n";
}
if($mod_img_position == 3){
echo '<input type="radio" name="mod_img_position" value="3" id="3" checked="checked" /> <label for="3">Bas</label><br />'."\n";
} else {
echo '<input type="radio" name="mod_img_position" value="3" id="3" /> <label for="3">Bas</label><br />'."\n";
}
echo '</p>'."\n";
} else {
echo '<p>'."\n";
echo '<input type="radio" name="mod_img_position" value="1" id="1" checked="checked" /> <label for="1">Gauche</label><br />'."\n";
echo '<input type="radio" name="mod_img_position" value="2" id="2" /> <label for="2">Droite</label><br />'."\n";
echo '<input type="radio" name="mod_img_position" value="3" id="3" /> <label for="3">Bas</label><br />'."\n";
echo '</p>'."\n";
}

echo '<h5>Options</h5>'."\n";
if($mod_option1){
echo '<p><input type="checkbox" name="mod_option1" value="1" checked> Afficher le titre</p>'."\n";
} else {
echo '<p><input type="checkbox" name="mod_option1" value="1"> Afficher le titre</p>'."\n";
}
if($mod_option2){
echo '<p><input type="checkbox" name="mod_option2" value="1" checked> Encadrer l\'élément</p>'."\n";
} else {
echo '<p><input type="checkbox" name="mod_option2" value="1"> Encadrer l\'élément</p>'."\n";
}

} else {
echo '<form action="gs_modules.php?action=add_txt_rec&rub_id='.$rub_id.'&mod_id='.$mod_id.'" method="post">'."\n";

echo '<h5>Titre</h5>'."\n";
echo '<p><input type="text" class="text" name="mod_titre" maxlength="80" size="40" value="'.$mod_titre.'"></p>'."\n";

echo '<h5>Texte</h5>'."\n";
if($mod_texte){
echo '<p><textarea cols="60" id="mod_texte" name="mod_texte" rows="10" >'.$mod_texte.'</textarea></p>'."\n";
} else {
echo '<p><textarea cols="60" id="mod_texte" name="mod_texte" rows="10" ></textarea></p>'."\n";
}

echo '<h5>Options</h5>'."\n";
if($mod_option1){
echo '<p><input type="checkbox" name="mod_option1" value="1" checked> Afficher le titre</p>'."\n";
} else {
echo '<p><input type="checkbox" name="mod_option1" value="1"> Afficher le titre</p>'."\n";
}
}

echo '<p><input type="image" class="envoy" src="images/boutons/b_suite.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";

}




function Add_fiches($rub_id,$mod_id) {
include ("conf.ig.php");

if (isset($_GET["aff"])) $aff = $_GET["aff"];
else $aff="";

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_img_position = $rowt['mod_img_position'];

$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<div id="form">'."\n";

echo '<form action="gs_modules.php?action=add_fiches_rec&rub_id='.$rub_id.'&mod_id='.$mod_id.'" method="post" enctype="multipart/form-data">'."\n";
echo '<input type="hidden" name="MAX_FILE_SIZE" value="8000000">'."\n";

echo '<h5>Titre</h5>'."\n";
echo '<p><input type="text" class="text" name="mod_titre" maxlength="80" size="40" value="'.$mod_titre.'"></p>'."\n";

echo '<h5>Texte</h5>'."\n";
if($mod_texte){
echo '<p><textarea cols="60" id="mod_texte" name="mod_texte" rows="10" >'.$mod_texte.'</textarea></p>'."\n";
} else {
echo '<p><textarea cols="60" id="mod_texte" name="mod_texte" rows="10" ></textarea></p>'."\n";
}

echo '<h5>Image</h5>'."\n";
if($mod_img){
echo '<p><img src="../files/images/'.$mod_img.'"></p>'."\n";
echo '<p>[ <a href="gs_modules.php?action=del_file_fiches&rub_id='.$rub_id.'&mod_id='.$mod_id.'">Supprimer l\'image</a> ]</p>'."\n";
} else {
echo '<p><input class="text" type="file" name="img" /></p>'."\n";
}

echo '<h5>Options</h5>'."\n";
if($mod_option1){
echo '<p><input type="checkbox" name="mod_option1" value="1" checked> Afficher le titre</p>'."\n";
} else {
echo '<p><input type="checkbox" name="mod_option1" value="1"> Afficher le titre</p>'."\n";
}

echo '<p><input type="image" class="envoy" src="images/boutons/b_suite.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";

}




function Add_image($rub_id,$mod_id) {
include ("conf.ig.php");

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<div id="form">'."\n";
echo '<form action="gs_modules.php?action=add_image_rec&rub_id='.$rub_id.'&mod_id='.$mod_id.'" method="post" enctype="multipart/form-data">'."\n";
echo '<input type="hidden" name="MAX_FILE_SIZE" value="8000000">'."\n";

echo '<h5>Titre</h5>'."\n";
echo '<p><input type="text" class="text" name="mod_titre" maxlength="80" size="40" value="'.$mod_titre.'"></p>'."\n";

echo '<h5>Image</h5>'."\n";
if($mod_img){
echo '<p><img src="../files/images/'.$mod_img.'"></p>'."\n";
echo '<p>[ <a href="gs_modules.php?action=del_file_image&rub_id='.$rub_id.'&mod_id='.$mod_id.'">Supprimer l\'image</a> ]</p>'."\n";
} else {
echo '<p><input class="text" type="file" name="img" /></p>'."\n";
}

echo '<h5>Options</h5>'."\n";
if($mod_option1){
echo '<p><input type="checkbox" name="mod_option1" value="1" checked> Afficher le titre</p>'."\n";
} else {
echo '<p><input type="checkbox" name="mod_option1" value="1"> Afficher le titre</p>'."\n";
}
/*if($mod_option2){
echo '<p><input type="checkbox" name="mod_option2" value="1" checked> Encadrer l\'élément</p>'."\n";
} else {
echo '<p><input type="checkbox" name="mod_option2" value="1"> Encadrer l\'élément</p>'."\n";
}*/

echo '<p><input type="image" class="envoy" src="images/boutons/b_suite.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";
}




function Add_pdf($rub_id,$mod_id) {
include ("conf.ig.php");

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<div id="form">'."\n";
echo '<form action="gs_modules.php?action=add_pdf_rec1&rub_id='.$rub_id.'&mod_id='.$mod_id.'" method="post" >'."\n";

echo '<h5>Titre</h5>'."\n";
echo '<p><input type="text" class="text" name="mod_titre" maxlength="80" size="40" value="'.$mod_titre.'"></p>'."\n";

echo '<h5>Options</h5>'."\n";
if($mod_option1){
echo '<p><input type="checkbox" name="mod_option1" value="1" checked> Afficher le titre</p>'."\n";
} else {
echo '<p><input type="checkbox" name="mod_option1" value="1"> Afficher le titre</p>'."\n";
}
/*if($mod_option2){
echo '<p><input type="checkbox" name="mod_option2" value="1" checked> Encadrer l\'élément</p>'."\n";
} else {
echo '<p><input type="checkbox" name="mod_option2" value="1"> Encadrer l\'élément</p>'."\n";
}*/
echo '<p><input type="image" class="envoy" src="images/boutons/b_send_modif.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";

echo '<div id="dotted"></div>'."\n";

echo '<h1>Fichiers PDF<a name="fiches"></a></h1>'."\n";

echo '<div id="form">'."\n";
echo '<form action="gs_modules.php?action=add_pdf_rec2&rub_id='.$rub_id.'&mod_id='.$mod_id.'" method="post" enctype="multipart/form-data">'."\n";
echo '<input type="hidden" name="MAX_FILE_SIZE" value="8000000">'."\n";

echo '<h5>Nom du fichier <span class="err">*</span></h5>'."\n";
echo '<p><input type="text" class="text" name="pdf_titre" maxlength="80" size="40" value=""></p>'."\n";

echo '<h5>Fichier PDF</h5>'."\n";
echo '<p><input class="text" type="file" name="fichier" /></br></br></p>'."\n";
echo '<p><span class="err">*</span> Informations obligatoires</p>'."\n";

echo '<p><input type="image" class="envoy" src="images/boutons/b_suite.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";
///////////////////////////////////////////////////////////////
$sql = "SELECT * FROM " .$table_pdf. " WHERE pdf_mod_id = '$mod_id' ORDER BY pdf_position "; 
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);
if($res){
echo '<div id="dotted"></div>'."\n";
echo '<h1>Liste des fichiers</h1>'."\n";
echo '<table>'."\n";
echo '<tr>'."\n";
echo '<th class="cat_position">Position</th>'."\n";
echo '<th class="cat_titre">Titre</th>'."\n";
echo '<th class="cat_options">Suppr.</th>'."\n";
echo '</tr>'."\n";
while($row = mysql_fetch_array($req)) {
$pdf_id = $row['pdf_id'];
$pdf_titre = $row['pdf_titre'];
$pdf_name = $row['pdf_name'];
$pdf_position = $row['pdf_position'];
$position = $pdf_position;

echo '<tr>'."\n";

if ($res == 1) {
echo '<td></td>'."\n";
} elseif ($position == 1) {
echo '<td><a href="gs_modules.php?action=move_pdf_d&rub_id='.$rub_id.'&mod_id='.$mod_id.'&pdf_id='.$pdf_id.'&position='.$position.'"><img src="images/icones/bullet_arrow_down.png" alt="Mettre dessous" title="Mettre dessous"></a></td>'."\n";
} elseif ($position == $res) {
echo '<td><a href="gs_modules.php?action=move_pdf_up&rub_id='.$rub_id.'&mod_id='.$mod_id.'&pdf_id='.$pdf_id.'&position='.$position.'"><img src="images/icones/bullet_arrow_up.png" alt="Mettre dessus" title="Mettre dessus"></a></td>'."\n";
} else {
echo '<td><a href="gs_modules.php?action=move_pdf_up&rub_id='.$rub_id.'&mod_id='.$mod_id.'&pdf_id='.$pdf_id.'&position='.$position.'"><img src="images/icones/bullet_arrow_up.png" alt="Mettre dessus" title="Mettre dessus"></a> <a href="gs_modules.php?action=move_pdf_d&rub_id='.$rub_id.'&mod_id='.$mod_id.'&pdf_id='.$pdf_id.'&position='.$position.'"><img src="images/icones/bullet_arrow_down.png" alt="Mettre dessous" title="Mettre dessous"></a></td>'."\n";
}

if ($pdf_titre) {
echo '<td><a href="../files/pdf/'.$pdf_name.'" width="115" height="100" title="'.$pdf_titre.'" alt="'.$pdf_titre.'" target="_blank">'.$pdf_titre.'</td>'."\n";
} else {
echo '<td><a href="../files/pdf/'.$pdf_name.'" width="115" height="100" title="'.$pdf_name.'" alt="'.$pdf_name.'" target="_blank">'.$pdf_name.'</td>'."\n";
}

echo '<td align="center"><a href="gs_modules.php?action=del_pdf&rub_id='.$rub_id.'&mod_id='.$mod_id.'&pdf_id='.$pdf_id.'"><img src="images/icones/cross.png" title="Supprimer l\'image" alt="Supprimer l\'image"></a></td>'."\n";
echo '</tr>'."\n";
}
echo '</table>'."\n";
}
}




function Add_news($rub_id,$mod_id) {
include ("conf.ig.php");

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];

$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<div id="form">'."\n";
echo '<form action="gs_modules.php?action=add_news_rec1&rub_id='.$rub_id.'&mod_id='.$mod_id.'" method="post" enctype="multipart/form-data">'."\n";
echo '<input type="hidden" name="MAX_FILE_SIZE" value="8000000">'."\n";

echo '<h5>Titre</h5>'."\n";
echo '<p><input type="text" class="text" name="mod_titre" maxlength="100" size="40" value="'.$mod_titre.'"></p>'."\n";

echo '<h5>Options</h5>'."\n";
if($mod_option1){
echo '<p><input type="checkbox" name="mod_option1" value="1" checked> Afficher le titre</p>'."\n";
} else {
echo '<p><input type="checkbox" name="mod_option1" value="1"> Afficher le titre</p>'."\n";
}
/*if($mod_option2){
echo '<p><input type="checkbox" name="mod_option2" value="1" checked> Encadrer l\'élément</p>'."\n";
} else {
echo '<p><input type="checkbox" name="mod_option2" value="1"> Encadrer l\'élément</p>'."\n";
}*/

echo '<p><input type="image" class="envoy" src="images/boutons/b_suite.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";
}




function Add_news2($rub_id,$mod_id) {
include ("conf.ig.php");

echo '<div id="form">'."\n";
echo '<form action="gs_modules.php?action=add_news_rec2&rub_id='.$rub_id.'&mod_id='.$mod_id.'" method="post" enctype="multipart/form-data">'."\n";
echo '<input type="hidden" name="MAX_FILE_SIZE" value="8000000">'."\n";

echo '<h5>Titre de l\'actualité <span class="comment">(100 caractères au maximum)</span></h5>'."\n";
echo '<p><input type="text" class="text" name="news_titre" maxlength="100" size="40"></p>'."\n";

echo '<h5>Image d\'illustration</h5>'."\n";
echo '<p><input class="text" type="file" name="img" /></p>'."\n";

echo '<h5>Texte</h5>'."\n";
echo '<p><textarea cols="60" id="news_texte" name="news_texte" rows="10" ></textarea></p>'."\n";

echo '<h5>Activation</label></h5>'."\n";
echo '<p><input type="radio" name="news_activation" value="active" id="6" checked="checked"/> <label class="radioCheck" for="6">Activer</label></p>'."\n";
echo '<p><input type="radio" name="news_activation" value="nonactive" id="5"/> <label class="radioCheck" for="5">Désactiver</label></p>'."\n";

echo '<h5>Options</h5>'."\n";
echo '<p><input type="checkbox" name="news_option1" value="1" checked> Afficher la date</p>'."\n";
echo '<p><input type="checkbox" name="news_option2" value="1" checked> Afficher l\'auteur</p>'."\n";

echo '<p><input type="image" class="envoy" src="images/boutons/b_suite.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";

}






function Edit_news($rub_id,$mod_id,$news_id) {
include ("conf.ig.php");

$sql = "SELECT * FROM " .$table_news. " WHERE news_id = '$news_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);
$row = mysql_fetch_array($req);

$news_id = $row['news_id'];
$news_titre = $row['news_titre'];
$news_texte = $row['news_texte'];
$news_img = $row['news_img'];

$news_date = $row['news_date'];
$news_heure = $row['news_heure'];

$date = explode('-', $news_date);
$heure = explode('h', $news_heure);

$news_option1 = $row['news_option1'];
$news_option2 = $row['news_option2'];

echo '<div id="form">'."\n";
echo '<form action="gs_modules.php?action=edit_rec_news&rub_id='.$rub_id.'&mod_id='.$mod_id.'&news_id='.$news_id.'" method="post" enctype="multipart/form-data">'."\n";
echo '<input type="hidden" name="MAX_FILE_SIZE" value="8000000">'."\n";

echo '<h5>Titre <span class="comment">(80 caractères au maximum)</span></h5>'."\n";
echo '<p><input type="text" class="text" name="news_titre" maxlength="100" size="40" value="'.$news_titre.'"></p>'."\n";

echo '<h5>Date</span></h5>'."\n";
echo '<p>Le 
<input type="text" class="text" name="news_date2" maxlength="100" size="2" value="'.$date[2].'"> 
<input type="text" class="text" name="news_date1" maxlength="100" size="2" value="'.$date[1].'"> 
<input type="text" class="text" name="news_date0" maxlength="100" size="4" value="'.$date[0].'"> à 
<input type="text" class="text" name="news_heure1" maxlength="100" size="2" value="'.$heure[0].'"> h 
<input type="text" class="text" name="news_heure2" maxlength="100" size="2" value="'.$heure[1].'"> 
</p>'."\n";

echo '<h5>Image</h5>'."\n";
if($news_img){
echo '<p><img src="../files/news/'.$news_img.'"></p>'."\n";
echo '<p>[ <a href="gs_modules.php?action=del_news_img&rub_id='.$rub_id.'&mod_id='.$mod_id.'&news_id='.$news_id.'">Supprimer l\'image</a> ]</p>'."\n";
} else {
echo '<p><input class="text" type="file" name="img" /></p>'."\n";
}

echo '<h5>Texte</h5>'."\n";
echo '<p><textarea cols="60" id="news_texte" name="news_texte" rows="10">'.$news_texte.'</textarea></p>'."\n";

echo '<h5>Options</h5>'."\n";
if($news_option1){
echo '<p><input type="checkbox" name="news_option1" value="1" checked> Afficher la date</p>'."\n";
} else {
echo '<p><input type="checkbox" name="news_option1" value="1"> Afficher la date</p>'."\n";
}
if($news_option2){
echo '<p><input type="checkbox" name="news_option2" value="1" checked> Afficher l\'auteur</p>'."\n";
} else {
echo '<p><input type="checkbox" name="news_option2" value="1"> Afficher l\'auteur</p>'."\n";
}

echo '<p><input type="image" class="envoy" src="images/boutons/b_send_modif.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";

}




function Add_form($rub_id,$mod_id) {
include ("conf.ig.php");

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_mail = $rowt['mod_mail'];

$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<div id="form">'."\n";
echo '<form action="gs_modules.php?action=add_form_rec&rub_id='.$rub_id.'&mod_id='.$mod_id.'" method="post">'."\n";

echo '<h5>Titre</h5>'."\n";
echo '<p><input type="text" class="text" name="mod_titre" maxlength="100" size="40" value="'.$mod_titre.'"></p>'."\n";

echo '<h5>Courriel du destinataire</h5>'."\n";
echo '<p><input type="text" class="text" name="mod_mail" maxlength="80" size="40" value="'.$mod_mail.'"></p>'."\n";

echo '<h5>Texte</h5>'."\n";
if($mod_texte){
echo '<p><textarea cols="60" id="mod_texte" name="mod_texte" rows="10" >'.$mod_texte.'</textarea></p>'."\n";
} else {
echo '<p><textarea cols="60" id="mod_texte" name="mod_texte" rows="10" ></textarea></p>'."\n";
}

echo '<h5>Options</h5>'."\n";
if($mod_option1){
echo '<p><input type="checkbox" name="mod_option1" value="1" checked> Afficher le titre</p>'."\n";
} else {
echo '<p><input type="checkbox" name="mod_option1" value="1"> Afficher le titre</p>'."\n";
}
/*if($mod_option2){
echo '<p><input type="checkbox" name="mod_option2" value="1" checked> Encadrer l\'élément</p>'."\n";
} else {
echo '<p><input type="checkbox" name="mod_option2" value="1"> Encadrer l\'élément</p>'."\n";
}*/

echo '<p><input type="image" class="envoy" src="images/boutons/b_suite.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


echo '<div id="pagecentre">'."\n";

if(!empty($_GET['action'])){
switch($_GET['action']){




case 'add_f':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > '.$rub_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

Add_f($rub_id);

break;






    case 'rec_f':

if (isset($_GET["aff"])) $aff = $_GET["aff"];
else $aff="";

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > '.$rub_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

extract($_POST,EXTR_OVERWRITE);

$mod_titre = AddSlashes($mod_titre);

if(empty($mod_titre)){
echo '<p align="center"><font color="red">Attention, merci de donner un nom à cet élément !<br /><br /></font></p>'."\n";
Add_f($rub_id);
} else {

if($aff != 'right') {
$sql = "SELECT mod_id, mod_position FROM " .$table_modules. " WHERE mod_rub_id = '$rub_id' AND mod_rub_aff != 'right' ";
} elseif($aff == 'right'){
$sql = "SELECT mod_id, mod_position FROM " .$table_modules. " WHERE mod_rub_id = '$rub_id' AND mod_rub_aff = 'right' ";
} else {
$sql = "SELECT mod_id, mod_position FROM " .$table_modules. " WHERE mod_rub_id = '$rub_id' ";
}
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

$position = ($res + 1);

$sql = "INSERT INTO " .$table_modules. "(mod_id, mod_rub_id, mod_titre, mod_type, mod_position, mod_activation, mod_rub_aff) VALUES 
('','$rub_id','$mod_titre','$mod_type','$position','$mod_activation','$aff')";
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

$mod_id = mysql_insert_id();

if($mod_type == 'text'){
Add_txt($rub_id,$mod_id);
} elseif($mod_type == 'pdf'){
Add_pdf($rub_id,$mod_id);
} elseif($mod_type == 'image'){
Add_image($rub_id,$mod_id);
} elseif($mod_type == 'news'){
Add_news($rub_id,$mod_id);
} elseif($mod_type == 'contact'){
Add_form($rub_id,$mod_id);
} elseif($mod_type == 'fiches'){
Add_fiches($rub_id,$mod_id);
}
}
    break;




case 'add_news':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

Add_news($rub_id,$mod_id);

    break;





    case 'add_news_rec1':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

extract($_POST,EXTR_OVERWRITE);

$mod_titre = AddSlashes($mod_titre);

$sql = "UPDATE " .$table_modules. " SET mod_titre = '$mod_titre', mod_option1 = '$mod_option1', mod_option2 = '$mod_option2' WHERE mod_id = '$mod_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<p align="center"><br /><br /><b>Elément édité avec succès !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="gs_modules.php?rub_id='.$rub_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";

    break;




case 'add_news2':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

Add_news2($rub_id,$mod_id);

    break;





    case 'add_news_rec2':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

extract($_POST,EXTR_OVERWRITE);

$news_titre = AddSlashes($news_titre);
$news_texte = AddSlashes($news_texte);

if(empty($news_titre)){
echo '<p align="center"><font color="red">Attention, merci de donner un nom à cette actualité !<br /><br /></font></p>'."\n";
Add_news2($rub_id,$mod_id);
} else {


////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_FILES['img']['name']) {
$dest_dossier = "../files/news/";
$img = $_FILES['img']['name'];

$extensions_ok = array('gif', 'jpg', 'jpeg', 'GIF', 'JPG', 'JPEG', 'png', 'PNG', 'Png');
$taille_max = 8000000;
$dest_fichier = basename($_FILES['img']['name']);
$dest_fichier = strtr($dest_fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
$dest_fichier = preg_replace('/([^.a-z0-9]+)/i', '_', $dest_fichier);

$img = $dest_fichier;
$extension = explode(".", $img);
$nom_img = time();
$img = $nom_img.'.'.$extension[1];
$dest_fichier = $img;


if(!in_array( substr(strrchr($_FILES['img']['name'], '.'), 1), $extensions_ok ) ){
echo '<p align="center">Veuillez sélectionner un fichier de type gif ou jpg !</p>';
echo '<p align="center"><a href="gs_news.php?action=add_news&cat_id='.$cat_id.'&rub='.$rub.'&page='.$page.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
exit();
} elseif( file_exists($_FILES['img']['tmp_name']) and filesize($_FILES['img']['tmp_name']) > $taille_max){
echo '<p align="center">Votre fichier doit faire moins de 4Mo !</p>';
echo '<p align="center"><a href="gs_news.php?action=add_news&cat_id='.$cat_id.'&rub='.$rub.'&page='.$page.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
exit();
} else {
move_uploaded_file($_FILES['img']['tmp_name'], $dest_dossier . $dest_fichier);


$taille_max = 440;
list($largeur, $hauteur, $type, $attr) = getimagesize($dest_dossier.$img);

$larg_miniature = $taille_max;
$ratio = $taille_max / $largeur;
$haut_miniature = $hauteur * $ratio;

$extension = explode(".", $img);

if ($extension[1] == 'gif' OR $extension[1] == 'GIF') {
$source = imagecreatefromgif($dest_dossier.$img);
$destination = imagecreatetruecolor($larg_miniature, $haut_miniature);

$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
imagegif($destination, $dest_dossier.$img);
}

if ($extension[1] == "jpg" OR $extension[1] == "jpeg" OR $extension[1] == "JPG" OR $extension[1] == "JPEG") {
$source = imagecreatefromjpeg($dest_dossier.$img);
$destination = imagecreatetruecolor($larg_miniature, $haut_miniature);

$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
imagejpeg($destination, $dest_dossier.$img);
}

if ($extension[1] == "png" OR $extension[1] == "PNG" OR $extension[1] == "Png") {
$source = imagecreatefrompng($dest_dossier.$img);
$destination = imagecreatetruecolor($larg_miniature, $haut_miniature);

$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
imagepng($destination, $dest_dossier.$img);
}

}
}
////////////////////////////////////////////////////////////////////////////////////////////////////////

$date = date("Y-m-d");
$heure = date("H\hi");

$user_log = $_SESSION['pseudo'];
$sql = "SELECT user_id FROM " .$table_users. " WHERE user_name = '$user_log' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);
if($res){
$row = mysql_fetch_array($req);
$user_log_id = $row['user_id'];
}

$sql = "INSERT INTO " .$table_news. "(news_id, news_rub_id, news_mod_id, news_author, news_titre, news_texte, news_img, news_date, news_heure, 
news_activation, news_option1, news_option2) VALUES 
('','$rub_id','$mod_id','$user_log_id','$news_titre','$news_texte','$img','$date','$heure',
'$news_activation','$news_option1','$news_option2')";
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<p align="center"><br/><br/><b>Actualité ajoutée avec succès !</b><br/><br/></p>';
echo '<p align="center"><a href="gs_modules.php?rub_id='.$rub_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";

}

    break;




case 'edit_news':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

Edit_news($rub_id,$mod_id,$news_id);

break;





    case 'act_on_news':

$sql = "UPDATE " .$table_news. " SET news_activation = 'active' WHERE news_id = '$news_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

aff_files($rub_id);
    break;





    case 'act_off_news':

$sql = "UPDATE " .$table_news. " SET news_activation = 'nonactive' WHERE news_id = '$news_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

aff_files($rub_id);
		break;





    case 'del_news':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

if (isset($_GET["confirm"])) $confirm = $_GET["confirm"];
else $confirm="";

$sql = "SELECT * FROM " .$table_news. " WHERE news_id = '$news_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_fetch_array($req);

$news_img = $res['news_img'];

switch($confirm)
    {
    case 'av':
echo '<p align="center"><br/><br/>Voulez-vous supprimer l\'actualité <b>'.$res['news_titre'].'</b> ?<br/><br/></p>';
echo '<p align="center"><a href="gs_modules.php?action=del_news&rub_id='.$rub_id.'&mod_id='.$mod_id.'&news_id='.$news_id.'&confirm=oui"><img src="images/boutons/b_oui.jpg"></a> <a href="javascript:window.history.go(-1)"><img src="images/boutons/b_non.jpg"></a></p>';
break;

    case 'oui':

if($news_img){
$chemin = '../files/news';
unlink($chemin."/".$news_img);
}

mysql_query("DELETE FROM " .$table_news. " WHERE news_id='$news_id'") or die("</br>Erreur de suppression");
 
echo '<p align="center"><br /><br /><b>Actualité supprimée avec succès !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="gs_modules.php?rub_id='.$rub_id.'&mod_id='.$mod_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";

break;

default: 
echo '<p>Erreur de traitement</p>'; 
break;
    }
    break;






    case 'edit_rec_news':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

extract($_POST,EXTR_OVERWRITE);

$news_titre = AddSlashes($news_titre);
$news_texte = AddSlashes($news_texte);

if(empty($news_titre)){
echo '<p align="center"><br /><br /><font color="red">Attention, merci de donner un nom à cette actualité !<br /><br /></font></p>'."\n";
echo '<p align="center"><a href="gs_news.php?rub_id='.$rub_id.'&mod_id='.$mod_id.'#'.$news_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
} else {


////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_FILES['img']['name']) {
$dest_dossier = "../files/news/";
$img = $_FILES['img']['name'];

$extensions_ok = array('gif', 'jpg', 'jpeg', 'GIF', 'JPG', 'JPEG', 'png', 'PNG', 'Png');
$taille_max = 8000000;
$dest_fichier = basename($_FILES['img']['name']);
$dest_fichier = strtr($dest_fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
$dest_fichier = preg_replace('/([^.a-z0-9]+)/i', '_', $dest_fichier);

$img = $dest_fichier;
$extension = explode(".", $img);
$nom_img = time();
$img = $nom_img.'.'.$extension[1];
$dest_fichier = $img;

if(!in_array( substr(strrchr($_FILES['img']['name'], '.'), 1), $extensions_ok ) ){
echo '<p align="center">Veuillez sélectionner un fichier de type gif ou jpg !</p>';
exit();
} elseif( file_exists($_FILES['img']['tmp_name']) and filesize($_FILES['img']['tmp_name']) > $taille_max){
echo '<p align="center">Votre fichier doit faire moins de 4Mo !</p>';
exit();
} else {
move_uploaded_file($_FILES['img']['tmp_name'], $dest_dossier . $dest_fichier);


$taille_max = 440;
list($largeur, $hauteur, $type, $attr) = getimagesize($dest_dossier.$img);

$larg_miniature = $taille_max;
$ratio = $taille_max / $largeur;
$haut_miniature = $hauteur * $ratio;

$extension = explode(".", $img);

if ($extension[1] == 'gif' OR $extension[1] == 'GIF') {
$source = imagecreatefromgif($dest_dossier.$img);
$destination = imagecreatetruecolor($larg_miniature, $haut_miniature);

$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
imagegif($destination, $dest_dossier.$img);
}

if ($extension[1] == "jpg" OR $extension[1] == "jpeg" OR $extension[1] == "JPG" OR $extension[1] == "JPEG") {
$source = imagecreatefromjpeg($dest_dossier.$img);
$destination = imagecreatetruecolor($larg_miniature, $haut_miniature);

$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
imagejpeg($destination, $dest_dossier.$img);
}

if ($extension[1] == "png" OR $extension[1] == "PNG" OR $extension[1] == "Png") {
$source = imagecreatefrompng($dest_dossier.$img);
$destination = imagecreatetruecolor($larg_miniature, $haut_miniature);

$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
imagepng($destination, $dest_dossier.$img);
}

}
$sql = "UPDATE " .$table_news. " SET news_img = '$img' WHERE news_id = '$news_id'" or die ("erreur");
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
}
////////////////////////////////////////////////////////////////////////////////////////////////////////

$news_date = $news_date0.'-'.$news_date1.'-'.$news_date2;
$news_heure = $news_heure1.'h'.$news_heure2;

$sql = "UPDATE " .$table_news. " SET news_titre = '$news_titre', news_texte = '$news_texte', 
news_option1 = '$news_option1', news_option2 = '$news_option2', news_date = '$news_date', news_heure = '$news_heure' WHERE news_id = '$news_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
 
echo '<p align="center"><br /><br /><b>Actualité éditée avec succès !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="gs_modules.php?rub_id='.$rub_id.'&mod_id='.$mod_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
}
    break;




case 'del_news_img':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

$sql = "SELECT * FROM " .$table_news. " WHERE news_id = '$news_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_fetch_array($req);

$news_img = $res['news_img'];

$chemin = '../files/news';
unlink($chemin."/".$news_img);

$sql = "UPDATE " .$table_news. " SET news_img = '' WHERE news_id = '$news_id'" or die ("erreur");
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

Edit_news($rub_id,$mod_id,$news_id);

break;





    case 'add_form':

extract($_POST,EXTR_OVERWRITE);

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

Add_form($rub_id,$mod_id);

    break;





    case 'add_form_rec':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_img_position = $rowt['mod_img_position'];
$mod_mail = $rowt['mod_mail'];
//$mod_option1 = $rowt['mod_option1'];
//$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

extract($_POST,EXTR_OVERWRITE);

if (isset($_GET["mod_id"])) $mod_id = $_GET["mod_id"];
else $mod_id="";

$mod_titre = AddSlashes($mod_titre);
$mod_texte = AddSlashes($mod_texte);

if(empty($mod_mail)) 
{
echo '<p align="center"><font color="red">Attention, il y a un champ vide !<br /><br /></font></p>'."\n";
Add_form($rub_id,$mod_id);
} elseif(!ereg("\.",$mod_mail) || !ereg("@",$mod_mail)) {
echo '<p align="center"><font color="red">Attention, merci de donner un courriel correct !<br /><br /></font></p>'."\n";
Add_form($rub_id,$mod_id);
} else {

$sql = "UPDATE " .$table_modules. " SET mod_titre = '$mod_titre', mod_texte = '$mod_texte', mod_mail = '$mod_mail', mod_option1 = '$mod_option1', mod_option2 = '$mod_option2' WHERE mod_id = '$mod_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<p align="center"><br /><br /><b>Formulaire édité avec succès !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="gs_modules.php?rub_id='.$rub_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
}

    break;




case 'add_txt':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

Add_txt($rub_id,$mod_id);


    break;





    case 'add_txt_rec':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_img_position = $rowt['mod_img_position'];
//$mod_option1 = $rowt['mod_option1'];
//$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

extract($_POST,EXTR_OVERWRITE);

if (isset($_GET["mod_id"])) $mod_id = $_GET["mod_id"];
else $mod_id="";

$mod_titre = AddSlashes($mod_titre);
$mod_texte = AddSlashes($mod_texte);

////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_FILES['img']['name']) {
$dest_dossier = "../files/files/";
$img = $_FILES['img']['name'];

$extensions_ok = array('gif', 'jpg', 'jpeg', 'GIF', 'JPG', 'JPEG', 'png', 'PNG', 'Png');
$taille_max = 8000000;
$dest_fichier = basename($_FILES['img']['name']);
$dest_fichier = strtr($dest_fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
$dest_fichier = preg_replace('/([^.a-z0-9]+)/i', '_', $dest_fichier);

$img = $dest_fichier;
$extension = explode(".", $img);
$nom_img = time();
$img = $nom_img.'.'.$extension[1];
$dest_fichier = $img;

if(!in_array( substr(strrchr($_FILES['img']['name'], '.'), 1), $extensions_ok ) ){
echo '<p align="center">Veuillez sélectionner un fichier de type gif ou jpg !</p>';
exit();
} elseif( file_exists($_FILES['img']['tmp_name']) and filesize($_FILES['img']['tmp_name']) > $taille_max){
echo '<p align="center">Votre fichier doit faire moins de 4Mo !</p>';
exit();
} else {
move_uploaded_file($_FILES['img']['tmp_name'], $dest_dossier . $dest_fichier);


$taille_max = 200;
list($largeur, $hauteur, $type, $attr) = getimagesize($dest_dossier.$img);

$larg_miniature = $taille_max;
$ratio = $taille_max / $largeur;
$haut_miniature = $hauteur * $ratio;

$extension = explode(".", $img);

if ($extension[1] == 'gif' OR $extension[1] == 'GIF') {
$source = imagecreatefromgif($dest_dossier.$img);
$destination = imagecreatetruecolor($larg_miniature, $haut_miniature);

$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
imagegif($destination, $dest_dossier.$img);
}

if ($extension[1] == "jpg" OR $extension[1] == "jpeg" OR $extension[1] == "JPG" OR $extension[1] == "JPEG") {
$source = imagecreatefromjpeg($dest_dossier.$img);
$destination = imagecreatetruecolor($larg_miniature, $haut_miniature);

$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
imagejpeg($destination, $dest_dossier.$img);
}

if ($extension[1] == "png" OR $extension[1] == "PNG" OR $extension[1] == "Png") {
$source = imagecreatefrompng($dest_dossier.$img);
$destination = imagecreatetruecolor($larg_miniature, $haut_miniature);

$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
imagepng($destination, $dest_dossier.$img);
}

}
$sql = "UPDATE " .$table_modules. " SET mod_img = '$img' WHERE mod_id = '$mod_id'" or die ("erreur");
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
}
////////////////////////////////////////////////////////////////////////////////////////////////////////

$sql = "UPDATE " .$table_modules. " SET mod_titre = '$mod_titre', mod_texte = '$mod_texte', mod_img_position = '$mod_img_position', mod_option1 = '$mod_option1', mod_option2 = '$mod_option2' WHERE mod_id = '$mod_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<p align="center"><br /><br /><b>Texte édité avec succès !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="gs_modules.php?rub_id='.$rub_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";

    break;




case 'add_fiches':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

Add_fiches($rub_id,$mod_id);


    break;





    case 'add_fiches_rec':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_img_position = $rowt['mod_img_position'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

extract($_POST,EXTR_OVERWRITE);

if (isset($_GET["mod_id"])) $mod_id = $_GET["mod_id"];
else $mod_id="";


////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_FILES['img']['name']) {
$dest_dossier = "../files/images/";
$img = $_FILES['img']['name'];

$extensions_ok = array('gif', 'jpg', 'jpeg', 'GIF', 'JPG', 'JPEG', 'png', 'PNG', 'Png');
$taille_max = 8000000;
$dest_fichier = basename($_FILES['img']['name']);
$dest_fichier = strtr($dest_fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
$dest_fichier = preg_replace('/([^.a-z0-9]+)/i', '_', $dest_fichier);

$img = $dest_fichier;
$extension = explode(".", $img);
$nom_img = time();
$img = $nom_img.'.'.$extension[1];
$dest_fichier = $img;


if(!in_array( substr(strrchr($_FILES['img']['name'], '.'), 1), $extensions_ok ) ){
echo '<p align="center">Veuillez sélectionner un fichier de type gif ou jpg !</p>';
echo '<p align="center"><a href="gs_fiches.php?action=add"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
exit();
} elseif( file_exists($_FILES['img']['tmp_name']) and filesize($_FILES['img']['tmp_name']) > $taille_max){
echo '<p align="center">Votre fichier doit faire moins de 4Mo !</p>';
echo '<p align="center"><a href="gs_fiches.php?action=add"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
exit();
} else {
move_uploaded_file($_FILES['img']['tmp_name'], $dest_dossier . $dest_fichier);


$taille_max = 310;
list($largeur, $hauteur, $type, $attr) = getimagesize($dest_dossier.$img);

$larg_miniature = $taille_max;
$ratio = $taille_max / $largeur;
$haut_miniature = $hauteur * $ratio;

$extension = explode(".", $img);

if ($extension[1] == 'gif' OR $extension[1] == 'GIF') {
$source = imagecreatefromgif($dest_dossier.$img);
$destination = imagecreatetruecolor($larg_miniature, $haut_miniature);

$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
imagegif($destination, $dest_dossier.$img);
}

if ($extension[1] == "jpg" OR $extension[1] == "jpeg" OR $extension[1] == "JPG" OR $extension[1] == "JPEG") {
$source = imagecreatefromjpeg($dest_dossier.$img);
$destination = imagecreatetruecolor($larg_miniature, $haut_miniature);

$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
imagejpeg($destination, $dest_dossier.$img);
}

if ($extension[1] == "png" OR $extension[1] == "PNG" OR $extension[1] == "Png") {
$source = imagecreatefrompng($dest_dossier.$img);
$destination = imagecreatetruecolor($larg_miniature, $haut_miniature);

$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
imagepng($destination, $dest_dossier.$img);
}

}
$sql = "UPDATE " .$table_modules. " SET mod_img = '$img' WHERE mod_id = '$mod_id'" or die ("erreur");
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
}
////////////////////////////////////////////////////////////////////////////////////////////////////////

$mod_titre = AddSlashes($mod_titre);
$mod_texte = AddSlashes($mod_texte);

$sql = "UPDATE " .$table_modules. " SET mod_titre = '$mod_titre', mod_texte = '$mod_texte', mod_img_position = '$mod_img_position', mod_option1 = '$mod_option1', mod_option2 = '$mod_option2' WHERE mod_id = '$mod_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<p align="center"><br /><br /><b>Texte édité avec succès !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="gs_modules.php?rub_id='.$rub_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";

    break;




case 'del_file_fiches':

if (isset($_GET["mod_id"])) $mod_id = $_GET["mod_id"];
else $mod_id="";

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

$sql = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_fetch_array($req);

$mod_img = $res['mod_img'];

$chemin = '../files/images';
unlink($chemin."/".$mod_img);

$sql = "UPDATE " .$table_modules. " SET mod_img = '' WHERE mod_id = '$mod_id'" or die ("erreur");
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

Add_fiches($rub_id,$mod_id);

break;




case 'del_mod_img':

if (isset($_GET["mod_id"])) $mod_id = $_GET["mod_id"];
else $mod_id="";

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

$sql = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_fetch_array($req);

$mod_img = $res['mod_img'];

$chemin = '../files/files';
unlink($chemin."/".$mod_img);

$sql = "UPDATE " .$table_modules. " SET mod_img = '', mod_img_position = '' WHERE mod_id = '$mod_id'" or die ("erreur");
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

Add_txt($rub_id,$mod_id);

break;




case 'add_image':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

Add_image($rub_id,$mod_id);


    break;




case 'del_file_image':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

$sql = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_fetch_array($req);

$mod_img = $res['mod_img'];

$chemin = '../files/images';
unlink($chemin."/".$mod_img);

$sql = "UPDATE " .$table_modules. " SET mod_img = '' WHERE mod_id = '$mod_id'" or die ("erreur");
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

Add_image($rub_id,$mod_id);

break;





    case 'add_image_rec':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
//$mod_option1 = $rowt['mod_option1'];
//$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

extract($_POST,EXTR_OVERWRITE);

$mod_titre = AddSlashes($mod_titre);
$mod_texte = AddSlashes($mod_texte);

////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_FILES['img']['name']) {
$dest_dossier = "../files/images/";
$img = $_FILES['img']['name'];

$extensions_ok = array('gif', 'jpg', 'jpeg', 'GIF', 'JPG', 'JPEG', 'png', 'PNG', 'Png');
$taille_max = 8000000;
$dest_fichier = basename($_FILES['img']['name']);
$dest_fichier = strtr($dest_fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
$dest_fichier = preg_replace('/([^.a-z0-9]+)/i', '_', $dest_fichier);

$img = $dest_fichier;
$extension = explode(".", $img);
$nom_img = time();
$img = $nom_img.'.'.$extension[1];
$dest_fichier = $img;

if(!in_array( substr(strrchr($_FILES['img']['name'], '.'), 1), $extensions_ok ) ){
echo '<p align="center">Veuillez sélectionner un fichier de type gif ou jpg !</p>';
exit();
} elseif( file_exists($_FILES['img']['tmp_name']) and filesize($_FILES['img']['tmp_name']) > $taille_max){
echo '<p align="center">Votre fichier doit faire moins de 4Mo !</p>';
exit();
} else {
move_uploaded_file($_FILES['img']['tmp_name'], $dest_dossier . $dest_fichier);


$taille_max = 680;
list($largeur, $hauteur, $type, $attr) = getimagesize($dest_dossier.$img);

if ($largeur >= $taille_max) {

$larg_miniature = $taille_max;
$ratio = $taille_max / $largeur;
$haut_miniature = $hauteur * $ratio;

$extension = explode(".", $img);

if ($extension[1] == 'gif' OR $extension[1] == 'GIF') {
$source = imagecreatefromgif($dest_dossier.$img);
$destination = imagecreatetruecolor($larg_miniature, $haut_miniature);

$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
imagegif($destination, $dest_dossier.$img);
}

if ($extension[1] == "jpg" OR $extension[1] == "jpeg" OR $extension[1] == "JPG" OR $extension[1] == "JPEG") {
$source = imagecreatefromjpeg($dest_dossier.$img);
$destination = imagecreatetruecolor($larg_miniature, $haut_miniature);

$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
imagejpeg($destination, $dest_dossier.$img);
}

if ($extension[1] == "png" OR $extension[1] == "PNG" OR $extension[1] == "Png") {
$source = imagecreatefrompng($dest_dossier.$img);
$destination = imagecreatetruecolor($larg_miniature, $haut_miniature);

$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
imagepng($destination, $dest_dossier.$img);
}
}

}
$sql = "UPDATE " .$table_modules. " SET mod_img = '$img' WHERE mod_id = '$mod_id'" or die ("erreur");
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
}
////////////////////////////////////////////////////////////////////////////////////////////////////////

$sql = "UPDATE " .$table_modules. " SET mod_titre = '$mod_titre', mod_texte = '$mod_texte', mod_option1 = '$mod_option1', mod_option2 = '$mod_option2' WHERE mod_id = '$mod_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<p align="center"><br /><br /><b>Image éditée avec succès !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="gs_modules.php?rub_id='.$rub_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";

    break;




case 'del_img':

if (isset($_GET["mod_id"])) $mod_id = $_GET["mod_id"];
else $mod_id="";
if (isset($_GET["rub_id"])) $rub_id = $_GET["rub_id"];
else $rub_id="";

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

$sqlb = "SELECT * FROM " .$table_galeries. " WHERE img_id = '$img_id' "; 
$reqb = mysql_query($sqlb) or die('Erreur SQL !'.$sqlb.'<br>'.mysql_error());
$rowb = mysql_fetch_array($reqb);
$img_name = $rowb['img_name'];
$position = $rowb['img_position'];


$sql = "SELECT * FROM " .$table_galeries. " WHERE img_mod_id = '$mod_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

if ($res==1) {
mysql_query("DELETE FROM " .$table_galeries. " WHERE img_id = '$img_id' ") or die("</br>Erreur de suppression");
} elseif ($res==$position) {
mysql_query("DELETE FROM " .$table_galeries. " WHERE img_id = '$img_id' ") or die("</br>Erreur de suppression");
} else {
$i = $position;
while($i != $res) {
$hop = $i - 1;
mysql_query("UPDATE " .$table_galeries. " SET img_position = '$hop' WHERE img_position = '$i' AND img_mod_id = '$mod_id' ") or die("</br>Erreur de suppression");
$i++;
}
$hop2 = $res - 1;
mysql_query("UPDATE " .$table_galeries. " SET img_position = '$hop2' WHERE img_position = '$res' AND img_mod_id = '$mod_id' ") or die("</br>Erreur de suppression");
mysql_query("DELETE FROM " .$table_galeries. " WHERE img_id = '$img_id' ") or die("</br>Erreur de suppression");
}

$chemin = '../files/galeries';
unlink($chemin."/".$img_name);
unlink($chemin."/mini_".$img_name);

Add_gal($rub_id,$mod_id);

break;




case 'add_pdf':

if (isset($_GET["mod_id"])) $mod_id = $_GET["mod_id"];
else $mod_id="";
if (isset($_GET["rub_id"])) $rub_id = $_GET["rub_id"];
else $rub_id="";

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

Add_pdf($rub_id,$mod_id);


    break;




case 'del_file_image_pdf':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

$sql = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_fetch_array($req);

$mod_img = $res['mod_img'];

$chemin = '../files/images';
unlink($chemin."/".$mod_img);

$sql = "UPDATE " .$table_modules. " SET mod_img = '' WHERE mod_id = '$mod_id'" or die ("erreur");
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

Add_pdf($rub_id,$mod_id);

break;





    case 'add_pdf_rec1':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

extract($_POST,EXTR_OVERWRITE);

$mod_titre = AddSlashes($mod_titre);
$mod_option1 = $_POST['mod_option1'];


$sql = "UPDATE " .$table_modules. " SET mod_titre = '$mod_titre', mod_option1 = '$mod_option1' WHERE mod_id = '$mod_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

Add_pdf($rub_id,$mod_id);

    break;





    case 'add_pdf_rec2':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

extract($_POST,EXTR_OVERWRITE);

$pdf_titre = AddSlashes($pdf_titre);

////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_FILES['fichier']['name']) {
$dest_dossier = "../files/pdf/";

$extensions_ok = array('pdf', 'PDF');
$taille_max = 8000000;
$dest_fichier = basename($_FILES['fichier']['name']);
$dest_fichier = strtr($dest_fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
$dest_fichier = preg_replace('/([^.a-z0-9]+)/i', '_', $dest_fichier);

$fichier = $dest_fichier;
$extension = explode(".", $fichier);
$nom_fichier = time();
$fichier = $nom_fichier.'.'.pdf;
$dest_fichier = $fichier;


if(!in_array( substr(strrchr($_FILES['fichier']['name'], '.'), 1), $extensions_ok ) ){
echo '<p align="center"><font color="red">Veuillez sélectionner un fichier de type PDF !<br /><br /></font></p>'."\n";
Add_pdf($rub_id,$mod_id);
include("inc/footer.inc.php");
exit;
} elseif( file_exists($_FILES['fichier']['tmp_name']) and filesize($_FILES['fichier']['tmp_name']) > $taille_max){
echo '<p align="center"><font color="red">Votre fichier doit faire moins de 8Mo !<br /><br /></font></p>'."\n";
Add_pdf($rub_id,$mod_id);
include("inc/footer.inc.php");
exit;
} else {
move_uploaded_file($_FILES['fichier']['tmp_name'], $dest_dossier . $dest_fichier);
}
}
////////////////////////////////////////////////////////////////////////////////////////////////////////

$sql_c = "SELECT * FROM " .$table_pdf. " WHERE pdf_mod_id = '$mod_id' ";
$req_c = mysql_query($sql_c,$db) or die ('Erreur : '.mysql_error() );
$res_c = mysql_num_rows($req_c);

$position = ($res_c + 1);

$sql = "INSERT INTO " .$table_pdf. "(pdf_id, pdf_rub_id, pdf_mod_id, pdf_titre, pdf_name, pdf_position) VALUES 
('','$rub_id','$mod_id','$pdf_titre','$fichier','$position')";
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

Add_pdf($rub_id,$mod_id);

    break;




case 'del_pdf':

if (isset($_GET["mod_id"])) $mod_id = $_GET["mod_id"];
else $mod_id="";
if (isset($_GET["rub_id"])) $rub_id = $_GET["rub_id"];
else $rub_id="";

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

$sqlb = "SELECT * FROM " .$table_pdf. " WHERE pdf_id = '$pdf_id' "; 
$reqb = mysql_query($sqlb) or die('Erreur SQL !'.$sqlb.'<br>'.mysql_error());
$rowb = mysql_fetch_array($reqb);
$pdf_name = $rowb['pdf_name'];
$position = $rowb['pdf_position'];


$sql = "SELECT * FROM " .$table_pdf. " WHERE pdf_mod_id = '$mod_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

if ($res==1) {
mysql_query("DELETE FROM " .$table_pdf. " WHERE pdf_id = '$pdf_id' ") or die("</br>Erreur de suppression");
} elseif ($res==$position) {
mysql_query("DELETE FROM " .$table_pdf. " WHERE pdf_id = '$pdf_id' ") or die("</br>Erreur de suppression");
} else {
$i = $position;
while($i != $res) {
$hop = $i - 1;
mysql_query("UPDATE " .$table_pdf. " SET pdf_position = '$hop' WHERE pdf_position = '$i' AND pdf_mod_id = '$mod_id' ") or die("</br>Erreur de suppression");
$i++;
}
$hop2 = $res - 1;
mysql_query("UPDATE " .$table_pdf. " SET pdf_position = '$hop2' WHERE pdf_position = '$res' AND pdf_mod_id = '$mod_id' ") or die("</br>Erreur de suppression");
mysql_query("DELETE FROM " .$table_pdf. " WHERE pdf_id = '$pdf_id' ") or die("</br>Erreur de suppression");
}

$chemin = '../files/pdf';
unlink($chemin."/".$pdf_name);

Add_pdf($rub_id,$mod_id);

break;





    case 'move_pdf_up':

if (isset($_GET["mod_id"])) $mod_id = $_GET["mod_id"];
else $mod_id="";
if (isset($_GET["rub_id"])) $rub_id = $_GET["rub_id"];
else $rub_id="";

if (isset($_GET["position"])) $position = $_GET["position"];
else $position="";

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

$sql = "SELECT pdf_position FROM " .$table_pdf. " WHERE pdf_mod_id = '$mod_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

$position_tmp = ($res + 1);
$position_up = ($position + 1);
$position_d = $position - 1;

$sql1 = "UPDATE " .$table_pdf. " SET pdf_position = '$position_tmp' WHERE pdf_position = '$position' AND pdf_mod_id = '$mod_id' " or die ("erreur"); 
mysql_query($sql1) or die('Erreur SQL !'.$sql1.'<br>'.mysql_error());
$sql2 = "UPDATE " .$table_pdf. " SET pdf_position = '$position' WHERE pdf_position = '$position_d' AND pdf_mod_id = '$mod_id' " or die ("erreur"); 
mysql_query($sql2) or die('Erreur SQL !'.$sql2.'<br>'.mysql_error());
$sql3 = "UPDATE " .$table_pdf. " SET pdf_position = '$position_d' WHERE pdf_position = '$position_tmp' AND pdf_mod_id = '$mod_id' " or die ("erreur"); 
mysql_query($sql3) or die('Erreur SQL !'.$sql3.'<br>'.mysql_error());

Add_pdf($rub_id,$mod_id);

    break;





    case 'move_pdf_d':

if (isset($_GET["mod_id"])) $mod_id = $_GET["mod_id"];
else $mod_id="";
if (isset($_GET["rub_id"])) $rub_id = $_GET["rub_id"];
else $rub_id="";

if (isset($_GET["position"])) $position = $_GET["position"];
else $position="";

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

$sql = "SELECT pdf_position FROM " .$table_pdf. " WHERE pdf_mod_id = '$mod_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

$position_tmp = ($res + 1); 
$position_up = ($position - 1);
$position_d = ($position + 1);

$sql = "UPDATE " .$table_pdf. " SET pdf_position = '$position_tmp' WHERE pdf_position = '$position' AND pdf_mod_id = '$mod_id' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());	
$sql = "UPDATE " .$table_pdf. " SET pdf_position = '$position' WHERE pdf_position = '$position_d' AND pdf_mod_id = '$mod_id' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());    
$sql = "UPDATE " .$table_pdf. " SET pdf_position = '$position_d' WHERE pdf_position = '$position_tmp' AND pdf_mod_id = '$mod_id' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

Add_pdf($rub_id,$mod_id);

    break;





    case 'move_l':

if (isset($_GET["mod_id"])) $mod_id = $_GET["mod_id"];
else $mod_id="";
if (isset($_GET["rub_id"])) $rub_id = $_GET["rub_id"];
else $rub_id="";

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

$sql = "SELECT img_position FROM " .$table_galeries. " WHERE img_mod_id = '$mod_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

$position_tmp = ($res + 1);
$position_up = ($position + 1);
$position_d = ($position - 1);

$sql = "UPDATE " .$table_galeries. " SET img_position = '$position_tmp' WHERE img_position = '$position' AND img_mod_id = '$mod_id' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());	
$sql = "UPDATE " .$table_galeries. " SET img_position = '$position' WHERE img_position = '$position_d' AND img_mod_id = '$mod_id' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());    
$sql = "UPDATE " .$table_galeries. " SET img_position = '$position_d' WHERE img_position = '$position_tmp' AND img_mod_id = '$mod_id' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

Add_gal($rub_id,$mod_id);

    break;





    case 'move_r': 

if (isset($_GET["mod_id"])) $mod_id = $_GET["mod_id"];
else $mod_id="";
if (isset($_GET["rub_id"])) $rub_id = $_GET["rub_id"];
else $rub_id="";

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_id = $rowt['mod_id'];
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

$sql = "SELECT img_position FROM " .$table_galeries. " WHERE img_mod_id = '$mod_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

$position_tmp = ($res + 1);
$position_up = ($position - 1);
$position_d = $position + 1;

$sql = "UPDATE " .$table_galeries. " SET img_position = '$position_tmp' WHERE img_position = '$position' AND img_mod_id = '$mod_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());	
$sql = "UPDATE " .$table_galeries. " SET img_position = '$position' WHERE img_position = '$position_d' AND img_mod_id = '$mod_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());    
$sql = "UPDATE " .$table_galeries. " SET img_position = '$position_d' WHERE img_position = '$position_tmp' AND img_mod_id = '$mod_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

Add_gal($rub_id,$mod_id);

    break;





    case 'del':

if (isset($_GET["mod_id"])) $mod_id = $_GET["mod_id"];
else $mod_id="";
if (isset($_GET["rub_id"])) $rub_id = $_GET["rub_id"];
else $rub_id="";

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_type = $rowt['mod_type'];
$mod_titre = $rowt['mod_titre'];
$mod_texte = $rowt['mod_texte'];
$mod_img = $rowt['mod_img'];
$mod_option1 = $rowt['mod_option1'];
$mod_position = $rowt['mod_position'];
$mod_rub_aff = $rowt['mod_rub_aff'];

if (isset($_GET["confirm"])) $confirm = $_GET["confirm"];
else $confirm="";

switch($confirm)
    {
    case 'av':

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_modules.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

echo '<p align="center"><br/><br/>Voulez-vous supprimer l\'élément <b>'.$mod_titre.'</b> ?<br/><br/></p>';
echo '<p align="center"><a href="gs_modules.php?action=del&rub_id='.$rub_id.'&mod_id='.$mod_id.'&confirm=oui"><img src="images/boutons/b_oui.jpg"></a> <a href="javascript:window.history.go(-1)"><img src="images/boutons/b_non.jpg"></a></p>';
break;

    case 'oui':

if($mod_rub_aff == 'right'){
$sql_o = "SELECT * FROM " .$table_modules. " WHERE mod_rub_id = '$rub_id' AND mod_rub_aff = 'right' ";
$req_o = mysql_query($sql_o,$db) or die ('Erreur : '.mysql_error() );
$res_o = mysql_num_rows($req_o);

if ($res_o==1) {
mysql_query("DELETE FROM " .$table_modules. " WHERE mod_id = '$mod_id' ") or die("</br>Erreur de suppression");
} elseif ($res_o==$mod_position) {
mysql_query("DELETE FROM " .$table_modules. " WHERE mod_id = '$mod_id' ") or die("</br>Erreur de suppression");
} else {
$i = $mod_position;
while($i != $res_o) {
$hop = $i - 1;
mysql_query("UPDATE " .$table_modules. " SET mod_position = '$hop' WHERE mod_position = '$i' AND mod_rub_id = '$rub_id' AND mod_rub_aff = 'right' ") or die("</br>Erreur de suppression");
$i++;
}
$hop2 = $res_o - 1;
mysql_query("UPDATE " .$table_modules. " SET mod_position = '$hop2' WHERE mod_position = '$res_o' AND mod_rub_id = '$rub_id' AND mod_rub_aff = 'right' ") or die("</br>Erreur de suppression");
mysql_query("DELETE FROM " .$table_modules. " WHERE mod_id = '$mod_id' ") or die("</br>Erreur de suppression");
}

} else {
$sql_o = "SELECT * FROM " .$table_modules. " WHERE mod_rub_id = '$rub_id' AND mod_rub_aff != 'right' ";
$req_o = mysql_query($sql_o,$db) or die ('Erreur : '.mysql_error() );
$res_o = mysql_num_rows($req_o);

if ($res_o==1) {
mysql_query("DELETE FROM " .$table_modules. " WHERE mod_id = '$mod_id' ") or die("</br>Erreur de suppression");
} elseif ($res_o==$mod_position) {
mysql_query("DELETE FROM " .$table_modules. " WHERE mod_id = '$mod_id' ") or die("</br>Erreur de suppression");
} else {
$i = $mod_position;
while($i != $res_o) {
$hop = $i - 1;
mysql_query("UPDATE " .$table_modules. " SET mod_position = '$hop' WHERE mod_position = '$i' AND mod_rub_id = '$rub_id' AND mod_rub_aff != 'right' ") or die("</br>Erreur de suppression");
$i++;
}
$hop2 = $res_o - 1;
mysql_query("UPDATE " .$table_modules. " SET mod_position = '$hop2' WHERE mod_position = '$res_o' AND mod_rub_id = '$rub_id' AND mod_rub_aff != 'right' ") or die("</br>Erreur de suppression");
mysql_query("DELETE FROM " .$table_modules. " WHERE mod_id = '$mod_id' ") or die("</br>Erreur de suppression");
}
}

if($mod_type == 'text'){
if($mod_img){
$chemin = '../files/files';
unlink($chemin."/".$mod_img);
}
} elseif($mod_type == 'image'){
if($mod_img){
$chemin = '../files/images';
unlink($chemin."/".$mod_img);
}
} elseif($mod_type == 'galerie'){

$sqlb = "SELECT * FROM " .$table_galeries. " WHERE img_mod_id = '$mod_id' "; 
$reqb = mysql_query($sqlb) or die('Erreur SQL !'.$sqlb.'<br>'.mysql_error());
$resb = mysql_num_rows($reqb);

if($resb){
while($rowb = mysql_fetch_array($reqb)) {
$img_name = $rowb['img_name'];

$chemin = '../files/galeries';
unlink($chemin."/".$img_name);
unlink($chemin."/mini_".$img_name);
}
}

mysql_query("DELETE FROM " .$table_galeries. " WHERE img_mod_id = '$mod_id' ") or die("</br>Erreur de suppression");

} elseif($mod_type == 'pdf'){

if($mod_img){
$chemin = '../files/images';
unlink($chemin."/".$mod_img);
}

$sqlb = "SELECT * FROM " .$table_pdf. " WHERE pdf_mod_id = '$mod_id' "; 
$reqb = mysql_query($sqlb) or die('Erreur SQL !'.$sqlb.'<br>'.mysql_error());
$resb = mysql_num_rows($reqb);
if($resb){
while($rowb = mysql_fetch_array($reqb)) {
$pdf_name = $rowb['pdf_name'];

$chemin = '../files/pdf';
unlink($chemin."/".$pdf_name);
}
}
mysql_query("DELETE FROM " .$table_pdf. " WHERE pdf_mod_id = '$mod_id' ") or die("</br>Erreur de suppression");
} elseif($mod_type == 'news'){

if($mod_img){
$chemin = '../files/images';
unlink($chemin."/".$mod_img);
}

$sqlb = "SELECT * FROM " .$table_news. " WHERE news_mod_id = '$mod_id' "; 
$reqb = mysql_query($sqlb) or die('Erreur SQL !'.$sqlb.'<br>'.mysql_error());
$resb = mysql_num_rows($reqb);
if($resb){
while($rowb = mysql_fetch_array($reqb)) {
$news_img = $rowb['news_img'];

$chemin = '../files/news';
unlink($chemin."/".$news_img);
}
}
mysql_query("DELETE FROM " .$table_news. " WHERE news_mod_id = '$mod_id' ") or die("</br>Erreur de suppression");
}

aff_files($rub_id);

break;

default: 
echo '<p>Erreur de traitement</p>'; 
break;
    }
    break;





    case 'act_on':

if (isset($_GET["mod_id"])) $mod_id = $_GET["mod_id"];
else $mod_id="";

$sql = "UPDATE " .$table_modules. " SET mod_activation = 'active' WHERE mod_id = '$mod_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

aff_files($rub_id);
    break;





    case 'act_off':

if (isset($_GET["mod_id"])) $mod_id = $_GET["mod_id"];
else $mod_id="";

$sql = "UPDATE " .$table_modules. " SET mod_activation = 'nonactive' WHERE mod_id = '$mod_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

aff_files($rub_id);
		break;





    case 'moveup':

if (isset($_GET["mod_id"])) $mod_id = $_GET["mod_id"];
else $mod_id="";
if (isset($_GET["rub_id"])) $rub_id = $_GET["rub_id"];
else $rub_id="";
if (isset($_GET["aff"])) $aff = $_GET["aff"];
else $aff="";

if($aff == 'right') {
$sql = "SELECT mod_position FROM " .$table_modules. " WHERE mod_rub_id = '$rub_id' AND mod_rub_aff = 'right' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

$position_tmp = ($res + 1);
$position_up = ($position + 1);
$position_d = $position - 1;

$sql = "UPDATE " .$table_modules. " SET mod_position = '$position_tmp' WHERE mod_position = '$position' AND mod_rub_id = '$rub_id' AND mod_rub_aff = 'right' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$sql = "UPDATE " .$table_modules. " SET mod_position = '$position' WHERE mod_position = '$position_d' AND mod_rub_id = '$rub_id' AND mod_rub_aff = 'right' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());    
$sql = "UPDATE " .$table_modules. " SET mod_position = '$position_d' WHERE mod_position = '$position_tmp' AND mod_rub_id = '$rub_id' AND mod_rub_aff = 'right' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
} else {
$sql = "SELECT mod_position FROM " .$table_modules. " WHERE mod_rub_id = '$rub_id' AND mod_rub_aff != 'right' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

$position_tmp = ($res + 1);
$position_up = ($position + 1);
$position_d = $position - 1;

$sql = "UPDATE " .$table_modules. " SET mod_position = '$position_tmp' WHERE mod_position = '$position' AND mod_rub_id = '$rub_id' AND mod_rub_aff != 'right' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$sql = "UPDATE " .$table_modules. " SET mod_position = '$position' WHERE mod_position = '$position_d' AND mod_rub_id = '$rub_id' AND mod_rub_aff != 'right' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());    
$sql = "UPDATE " .$table_modules. " SET mod_position = '$position_d' WHERE mod_position = '$position_tmp' AND mod_rub_id = '$rub_id' AND mod_rub_aff != 'right' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
}

aff_files($rub_id);

    break;





    case 'moved': 

if (isset($_GET["mod_id"])) $mod_id = $_GET["mod_id"];
else $mod_id="";
if (isset($_GET["rub_id"])) $rub_id = $_GET["rub_id"];
else $rub_id="";
if (isset($_GET["aff"])) $aff = $_GET["aff"];
else $aff="";

if($aff == 'right') {
$sql = "SELECT mod_position FROM " .$table_modules. " WHERE mod_rub_id = '$rub_id' AND mod_rub_aff = 'right' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

$position_tmp = ($res + 1); 
$position_up = ($position - 1);
$position_d = $position + 1;

$sql = "UPDATE " .$table_modules. " SET mod_position = '$position_tmp' WHERE mod_position = '$position' AND mod_rub_id = '$rub_id' AND mod_rub_aff = 'right' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());	
$sql = "UPDATE " .$table_modules. " SET mod_position = '$position' WHERE mod_position = '$position_d' AND mod_rub_id = '$rub_id' AND mod_rub_aff = 'right' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());    
$sql = "UPDATE " .$table_modules. " SET mod_position = '$position_d' WHERE mod_position = '$position_tmp' AND mod_rub_id = '$rub_id' AND mod_rub_aff = 'right' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
} else {
$sql = "SELECT mod_position FROM " .$table_modules. " WHERE mod_rub_id = '$rub_id' AND mod_rub_aff != 'right' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

$position_tmp = ($res + 1); 
$position_up = ($position - 1);
$position_d = $position + 1;

$sql = "UPDATE " .$table_modules. " SET mod_position = '$position_tmp' WHERE mod_position = '$position' AND mod_rub_id = '$rub_id' AND mod_rub_aff != 'right' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());	
$sql = "UPDATE " .$table_modules. " SET mod_position = '$position' WHERE mod_position = '$position_d' AND mod_rub_id = '$rub_id' AND mod_rub_aff != 'right' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());    
$sql = "UPDATE " .$table_modules. " SET mod_position = '$position_d' WHERE mod_position = '$position_tmp' AND mod_rub_id = '$rub_id' AND mod_rub_aff != 'right' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
}

aff_files($rub_id);

    break;



default:
aff_files($rub_id);
break;
}




} else {
aff_files($rub_id);
}
echo '</div>'."\n";


include("inc/footer.inc.php");
?>