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

if (isset($_GET["sn_id"])) $sn_id = $_GET["sn_id"];
else $sn_id="";
if (isset($_GET["position"])) $position = $_GET["position"];
else $position="";



function networks() {
include ("conf.ig.php");
echo '<h1>Liste des liens</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="socialnetworks.php?action=add">+ Ajouter un lien</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

$sql = "SELECT * FROM " .$table_networks. " ORDER BY sn_position "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

if($res){

echo '<table>'."\n";
echo '<tr>'."\n";
echo '<th class="cat_position">Position</th>'."\n";
echo '<th class="cat_titre">Titre</th>'."\n";
echo '<th class="cat_options">Image</th>'."\n";
echo '<th class="cat_options">Activation</th>'."\n";
echo '<th class="cat_options">Editer</th>'."\n";
echo '<th class="cat_options">Supprimer</th>'."\n";
echo '</tr>'."\n";

while($row = mysql_fetch_array($req)) {

$sn_id = $row['sn_id'];
$sn_titre = $row['sn_titre'];
$sn_texte = $row['sn_texte'];
$sn_lien = $row['sn_lien'];
$sn_img = $row['sn_img'];
$sn_activation = $row['sn_activation'];
$position = $row['sn_position'];

if ($grrr%2 == 1) {
$youp = 'class="row1" onmouseover="this.className="row1hover";" onmouseout="this.className="row1";"'; //impair
} else {
$youp = 'class="row2" onmouseover="this.className="row2hover";" onmouseout="this.className="row2";"'; }

echo '<tr '.$youp.'>'."\n";

if ($res == 1) {
echo '<td class="cat_position"></td>'."\n";
} elseif ($position == 1) {
echo '<td class="cat_position"><a href="socialnetworks.php?action=moved&sn_id='.$sn_id.'&position='.$position.'"><img src="images/icones/bullet_arrow_bottom.png" alt="Descendre" title="Descendre"></a></td>'."\n";
} elseif ($position == $res) {
echo '<td class="cat_position"><a href="socialnetworks.php?action=moveup&sn_id='.$sn_id.'&position='.$position.'"><img src="images/icones/bullet_arrow_top.png" alt="Monter" title="Monter"></a></td>'."\n";
} else {
echo '<td class="cat_position"><a href="socialnetworks.php?action=moveup&sn_id='.$sn_id.'&position='.$position.'"><img src="images/icones/bullet_arrow_top.png" alt="Monter" title="Monter"></a> <a href="socialnetworks.php?action=moved&sn_id='.$sn_id.'&position='.$position.'"><img src="images/icones/bullet_arrow_bottom.png" alt="Descendre" title="Descendre"></a></td>'."\n";
}

echo '<td class="cat_titre"><b>'.$sn_titre.'</b></td>'."\n";

if($sn_img){
echo '<td class="cat_options"><img src="../files/images/'.$sn_img.'" title="Contient une image" alt="Contient une image"></td>'."\n";
} else {
echo '<td class="cat_options"></td>'."\n";
}

if($sn_activation == 'nonactive'){
$trans_active = '<a href="socialnetworks.php?action=act_on&sn_id='.$sn_id.'"><img src="images/icones/off.gif" title="Activer le lien" alt="Activer le lien"></a>';
} else {
$trans_active = '<a href="socialnetworks.php?action=act_off&sn_id='.$sn_id.'"><img src="images/icones/on.gif" title="DÈsactiver le lien" alt="DÈsactiver le lien"></a>';
}
echo '<td class="cat_options">'.$trans_active.'</td>'."\n";

echo '<td class="cat_options"><a href="socialnetworks.php?action=edit&sn_id='.$sn_id.'"><img src="images/icones/pencil.png" title="Editer le lien" alt="Editer le lien"></a></td>'."\n";
echo '<td class="cat_options"><a href="socialnetworks.php?action=del&sn_id='.$sn_id.'&confirm=av"><img src="images/icones/cross.png" title="Supprimer le lien" alt="Supprimer le lien"></a></td>'."\n";
echo '</tr>'."\n";

$grrr = $grrr + 1;
}

echo '</table>'."\n";
} else {
echo '<p>Aucun lien...</p>'."\n";
}
}




