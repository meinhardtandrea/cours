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
if (isset($_GET["position"])) $position = $_GET["position"];
else $position="";

if (isset($_POST["rub_option1"])) $rub_option1 = $_POST["rub_option1"];
else $rub_option1="";
if (isset($_POST["rub_option2"])) $rub_option2 = $_POST["rub_option2"];
else $rub_option2="";
if (isset($_POST["rub_option3"])) $rub_option3 = $_POST["rub_option3"];
else $rub_option3="";

///////////Fonctions///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function aff_rub() {
include ("conf.ig.php");
echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_index.php?action=add_rub">+ Ajouter une rubrique</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

$sql = "SELECT * FROM " .$table_rub. " ORDER BY rub_position "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

if($res){
$grrr = 1;

if($res >= 7){
echo '<p><span class="err">Le nombre maximum de rubriques affichées est de 7.</span><br/><br/></p>'."\n";
}

echo '<table>'."\n";
echo '<tr>'."\n";
echo '<th class="cat_position">Position</th>'."\n";
echo '<th class="cat_titre">Titre</th>'."\n";
echo '<th class="cat_options">Activation</th>'."\n";
echo '<th class="cat_options">Affichage</th>'."\n";
echo '<th class="cat_options">Accès</th>'."\n";
echo '<th class="cat_options">Editer</th>'."\n";
echo '<th class="cat_options">Suppr.</th>'."\n";
echo '</tr>'."\n";

while($row = mysql_fetch_array($req)) {

if ($grrr%2 == 1) {
$youp = 'class="row1" onmouseover="this.className="row1hover";" onmouseout="this.className="row1";"'; //impair
} else {
$youp = 'class="row2" onmouseover="this.className="row2hover";" onmouseout="this.className="row2";"'; }

$rub_id = $row['rub_id'];
$rub_titre = $row['rub_titre'];
$rub_position = $row['rub_position'];
$rub_priv = $row['rub_priv'];
$rub_activation = $row['rub_activation'];
$rub_aff = $row['rub_aff'];
$position = $rub_position;

echo '<tr '.$youp.'>'."\n";

if ($res == 1) {
echo '<td class="cat_position"></td>'."\n";
} elseif ($position == 1) {
echo '<td class="cat_position"><a href="gs_index.php?action=moved&rub_id='.$rub_id.'&position='.$position.'"><img src="images/icones/bullet_arrow_bottom.png" alt="Descendre" title="Descendre"></a></td>'."\n";
} elseif ($position == $res) {
echo '<td class="cat_position"><a href="gs_index.php?action=moveup&rub_id='.$rub_id.'&position='.$position.'"><img src="images/icones/bullet_arrow_top.png" alt="Monter" title="Monter"></a></td>'."\n";
} else {
echo '<td class="cat_position"><a href="gs_index.php?action=moveup&rub_id='.$rub_id.'&position='.$position.'"><img src="images/icones/bullet_arrow_top.png" alt="Monter" title="Monter"></a> <a href="gs_index.php?action=moved&rub_id='.$rub_id.'&position='.$position.'"><img src="images/icones/bullet_arrow_bottom.png" alt="Descendre" title="Descendre"></a></td>'."\n";
}

echo '<td class="cat_titre"><b><a href="gs_modules.php?rub_id='.$rub_id.'">'.$rub_titre.'</a></b></td>'."\n";

if($rub_activation == 'nonactive'){
$trans_active = '<a href="gs_index.php?action=act_on&rub_id='.$rub_id.'"><img src="images/icones/off.gif" title="Activer la rubrique" alt="Activer la rubrique"></a>';
} else {
$trans_active = '<a href="gs_index.php?action=act_off&rub_id='.$rub_id.'"><img src="images/icones/on.gif" title="Désactiver la rubrique" alt="Désactiver la rubrique"></a>';
}
echo '<td class="cat_options">'.$trans_active.'</td>'."\n";

if($rub_aff == '2cols'){
$trans_aff = '<a href="gs_index.php?action=edit_rub&rub_id='.$rub_id.'"><img src="images/icones/aff_2col.png" title="Affichage en 2 colonnes" alt="Affichage en 2 colonnes"></a>';
} else {
$trans_aff = '<a href="gs_index.php?action=edit_rub&rub_id='.$rub_id.'"><img src="images/icones/aff_1col.png" title="Affichage en 1 colonne" alt="Affichage en 1 colonne"></a>';
}
echo '<td class="cat_options">'.$trans_aff.'</td>'."\n";

if($rub_priv == 'public'){
$trans_private = '<a href="gs_index.php?action=trans_private&rub_id='.$rub_id.'"><img src="images/icones/lock_open.png" title="Rendre privé" alt="Rendre privé"></a>';
} else {
$trans_private = '<a href="gs_index.php?action=trans_public&rub_id='.$rub_id.'"><img src="images/icones/lock.png" title="Rendre public" alt="Rendre public"></a>';
}
echo '<td class="cat_options">'.$trans_private.'</td>'."\n";

echo '<td class="cat_options"><a href="gs_index.php?action=edit_rub&rub_id='.$rub_id.'"><img src="images/icones/pencil.png" title="Editer la rubrique" alt="Editer la rubrique"></a></td>'."\n";
echo '<td class="cat_options"><a href="gs_index.php?action=del_rub&rub_id='.$rub_id.'&confirm=av"><img src="images/icones/cross.png" title="Supprimer la rubrique" alt="Supprimer la rubrique"></a></td>'."\n";
echo '</tr>'."\n";

$grrr = $grrr + 1;
}
echo '</table>'."\n";
} else {
echo '<p>Le site est actuellement complètement vide...</p>'."\n";
}
}




