<?php
include('inc/header.inc.php');
include('inc/function.inc.php');

if (isset($_GET["shoot"])) $shoot = $_GET["shoot"];
else $shoot="";

$russe = rand(1,6);

echo $russe;

include('inc/footer.inc.php');
?>
