<?php
include("inc/header.inc.php");


if(!isset($_SESSION['pseudo'])) {
echo '<p><font color="red">Vous n\'avez pas accËs ‡ ce service.<br />Merci de votre visite.</font></p>'."\n";
echo '</div>'."\n";
include("inc/footer.inc.php");
  exit;
}

if($_SESSION['user_access'] >= 3) {
echo '<p><font color="red">Vous n\'avez pas accËs ‡ ce service.<br />Merci de votre visite.</font></p>'."\n";
echo '</div>'."\n";
include("inc/footer.inc.php");
exit;
}

if (isset($_GET["part_id"])) $part_id = $_GET["part_id"];
else $part_id="";
if (isset($_GET["position"])) $position = $_GET["position"];
else $position="";



function partenaires() {
include ("conf.ig.php");
echo '<h1>Liste des partenaires</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="partenaires.php?action=add">+ Ajouter un partenaire</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

$sql = "SELECT * FROM " .$table_partenaires. " ORDER BY part_position "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

if($res){

echo '<table>'."\n";
echo '<tr>'."\n";
echo '<th class="cat_position">Position</th>'."\n";
echo '<th class="cat_titre">Partenaires</th>'."\n";
echo '<th class="cat_options">Image</th>'."\n";
echo '<th class="cat_options">Activation</th>'."\n";
echo '<th class="cat_options">Editer</th>'."\n";
echo '<th class="cat_options">Supprimer</th>'."\n";
echo '</tr>'."\n";

while($row = mysql_fetch_array($req)) {

$part_id = $row['part_id'];
$part_titre = $row['part_titre'];
$part_texte = $row['part_texte'];
$part_lien = $row['part_lien'];
$part_img = $row['part_img'];
$part_activation = $row['part_activation'];
$position = $row['part_position'];

if ($grrr%2 == 1) {
$youp = 'class="row1" onmouseover="this.className="row1hover";" onmouseout="this.className="row1";"'; //impair
} else {
$youp = 'class="row2" onmouseover="this.className="row2hover";" onmouseout="this.className="row2";"'; }

echo '<tr '.$youp.'>'."\n";

if ($res == 1) {
echo '<td class="cat_position"></td>'."\n";
} elseif ($position == 1) {
echo '<td class="cat_position"><a href="partenaires.php?action=moved&part_id='.$part_id.'&position='.$position.'"><img src="images/icones/bullet_arrow_bottom.png" alt="Descendre" title="Descendre"></a></td>'."\n";
} elseif ($position == $res) {
echo '<td class="cat_position"><a href="partenaires.php?action=moveup&part_id='.$part_id.'&position='.$position.'"><img src="images/icones/bullet_arrow_top.png" alt="Monter" title="Monter"></a></td>'."\n";
} else {
echo '<td class="cat_position"><a href="partenaires.php?action=moveup&part_id='.$part_id.'&position='.$position.'"><img src="images/icones/bullet_arrow_top.png" alt="Monter" title="Monter"></a> <a href="partenaires.php?action=moved&part_id='.$part_id.'&position='.$position.'"><img src="images/icones/bullet_arrow_bottom.png" alt="Descendre" title="Descendre"></a></td>'."\n";
}

echo '<td class="cat_titre"><b>'.$part_titre.'</b></td>'."\n";

if($part_img){
echo '<td class="cat_options"><img src="images/icones/images.png" title="Contient une image" alt="Contient une image"></td>'."\n";
} else {
echo '<td class="cat_options"></td>'."\n";
}

if($part_activation == 'nonactive'){
$trans_active = '<a href="partenaires.php?action=act_on&part_id='.$part_id.'"><img src="images/icones/off.gif" title="Activer le partenaire" alt="Activer le partenaire"></a>';
} else {
$trans_active = '<a href="partenaires.php?action=act_off&part_id='.$part_id.'"><img src="images/icones/on.gif" title="DÈsactiver le partenaire" alt="DÈsactiver le partenaire"></a>';
}
echo '<td class="cat_options">'.$trans_active.'</td>'."\n";

echo '<td class="cat_options"><a href="partenaires.php?action=edit&part_id='.$part_id.'"><img src="images/icones/pencil.png" title="Editer le partenaire" alt="Editer le partenaire"></a></td>'."\n";
echo '<td class="cat_options"><a href="partenaires.php?action=del&part_id='.$part_id.'&confirm=av"><img src="images/icones/cross.png" title="Supprimer le partenaire" alt="Supprimer le partenaire"></a></td>'."\n";
echo '</tr>'."\n";

$grrr = $grrr + 1;
}

echo '</table>'."\n";
} else {
echo '<p>Aucun partenaire...</p>'."\n";
}
}




