<?php
$host = "localhost";
$user = "root";
$pass = "gkzovd554";
$bdd = "dsidd";

$table_compteur = "ds_compteur";

$table_users = "ds_users";
$table_log = "ds_log";
$table_rub = "ds_rubriques";

$table_modules = "ds_modules";

$table_fiches = "ds_fiches";
$table_news = "ds_news";
$table_mail = "ds_mail";
$table_galeries = "ds_img";
$table_pdf = "ds_pdf";

$table_partenaires = "ds_partenaires";
$table_networks = "ds_networks";

$table_groupes = "ds_groupes";
$table_cross = "ds_cross_grp";

$table_newsletter = "ds_newsletter";

$db = mysql_connect($host, $user, $pass) or die('Erreur de connexion');  
mysql_select_db($bdd) or die('Base inexistante');
?>