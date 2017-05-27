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

if (isset($_GET["fch_id"])) $fch_id = $_GET["fch_id"];
else $fch_id="";


function Fiches() {
include ("conf.ig.php");
echo '<h1>Liste des fiches</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_fiches.php?action=add">+ Ajouter une fiche</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";



$sql = "SELECT * FROM " .$table_fiches. "  ORDER by fch_une DESC, fch_date DESC, fch_heure DESC";
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

if($res){

while($row = mysql_fetch_array($req)) {

$fch_id = $row['fch_id'];
$fch_titre = $row['fch_titre'];
$fch_texte = $row['fch_texte'];
$fch_lien = $row['fch_lien'];
$fch_img = $row['fch_img'];
$fch_date = $row['fch_date'];
$fch_heure = $row['fch_heure'];
$fch_une = $row['fch_une'];
$fch_statut = $row['fch_statut'];
$fch_activation = $row['fch_activation'];
$fch_position = $row['fch_position'];

$fch_date = explode('-', $fch_date);
if($fch_date[1] == 1){
$fch_date[1] = 'janvier';
} elseif ($fch_date[1] == 2){
$fch_date[1] = 'février';
} elseif ($fch_date[1] == 3){
$fch_date[1] = 'mars';
} elseif ($fch_date[1] == 4){
$fch_date[1] = 'avril';
} elseif ($fch_date[1] == 5){
$fch_date[1] = 'mai';
} elseif ($fch_date[1] == 6){
$fch_date[1] = 'juin';
} elseif ($fch_date[1] == 7){
$fch_date[1] = 'juillet';
} elseif ($fch_date[1] == 8){
$fch_date[1] = 'août';
} elseif ($fch_date[1] == 9){
$fch_date[1] = 'septembre';
} elseif ($fch_date[1] == 10){
$fch_date[1] = 'octobre';
} elseif ($fch_date[1] == 11){
$fch_date[1] = 'novembre';
} elseif ($fch_date[1] == 12){
$fch_date[1] = 'décembre';
}

if($fch_une == 'une'){
echo '<div id="une">'."\n";
} else {
echo '<div id="norm">'."\n";
}


echo '<h1>'.$fch_titre.'</h1>'."\n";
echo '<p align="right">Ajoutée le '.$fch_date[2].' '.$fch_date[1].' '.$fch_date[0].' à '.$fch_heure.'.</p>'."\n";

if($fch_lien){
echo '<p><b>Lien :</b> <a href="'.$fch_lien.'" target="_blank">'.$fch_lien.'</a></p>'."\n";
} else {
echo '<p><b>Lien :</b> Aucun lien défini...</p>'."\n";
}

echo '<h2>Texte :</h2>'."\n";
if($fch_texte){
echo '<p>'.$fch_texte.'</p>'."\n";
} else {
echo '<p>Aucun texte...</p>'."\n";
}

echo '<h2>Illustration :</h2>'."\n";
if($fch_img){
echo '<p><img src="../files/fiches/'.$fch_img.'"></p>'."\n";
} else {
echo '<p>Aucune illustration...</p>'."\n";
}

if($fch_une == 'une'){
echo '<p><b>Positionnement :</b> A la une [ > <a href="gs_fiches.php?action=pos_norm&fch_id='.$fch_id.'">Mettre en normal</a> ]</p>'."\n";
} else {
echo '<p><b>Positionnement :</b> Normal [ > <a href="gs_fiches.php?action=pos_une&fch_id='.$fch_id.'">Mettre à la une</a> ]</p>'."\n";
}

if($fch_statut == 'ec'){
echo '<p><b>Statut de la fiche :</b> En cours [ > <a href="gs_fiches.php?action=stat_norm&fch_id='.$fch_id.'">Mettre en complète</a> ]</p>'."\n";
} else {
echo '<p><b>Statut de la fiche :</b> Complète [ > <a href="gs_fiches.php?action=stat_ec&fch_id='.$fch_id.'">Mettre en cours</a> ]</p>'."\n";
}

if($fch_activation == 'nonactive'){
$trans_active = '<a href="gs_fiches.php?action=act_on&fch_id='.$fch_id.'"><img src="images/icones/off.gif" title="Activer la fiche" alt="Activer la fiche" align="absmiddle"></a>';
} else {
$trans_active = '<a href="gs_fiches.php?action=act_off&fch_id='.$fch_id.'"><img src="images/icones/on.gif" title="Désactiver la fiche" alt="Désactiver la fiche" align="absmiddle"></a>';
}

echo '<p align="right">[ <a href="gs_fiches.php?action=edit&fch_id='.$fch_id.'">Modifier</a> ] [ <a href="gs_fiches.php?action=del&fch_id='.$fch_id.'&confirm=av">Supprimer</a> ] '.$trans_active.'</p>'."\n";
echo '</div>';
}
} else {
echo '<div id="users">'."\n";
echo '<p>Aucune fiche...</p>'."\n";
echo '</div>';
}
}