function edit($sn_id,$err) {
include ("conf.ig.php");
$sql = "SELECT * FROM " .$table_networks. " WHERE sn_id = '$sn_id' "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);
if($res){
$row = mysql_fetch_array($req);

$sn_titre = $row['sn_titre'];
$sn_texte = $row['sn_texte'];
$sn_lien = $row['sn_lien'];
$sn_img = $row['sn_img'];

echo '<h1><a href="socialnetworks.php">Liste des liens</a> > Editer un lien</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="socialnetworks.php">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

echo '<div id="form">'."\n";
echo '<form action="socialnetworks.php?action=rec_edit&sn_id='.$sn_id.'" method="post" enctype="multipart/form-data">'."\n";
echo '<input type="hidden" name="MAX_FILE_SIZE" value="8000000">'."\n";

if($err) { echo $err; }

echo '<h5>Nom du lien</h5>'."\n";
echo '<p><input type="text" name="sn_titre" maxlength="80" size="32" value="'.$sn_titre.'"></p>'."\n";

echo '<h5>Lien vers le site Internet</h5>'."\n";
echo '<p><input type="text" name="sn_lien" maxlength="500" size="32" value="'.$sn_lien.'"></p>'."\n";

echo '<h5>Image (taille: 30x30)</h5>'."\n";
if($sn_img){
echo '<p><img src="../files/images/'.$sn_img.'"></p>'."\n";
echo '<p>[ <a href="socialnetworks.php?action=del_img&sn_id='.$sn_id.'">Supprimer l\'image</a> ]</p>'."\n";
} else {
echo '<p><input class="text" type="file" name="img" /></p>'."\n";
}

/*
echo '<h5>Description</h5>'."\n";
echo '<p><textarea cols="60" id="sn_texte" name="sn_texte" rows="10" >'.$sn_texte.'</textarea></p>'."\n";
*/
echo '<p><input type="image" class="envoy" src="images/boutons/b_suite.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";
}
}