function Add_rubrique() {
echo '<div id="form">'."\n";
echo '<form action="gs_index.php?action=rec" method="post">'."\n";
?>
<h5>Titre</h5>
<p><input type="text" class="text" name="rub_titre" maxlength="80" size="20"><br/><span class="comment">(80 caractères au maximum)</span></p>

<h5>Activation</h5>
<p><input type="radio" name="rub_activation" value="active" id="4" checked="checked"/> <label class="radioCheck" for="4">Activer</label></p>
<p><input type="radio" name="rub_activation" value="nonactive" id="3"/> <label class="radioCheck" for="3">Désactiver</label></p>

<h5>Mode d'affichage</h5>
<p><input type="radio" name="rub_aff" value="1col" id="1" checked="checked"/> <label class="radioCheck" for="1">1 colonne</label></p>
<p><input type="radio" name="rub_aff" value="2cols" id="2"/> <label class="radioCheck" for="2">2 colonnes</label></p>

<p><input type="image" class="envoy" src="images/boutons/b_add2.gif"/></p>
</form>
</div>
<?php
}




function Edit_rub($rub_id) {
include ("conf.ig.php");
echo '<div id="form">'."\n";
echo '<form action="gs_index.php?action=edit_rec_rub&rub_id='.$rub_id.'" method="post">'."\n";

$sql = "SELECT * FROM " .$table_rub. " WHERE rub_id = '$rub_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$row = mysql_fetch_array($req);
$rub_titre = $row['rub_titre'];
$rub_aff = $row['rub_aff'];

echo '<h5>Titre</h5>'."\n";
echo '<p><input type="text" class="text" name="rub_titre" maxlength="80" size="40" value="'.$rub_titre.'"><br/>'."\n";
echo '<span class="comment">(80 caractères au maximum)</span></p>'."\n";
/*
echo '<h5>Mode d\'affichage</h5>'."\n";
if($rub_aff == '2cols'){
echo '<p><input type="radio" name="rub_aff" value="1col" id="1"/> <label class="radioCheck" for="1">1 colonne</label></p>'."\n";
echo '<p><input type="radio" name="rub_aff" value="2cols" id="2" checked="checked"/> <label class="radioCheck" for="2">2 colonnes</label></p>'."\n";
} else {
echo '<p><input type="radio" name="rub_aff" value="1col" id="1" checked="checked"/> <label class="radioCheck" for="1">1 colonne</label></p>'."\n";
echo '<p><input type="radio" name="rub_aff" value="2cols" id="2"/> <label class="radioCheck" for="2">2 colonnes</label></p>'."\n";
}
*/
echo '<p><input type="image" class="envoy" src="images/boutons/b_send_modif.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";
}

/////////////////////////////////////////////////////////////////////////////////////////////////

