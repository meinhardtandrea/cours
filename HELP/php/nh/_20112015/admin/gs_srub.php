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
if (isset($_GET["srub_id"])) $srub_id = $_GET["srub_id"];
else $srub_id="";
if (isset($_GET["position"])) $position = $_GET["position"];
else $position="";
if (isset($_GET["srub_position"])) $srub_position = $_GET["srub_position"];
else $srub_position="";

///////////Fonctions///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function aff_mod($rub_id) {
include ("conf.ig.php");

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > '.$rub_titre.'</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_index.php">< Retour</a></li>'."\n";
echo '<li><a href="gs_srub.php?action=add_mod&rub_id='.$rub_id.'">+ Ajouter une sous-rubrique</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

$sql = "SELECT * FROM " .$table_srub. " WHERE srub_rub_id = '$rub_id' ORDER BY srub_position "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

if($res){
$grrr = 1;

echo '<table>'."\n";
echo '<tr>'."\n";
echo '<th class="cat_position">Position</th>'."\n";
echo '<th class="cat_titre">Titre</th>'."\n";
echo '<th class="cat_options">Activation</th>'."\n";
echo '<th class="cat_options">Editer</th>'."\n";
echo '<th class="cat_options">Suppr.</th>'."\n";
echo '</tr>'."\n";

while($row = mysql_fetch_array($req)) {

if ($grrr%2 == 1) {
$youp = 'class="row1" onmouseover="this.className="row1hover";" onmouseout="this.className="row1";"'; //impair
} else {
$youp = 'class="row2" onmouseover="this.className="row2hover";" onmouseout="this.className="row2";"'; }

$srub_id = $row['srub_id'];
$srub_titre = $row['srub_titre'];
$srub_position = $row['srub_position'];
$srub_priv = $row['srub_priv'];
$srub_activation = $row['srub_activation'];
$position = $srub_position;

echo '<tr '.$youp.'>'."\n";

if ($res == 1) {
echo '<td class="cat_position"></td>'."\n";
} elseif ($position == 1) {
echo '<td class="cat_position"><a href="gs_srub.php?action=moved&rub_id='.$rub_id.'&srub_id='.$srub_id.'&position='.$position.'"><img src="images/icones/bullet_arrow_bottom.png" alt="Descendre" title="Descendre"></a></td>'."\n";
} elseif ($position == $res) {
echo '<td class="cat_position"><a href="gs_srub.php?action=moveup&rub_id='.$rub_id.'&srub_id='.$srub_id.'&position='.$position.'"><img src="images/icones/bullet_arrow_top.png" alt="Monter" title="Monter"></a></td>'."\n";
} else {
echo '<td class="cat_position"><a href="gs_srub.php?action=moveup&rub_id='.$rub_id.'&srub_id='.$srub_id.'&position='.$position.'"><img src="images/icones/bullet_arrow_top.png" alt="Monter" title="Monter"></a> <a href="gs_srub.php?action=moved&rub_id='.$rub_id.'&srub_id='.$srub_id.'&position='.$position.'"><img src="images/icones/bullet_arrow_bottom.png" alt="Descendre" title="Descendre"></a></td>'."\n";
}

echo '<td class="cat_titre"><b><a href="gs_mods.php?srub_id='.$srub_id.'&rub_id='.$rub_id.'">'.$srub_titre.'</a></td>'."\n";

if($srub_activation == 'nonactive'){
$trans_active = '<a href="gs_srub.php?action=act_on&srub_id='.$srub_id.'&rub_id='.$rub_id.'"><img src="images/icones/off.gif" title="Activer la rubrique" alt="Activer la rubrique"></a>';
} else {
$trans_active = '<a href="gs_srub.php?action=act_off&srub_id='.$srub_id.'&rub_id='.$rub_id.'"><img src="images/icones/on.gif" title="Désactiver la rubrique" alt="Désactiver la rubrique"></a>';
}
echo '<td class="cat_options">'.$trans_active.'</td>'."\n";

echo '<td class="cat_options"><a href="gs_srub.php?action=edit_mod&srub_id='.$srub_id.'&rub_id='.$rub_id.'"><img src="images/icones/pencil.png" title="Editer la rubrique" alt="Editer la rubrique"></a></td>'."\n";
echo '<td class="cat_options"><a href="gs_srub.php?action=del_mod&srub_id='.$srub_id.'&rub_id='.$rub_id.'&confirm=av"><img src="images/icones/cross.png" title="Supprimer la rubrique" alt="Supprimer la rubrique"></a></td>'."\n";
echo '</tr>'."\n";

$grrr = $grrr + 1;
}
echo '</table>'."\n";
} else {
echo '<p>Cette rubrique est actuellement complètement vide...</p>'."\n";
}
}