function edit($fch_id,$err) {
include ("conf.ig.php");

$sql = "SELECT * FROM " .$table_fiches. " WHERE fch_id = '$fch_id' "; 
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
$fch_activation = $row['fch_activation'];
$fch_position = $row['fch_position'];

echo '<h1><a href="gs_fiches.php">Liste des fiches</a> > Modification de '.$fch_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_fiches.php">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

echo '<div id="form">'."\n";
echo '<form action="gs_fiches.php?action=rec_edit&fch_id='.$fch_id.'" method="post" enctype="multipart/form-data">'."\n";
echo '<input type="hidden" name="MAX_FILE_SIZE" value="8000000">'."\n";

if($err) { echo $err; }

echo '<h5><label for="fch_titre">Titre <span class="err">*</span></label></h5>'."\n";
echo '<p><input type="text" name="fch_titre" id="fch_titre" maxlength="255" size="32" value="'.$fch_titre.'"></p>'."\n";

echo '<h5><label for="fch_lien">Lien</label></h5>'."\n";
echo '<p><input type="text" name="fch_lien" id="fch_lien" maxlength="255" size="32" value="'.$fch_lien.'"></p>'."\n";

echo '<h5><label for="fch_texte">Texte</label></h5>'."\n";
echo '<p><textarea cols="60" id="fch_texte" name="fch_texte" rows="10">'.$fch_texte.'</textarea></p>'."\n";

echo '<h5>Image d\'illustration</h5>'."\n";
if($fch_img){
echo '<p><img src="../files/fiches/'.$fch_img.'"></p>'."\n";
echo '<p>[ <a href="gs_fiches.php?action=del_fiche_img&fch_id='.$fch_id.'">Supprimer l\'image</a> ]</p>'."\n";
} else {
echo '<p><input class="text" type="file" name="img" /></p>'."\n";
}

echo '<p><span class="err">*</span> Informations obligatoires</p>'."\n";

echo '<p><input type="image" class="envoy" src="images/boutons/b_suite.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";
}
}




function add_fiche($err) {
include ("conf.ig.php");

echo '<h1><a href="gs_fiches.php">Liste des fiches</a> > Ajout d\'une fiche</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_fiches.php">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

echo '<div id="form">'."\n";
echo '<form action="gs_fiches.php?action=rec_add" method="post" enctype="multipart/form-data">'."\n";
echo '<input type="hidden" name="MAX_FILE_SIZE" value="8000000">'."\n";

if($err) { echo $err; }

echo '<h5><label for="fch_titre">Titre <span class="err">*</span></label></h5>'."\n";
echo '<p><input type="text" name="fch_titre" id="fch_titre" maxlength="255" size="32"></p>'."\n";

echo '<h5><label for="fch_lien">Lien</label></h5>'."\n";
echo '<p><input type="text" name="fch_lien" id="fch_lien" maxlength="255" size="32"></p>'."\n";

echo '<h5><label for="img">Image d\'illustration</label></h5>'."\n";
echo '<p><input class="text" type="file" name="img" id="img" /></p>'."\n";

echo '<h5><label for="fch_texte">Texte</label></h5>'."\n";
echo '<p><textarea cols="60" name="fch_texte" id="fch_texte" rows="10" ></textarea></p>'."\n";

echo '<h5>Positionnement de la fiche</h5>'."\n";
echo '<p><input type="radio" name="fch_une" value="normal" id="5" checked="checked"/> <label class="radioCheck" for="5">Normal</label></p>'."\n";
echo '<p><input type="radio" name="fch_une" value="une" id="6"/> <label class="radioCheck" for="6">A la Une</label></p>'."\n";

echo '<h5>Statut de la fiche</h5>'."\n";
echo '<p><input type="radio" name="fch_statut" value="ec" id="1" checked="checked"/> <label class="radioCheck" for="1">En cours</label></p>'."\n";
echo '<p><input type="radio" name="fch_statut" value="cplt" id="2"/> <label class="radioCheck" for="2">Complète</label></p>'."\n";

echo '<h5>Activation</h5>'."\n";
echo '<p><input type="radio" name="fch_activation" value="active" id="3" checked="checked"/> <label class="radioCheck" for="3">Activer</label></p>'."\n";
echo '<p><input type="radio" name="fch_activation" value="nonactive" id="4"/> <label class="radioCheck" for="4">Désactiver</label></p>'."\n";


echo '<p><span class="err">*</span> Informations obligatoires</p>'."\n";

echo '<p><input type="image" class="envoy" src="images/boutons/b_suite.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";

}

