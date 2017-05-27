<?php
session_start ();
if (isset($_GET["err"])) $err = $_GET["err"];
else $err="";
if (isset($_GET["page"])) $page = $_GET["page"];
else $page="1";
?>
<html>
<head>
<title>Nicolas HEBERT - PPE</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/functions.js"></script>
</head>
<body>

<div id="header_top">

<div id="header">
<div id="logo">

<div id="logo_left">
<a href="index.html"><img src="images/logo.png"></a>
</div>

<?php
echo '<div id="login">'."\n";
if(!isset($_SESSION['pseudo'])) {
$login = '<form>'."\n";
$login .= '<button type="submit" formaction="index-8.html" class="envoy">Inscrivez-vous</button> '."\n";
$login .= '<button type="submit" formaction="index-9.html" class="envoy">Connectez-vous</button> '."\n";
$login .= '<button type="submit" formaction="index-7.html" class="envoy">Votre panier (0)</button>'."\n";
$login .= '</form>'."\n";
echo $login;
} else {
$login = '<form>'."\n";
$login .= '<button type="submit" formaction="index-9.html" class="envoy">Votre Compte</button> '."\n";
$login .= '<button type="submit" formaction="index-7.html" class="envoy">Votre panier (0)</button>'."\n";
$login .= '</form>'."\n";
echo $login;
}
echo '</div>'."\n";
/*
echo  '<div id="basket">'."\n";
echo  '<p><img src="images/basket.png" alt="submit" /> Votre panier</p>'."\n";
echo  '</div>'."\n";
*/
?>

</div>
</div>

<div id="menu">
<nav>
<ul>
<?php
$i = 1;
$name = array('','Accueil','Ingr&eacute;dients','Recettes','Cours','Admin','Compte','Panier','Inscription','Mon Compte');
while($i<8){
    if($page == $i){ $current = 'id="current"'; } else { $current = ''; }
    echo '<li><a href="index-'.$i.'.html" '.$current.'>'.$name[$i].'</a></li>'."\n";
$i++;
}
?>
</ul>
</nav>
</div>

</div>
<div id="page">
<?php
echo '<h1>'.$name[$page].'</h1>'."\n";
?>