function add_part($err) {
include ("conf.ig.php");

echo '<h1><a href="socialnetworks.php">Liste des liens</a> > Ajout d\'un lien</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="socialnetworks.php">< Retour</a></li>'."\n";
echo '<li><a href="socialnetworks.php?action=add">+ Ajouter un lien</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

if($err){
echo $err;
}

echo '<div id="form">'."\n";
echo '<form action="socialnetworks.php?action=rec" method="post" enctype="multipart/form-data">'."\n";
echo '<input type="hidden" name="MAX_FILE_SIZE" value="8000000">'."\n";

echo '<h5>Nom du lien</h5>'."\n";
echo '<p><input type="text" name="sn_titre" maxlength="80" size="32"></p>'."\n";

echo '<h5>Lien vers le site Internet</h5>'."\n";
echo '<p><input type="text" name="sn_lien" maxlength="500" size="32"></p>'."\n";

echo '<h5>Image (taille: 30x30)</h5>'."\n";
echo '<p><input class="text" type="file" name="img" /></p>'."\n";

/*
echo '<h5>Description</h5>'."\n";
echo '<p><textarea cols="60" id="sn_texte" name="mod_texte" rows="10" ></textarea></p>'."\n";
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
edit($sn_id,$err);
break;




case 'rec_edit':

extract($_POST,EXTR_OVERWRITE);

if(empty($sn_titre)) 
{
$err = '<p align="center"><font color="red">Attention, vous devez indiquer le nom du lien !<br /><br /></font></p>'."\n";
edit($sn_id,$err);
} else {


////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_FILES['img']['name']) {
$dest_dossier = "../files/images/";
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
echo '<p align="center"><a href="socialnetworks.php?action=edit&sn_id='.$sn_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
exit();
} elseif( file_exists($_FILES['img']['tmp_name']) and filesize($_FILES['img']['tmp_name']) > $taille_max){
echo '<p align="center">Votre fichier doit faire moins de 4Mo !</p>';
echo '<p align="center"><a href="socialnetworks.php?action=edit&sn_id='.$sn_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
exit();
} else {
move_uploaded_file($_FILES['img']['tmp_name'], $dest_dossier . $dest_fichier);
}
$sql = "UPDATE " .$table_networks. " SET sn_img = '$img' WHERE sn_id = '$sn_id'" or die ("erreur");
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
}
////////////////////////////////////////////////////////////////////////////////////////////////////////

$sn_titre = AddSlashes($sn_titre);

$sql = "UPDATE " .$table_networks. " SET sn_titre = '$sn_titre', sn_texte = '$sn_texte', sn_lien = '$sn_lien' WHERE sn_id = '$sn_id'" or die ("erreur");
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<p align="center"><br/><b>Lien ÈditÈ avec succËs !</b></p>';
echo '<p align="center"><br/><a href="socialnetworks.php"><img src="images/boutons/b_back.gif" border="0" alt="Retour" title="Retour"></a></p>'."\n";
}

break;




case 'add':
add_part($err);
break;






    case 'rec':

extract($_POST,EXTR_OVERWRITE);

if(empty($sn_titre)) 
{
$err = '<p align="center"><font color="red">Attention, vous devez indiquer le nom du lien !<br /><br /></font></p>'."\n";
add_part($err);
} else {


////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_FILES['img']['name']) {
$dest_dossier = "../files/images/";
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
echo '<p align="center"><a href="socialnetworks.php?action=add"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
exit();
} elseif( file_exists($_FILES['img']['tmp_name']) and filesize($_FILES['img']['tmp_name']) > $taille_max){
echo '<p align="center">Votre fichier doit faire moins de 4Mo !</p>';
echo '<p align="center"><a href="socialnetworks.php?action=add"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
exit();
} else {
move_uploaded_file($_FILES['img']['tmp_name'], $dest_dossier . $dest_fichier);
}
}
////////////////////////////////////////////////////////////////////////////////////////////////////////

$sn_titre = AddSlashes($sn_titre);

$sql = "SELECT sn_id, sn_position FROM " .$table_networks. "  ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

$position = ($res + 1);


$sql = "INSERT INTO " .$table_networks. "(sn_id, sn_titre, sn_texte, sn_lien, sn_img, sn_activation, sn_position) VALUES 
('','$sn_titre','$sn_texte','$sn_lien','$img','active','$position')";
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<p align="center"><br/><b>Lien ajoutÈ avec succËs !</b></p>';
echo '<p align="center"><br/><a href="socialnetworks.php"><img src="images/boutons/b_back.gif" border="0" alt="Retour" title="Retour"></a></p>'."\n";
}
    break;




case 'del_img':

$sql = "SELECT * FROM " .$table_networks. " WHERE sn_id = '$sn_id' "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sqlb.'<br>'.mysql_error());
$row = mysql_fetch_array($req);
$sn_img = $row['sn_img'];

mysql_query("UPDATE " .$table_networks. " SET sn_img = '' WHERE sn_id = '$sn_id' ") or die("</br>Erreur de suppression");

$chemin = '../files/images';
unlink($chemin."/".$sn_img);

edit($sn_id,$err);

break;





    case 'act_on':
$sql = "UPDATE " .$table_networks. " SET sn_activation = 'active' WHERE sn_id = '$sn_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

networks();
    break;





    case 'act_off':
$sql = "UPDATE " .$table_networks. " SET sn_activation = 'nonactive' WHERE sn_id = '$sn_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

networks();
		break;





    case 'moveup':
if ($position == 1) {
echo 'Deja en 1ere position';
networks();
} else {
$sql = "SELECT sn_position FROM " .$table_networks. "";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

$position_tmp = ($res + 1);
$position_up = ($position + 1);
$position_d = $position - 1;

$sql = "UPDATE " .$table_networks. " SET sn_position = '$position_tmp' WHERE sn_position = '$position'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());	
$sql = "UPDATE " .$table_networks. " SET sn_position = '$position' WHERE sn_position = '$position_d'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());    
$sql = "UPDATE " .$table_networks. " SET sn_position = '$position_d' WHERE sn_position = '$position_tmp'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

networks();
}
    break;





    case 'moved': 
$sql = "SELECT sn_position FROM " .$table_networks. "";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

if ($position == $res) {
echo 'Deja en derniere position';
networks();
} else {
$position_tmp = ($res + 1); 
$position_up = ($position - 1);
$position_d = $position + 1;

$sql = "UPDATE " .$table_networks. " SET sn_position = '$position_tmp' WHERE sn_position = '$position'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());	
$sql = "UPDATE " .$table_networks. " SET sn_position = '$position' WHERE sn_position = '$position_d'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());    
$sql = "UPDATE " .$table_networks. " SET sn_position = '$position_d' WHERE sn_position = '$position_tmp'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

networks();
}
    break;





    case 'del':

echo '<h1><a href="socialnetworks.php">Liste des liens</a> > Supprimer un lien</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="socialnetworks.php">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

if (isset($_GET["confirm"])) $confirm = $_GET["confirm"];
else $confirm="";

$sql = "SELECT * FROM " .$table_networks. " WHERE sn_id = '$sn_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_fetch_array($req);

$sn_titre = $res['sn_titre'];
$sn_img = $res['sn_img'];
$sn_position = $res['sn_position'];

switch($confirm)
    {
    case 'av':
echo '<p align="center"><br/><br/>Voulez-vous supprimer le lien <b>'.$sn_titre.'</b> ?<br/><br/></p>';
echo '<p align="center"><a href="socialnetworks.php?action=del&sn_id='.$sn_id.'&confirm=oui"><img src="images/boutons/b_oui.jpg"></a> <a href="javascript:window.history.go(-1)"><img src="images/boutons/b_non.jpg"></a></p>';
break;

    case 'oui':

if($sn_img){
$chemin = '../files/images';
unlink($chemin."/".$sn_img);
}

$sql = "SELECT sn_id FROM " .$table_networks. " ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

if ($res==1) {
mysql_query("DELETE FROM " .$table_networks. " WHERE sn_id = '$sn_id' ") or die("</br>Erreur de suppression");
} elseif ($res==$position) {
mysql_query("DELETE FROM " .$table_networks. " WHERE sn_id = '$sn_id' ") or die("</br>Erreur de suppression");
} else {
$i = $position;
while($i != $res) {
$hop = $i - 1;
mysql_query("UPDATE " .$table_networks. " SET sn_position = '$hop' WHERE sn_position = '$i' ") or die("</br>Erreur de suppression");
$i++;
}
$hop2 = $res - 1;
mysql_query("UPDATE " .$table_networks. " SET sn_position = '$hop2' WHERE sn_position = '$res' ") or die("</br>Erreur de suppression");
mysql_query("DELETE FROM " .$table_networks. " WHERE sn_id = '$sn_id' ") or die("</br>Erreur de suppression");
}
 
echo '<p align="center"><br /><br /><b>Lien supprimÈ avec succËs !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="socialnetworks.php"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";

break;

default: 
echo '<p>Erreur de traitement</p>'; 
break;
    }
    break;



default:
networks();
break;
}




} else {
networks();
}


echo '</div>'."\n";

include("inc/footer.inc.php");
?>