/////////////////////////////////////////////////////////////////////////////////////////////////




/*
echo '<div id="pageleft">'."\n";

echo '<div id="element_left">'."\n";
$sql = "SELECT * FROM " .$table_fiches. "  "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

echo '<h1>Statistiques :</h1>'."\n";

if($res){
echo '<p>Fiches : <b>'.$res.'</b></p>'."\n";
} else {
echo '<p>Aucune fiche.</p>'."\n";
}
echo '</div>'."\n";

echo '<div id="infos">'."\n";
echo '<h1>Infos :</h1>'."\n";
echo '<p>Seul l\'utilisateur <b>admin</b> peut éditer et supprimer tous les comptes administrateurs.</p>'."\n";
echo '<p>Un administrateur normal pourra uniquement éditer son propre compte.</p>'."\n";
echo '<p>Le compte <b>admin</b> ne peut être supprimé.</p>'."\n";
echo '</div>'."\n";

echo '</div>'."\n";

echo '<div id="pageright">'."\n";
*/
echo '<div id="pagecentre">'."\n";


if(!empty($_GET['action'])){
switch($_GET['action']){




case 'edit':
edit($fch_id,$err);
break;




case 'add':
add_fiche($err);
break;





    case 'act_on':

$sql = "UPDATE " .$table_fiches. " SET fch_activation = 'active' WHERE fch_id = '$fch_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

Fiches();
    break;


    case 'act_off':

$sql = "UPDATE " .$table_fiches. " SET fch_activation = 'nonactive' WHERE fch_id = '$fch_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

Fiches();
		break;





    case 'stat_norm':

$sql = "UPDATE " .$table_fiches. " SET fch_statut = 'cplt' WHERE fch_id = '$fch_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

Fiches();
    break;


    case 'stat_ec':

$sql = "UPDATE " .$table_fiches. " SET fch_statut = 'ec' WHERE fch_id = '$fch_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

Fiches();
		break;





    case 'pos_une':
    
$sqlu = "SELECT * FROM " .$table_fiches. " WHERE fch_une = 'une' "; 
$requ = mysql_query($sqlu) or die('Erreur SQL !'.$sqlu.'<br>'.mysql_error());
$resu = mysql_num_rows($requ);

if($resu){
$sqlr = "UPDATE " .$table_fiches. " SET fch_une = 'normal' WHERE fch_une = 'une'" or die ("erreur"); 
mysql_query($sqlr) or die('Erreur SQL !'.$sqlr.'<br>'.mysql_error());
}

$sql = "UPDATE " .$table_fiches. " SET fch_une = 'une' WHERE fch_id = '$fch_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

Fiches();
    break;


    case 'pos_norm':

$sql = "UPDATE " .$table_fiches. " SET fch_une = 'normal' WHERE fch_id = '$fch_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

Fiches();
		break;




case 'del_fiche_img':

$sql = "SELECT * FROM " .$table_fiches. " WHERE fch_id = '$fch_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_fetch_array($req);

$fch_img = $res['fch_img'];

$chemin = '../files/fiches';
unlink($chemin."/".$fch_img);

$sql = "UPDATE " .$table_fiches. " SET fch_img = '' WHERE fch_id = '$fch_id'" or die ("erreur");
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

edit($fch_id,$err);

break;






    case 'rec_add':

extract($_POST,EXTR_OVERWRITE);

if(empty($fch_titre)) 
{
$err = '<p align="center"><font color="red">Attention, il y a un champ vide !<br /><br /></font></p>'."\n";
add_fiche($err);
} else {


////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_FILES['img']['name']) {
$dest_dossier = "../files/fiches/";
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
}
////////////////////////////////////////////////////////////////////////////////////////////////////////

if($fch_une == 'une'){
$sql = "SELECT * FROM " .$table_fiches. " WHERE fch_une = 'une' "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

if($res){
$sqlu = "UPDATE " .$table_fiches. " SET fch_une = 'normal' WHERE fch_une = 'une'" or die ("erreur"); 
mysql_query($sqlu) or die('Erreur SQL !'.$sqlu.'<br>'.mysql_error());
}
}


$fch_date = date("Y-m-d");
$fch_heure = date("H\hi");

$fch_titre = AddSlashes($fch_titre);
$fch_texte = AddSlashes($fch_texte);
$fch_lien = AddSlashes($fch_lien);

$sql = "INSERT INTO " .$table_fiches. "(fch_id, fch_titre, fch_texte, fch_lien, fch_img, fch_date, fch_heure, fch_statut, fch_activation, fch_une
) VALUES 
('','$fch_titre','$fch_texte','$fch_lien','$img','$fch_date','$fch_heure','$fch_statut','$fch_activation','$fch_une')";
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<p align="center"><br/><b>Fiche ajoutée avec succès !</b></p>';
echo '<p align="center"><br/><a href="gs_fiches.php"><img src="images/boutons/b_back.gif" border="0" alt="Retour" title="Retour"></a></p>'."\n";

}
    break;






    case 'rec_edit':