function add_mod($rub_id,$err_add) {
include ("conf.ig.php");

$sqls = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqs = mysql_query($sqls) or die('Erreur SQL !'.$sqls.'<br>'.mysql_error());
$rows = mysql_fetch_array($reqs);
$rub_titre = $rows['rub_titre'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_srub.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > Ajout d\'une sous-rubrique</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_srub.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

echo '<div id="form">'."\n";

echo $err_add;

echo '<form action="gs_srub.php?action=rec&rub_id='.$rub_id.'" method="post">'."\n";
?>
<h5>Titre</h5>
<p><input type="text" class="text" name="srub_titre" maxlength="80" size="20"><br/><span class="comment">(80 caractères au maximum)</span></p>

<h5>Activation</h5>
<p><input type="radio" name="srub_activation" value="active" id="6" checked="checked"/> <label class="radioCheck" for="6">Activer</label></p>
<p><input type="radio" name="srub_activation" value="nonactive" id="7"/> <label class="radioCheck" for="7">Désactiver</label></p>

<p><input type="image" class="envoy" src="images/boutons/b_add2.gif"/></p>
</form>
</div>
<?php
}




function Edit_mod($rub_id,$srub_id) {
include ("conf.ig.php");
echo '<div id="form">'."\n";
echo '<form action="gs_srub.php?action=edit_rec_mod&rub_id='.$rub_id.'&srub_id='.$srub_id.'" method="post">'."\n";

$sql = "SELECT * FROM " .$table_srub. " WHERE srub_id = '$srub_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$row = mysql_fetch_array($req);
$srub_titre = $row['srub_titre'];

echo '<h5>Titre</h5>'."\n";
echo '<p><input type="text" class="text" name="srub_titre" maxlength="80" size="40" value="'.$srub_titre.'"><br/>'."\n";
echo '<span class="comment">(80 caractères au maximum)</span></p>'."\n";
echo '<p><input type="image" class="envoy" src="images/boutons/b_send_modif.gif"/></p>'."\n";
echo '</form>'."\n";
echo '</div>'."\n";
}

/////////////////////////////////////////////////////////////////////////////////////////////////


echo '<div id="pageleft">'."\n";

echo '<div id="element_left">'."\n";
echo '<h1>Statistiques :</h1>'."\n";

$sql = "SELECT * FROM " .$table_rub. " ORDER BY rub_position "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);
echo '<p>Nb de rubriques: '.$res.'</p>'."\n";
echo '</div>'."\n";

echo '</div>'."\n";

echo '<div id="pageright">'."\n";





