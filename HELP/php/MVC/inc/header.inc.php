<?php
if (isset($_GET["page"])) $page = $_GET["page"];
else $page="1";
include("inc/conf.ig.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>NH</title>
<meta charset="UTF-8" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="page">
<nav>
<ul>
<?php
$sql = 'SELECT * FROM menu ORDER BY idMenu';

try
{
$reponse = $bdd->prepare($sql);
$reponse->execute();
while ($data = $reponse->fetch()){
    if($page == $data["idMenu"]){ $current = 'id="current"'; } else { $current = ''; }
    echo '<li><a href="index-'.$data["idMenu"].'.html" '.$current.'>'.$data["titre"].'</a></li>'."\n";
}
$reponse->closeCursor();
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
?>
</ul>
</nav>