extract($_POST,EXTR_OVERWRITE);

if(empty($fch_titre)){
$err = '<p align="center"><font color="red">Attention, il y a un champ vide !<br /><br /></font></p>'."\n";
edit($fch_id,$err);
} else {

$sql = "SELECT * FROM " .$table_fiches. " WHERE fch_id = '$fch_id' "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);
if($res){
$row = mysql_fetch_array($req);

echo '<h1><a href="gs_fiches.php">Liste des fiches</a> > Modification de '.$fch_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_fiches.php">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";
}


////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_FILES['img']['name']) {
$dest_dossier = "../files/fiches/";
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
$sql = "UPDATE " .$table_fiches. " SET fch_img = '$img' WHERE fch_id = '$fch_id'" or die ("erreur");
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
}
////////////////////////////////////////////////////////////////////////////////////////////////////////

$fch_titre = AddSlashes($fch_titre);
$fch_texte = AddSlashes($fch_texte);
$fch_lien = AddSlashes($fch_lien);

$sql = "UPDATE " .$table_fiches. " SET fch_titre = '$fch_titre', fch_texte = '$fch_texte', fch_lien = '$fch_lien'
 WHERE fch_id = '$fch_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<p align="center"><br /><br /><b>Fiche éditée avec succès !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="gs_fiches.php"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
}
    break;





    case 'del':

$sql = "SELECT * FROM " .$table_fiches. " WHERE fch_id = '$fch_id' "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);
if($res){
$row = mysql_fetch_array($req);

$fch_id = $row['fch_id'];
$fch_titre = $row['fch_titre'];
$fch_img = $row['fch_img'];

echo '<h1><a href="gs_fiches.php">Liste des fiches</a> > Suppression de '.$fch_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_fiches.php">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";
}

if (isset($_GET["confirm"])) $confirm = $_GET["confirm"];
else $confirm="";

switch($confirm)
    {
    case 'av':
echo '<p align="center"><br/><br/>Voulez-vous supprimer la fiche <b>'.$fch_titre.'</b> ?<br/><br/></p>';
echo '<p align="center"><a href="gs_fiches.php?action=del&fch_id='.$fch_id.'&confirm=oui"><img src="images/boutons/b_oui.jpg"></a> <a href="javascript:window.history.go(-1)"><img src="images/boutons/b_non.jpg"></a></p>';
break;

    case 'oui':

if($fch_img){
$chemin = '../files/fiches';
unlink($chemin."/".$fch_img);
}

mysql_query("DELETE FROM " .$table_fiches. " WHERE fch_id='$fch_id'") or die("</br>Erreur de suppression");

echo '<p align="center"><br /><br /><b>Fiche supprimée avec succès !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="gs_fiches.php"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";

break;

default: 
echo '<p>Erreur de traitement</p>'; 
break;
    }
    break;



default:
Fiches();
break;
}




} else {
Fiches();
}


echo '</div>'."\n";

include("inc/footer.inc.php");
?>