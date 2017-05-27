<?php
include("inc/header.inc.php");

if (isset($_GET["fch_id"])) $fch_id = $_GET["fch_id"];
else $fch_id="";

echo '<div id="page_centre">'."\n";

echo '<div id="elements">'."\n";

$sqlx = "SELECT * FROM " .$table_fiches. " WHERE fch_id = '$fch_id' ";
$reqx = mysql_query($sqlx) or die('Erreur SQL !'.$sqlx.'<br>'.mysql_error());
$resx = mysql_num_rows($reqx);

if($resx){

$rowx = mysql_fetch_array($reqx);

$fch_id = $rowx['fch_id'];
$fch_titre = $rowx['fch_titre'];
$fch_texte = $rowx['fch_texte'];
$fch_lien = $rowx['fch_lien'];
$fch_img = $rowx['fch_img'];
$fch_date = $rowx['fch_date'];
$fch_heure = $rowx['fch_heure'];
$fch_une = $rowx['fch_une'];
$fch_statut = $rowx['fch_statut'];

echo '<h1>'.$fch_titre.'</h1>'."\n";


if($fch_lien){
echo '<iframe src ="'.$fch_lien.'" width="975" height="600"></iframe>'."\n";
}

}


echo '</div>'."\n";

echo '</div>'."\n";

include("inc/footer.inc.php");
?>