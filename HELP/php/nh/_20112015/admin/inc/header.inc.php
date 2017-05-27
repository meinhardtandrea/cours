<?php
session_start();
if(!isset($_SESSION['pseudo'])) {
  header('location: login.php');
  exit;
}

if($_SESSION['user_access'] >= 3) {
  header('location: login.php');
  exit;
}

function stripslashes_r($var) // Fonction qui supprime l'effet des magic quotes
{
        if(is_array($var)) // Si la variable passée en argument est un array, on appelle la fonction stripslashes_r dessus
        {
                return array_map('stripslashes_r', $var);
        }
        else // Sinon, un simple stripslashes suffit
        {
                return stripslashes($var);
        }
}
  
if(get_magic_quotes_gpc()) // Si les magic quotes sont activés, on les désactive avec notre super fonction ! ;)
{
   $_GET = stripslashes_r($_GET);
   $_POST = stripslashes_r($_POST);
   $_COOKIE = stripslashes_r($_COOKIE);
}

include("conf.ig.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
<title>D-SIDD :: Administration</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/styles.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/pwd.js"></script>
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		language : "fr",
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,fontsizeselect,|,outdent,indent,|,pastetext,pasteword,|,link,unlink,code",
		theme_advanced_buttons2 : "bullist,numlist,|,forecolor,backcolor",
		//theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,iespell,advhr,|,ltr,rtl",
		//theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

</head>
<body>
<div id="header">
<?php
echo '<div id="welcome">'."\n";
echo '<p>Bienvenue <b>'.$_SESSION['pseudo'].'</b> <a href="logout.php"><img src="images/icones/disconnect.png" align="absmiddle" title="Se déconnecter" alt="Se déconnecter"></a></p>'."\n";
echo '</div>'."\n";
?>
<div id="menu_fond">
<div id="menu">
<ul>
<li><a href="index.php">Accueil</a></li>
<li><a href="gs_index.php">Gestion du site</a></li>
<li><a href="admins.php">Administrateurs</a></li>
<li><a href="users.php">Membres</a></li>
<li><a href="gs_fiches.php">Fiches</a></li>
<li><a href="partenaires.php">Partenaires</a></li>
<li><a href="socialnetworks.php">Réseaux Sociaux</a></li>
<li><a href="https://mail.google.com/mail/" target="_blank">Webmail</a></li>
</ul>
</div>
</div>
</div>
<div id="corps">