function edit($part_id,$err) {
include ("conf.ig.php");
$sql = "SELECT * FROM " .$table_partenaires. " WHERE part_id = '$part_id' "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);
if($res){
$row = mysql_fetch_array($req);

$part_titre = $row['part_titre'];
$part_texte = $row['part_texte'];
$part_lien = $row['part_lien'];
$part_img = $row['part_img'];

echo '<h1><a href="partenaires.php">Liste des partenaires</a> > Editer un partenaire</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="partenaires.php">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

echo '<div id="form">'."\n";
echo '<form action="partenaires.php?action=rec_edit&part_id='.$part_id.'" method="post" enctype="multipart/form-data">'."\n";
echo '<input type="hidden" name="MAX_FILE_SIZE" value="8000000">'."\n";

if($err) { echo $err; }

echo '<h5>Nom du partenaire</h5>'."\n";
echo '<p><input type="text" name="part_titre" maxlength="80" size="32" value="'.$part_titre.'"></p>'."\n";

echo '<h5>Lien vers le site Internet</h5>'."\n";
echo '<p><input type="text" name="part_lien" maxlength="500" size="32" value="'.$part_lien.'"></p>'."\n";

echo '<h5>Image</h5>'."\n";
if($part_img){
echo '<p><img src="../files/partenaires/'.$part_img.'"></p>'."\n";
echo '<p>[ <a href="partenaires.php?action=del_img&part_id='.$part_id.'">Supprimer l\'image</a> ]</p>'."\n";
} else {
echo '<p><input class="text" type="file" name="img" /></p>'."\n";
}

/*
echo '<h5>Description</h5>'."\n";
echo '<p><textarea cols="60" id="part_texte" name="part_texte" rows="10" >'.$part_texte.'</textarea></p>'."\n";
*/
echo '<p><input type="image" class="envoy" src="images/boutons/b_suite.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";
}
}




function add_part($err) {
include ("conf.ig.php");

echo '<h1><a href="partenaires.php">Liste des partenaires</a> > Ajout d\'un partenaire</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="partenaires.php">< Retour</a></li>'."\n";
echo '<li><a href="partenaires.php?action=add">+ Ajouter un partenaire</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

if($err){
echo $err;
}

echo '<div id="form">'."\n";
echo '<form action="partenaires.php?action=rec" method="post" enctype="multipart/form-data">'."\n";
echo '<input type="hidden" name="MAX_FILE_SIZE" value="8000000">'."\n";

echo '<h5>Nom du partenaire</h5>'."\n";
echo '<p><input type="text" name="part_titre" maxlength="80" size="32"></p>'."\n";

echo '<h5>Lien vers le site Internet</h5>'."\n";
echo '<p><input type="text" name="part_lien" maxlength="500" size="32"></p>'."\n";

echo '<h5>Image</h5>'."\n";
echo '<p><input class="text" type="file" name="img" /></p>'."\n";

/*
echo '<h5>Description</h5>'."\n";
echo '<p><textarea cols="60" id="part_texte" name="mod_texte" rows="10" ></textarea></p>'."\n";
*/

echo '<p><input type="image" class="envoy" src="images/boutons/b_suite.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";

}

/////////////////////////////////////////////////////////////////////////////////////////////////





echo '<div id="pageleft">'."\n";
echo '</div>'."\n";

echo '<div id="pageright">'."\n";


