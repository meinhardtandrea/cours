<?php
include("inc/header.inc.php");

$sqlid = "SELECT * FROM " .$table_rub. " WHERE rub_position = '$page' ";
$reqid = mysql_query($sqlid,$db) or die ('Erreur : '.mysql_error() );
$resid = mysql_num_rows($reqid);
if($resid){
$rowid = mysql_fetch_array($reqid);
$res_rub_id = $rowid['rub_id'];
$res_rub_titre = $rowid['rub_titre'];
}
?>


<div id="element_descr">
<p>Identifiez les besoins de votre territoire et partagez l’ingénierie</p>
</div>

<div id="cercles">
<div id="cerclesalt">
<ul>
<li><a href="index.html" class="cerclehover1">SENSIBILISATION</a></li>
<li><a href="index.html" class="cerclehover2">CONSULTATION</a></li>
</ul>
</div>
</div>



<?php
include("inc/footer.inc.php");
?>