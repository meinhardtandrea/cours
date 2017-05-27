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
if (isset($_GET["page"])) $page = $_GET["page"];
else $page="1";

///////////Fonctions///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function aff_news($rub_id,$mod_id,$page) {
include ("conf.ig.php");

$sqlt = "SELECT rub_titre FROM " .$table_rubriques. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT * FROM " .$table_modules. " 
LEFT JOIN " .$table_users. " ON ".$table_modules.".mod_edito_author = ".$table_users.".user_id
WHERE mod_id = '$mod_id' ";
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_titre = $rowt['mod_titre'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_mods.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
if($page == 1){
echo '<li><a href="gs_mods.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
} else {
echo '<li><a href="gs_news.php?rub_id='.$rub_id.'&mod_id='.$mod_id.'">< Retour</a></li>'."\n";
}
echo '<li><a href="gs_edito.php?rub_id='.$rub_id.'&mod_id='.$mod_id.'">Edito</a></li>'."\n";
echo '<li><a href="gs_news.php?action=add_news&rub_id='.$rub_id.'&mod_id='.$mod_id.'">+ Ajouter une actualité</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

/////////////////////////////////////////////////////////////////////////
$mod_edito_author = $rowt['user_name'];
$mod_edito_titre = $rowt['mod_edito_titre'];
$mod_edito_texte = $rowt['mod_edito_texte'];
$mod_edito_img = $rowt['mod_edito_img'];
$mod_edito_date = $rowt['mod_edito_date'];
$mod_edito_heure = $rowt['mod_edito_heure'];
$mod_edito_activation = $rowt['mod_edito_activation'];

$mod_option1 = $rowt['mod_option1'];
$mod_option2 = $rowt['mod_option2'];
$mod_option3 = $rowt['mod_option3'];
$mod_option4 = $rowt['mod_option4'];

$mod_edito_date = explode('-', $mod_edito_date);
if($date[1] == 1){
$mod_edito_date[1] = 'janvier';
} elseif ($mod_edito_date[1] == 2){
$mod_edito_date[1] = 'février';
} elseif ($mod_edito_date[1] == 3){
$mod_edito_date[1] = 'mars';
} elseif ($mod_edito_date[1] == 4){
$mod_edito_date[1] = 'avril';
} elseif ($mod_edito_date[1] == 5){
$mod_edito_date[1] = 'mai';
} elseif ($mod_edito_date[1] == 6){
$mod_edito_date[1] = 'juin';
} elseif ($mod_edito_date[1] == 7){
$mod_edito_date[1] = 'juillet';
} elseif ($mod_edito_date[1] == 8){
$mod_edito_date[1] = 'août';
} elseif ($mod_edito_date[1] == 9){
$mod_edito_date[1] = 'septembre';
} elseif ($mod_edito_date[1] == 10){
$mod_edito_date[1] = 'octobre';
} elseif ($mod_edito_date[1] == 11){
$mod_edito_date[1] = 'novembre';
} elseif ($mod_edito_date[1] == 12){
$mod_edito_date[1] = 'décembre';
}

if($page == 1){
if($mod_edito_activation == 'active'){
echo '<div id="edito">'."\n";

echo '<h1>'.$mod_edito_titre.'</h1>'."\n";

if($mod_option1 == 1 AND $mod_option2 == 1){
echo '<p><span class="date">Le '.$mod_edito_date[2].' '.$mod_edito_date[1].' '.$mod_edito_date[0].' à '.$mod_edito_heure.' par '.$mod_edito_author.'.</span></p>'."\n";
} elseif($mod_option1 == 1 AND $mod_option2 != 1) {
echo '<p><span class="date">Le '.$mod_edito_date[2].' '.$mod_edito_date[1].' '.$mod_edito_date[0].' à '.$mod_edito_heure.'.</span></p>'."\n";
} elseif($mod_option1 != 1 AND $mod_option2 == 1) {
echo '<p><span class="date">Par '.$mod_edito_author.'.</span></p>'."\n";
}

if($mod_edito_img){
echo '<table>'."\n";
echo '<tr>'."\n";
echo '<td valign="top">'.$mod_edito_texte.'</td>'."\n";
echo '<td align="right" valign="top" width="210"><img src="../files/edito/'.$mod_edito_img.'"></td>'."\n";
echo '</tr>'."\n";
echo '</table>'."\n";
} else {
echo $mod_edito_texte."\n";
}

if($mod_edito_activation == 'nonactive'){
$trans_active = '<a href="gs_edito.php?action=act_on&rub_id='.$rub_id.'&mod_id='.$mod_id.'"><img src="images/icones/off.gif" title="Activer l\'édito" alt="Activer l\'édito" align="absmiddle"></a>';
} else {
$trans_active = '<a href="gs_edito.php?action=act_off&rub_id='.$rub_id.'&mod_id='.$mod_id.'"><img src="images/icones/on.gif" title="Désactiver l\'édito" alt="Désactiver l\'édito" align="absmiddle"></a>';
}

echo '<p align="right">[ <a href="gs_edito.php?rub_id='.$rub_id.'&mod_id='.$mod_id.'&news_id='.$news_id.'">Editer</a> ] [ <a href="gs_edito.php?action=del&rub_id='.$rub_id.'&mod_id='.$mod_id.'">Supprimer</a> ] '.$trans_active.'</p>'."\n";

echo '</div>'."\n";
}
}
/////////////////////////////////////////////////////////////////////////
if($page == 1){
if($mod_option4){
echo '<h1>'.$mod_titre.'</h1>'."\n";
}
} else {
echo '<h1>Archives</h1>'."\n";
}

if($page == 1){
$sql = "SELECT * FROM " .$table_news. " 
LEFT JOIN " .$table_users. " ON ".$table_news.".news_author = ".$table_users.".user_id
WHERE news_rub_id = '$rub_id' AND news_mod_id = '$mod_id' ORDER BY news_date DESC, news_heure DESC LIMIT 0, $mod_option3 ";
} else {
$sql = "SELECT * FROM " .$table_news. " 
LEFT JOIN " .$table_users. " ON ".$table_news.".news_author = ".$table_users.".user_id
WHERE news_rub_id = '$rub_id' AND news_mod_id = '$mod_id' ORDER BY news_date DESC, news_heure DESC LIMIT $mod_option3, 99999999999 ";
}
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

if($res){

while($row = mysql_fetch_array($req)) {

$news_pseudo = $row['user_name'];

$news_id = $row['news_id'];
$news_titre = $row['news_titre'];
$news_texte = $row['news_texte'];
$news_img = $row['news_img'];
$date = $row['news_date'];
$news_heure = $row['news_heure'];
$news_activation = $row['news_activation'];

$news_option1 = $row['news_option1'];
$news_option2 = $row['news_option2'];
$news_option3 = $row['news_option3'];

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


echo '<div id="pageleft">'."\n";

echo '<div id="element_left">'."\n";


echo '<h1>Options du module :</h1>'."\n";

$sql = "SELECT * FROM " .$table_modules. " WHERE mod_id = '$mod_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);
$row = mysql_fetch_array($req);

$mod_option3 = $row['mod_option3'];
$mod_option4 = $row['mod_option4'];

echo '<div id="form">'."\n";
echo '<form action="gs_news.php?action=rec_options&rub_id='.$rub_id.'&mod_id='.$mod_id.'" method="post">'."\n";

echo '<h5>Nombre d\'actualités <br/>affichées sur une page :</h5>'."\n";
echo '<p><input type="text" class="text" name="mod_option3" maxlength="80" size="5" value="'.$mod_option3.'"></p>'."\n";

echo '<h5>Titre du module</h5>'."\n";
if($mod_option4){
echo '<p><input type="checkbox" name="mod_option4" value="1" checked> Afficher le titre sur la page</p>'."\n";
} else {
echo '<p><input type="checkbox" name="mod_option4" value="1"> Afficher le titre sur la page</p>'."\n";
}

echo '<p><input type="image" class="envoy" src="images/boutons/b_send_modif.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";


$sqlf = "SELECT * FROM " .$table_news. " WHERE news_mod_id = '$mod_id' LIMIT $mod_option3, 999999999 ";
$reqf = mysql_query($sqlf,$db) or die ('Erreur : '.mysql_error() );
$resf = mysql_num_rows($reqf);

if($resf){
echo '<div id="dotted"></div>'."\n";
echo '<h1>Archives :</h1>'."\n";

if($resf == 1){
echo '<p>'.$resf.' actualité [ <a href="gs_news.php?rub_id='.$rub_id.'&mod_id='.$mod_id.'&page=2">consulter</a> ]</p>'."\n";
} else {
echo '<p>'.$resf.' actualités [ <a href="gs_news.php?rub_id='.$rub_id.'&mod_id='.$mod_id.'&page=2">consulter</a> ]</p>'."\n";
}

}

echo '</div>'."\n";

echo '</div>'."\n";

//////////////////////////////////////////////////////////////////////////////////////

echo '<div id="pageright">'."\n";
echo '<div id="news">'."\n";

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
echo '<td valign="top" width="210"><img src="../files/news/'.$news_img.'"></td>'."\n";
echo '<td valign="top">'.$news_texte.'</td>'."\n";
echo '</tr>'."\n";
echo '</table>'."\n";
} else {
echo $news_texte."\n";
}

if($news_activation == 'nonactive'){
$trans_active = '<a href="gs_news.php?action=act_on&rub_id='.$rub_id.'&mod_id='.$mod_id.'&news_id='.$news_id.'"><img src="images/icones/off.gif" title="Activer l\'actualité" alt="Activer l\'actualité" align="absmiddle"></a>';
} else {
$trans_active = '<a href="gs_news.php?action=act_off&rub_id='.$rub_id.'&mod_id='.$mod_id.'&news_id='.$news_id.'"><img src="images/icones/on.gif" title="Désactiver l\'actualité" alt="Désactiver l\'actualité" align="absmiddle"></a>';
}

echo '<p align="right">[ <a href="gs_news.php?action=edit&rub_id='.$rub_id.'&mod_id='.$mod_id.'&news_id='.$news_id.'">Editer</a> ] [ <a href="gs_news.php?action=del&rub_id='.$rub_id.'&mod_id='.$mod_id.'&news_id='.$news_id.'&confirm=av">Supprimer</a> ] '.$trans_active.'</p>'."\n";

echo '</div>'."\n";
}

} else {
echo '<p>Cette rubrique est actuellement complètement vide...</p>'."\n";
}
}