if(!empty($_GET['action'])){
switch($_GET['action']){




case 'edit':
edit($part_id,$err);
break;




case 'rec_edit':

extract($_POST,EXTR_OVERWRITE);

if(empty($part_titre)) 
{
$err = '<p align="center"><font color="red">Attention, vous devez indiquer le nom du partenaire !<br /><br /></font></p>'."\n";
edit($part_id,$err);
} else {


////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_FILES['img']['name']) {
$dest_dossier = "../files/partenaires/";
$img = $_FILES['img']['name'];

$extensions_ok = array('gif', 'jpg', 'jpeg', 'GIF', 'JPG', 'JPEG', 'png', 'PNG', 'Png');
$taille_max = 8000000;
$dest_fichier = basename($_FILES['img']['name']);
$dest_fichier = strtr($dest_fichier, '¿¡¬√ƒ≈«»… ÀÃÕŒœ“”‘’÷Ÿ⁄€‹›‡·‚„‰ÂÁËÈÍÎÏÌÓÔÚÛÙıˆ˘˙˚¸˝ˇ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
$dest_fichier = preg_replace('/([^.a-z0-9]+)/i', '_', $dest_fichier);

$img = $dest_fichier;
$extension = explode(".", $img);
$nom_img = time();
$img = $nom_img.'.'.$extension[1];
$dest_fichier = $img;


if(!in_array( substr(strrchr($_FILES['img']['name'], '.'), 1), $extensions_ok ) ){
echo '<p align="center">Veuillez sÈlectionner un fichier de type gif ou jpg !</p>';
echo '<p align="center"><a href="partenaires.php?action=edit&part_id='.$part_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
exit();
} elseif( file_exists($_FILES['img']['tmp_name']) and filesize($_FILES['img']['tmp_name']) > $taille_max){
echo '<p align="center">Votre fichier doit faire moins de 4Mo !</p>';
echo '<p align="center"><a href="partenaires.php?action=edit&part_id='.$part_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
exit();
} else {
move_uploaded_file($_FILES['img']['tmp_name'], $dest_dossier . $dest_fichier);


$taille_max = 60;
list($largeur, $hauteur, $type, $attr) = getimagesize($dest_dossier.$img);

$haut_miniature = $taille_max;
$ratio = $taille_max / $hauteur;
$larg_miniature = $largeur * $ratio;

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
$sql = "UPDATE " .$table_partenaires. " SET part_img = '$img' WHERE part_id = '$part_id'" or die ("erreur");
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
}
////////////////////////////////////////////////////////////////////////////////////////////////////////

$part_titre = AddSlashes($part_titre);

$sql = "UPDATE " .$table_partenaires. " SET part_titre = '$part_titre', part_texte = '$part_texte', part_lien = '$part_lien' WHERE part_id = '$part_id'" or die ("erreur");
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<p align="center"><br/><b>Partenaire ÈditÈ avec succËs !</b></p>';
echo '<p align="center"><br/><a href="partenaires.php"><img src="images/boutons/b_back.gif" border="0" alt="Retour" title="Retour"></a></p>'."\n";
}

break;




case 'add':
add_part($err);
break;






    case 'rec':

extract($_POST,EXTR_OVERWRITE);

if(empty($part_titre)) 
{
$err = '<p align="center"><font color="red">Attention, vous devez indiquer le nom du partenaire !<br /><br /></font></p>'."\n";
add_part($err);
} else {


////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_FILES['img']['name']) {
$dest_dossier = "../files/partenaires/";
$img = $_FILES['img']['name'];

$extensions_ok = array('gif', 'jpg', 'jpeg', 'GIF', 'JPG', 'JPEG', 'png', 'PNG', 'Png');
$taille_max = 8000000;
$dest_fichier = basename($_FILES['img']['name']);
$dest_fichier = strtr($dest_fichier, '¿¡¬√ƒ≈«»… ÀÃÕŒœ“”‘’÷Ÿ⁄€‹›‡·‚„‰ÂÁËÈÍÎÏÌÓÔÚÛÙıˆ˘˙˚¸˝ˇ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
$dest_fichier = preg_replace('/([^.a-z0-9]+)/i', '_', $dest_fichier);

$img = $dest_fichier;
$extension = explode(".", $img);
$nom_img = time();
$img = $nom_img.'.'.$extension[1];
$dest_fichier = $img;


if(!in_array( substr(strrchr($_FILES['img']['name'], '.'), 1), $extensions_ok ) ){
echo '<p align="center">Veuillez sÈlectionner un fichier de type gif ou jpg !</p>';
echo '<p align="center"><a href="partenaires.php?action=add"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
exit();
} elseif( file_exists($_FILES['img']['tmp_name']) and filesize($_FILES['img']['tmp_name']) > $taille_max){
echo '<p align="center">Votre fichier doit faire moins de 4Mo !</p>';
echo '<p align="center"><a href="partenaires.php?action=add"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
exit();
} else {
move_uploaded_file($_FILES['img']['tmp_name'], $dest_dossier . $dest_fichier);


$taille_max = 60;
list($largeur, $hauteur, $type, $attr) = getimagesize($dest_dossier.$img);

$haut_miniature = $taille_max;
$ratio = $taille_max / $hauteur;
$larg_miniature = $largeur * $ratio;

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

$part_titre = AddSlashes($part_titre);

$sql = "SELECT part_id, part_position FROM " .$table_partenaires. "  ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

$position = ($res + 1);


$sql = "INSERT INTO " .$table_partenaires. "(part_id, part_titre, part_texte, part_lien, part_img, part_activation, part_position) VALUES 
('','$part_titre','$part_texte','$part_lien','$img','active','$position')";
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<p align="center"><br/><b>Partenaire ajoutÈ avec succËs !</b></p>';
echo '<p align="center"><br/><a href="partenaires.php"><img src="images/boutons/b_back.gif" border="0" alt="Retour" title="Retour"></a></p>'."\n";
}
    break;




case 'del_img':

$sql = "SELECT * FROM " .$table_partenaires. " WHERE part_id = '$part_id' "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sqlb.'<br>'.mysql_error());
$row = mysql_fetch_array($req);
$part_img = $row['part_img'];

mysql_query("UPDATE " .$table_partenaires. " SET part_img = '' WHERE part_id = '$part_id' ") or die("</br>Erreur de suppression");

$chemin = '../files/partenaires';
unlink($chemin."/".$part_img);

edit($part_id,$err);

break;





    case 'act_on':
$sql = "UPDATE " .$table_partenaires. " SET part_activation = 'active' WHERE part_id = '$part_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

partenaires();
    break;





    case 'act_off':
$sql = "UPDATE " .$table_partenaires. " SET part_activation = 'nonactive' WHERE part_id = '$part_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

partenaires();
		break;





    case 'moveup':
if ($position == 1) {
echo 'Deja en 1ere position';
partenaires();
} else {
$sql = "SELECT part_position FROM " .$table_partenaires. "";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

$position_tmp = ($res + 1);
$position_up = ($position + 1);
$position_d = $position - 1;

$sql = "UPDATE " .$table_partenaires. " SET part_position = '$position_tmp' WHERE part_position = '$position'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());	
$sql = "UPDATE " .$table_partenaires. " SET part_position = '$position' WHERE part_position = '$position_d'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());    
$sql = "UPDATE " .$table_partenaires. " SET part_position = '$position_d' WHERE part_position = '$position_tmp'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

partenaires();
}
    break;





    case 'moved': 
$sql = "SELECT part_position FROM " .$table_partenaires. "";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

if ($position == $res) {
echo 'Deja en derniere position';
partenaires();
} else {
$position_tmp = ($res + 1); 
$position_up = ($position - 1);
$position_d = $position + 1;

$sql = "UPDATE " .$table_partenaires. " SET part_position = '$position_tmp' WHERE part_position = '$position'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());	
$sql = "UPDATE " .$table_partenaires. " SET part_position = '$position' WHERE part_position = '$position_d'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());    
$sql = "UPDATE " .$table_partenaires. " SET part_position = '$position_d' WHERE part_position = '$position_tmp'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

partenaires();
}
    break;





    case 'del':

echo '<h1><a href="partenaires.php">Liste des partenaires</a> > Supprimer un partenaire</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="partenaires.php">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

if (isset($_GET["confirm"])) $confirm = $_GET["confirm"];
else $confirm="";

$sql = "SELECT * FROM " .$table_partenaires. " WHERE part_id = '$part_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_fetch_array($req);

$part_titre = $res['part_titre'];
$part_img = $res['part_img'];
$part_position = $res['part_position'];

switch($confirm)
    {
    case 'av':
echo '<p align="center"><br/><br/>Voulez-vous supprimer le partenaire <b>'.$part_titre.'</b> ?<br/><br/></p>';
echo '<p align="center"><a href="partenaires.php?action=del&part_id='.$part_id.'&confirm=oui"><img src="images/boutons/b_oui.jpg"></a> <a href="javascript:window.history.go(-1)"><img src="images/boutons/b_non.jpg"></a></p>';
break;

    case 'oui':

if($part_img){
$chemin = '../files/partenaires';
unlink($chemin."/".$part_img);
}

$sql = "SELECT part_id FROM " .$table_partenaires. " ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

if ($res==1) {
mysql_query("DELETE FROM " .$table_partenaires. " WHERE part_id = '$part_id' ") or die("</br>Erreur de suppression");
} elseif ($res==$position) {
mysql_query("DELETE FROM " .$table_partenaires. " WHERE part_id = '$part_id' ") or die("</br>Erreur de suppression");
} else {
$i = $position;
while($i != $res) {
$hop = $i - 1;
mysql_query("UPDATE " .$table_partenaires. " SET part_position = '$hop' WHERE part_position = '$i' ") or die("</br>Erreur de suppression");
$i++;
}
$hop2 = $res - 1;
mysql_query("UPDATE " .$table_partenaires. " SET part_position = '$hop2' WHERE part_position = '$res' ") or die("</br>Erreur de suppression");
mysql_query("DELETE FROM " .$table_partenaires. " WHERE part_id = '$part_id' ") or die("</br>Erreur de suppression");
}
 
echo '<p align="center"><br /><br /><b>Partenaire supprimÈ avec succËs !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="partenaires.php"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";

break;

default: 
echo '<p>Erreur de traitement</p>'; 
break;
    }
    break;



default:
partenaires();
break;
}




} else {
partenaires();
}


echo '</div>'."\n";

include("inc/footer.inc.php");
?>