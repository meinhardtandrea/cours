<?php
include("inc/m.header.inc.php");

$sqlid = "SELECT * FROM " .$table_rub. " WHERE rub_position = '$page' ";
$reqid = mysql_query($sqlid,$db) or die ('Erreur : '.mysql_error() );
$resid = mysql_num_rows($reqid);
if($resid){
$rowid = mysql_fetch_array($reqid);
$res_rub_id = $rowid['rub_id'];
$res_rub_titre = $rowid['rub_titre'];
$res_rub_aff = $rowid['rub_aff'];
}

echo '<div id="page_centre">'."\n";

$sqlb = "SELECT * FROM " .$table_modules. " WHERE mod_rub_id = '$res_rub_id' AND mod_activation = 'active' ORDER BY mod_rub_aff, mod_position "; 
$reqb = mysql_query($sqlb) or die('Erreur SQL !'.$sqlb.'<br>'.mysql_error());
$resb = mysql_num_rows($reqb);

if($resb){
while($rowb = mysql_fetch_array($reqb)) {

$mod_titreb = $rowb['mod_titre'];
$mod_texteb = $rowb['mod_texte'];
$mod_imgb = $rowb['mod_img'];
$mod_img_position = $rowb['mod_img_position'];
$mod_type = $rowb['mod_type'];
$mod_id = $rowb['mod_id'];
$mod_position = $rowb['mod_position'];
$mod_option1 = $rowb['mod_option1'];

echo '<div id="elements">'."\n";

//////////////////////////////////////////
if($mod_type == "text"){
Aff_text($res_rub_id,$mod_id,$res_rub_aff);

//////////////////////////////////////////
}elseif($mod_type == "fiches"){
Aff_fiches($res_rub_id,$mod_id,$res_rub_aff);

//////////////////////////////////////////
} elseif($mod_type == "pdf") {
if($mod_option1 == 1){
echo '<h1>'.$mod_titreb.'</h1>'."\n";
}

$sql_i = "SELECT * FROM " .$table_pdf. " WHERE pdf_mod_id = '$mod_id' ORDER BY pdf_position "; 
$req_i = mysql_query($sql_i,$db) or die ('Erreur : '.mysql_error() );
$res_i = mysql_num_rows($req_i);
if($res_i){
while($row_i = mysql_fetch_array($req_i)) {
$pdf_name = $row_i['pdf_name'];
$pdf_titre = $row_i['pdf_titre'];

if ($pdf_titre) {
echo '<p><img src="images/pdf.png" title="Fichier PDF" alt="Fichier PDF" align="absmiddle"> <a href="files/pdf/'.$pdf_name.'" title="'.$pdf_titre.'" alt="'.$pdf_titre.'" target="_blank">'.$pdf_titre.'</a></p>'."\n";
} else {
echo '<p><img src="images/pdf.png" title="Fichier PDF" alt="Fichier PDF" align="absmiddle"> <a href="files/pdf/'.$pdf_name.'" title="'.$pdf_name.'" alt="'.$pdf_name.'" target="_blank">'.$pdf_name.'</a></p>'."\n";
}
}
}
//////////////////////////////////////////
} elseif($mod_type == "image") {
if($mod_option1 == 1){
echo '<h1>'.$mod_titreb.'</h1>'."\n";
}
if($mod_imgb){
echo '<p align="center"><img src="files/images/'.$mod_imgb.'"></p>'."\n";
}

//////////////////////////////////////////
} elseif($mod_type == 'news'){
if($mod_option1 == 1){
echo '<h1>'.$mod_titreb.'</h1>'."\n";
}
Aff_news($res_rub_id,$mod_id,$res_rub_aff,$page);


//////////////////////////////////////////
} elseif($mod_type == 'contact'){
if($mod_option1 == 1){
echo '<h1>'.$mod_titreb.'</h1>'."\n";
}

Aff_form($res_rub_id,$mod_id,$res_rub_aff,$rub_position,$err);

}
//////////////////////////////////////////

echo '</div>'."\n";
}
}
echo '</div>'."\n";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


include("inc/m.footer.inc.php");
?>