function Add_news($rub_id,$mod_id) {
include ("conf.ig.php");

echo '<div id="form">'."\n";
echo '<form action="gs_news.php?action=rec_news&rub_id='.$rub_id.'&mod_id='.$mod_id.'" method="post" enctype="multipart/form-data">'."\n";
echo '<input type="hidden" name="MAX_FILE_SIZE" value="8000000">'."\n";

echo '<h5>Titre de l\'actualité <span class="comment">(80 caractères au maximum)</span></h5>'."\n";
echo '<p><input type="text" class="text" name="news_titre" maxlength="80" size="40"></p>'."\n";

echo '<h5>Image d\'illustration</h5>'."\n";
echo '<p><input class="text" type="file" name="img" /></p>'."\n";

echo '<h5>Texte</h5>'."\n";
echo '<p><textarea cols="60" id="news_texte" name="news_texte" rows="10" ></textarea></p>'."\n";

echo '<h5>Activation</label></h5>'."\n";
echo '<p><input type="radio" name="news_activation" value="nonactive" id="5" checked="checked"/> <label class="radioCheck" for="5">Désactiver</label></p>'."\n";
echo '<p><input type="radio" name="news_activation" value="active" id="6"/> <label class="radioCheck" for="6">Activer</label></p>'."\n";

echo '<h5>Options</h5>'."\n";
echo '<p><input type="checkbox" name="news_option1" value="1" checked> Afficher la date</p>'."\n";
echo '<p><input type="checkbox" name="news_option2" value="1" checked> Afficher l\'auteur</p>'."\n";
echo '<p><input type="checkbox" name="news_option3" value="1" checked> Afficher les commentaires</p>'."\n";

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

$news_option1 = $row['news_option1'];
$news_option2 = $row['news_option2'];
$news_option3 = $row['news_option3'];

echo '<div id="form">'."\n";
echo '<form action="gs_news.php?action=edit_rec_news&rub_id='.$rub_id.'&mod_id='.$mod_id.'&news_id='.$news_id.'" method="post" enctype="multipart/form-data">'."\n";
echo '<input type="hidden" name="MAX_FILE_SIZE" value="8000000">'."\n";

echo '<h5>Titre <span class="comment">(80 caractères au maximum)</span></h5>'."\n";
echo '<p><input type="text" class="text" name="news_titre" maxlength="80" size="40" value="'.$news_titre.'"></p>'."\n";

echo '<h5>Image</h5>'."\n";
if($news_img){
echo '<p><img src="../files/news/'.$news_img.'"></p>'."\n";
echo '<p>[ <a href="gs_news.php?action=del_news_img&rub_id='.$rub_id.'&mod_id='.$mod_id.'&news_id='.$news_id.'">Supprimer l\'image</a> ]</p>'."\n";
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
if($news_option3){
echo '<p><input type="checkbox" name="news_option3" value="1" checked> Afficher les commentaires</p>'."\n";
} else {
echo '<p><input type="checkbox" name="news_option3" value="1"> Afficher les commentaires</p>'."\n";
}

echo '<p><input type="image" class="envoy" src="images/boutons/b_send_modif.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






if(!empty($_GET['action'])){
switch($_GET['action']){




case 'add_news':

$sqlt = "SELECT rub_titre FROM " .$table_rubriques. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT mod_titre FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_titre = $rowt['mod_titre'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_news.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_news.php?rub_id='.$rub_id.'&mod_id='.$mod_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

Add_news($rub_id,$mod_id);

break;






    case 'rec_news':

$sqlt = "SELECT rub_titre FROM " .$table_rubriques. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT mod_titre FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_titre = $rowt['mod_titre'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_news.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_news.php?rub_id='.$rub_id.'&mod_id='.$mod_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

extract($_POST,EXTR_OVERWRITE);

$news_titre = AddSlashes($news_titre);
$news_texte = AddSlashes($news_texte);

if(empty($news_titre)){
echo '<p align="center"><font color="red">Attention, merci de donner un nom à cette actualité !<br /><br /></font></p>'."\n";
Add_news($rub_id,$mod_id);
} else {


////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_FILES['img']['name']) {
$dest_dossier = "../files/news/";
$img = $_FILES['img']['name'];

$extensions_ok = array('gif', 'jpg', 'jpeg', 'GIF', 'JPG', 'JPEG');
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
news_activation, news_option1, news_option2, news_option3) VALUES 
('','$rub_id','$mod_id','$user_log_id','$news_titre','$news_texte','$img','$date','$heure',
'$news_activation','$news_option1','$news_option2','$news_option3')";
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<p align="center"><br/><br/><b>Actualité ajoutée avec succès !</b><br/><br/></p>';
echo '<p align="center"><a href="gs_news.php?rub_id='.$rub_id.'&mod_id='.$mod_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";

}
    break;




case 'edit':

$sqlt = "SELECT rub_titre FROM " .$table_rubriques. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT mod_titre FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_titre = $rowt['mod_titre'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_mods.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_news.php?rub_id='.$rub_id.'&mod_id='.$mod_id.'#'.$news_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

Edit_news($rub_id,$mod_id,$news_id);

break;




case 'del_news_img':

$sqlt = "SELECT rub_titre FROM " .$table_rubriques. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT mod_titre FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_titre = $rowt['mod_titre'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_mods.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_news.php?rub_id='.$rub_id.'&mod_id='.$mod_id.'#'.$news_id.'">< Retour</a></li>'."\n";
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






    case 'edit_rec_news':

$sqlt = "SELECT rub_titre FROM " .$table_rubriques. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT mod_titre FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_titre = $rowt['mod_titre'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_mods.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_news.php?rub_id='.$rub_id.'&mod_id='.$mod_id.'#'.$news_id.'">< Retour</a></li>'."\n";
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

$extensions_ok = array('gif', 'jpg', 'jpeg', 'GIF', 'JPG', 'JPEG');
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

}
$sql = "UPDATE " .$table_news. " SET news_img = '$img' WHERE news_id = '$news_id'" or die ("erreur");
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
}
////////////////////////////////////////////////////////////////////////////////////////////////////////

$sql = "UPDATE " .$table_news. " SET news_titre = '$news_titre', news_texte = '$news_texte', 
news_option1 = '$news_option1', news_option2 = '$news_option2', news_option3 = '$news_option3' WHERE news_id = '$news_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
 
echo '<p align="center"><br /><br /><b>Actualité éditée avec succès !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="gs_news.php?rub_id='.$rub_id.'&mod_id='.$mod_id.'#'.$news_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
}
    break;





    case 'del':

$sqlt = "SELECT rub_titre FROM " .$table_rubriques. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

$sqlt = "SELECT mod_titre FROM " .$table_modules. " WHERE mod_id = '$mod_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$mod_titre = $rowt['mod_titre'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_mods.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > '.$mod_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_news.php?rub_id='.$rub_id.'&mod_id='.$mod_id.'#'.$news_id.'">< Retour</a></li>'."\n";
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
echo '<p align="center"><a href="gs_news.php?action=del&rub_id='.$rub_id.'&mod_id='.$mod_id.'&news_id='.$news_id.'&confirm=oui"><img src="images/boutons/b_oui.jpg"></a> <a href="javascript:window.history.go(-1)"><img src="images/boutons/b_non.jpg"></a></p>';
break;

    case 'oui':

if($news_img){
$chemin = '../files/news';
unlink($chemin."/".$news_img);
}

mysql_query("DELETE FROM " .$table_news. " WHERE news_id='$news_id'") or die("</br>Erreur de suppression");
 
echo '<p align="center"><br /><br /><b>Actualité supprimée avec succès !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="gs_news.php?rub_id='.$rub_id.'&mod_id='.$mod_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";

break;

default: 
echo '<p>Erreur de traitement</p>'; 
break;
    }
    break;





    case 'act_on':

$sql = "UPDATE " .$table_news. " SET news_activation = 'active' WHERE news_id = '$news_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

aff_news($rub_id,$mod_id,$page);
    break;





    case 'act_off':

$sql = "UPDATE " .$table_news. " SET news_activation = 'nonactive' WHERE news_id = '$news_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

aff_news($rub_id,$mod_id,$page);
		break;





    case 'rec_options':

extract($_POST,EXTR_OVERWRITE);

if(empty($mod_option3)){
aff_news($rub_id,$mod_id,$page);
} elseif(is_numeric($mod_option3)) {
$sql = "UPDATE " .$table_modules. " SET mod_option3 = '$mod_option3', mod_option4 = '$mod_option4' WHERE mod_id = '$mod_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
aff_news($rub_id,$mod_id,$page);
} else {
aff_news($rub_id,$mod_id,$page);
}
    break;



default:
aff_news($rub_id,$mod_id,$page);
break;
}




} else {
aff_news($rub_id,$mod_id,$page);
}





echo '</div>'."\n";


include("inc/footer.inc.php");
?>