if(!empty($_GET['action'])){
switch($_GET['action']){





		case 'add_mod':

add_mod($rub_id,$err_add);

		break;





    case 'rec':

$sqlt = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqt = mysql_query($sqlt) or die('Erreur SQL !'.$sqlt.'<br>'.mysql_error());
$rowt = mysql_fetch_array($reqt);
$rub_titre = $rowt['rub_titre'];

extract($_POST,EXTR_OVERWRITE);

$srub_titre = AddSlashes($srub_titre);

if(empty($srub_titre)){

$err_add = '<p align="center"><font color="red">Attention, merci de donner un nom au module !<br /><br /></font></p>'."\n";

add_mod($rub_id,$err_add);

} else {
$sql = "SELECT srub_id, srub_position FROM " .$table_srub. " WHERE srub_rub_id = '$rub_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

$position = ($res + 1);

$sql = "INSERT INTO " .$table_srub. "(srub_id, srub_rub_id, srub_titre, srub_position, srub_activation) VALUES 
('','$rub_id','$srub_titre','$position','$srub_activation')";
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
echo '<p align="center"><br /><br /><b>Sous-rubrique ajoutée avec succès !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="gs_srub.php?rub_id='.$rub_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
}
    break;





    case 'act_on':
$sql = "UPDATE " .$table_srub. " SET srub_activation = 'active' WHERE srub_id = '$srub_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

aff_mod($rub_id);
    break;





    case 'act_off':
$sql = "UPDATE " .$table_srub. " SET srub_activation = 'nonactive' WHERE srub_id = '$srub_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

aff_mod($rub_id);
		break;





    case 'trans_public':
$sql = "UPDATE " .$table_srub. " SET srub_priv = 'public' WHERE srub_id = '$srub_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

aff_mod($rub_id);
    break;





    case 'trans_private':
$sql = "UPDATE " .$table_srub. " SET srub_priv = 'private' WHERE srub_id = '$srub_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

aff_mod($rub_id);
		break;





    case 'moveup':

if ($srub_position == 1) {
echo 'Deja en 1ere position';
aff_mod($rub_id);
} else {
$sql = "SELECT srub_position FROM " .$table_srub. " WHERE srub_rub_id = '$rub_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

$position_tmp = ($res + 1);
$position_up = ($position + 1);
$position_d = $position - 1;

$sql = "UPDATE " .$table_srub. " SET srub_position = '$position_tmp' WHERE srub_position = '$position' AND srub_rub_id = '$rub_id' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());	
$sql = "UPDATE " .$table_srub. " SET srub_position = '$position' WHERE srub_position = '$position_d' AND srub_rub_id = '$rub_id' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());    
$sql = "UPDATE " .$table_srub. " SET srub_position = '$position_d' WHERE srub_position = '$position_tmp' AND srub_rub_id = '$rub_id' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

aff_mod($rub_id);
}
    break;





    case 'moved': 

$sql = "SELECT srub_position FROM " .$table_srub. " WHERE srub_rub_id = '$rub_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

if ($srub_position == $res) {
echo '<h1>Liste des modules</h1>'."\n"; 
echo 'Deja en derniere position';
aff_mod($rub_id);
} else {
$position_tmp = ($res + 1); 
$position_up = ($position - 1);
$position_d = $position + 1;

$sql = "UPDATE " .$table_srub. " SET srub_position = '$position_tmp' WHERE srub_position = '$position' AND srub_rub_id = '$rub_id' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());	
$sql = "UPDATE " .$table_srub. " SET srub_position = '$position' WHERE srub_position = '$position_d' AND srub_rub_id = '$rub_id' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());    
$sql = "UPDATE " .$table_srub. " SET srub_position = '$position_d' WHERE srub_position = '$position_tmp' AND srub_rub_id = '$rub_id' " or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

aff_mod($rub_id);
}
    break;




case 'edit_mod':

$sqls = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqs = mysql_query($sqls) or die('Erreur SQL !'.$sqls.'<br>'.mysql_error());
$rows = mysql_fetch_array($reqs);
$rub_titre = $rows['rub_titre'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_srub.php?rub_id='.$rub_id.'">'.$rub_titre.'</a></h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_srub.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

Edit_mod($rub_id,$srub_id);

break;






    case 'edit_rec_mod':

$sqls = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqs = mysql_query($sqls) or die('Erreur SQL !'.$sqls.'<br>'.mysql_error());
$rows = mysql_fetch_array($reqs);
$rub_titre = $rows['rub_titre'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_srub.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > Editer un module</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_srub.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

extract($_POST,EXTR_OVERWRITE);

$srub_titre = AddSlashes($srub_titre);

if(empty($srub_titre)){
echo '<p align="center"><br /><br /><font color="red">Attention, merci de donner un nom au module !<br /><br /></font></p>'."\n";
echo '<p align="center"><a href="gs_srub.php?rub_id='.$rub_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
Edit_mod($rub_id,$srub_id);
} else {

$sql = "UPDATE " .$table_srub. " SET srub_titre = '$srub_titre' WHERE srub_id = '$srub_id'" or die ("erreur"); 
mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

echo '<p align="center"><br /><br /><b>Module édité avec succès !</b><br /><br /></p>'."\n";
echo '<p align="center"><a href="gs_srub.php?rub_id='.$rub_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
}
    break;





    case 'del_mod':

$sqls = "SELECT rub_titre FROM " .$table_rub. " WHERE rub_id = '$rub_id' "; 
$reqs = mysql_query($sqls) or die('Erreur SQL !'.$sqls.'<br>'.mysql_error());
$rows = mysql_fetch_array($reqs);
$rub_titre = $rows['rub_titre'];

$sqlb = "SELECT * FROM " .$table_srub. " WHERE srub_id = '$srub_id' "; 
$reqb = mysql_query($sqlb) or die('Erreur SQL !'.$sqlb.'<br>'.mysql_error());
$rowb = mysql_fetch_array($reqb);
$srub_titre = $rowb['srub_titre'];
$position = $rowb['srub_position'];

echo '<h1><a href="gs_index.php">Liste des rubriques</a> > <a href="gs_srub.php?rub_id='.$rub_id.'">'.$rub_titre.'</a> > Supprimer un module</h1>'."\n";

echo '<div id="mmenu_fond">'."\n";
echo '<div id="mmenu">'."\n";
echo '<ul>'."\n";
echo '<li><a href="gs_srub.php?rub_id='.$rub_id.'">< Retour</a></li>'."\n";
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";

if (isset($_GET["confirm"])) $confirm = $_GET["confirm"];
else $confirm="";


switch($confirm)
    {
    case 'av':
echo '<p align="center"><br/><br/>Voulez-vous supprimer le module <b>'.$srub_titre.'</b> ?<br/><br/></p>';
echo '<p align="center"><a href="gs_srub.php?action=del_mod&rub_id='.$rub_id.'&srub_id='.$srub_id.'&confirm=oui"><img src="images/boutons/b_oui.jpg"></a> <a href="javascript:window.history.go(-1)"><img src="images/boutons/b_non.jpg"></a></p>';
break;

    case 'oui':

$sql_dl = "SELECT mod_id FROM " .$table_modules. " WHERE mod_srub_id = '$srub_id' ";
$req_dl = mysql_query($sql_dl,$db) or die ('Erreur : '.mysql_error() );
$res_dl = mysql_num_rows($req_dl);

if($res_dl){
echo '<p align="center"><br/><br/><b>Vous devez d\'abord supprimer le contenu de ce module !</b><br/><br/></p>';
echo '<p align="center"><a href="gs_srub.php?rub_id='.$rub_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
} else {

$sql = "SELECT srub_id FROM " .$table_srub. " WHERE srub_rub_id = '$rub_id' ";
$req = mysql_query($sql,$db) or die ('Erreur : '.mysql_error() );
$res = mysql_num_rows($req);

if ($res==1) {
mysql_query("DELETE FROM " .$table_srub. " WHERE srub_id = '$srub_id' ") or die("</br>Erreur de suppression");
} elseif ($res==$position) {
mysql_query("DELETE FROM " .$table_srub. " WHERE srub_id = '$srub_id' ") or die("</br>Erreur de suppression");
} else {
$i = $position;
while($i != $res) {
$hop = $i - 1;
mysql_query("UPDATE " .$table_srub. " SET srub_position = '$hop' WHERE srub_position = '$i' AND srub_rub_id = '$rub_id' ") or die("</br>Erreur de suppression");
$i++;
}
$hop2 = $res - 1;
mysql_query("UPDATE " .$table_srub. " SET srub_position = '$hop2' WHERE srub_position = '$res' AND srub_rub_id = '$rub_id' ") or die("</br>Erreur de suppression");
mysql_query("DELETE FROM " .$table_srub. " WHERE srub_id = '$srub_id' ") or die("</br>Erreur de suppression");
}


echo '<p align="center"><br/><br/><b>Module supprimé avec succès !</b><br/><br/></p>';
echo '<p align="center"><a href="gs_srub.php?rub_id='.$rub_id.'"><img src="images/boutons/b_back.gif" alt="Retour" title="Retour"></a></p>'."\n";
}
break;

default: 
echo '<p>Erreur de traitement</p>'; 
break;
    }
    break;



default:
aff_mod($rub_id);
break;
}




} else {
aff_mod($rub_id);
}














echo '</div>'."\n";


include("inc/footer.inc.php");
?>