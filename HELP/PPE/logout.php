<?php
session_start ();
session_unset ();
session_destroy ();

if (isset($_GET["page"])) $page = $_GET["page"];
else $page="1";

header ('location: index-'.$page.'.html');
?>