/*
echo '<div id="pageleft">'."\n";

echo '<div id="element_left">'."\n";
echo '<h1>Statistiques :</h1>'."\n";

$sql = "SELECT * FROM " .$table_rub. " ORDER BY rub_position "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);
echo '<p>Nb de rubriques: '.$res.'</p>'."\n";
echo '</div>'."\n";

echo '</div>'."\n";*/

echo '<div id="pagecentre">'."\n";






if(!empty($_GET['action'])){
switch($_GET['action']){




case 'add_rub':
echo '<h1><a href="gs_index.php">Liste des rubriques</a> > Ajout d\'une rubrique</h1>'."\n";
echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_index.php">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";
Add_rubrique();
break;






    case 'rec':
echo '<h1>Liste des rubriques > Ajout d\'une rubrique</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_index.php">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

extract($_POST,EXTR_OVERWRITE);

$rub_titre = AddSlashes($rub_titre);

if(empty($rub_titre)){

echo '<p align="center"><font color="red">Attention, merci de donner un nom à la rubrique !<br /><br /></font></p>'."\n";

Add_rubrique();
} else {
$sql = "SELECT rub_id, rub_position FROM " .$table_rub. "  ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

$position = ($res + 1);

$sql = "INSERT INTO " .$table_rub. "(rub_id, rub_titre, rub_priv, rub_position, rub_activation, rub_aff) VALUES 
('','$rub_titre','public','$position','$rub_activation','$rub_aff')";
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
echo '<p align="center"><br /><br /><b>Rubrique ajoutée avec succès !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="gs_index.php"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
}
    break;




case 'edit_rub':
echo '<h1>Liste des rubriques > Editer une rubrique</h1>'."\n";
echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_index.php">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";
Edit_rub($rub_id);
break;






    case 'edit_rec_rub':

extract($_POST,EXTR_OVERWRITE);

$rub_titre = AddSlashes($rub_titre);

echo '<h1>Liste des rubriques > Editer une rubrique</h1>'."\n";

if(empty($rub_titre)){
echo '<p align="center"><br /><br /><font color="red">Attention, merci de donner un nom à la rubrique !<br /><br /></font></p>'."\n";
echo '<p align="center"><a href="gs_index.php"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
Edit_rub($rub_id);
} else {

$sql = "UPDATE " .$table_rub. " SET rub_titre = '$rub_titre' WHERE rub_id = '$rub_id'" or die ("erreur"); 
//$sql = "UPDATE " .$table_rub. " SET rub_titre = '$rub_titre', rub_aff = '$rub_aff' WHERE rub_id = '$rub_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<p align="center"><br /><br /><b>Rubrique éditée avec succès !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="gs_index.php"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
}
    break;





    case 'act_on':
$sql = "UPDATE " .$table_rub. " SET rub_activation = 'active' WHERE rub_id = '$rub_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<h1>Liste des rubriques</h1>'."\n";
aff_rub();
    break;





    case 'act_off':
$sql = "UPDATE " .$table_rub. " SET rub_activation = 'nonactive' WHERE rub_id = '$rub_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<h1>Liste des rubriques</h1>'."\n";
aff_rub();
		break;





    case 'trans_aff1':
$sql = "UPDATE " .$table_rub. " SET rub_aff = '1col' WHERE rub_id = '$rub_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<h1>Liste des rubriques</h1>'."\n";
aff_rub();
    break;





    case 'trans_aff2':
$sql = "UPDATE " .$table_rub. " SET rub_aff = '2cols' WHERE rub_id = '$rub_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<h1>Liste des rubriques</h1>'."\n";
aff_rub();
		break;





    case 'trans_public':
$sql = "UPDATE " .$table_rub. " SET rub_priv = 'public' WHERE rub_id = '$rub_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<h1>Liste des rubriques</h1>'."\n";
aff_rub();
    break;





    case 'trans_private':
$sql = "UPDATE " .$table_rub. " SET rub_priv = 'private' WHERE rub_id = '$rub_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<h1>Liste des rubriques</h1>'."\n";
aff_rub();
		break;





    case 'moveup':
if ($position == 1) {
echo '<h1>Liste des rubriques</h1>'."\n";
echo 'Deja en 1ere position';
aff_rub();
} else {
$sql = "SELECT rub_position FROM " .$table_rub. "";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

$position_tmp = ($res + 1);
$position_up = ($position + 1);
$position_d = $position - 1;

$sql = "UPDATE " .$table_rub. " SET rub_position = '$position_tmp' WHERE rub_position = '$position'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());	
$sql = "UPDATE " .$table_rub. " SET rub_position = '$position' WHERE rub_position = '$position_d'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());    
$sql = "UPDATE " .$table_rub. " SET rub_position = '$position_d' WHERE rub_position = '$position_tmp'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<h1>Liste des rubriques</h1>'."\n";
aff_rub();
}
    break;





    case 'moved': 
$sql = "SELECT rub_position FROM " .$table_rub. "";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

if ($position == $res) {
echo '<h1>Liste des rubriques</h1>'."\n"; 
echo 'Deja en derniere position';
aff_rub();
} else {
$position_tmp = ($res + 1); 
$position_up = ($position - 1);
$position_d = $position + 1;

$sql = "UPDATE " .$table_rub. " SET rub_position = '$position_tmp' WHERE rub_position = '$position'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());	
$sql = "UPDATE " .$table_rub. " SET rub_position = '$position' WHERE rub_position = '$position_d'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());    
$sql = "UPDATE " .$table_rub. " SET rub_position = '$position_d' WHERE rub_position = '$position_tmp'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<h1>Liste des rubriques</h1>'."\n";
aff_rub();
}
    break;





    case 'del_rub':

$sqlb = "SELECT * FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqb = mysql_query($sqlb) or die('Erreur SQL !'.$sqlb.'<br>'.mysql_error());
$rowb = mysql_fetch_array($reqb);
$rub_titre = $rowb['rub_titre'];
$rub_type = $rowb['rub_type'];
$position = $rowb['rub_position'];

echo '<h1>Liste des rubriques > Supprimer une rubrique</h1>'."\n";

if (isset($_GET["confirm"])) $confirm = $_GET["confirm"];
else $confirm="";


switch($confirm)
    {
    case 'av':
echo '<p align="center"><br/><br/>Voulez-vous supprimer la rubrique <b>'.$rub_titre.'</b> ?<br/><br/></p>';
echo '<p align="center"><a href="gs_index.php?action=del_rub&rub_id='.$rub_id.'&confirm=oui"><img src="images/boutons/b_oui.jpg"></a> <a href="javascript:window.history.go(-1)"><img src="images/boutons/b_non.jpg"></a></p>';
break;

    case 'oui':

$sql_dl = "SELECT mod_id FROM " .$table_modules. " WHERE mod_rub_id = '$rub_id' ";
$req_dl = mysql_query($sql_dl,$db) or die ('Erreur : '.mysql_error() );
$res_dl = mysql_num_rows($req_dl);

if($res_dl){
echo '<p align="center"><br/><br/><b>Vous devez d\'abord supprimer le contenu de cette rubrique !</b><br/><br/></p>';
echo '<p align="center"><a href="gs_index.php"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
} else {

$sql = "SELECT rub_id FROM " .$table_rub. " ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

if ($res==1) {
mysql_query("DELETE FROM " .$table_rub. " WHERE rub_id = '$rub_id' ") or die("</br>Erreur de suppression");
} elseif ($res==$position) {
mysql_query("DELETE FROM " .$table_rub. " WHERE rub_id = '$rub_id' ") or die("</br>Erreur de suppression");
} else {
$i = $position;
while($i != $res) {
$hop = $i - 1;
mysql_query("UPDATE " .$table_rub. " SET rub_position = '$hop' WHERE rub_position = '$i' ") or die("</br>Erreur de suppression");
$i++;
}
$hop2 = $res - 1;
mysql_query("UPDATE " .$table_rub. " SET rub_position = '$hop2' WHERE rub_position = '$res' ") or die("</br>Erreur de suppression");
mysql_query("DELETE FROM " .$table_rub. " WHERE rub_id = '$rub_id' ") or die("</br>Erreur de suppression");
}


echo '<p align="center"><br/><br/><b>Rubrique supprimée avec succès !</b><br/><br/></p>';
echo '<p align="center"><a href="gs_index.php"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
}
break;

default: 
echo '<p>Erreur de traitement</p>'; 
break;
    }
    break;



default:
echo '<h1>Liste des rubriques</h1>'."\n";
aff_rub();
break;
}




} else {
echo '<h1>Liste des rubriques</h1>'."\n";
aff_rub();
}






echo '</div>'."\n";


include("inc/footer.inc.php");
?>