<?php
session_start ();
include("../admin/conf.ig.php");

if (isset($_GET["page"])) $page = $_GET["page"];
else {
$sqlid = "SELECT * FROM " .$table_rub. " WHERE rub_activation = 'active' ORDER BY rub_position ";
$reqid = mysql_query($sqlid,$db) or die ('Erreur : '.mysql_error() );
$resid = mysql_num_rows($reqid);
if($resid){
$rowid = mysql_fetch_array($reqid);
$rub_id = $rowid['rub_id'];
$page = $rowid['rub_position'];
}
}
session_unset ();
session_destroy ();
header ('location: ../m.index-'.$page.'.html');
?>