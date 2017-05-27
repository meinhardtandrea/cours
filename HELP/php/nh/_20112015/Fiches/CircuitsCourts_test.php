<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html><head>



  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>D-SIDD//Fiche #1 Circuits courts</title>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type="text/javascript" src="dist/jspdf.debug.js"></script>
        <link href="dist/rateit/src/rateit.css" rel="stylesheet" type="text/css">
        <script src="dist/rateit/src/jquery.rateit.js" type="text/javascript"></script>
	<link rel="stylesheet" href="dist/fonts/font.css">
        <link type="text/css" rel="stylesheet" href="dist/left.css"></script>
	<script type="text/javascript" src="dist/skinable_tabs.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<link rel="stylesheet" href="dist/fonts/font.bootstrap.css">
	<script type="text/javascript" src="dist/bootstrap-rating.js"></script>
	<link rel="stylesheet" type="text/css" href="dist/dataTables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="dist/dataTables/resources/syntax/shCore.css">
	<script type="text/javascript" language="javascript" src="dist/dataTables/media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="dist/dataTables/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="dist/dataTables/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="dist/dataTables/Plugins-master/sorting/percent.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/1.10.7/api/fnGetColumnData.js"></script>





<Style>

/*
scrollbar		:	http://tympanus.net/Tutorials/CustomDropDownListStyling/index.html
Couleur			:	http://www.colourlovers.com/business/trends/branding/7880/Papeterie_Haute-Ville_Logo
Menu			:	http://css-tricks.com/targetting-menu-elements-submenus-navigation-bar/
recherche territoire 	:	http://labs.easyblog.it/maps/leaflet-search/examples/jsonp.html
changer de ville	:	http://www.changerdeville.fr/ville-ideale
vert clair	 	:#D0D102
bleu mer 		:#0D91BA
gris foncé		:#616161
bleu diese		:#00a9e0
bleu diese chiffre	:#67cddc
rouge			:#ff6600
*/
/*infographie:
http://www.jplugins.net/waffly/?demo
flêche:
http://cssarrowplease.com/
encodage svg: http://b64.io/
*/




a.BoutonPartager {
    display: block;
    width: 140px;
    padding: 15px 20px;
    color: #fff;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    position: relative;
    float: left;
}

a.BoutonPartager.selected{
border-bottom: 3px solid #ff6600;
font-size: 1.1em;
}



.share-panel-url{
	width:370px;
	margin-right:15px;
	color:#666;
	font-size:1.8em;
	padding:2px;
	width:580px;
	color:#333;
	font-size:12px;
	padding:7px;
	background-color: #ff6600;
	color: #344253;
	margin-top: 10px;
}




.fermerBD{
color: #ffffff;
font-size: 0.8em;
text-align: left;
float: right;
text-decoration: none;
}

.DetailsNavigation{
background-color: #344253;
color: #ffffff;
padding: 20px;
height: 120px;
}

.DetailsNavigation.Partager_lien{
	height: 170px;
}

.DetailsNavigation.Partager_mail{
	height: 370px;
}


#DetailsNavigation{
position: relative;
float: left;
margin-left: 20px;
margin-right: 20px;
width: 940px;
}

a.mybutton {
    display: block;
    width: 140px;
    padding: 15px 20px;
    color: #344253;
    font-size: 14px;
    font-weight: bold;
    border-radius: 4px;
    text-align: center;
    text-decoration: none;
    background-color: #FFF;
    position: relative;
    float: left;
}


a.mybutton:hover {
    color: #ff6600;
    text-decoration: none;
}

#header {
    margin: 0px auto auto;
    width: 1000px;
    height: 110px;
	background-color: #344253;
    padding-top: 0px;
    padding-left: 0px;
}

#logo {
    float: left;
    height: 60px;
    padding-left: 10px;
    padding-right: 0px;
    padding-top: 0px;
}


#logo_left {
    float: left;
    padding-left: 0px;
    padding-right: 0px;
    padding-top: 0px;
    margin-top: 15px;
    margin-bottom: 0px;
}

#logo_center {
float: left;
border-left: 1px solid #FFF;
height: 110px;
padding-left: 20px;
width: 600px;
padding-top: 15px;
}

#logo_center p{
    font-size: 30px;
    color: #ffffff;
    font-family: Arial,Verdana,Helvetica,sans-serif;
    font-weight: normal;
	margin: 0px;
}



#logo img {
    margin-top: 0px;
    margin-left: 0px;
}

#logo_left h1 {
    font-size: 16px;
    color: #ffffff;
    font-family: Arial,Verdana,Helvetica,sans-serif;
    font-weight: normal;
    margin-top: 0px;
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 0px dotted #ff6600;
}

#logo_center .Mots_Cles{
	font-style: italic;
	text-align: left;
	color:#ff6600;
	font-size: 1.4em;
}

.interrogation{
	text-decoration: none;
	color:#ff6600;
}
   .interrogation:link{
color: #ff6600;
}
   .interrogation:visited{color: #ff6600;}
   .interrogation:active{color: #ff6600;}
   .interrogation:hover{color: #ff6600;}
.h1 {
	margin-bottom: 0px;
	margin-top: 0px; 
	margin-left: 200px;
	font-weight: bold;

}


hr{
	color: #344253;
	width: 90%;
	margin-top: 20px;
	position: relative;
	float: left;
	margin-left: 5%;
}

#BonnesPratiques tr.alt td {
    color: #000000;
    background-color: #e6e6e6;
    border: 1px solid #344253;
}
#BonnesPratiques td, #BonnesPratiques th {
    font-size: 1.2em;
    border: 1px solid #344253;
    padding: 3px 7px 2px;
    width: 150px;
}

.PiedDePage{
margin-top: 50px;
border-style: none;
padding: 10px;
background-color:#344253;
color: #FFFFFF;
position: relative;
float: left;
width: 100%;
font-size: 1.3em;
font-weight: 900;
text-align: right;
height: 60px;
}

.PiedDePage a{
color:#ff6600;
}

#EnsembleContenu {
  	width: 1000px;
	margin-left: auto;
	margin-right: auto;
	position: relative;
}

.ChiffresCles{
	position: relative;
	float: left;
	text-align: justify;
	color: #344253;
	margin-left: 20px;
	margin-right: 20px;
}

.ChiffresCles hr{
	float: left;
	margin-top: 0px;
	width: 100%;
	position: relative;
	margin-left: 0px;
}

.navigation{
position: relative;
float: left;
width: 100%;
text-align: justify;
color: #344253;
margin-left: 20px;
margin-right: 20px;
margin-top: 410px;
font-size: 0.8em;
}

.Outils_navigation{
position: relative;
float: left;
text-align: justify;
padding: 10px;
border-color: #344253;
border-style: solid;
margin-right: 5px;
border-radius: 5px;
cursor:pointer;
text-decoration: none;
color: #344253;
}

.Outils_navigation:hover{
background: #344253;
color:#ff6600;
}



.Boite{
	padding: 0px 5px 5px 5px;
	position: relative;
	float: left;
}

.Partager{
	border: 5px dashed #ff6600;
	border-radius: 10px;
	margin-top: 20px;
}

.Infographie{
	position: relative;
	float: left;
	width: 47.5%;
	background: url(images/Infographie_CircuitCourt_SansChiffres_V4.png) no-repeat;
	background-size: contain;
	height: 460px;
}



.Infographie hr{
	float: left;
	margin-top: 0px;
	/*width: 100%;*/
	position: relative;
	margin-left: 0px;
	color:#344253;
}

.Def_Enjeux{
	position: relative;
	float: left;
	width: 47.5%;
	background-size: contain;
	height: 460px;
	text-align: justify;
	margin-left: 20px;
}



.Def_Enjeux hr{
	float: left;
	margin-top: 0px;
	/*width: 100%;*/
	position: relative;
	margin-left: 0px;
	color:#344253;
}


.PointsForts{
	position: relative;
	float: left;
	margin-left: 20px;
	margin-right: 20px;
}

body{
	color: #344253;
}




.Cache{
	display:none;	
}


#googft-mapCanvas {
  height: 400px;
  margin: 0;
  padding: 0;
  width: 100%;
}


.Tab_PtFort  {border-collapse:collapse;border-spacing:0;margin-top: 10px;text-align: left;margin-right: 40px;margin-bottom: 20px;}
.Tab_PtFort td{padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.Tab_PtFort th{padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.Tab_PtFort .ColGauche{font-weight:bold;background-color:#344253;color:#ffffff}
.Tab_PtFort .ColMilieu{color:#344253;font-weight: normal;}
.Tab_PtFort .ColDroite{width:85px;}




div.svg div.rateit-range {
  background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAPCAMAAAA1b9QjAAAABlBMVEXXAGD///+RxERJAAAAFUlEQVQY02NgZEAFjCCIDIa1CJrfAWn/AMjM8TthAAAAAElFTkSuQmCC') /*star-normal.svg*/;
  *background: url(star-normal.svg); /* For IE 6 and 7 */
}
div.svg div.rateit-hover {
  background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAPCAMAAAA1b9QjAAAABlBMVEXXAGD///+RxERJAAAAEElEQVR4AWNgZEAFjCNZBAAQ4AAfVHLa+gAAAABJRU5ErkJggg==') /*star-hover.svg*/;
  *background: url(star-hover.svg); /* For IE 6 and 7 */
}
div.svg div.rateit-selected {
  background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAPCAMAAAA1b9QjAAAABlBMVEXXAGD///+RxERJAAAAEElEQVR4AWNgZEAFjCNZBAAQ4AAfVHLa+gAAAABJRU5ErkJggg==') /*star-selected.svg*/;
  *background: url(star-selected.svg); /* For IE 6 and 7 */
}
div.svg div.rateit-preset {
  background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAPCAMAAAA1b9QjAAAABlBMVEXXAGD///+RxERJAAAAEElEQVR4AWNgZEAFjCNZBAAQ4AAfVHLa+gAAAABJRU5ErkJggg==') /*star-preset.svg*/;
  *background: url(star-preset.svg); /* For IE 6 and 7 */
}

.ValeurProxi{
	margin-left: 5px;
	vertical-align: text-top; 
	line-height: 15px;
}
.IndicateurProxi{
	width:205px;
}

.dataTables_wrapper {
    margin-top: 25px;
}


a.info{
    position:relative; 
    z-index:24;
    text-decoration:none}

a.info:hover{z-index:25; }

a.info span{display: none}

a.info:hover span{ 
/*le contenu de la balise span ne 
sera visible que pour l'état a:hover */
    display:block; 
    position:absolute; 
    top:2em; left:2em; width:15em;
    border:1px solid #ff6600;
    background-color:#ff6600; 
    color:#ffffff;
    text-align: justify;
    font-weight:900;
    padding:1px;
    font-size:0.8em;
    }

#visualization {
  height: 400px;
  width: 500px;
}


.symbol {
	display: inline-block;
	border-radius: 5%;
	border: 1px solid #FFF;
	width: 15px;
	height: 15px;
}

.symbol-empty {
  background-color: #ccc;
}

.symbol-filled {
  background-color: #ff6600;
}


.Rang .label {
  display: inline;
  padding: .2em .6em .3em;
  font-size: 1em;
  font-weight: bold;
  line-height: 12px;
  text-align: center;
  white-space: nowrap;
  vertical-align: text-top;
  border-radius: .25em;
  margin-left: 5px;
}

.Rang .label-default {
  background-color: transparent;
}

.glyphicon-star:before {
    color: #ff6600;
}

.glyphicon-star-empty:before {
    color: #616161;
}



.glyphicon{
/*font-size:1.5em;*/
}


      #legend {
        background: #FFF;
        padding: 10px;
        margin: 5px;
        font-size: 12px;
        font-family: Arial, sans-serif;
      }

      .color_legende {
        border: 1px solid;
        height: 12px;
        width: 12px;
        margin-right: 3px;
        float: left;
      }

    </style>



    <script type="text/javascript">
      google.load('visualization', '1');

      function initialize() {

        var tableid = '1twnakZRZppPglxk52OP-ItKW_gLzx1fD0lNUfAo6';
        var geocoder = new google.maps.Geocoder();
        var infoWindow = new google.maps.InfoWindow();
  var MY_MAPTYPE_ID = 'custom_style';
  var featureOpts = [
    {
      stylers: [
        { hue: '#344253' },
        { visibility: 'simplified' },
        { gamma: 0.5 },
        { weight: 0.5 }
      ]
    },
    {
      elementType: 'labels',
      stylers: [
        { visibility: 'on' }
      ]
    },
    {
      featureType: 'water',
      stylers: [
        { color: '#344253' }
      ]
    }
  ];

  var mapOptions = {
    zoom: 10,
    minZoom: 5,
    center: new google.maps.LatLng(43.6109200,3.8772300),
    mapTypeControl: false,
    mapTypeControlOptions: false,
    mapTypeId: MY_MAPTYPE_ID,
    zoomControl: true,
    streetViewControl: false,
  };

    google.maps.visualRefresh = true;
    var isMobile = (navigator.userAgent.toLowerCase().indexOf('android') > -1) ||
      (navigator.userAgent.match(/(iPod|iPhone|iPad|BlackBerry|Windows Phone|iemobile)/));
    if (isMobile) {
      var viewport = document.querySelector("meta[name=viewport]");
      viewport.setAttribute('content', 'initial-scale=1.0, user-scalable=no');
    }

    var map = new google.maps.Map(document.getElementById('googft-mapCanvas'),mapOptions);

    var mapDiv = document.getElementById('googft-mapCanvas');
    mapDiv.style.width = isMobile ? '100%' : '1000px';
    mapDiv.style.height = isMobile ? '100%' : '400px';
    map = new google.maps.Map(mapDiv,mapOptions);

    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(document.getElementById('googft-legend-open'));
    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(document.getElementById('googft-legend'));

    var layer = new google.maps.FusionTablesLayer({
      map: map,
      heatmap: { enabled: false },
      query: {
        select: "col20\x3e\x3e0",
        from: tableid,
        where: ""
      },
      options: {
        styleId: 2,
        templateId: 2
      }
    });

  var styledMapOptions = {
    name: 'Custom Style'
  };

  var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

  map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
    if (isMobile) {
      var legend = document.getElementById('googft-legend');
      var legendOpenButton = document.getElementById('googft-legend-open');
      var legendCloseButton = document.getElementById('googft-legend-close');
      legend.style.display = 'none';
      legendOpenButton.style.display = 'block';
      legendCloseButton.style.display = 'block';
      legendOpenButton.onclick = function() {
        legend.style.display = 'block';
        legendOpenButton.style.display = 'none';
      }
      legendCloseButton.onclick = function() {
        legend.style.display = 'none';
        legendOpenButton.style.display = 'block';
      }
    }
//insérer ici le code geocoder
	   geocodeAddress = function() {
	   var lat=parseFloat(Coordonnees.split(",")[0]);
	   var lng=parseFloat(Coordonnees.split(",")[1]);
	   var coordinate=new google.maps.LatLng(lat, lng);

              queryList = [];
              queryList.push("SELECT NOM_COMM, CODE_DEPT,Nom_EPCI,Nom_Typologie, legende_acces_circuits_courts FROM ");
              queryList.push(tableid);
              queryList.push(" WHERE 'DepCom'=" + Depcom);
              query = encodeURIComponent(queryList.join(''));

              var gvizQuery = new google.visualization.Query(
                  'http://www.google.com/fusiontables/gvizdata?tq=' + query);



              gvizQuery.send(function(response) {
                var datatable = response.getDataTable();
		var NOM_COMM ='Pas de résultats';
		var CODE_DEPT ='Pas de résultats';
		var Nom_EPCI ='Pas de résultats';
		var Nom_Typologie ='Pas de résultats';
		var legende_acces_circuits_courts ='Pas de résultats';
                if (datatable && datatable.getNumberOfRows()) {
			var NOM_COMM =datatable.getValue(0, 0);
			var CODE_DEPT =datatable.getValue(0, 1);
			var Nom_EPCI =datatable.getValue(0, 2);
			var Nom_Typologie =datatable.getValue(0, 3);
			var legende_acces_circuits_courts =datatable.getValue(0, 4);
                }

                infoWindow.setContent('<div class="googft-info-window">' +
'<b style="font-weight:900;">Commune:</b> '+ NOM_COMM +' (' + CODE_DEPT + ')<br>' +
'<b style="font-weight:900;">Intercommunalité:</b> ' + Nom_EPCI + '<br>' +
'<b style="font-weight:900;">Type de commune:</b> ' + Nom_Typologie + '<br>' +
'<br><b>Temps minimum d\'accès à un distributeur de produits alimentaires en circuits courts:</b>' +
'<br>' + legende_acces_circuits_courts + '</div>');

                infoWindow.setPosition(coordinate);
                infoWindow.open(map);
		map.setCenter(coordinate);
              });
        };

//fin geocoder

        // Ajout légende
        var legend = document.createElement('div');
        legend.id = 'legend';
        var content = [];
        content.push('<h3>Accessibilité:</h3>');
        content.push('<p><div class="color_legende" style="background: #ffa264;"></div>Moins de 5 minutes</p>');
        content.push('<p><div class="color_legende" style="background: #ff8939;"></div>De 5 à 10 minutes</p>');
        content.push('<p><div class="color_legende" style="background: #ff6700;"></div>De 10 à 20 minutes</p>');
        content.push('<p><div class="color_legende" style="background: #c65000;"></div>De 20 à 30 mibutes</p>');
        content.push('<p><div class="color_legende" style="background: #9b3f00;"></div>Plus de 30 minutes</p>');
        content.push('<p><div class="color_legende" style="background: #616161;"></div>Information indisponible</p>');
        legend.innerHTML = content.join('');
        legend.index = 1;
        map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);
        // Fin ajout légende

      }

      google.maps.event.addDomListener(window, 'load', initialize);

    </script>

</head>
<body dir="ltr" lang="fr-FR" link="#0000ff" id="target">
<script>
    function fbShare(url, title, descr, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }
</script>

	
	<?php 
		$fiche='Circuits_Courts';
$en_tete='<div id="EnsembleContenu">
<div id="header">
<div id="logo"><div id="logo_left">
<p style="margin: 0px;padding: 0px;"><a style="color: #ff6600;font-family: Arial,Verdana,Helvetica,sans-serif;font-weight: normal;text-decoration: underline;" href="/index.html"><img style="border: medium none;" src="images/Logo_Blanc.png" title="Accueil" alt="Accueil" height="60"></a></p>
<h1>Le diagnostic territorial autrement</h1>
</div>
<div id="logo_center">
<p>Circuits courts</p>
<p class="Mots_Cles"><span style="font-weight:900;">#MotsClés</span> : Consommation, Production, Commerce, Vie locale, Marché, Bio, Redynamisation</p>
</div>
</div>
</div>';
		$Partie1='<div class="Boite Partager">
<h2 style="padding-left: 20px;">
Les circuits courts de Ma_Commune_A_Remplacer en bref
</h2>
<div style="position: relative;float: left;">
<div class="Infographie">
<div style="position: absolute;top: 230px;font-size: 1.8em;font-weight: 900;color: #344253;left: 6px;width: 100px;text-align: center;background-color: #FFF;opacity: 0.7;">Chiffre_a_remplacer_01</div>
<div style="position: absolute;top: 340px;font-size: 3.3em;font-weight: 900;left: 250px;color:#ff6600;cursor:pointer;"><a title="Mesurer les attentes et pratiques des citoyens" href="#d-sidd_vous_accompagne" class="interrogation">?</a></div>
<div style="position: absolute;top: 135px;font-size: 1.8em;font-weight: 900;left: 200px;color:#344253;width: 100px;text-align: center;background-color: #FFF;opacity: 0.7;">Chiffre_a_remplacer_13</div>
<div style="position: absolute;top: 220px;font-size: 1.8em;font-weight: 900;left: 290px;color:#344253;width: 180px;text-align: right;background-color: #FFF;opacity: 0.7;">Chiffre_a_remplacer_16 M€</div>
<div style="position: absolute;top: 0px;font-size: 3.3em;font-weight: 900;left: 370px;color:#ff6600;cursor:pointer;"><a title="Mesurer les attentes et pratiques des citoyens" href="#d-sidd_vous_accompagne" class="interrogation">?</a></div>
<div class="navigation">
<a  href="#"  onclick="javascript:$(\'.DetailsNavigation\').hide();$(\'#DetailsNavigation_RechercherTer\').show();$(\'.DetailsNavigation\').removeClass(\'Partager_lien\');$(\'.DetailsNavigation\').removeClass(\'Partager_mail\');return false;" class="Outils_navigation" >Rechercher votre territoire <span class="icon-search" style="font-weight: 900;"></span></a>
<a href="#"  onclick="javascript:$(\'.DetailsNavigation\').hide();$(\'.DetailsNavigation_Partager\').hide();$(\'#DetailsNavigation_Partager_lien\').show();$(\'#DetailsNavigation_Partager\').show();$(\'.DetailsNavigation\').addClass(\'Partager_lien\');$(\'.DetailsNavigation\').removeClass(\'Partager_mail\');return false;" class="Outils_navigation" >Partager <span class="icon-share3" style="font-weight: 900;"></span></a>
<a class="Outils_navigation" >Télécharger <span class="icon-cloud-download2" style="font-weight: 900;"></span></a>
</div>
</div>





<div class="Def_Enjeux">
<p style="font-weight: 900;margin-bottom: 5px;font-size: 1.4em;">> Les enjeux:</p>
<ul style="padding-left: 15px;">
<li>Meilleure valorisation des productions locales.</li>
<li>Maintien ou création d’emplois non délocalisables liés à la production, à la commercialisation et à la transformation.</li>
<li>Renforcer les liens et la confiance entre producteurs et consommateurs.</li>
<li>Réduire la consommation d’énergie et les gaz à effets de serre liée à la limitation des transports et à la réduction des emballages.</li>
<li>Préserver la biodiversité et aménager le territoire.</li>
</ul>
<p style="font-size: 0.8em;font-style: italic;margin-top: 50px;"><span style="font-weight: 900;">Les circuits courts:</span>
Selon le Ministère de l\'alimentation, de l\'agriculture et de la pêche, un circuit court est un mode de commercialisation des produits agricoles qui s’exerce soit par la vente directe du producteur au consommateur, soit par la vente indirecte à condition qu’il n’y ait qu’un seul intermédiaire. Le lieu de production se situe à moins de 80 kms du lieu de distribution.</p>
</div>

<div id="DetailsNavigation">
Recherche_Ter_A_Remplacer
Partager_A_Remplacer
</div>

<div class="ChiffresCles">
<p style="font-weight: 900;margin-bottom: 5px;font-size: 1.4em;">Quelques chiffres clés :</p>
<hr noshade style="color: #ff6600;">
<p style="margin-bottom: 5px;"><span style="font-weight: 900;font-size: 1.7em;">Chiffre_a_remplacer_01</span> hectares pour 1000 habitants<font style="font-size: 0.65em;">(1)</font> en 2010 à 80 kms autour de Ma_Commune_A_Remplacer (Chiffre_a_remplacer_02 ha sur Ma_Commune_A_Remplacer)<br/>
<span style="line-height: 40px;">Evolution_a_remplacer_03<span style="margin-left: 5px;">Chiffre_a_remplacer_03% entre 2000 et 2010 (Chiffre_a_remplacer_04% sur Ma_Commune_A_Remplacer)</span></span><br/>
Chiffre_a_remplacer_05%  de la surface agricole utile est certifiée bio en 2014 (Chiffre_a_remplacer_06% sur Ma_Commune_A_Remplacer)</p>
<p style="font-size: 0.7em;font-style: italic;">(1) 265 à 350 ha sont nécessaires à la relocalisation de l\'alimentation de 1000 habitants).</p>
<hr noshade style="color: #ff6600;">
<p style="margin-bottom: 5px;"><span style="font-weight: 900;font-size: 1.7em;">Chiffre_a_remplacer_07</span> agriculteurs (en équivalent temps plein: ETP) pour 1000 habitants<font style="font-size: 0.65em;">(2)</font> en 2010, soit Chiffre_a_remplacer_08% de l\'emploi total dans un rayon de 80 kms autour de Ma_Commune_A_Remplacer (Chiffre_a_remplacer_09 ETP agricole pour 1000 habitants sur Ma_Commune_A_Remplacer, soit Chiffre_a_remplacer_10% de l\'emploi total sur Ma_Commune_A_Remplacer)<br/>
<span>Evolution_a_remplacer_11<span style="margin-left: 5px;">Chiffre_a_remplacer_11% entre 2000 et 2010 (Chiffre_a_remplacer_12% sur Ma_Commune_A_Remplacer)</span></span></p>
<p style="font-size: 0.7em;font-style: italic;">(2) 18 paysans (Paysans boulangers,Céréaliers, Eleveurs bovins,Maraichers, Arboriculteurs, Eleveurs de porcs, Eleveurs de volailles) pourraient vivre de la relocalisation de l\'alimentation de 1000 habitants.</p>
<hr noshade style="color: #ff6600;">
<p style="margin-bottom: 5px;"><span style="font-weight: 900;font-size: 1.7em;">Chiffre_a_remplacer_13</span> distributeurs en circuits-courts en 2015 à moins de 10 kms de Ma_Commune_A_Remplacer. Le distributeur en circuits-courts le plus proche de Ma_Commune_A_Remplacer se situe à Chiffre_a_remplacer_14 minutes (en voiture). Chiffre_a_remplacer_15% des achats du panier de produits alimentaires (boissons alcoolisées et non alcoolisées comprises) des ménages de Ma_Commune_A_Remplacer peut être réalisé en circuits-courts à moins de 10 kms de Ma_Commune_A_Remplacer.</p>
<hr noshade style="color: #ff6600;">
<p style="margin-bottom: 5px;"><span style="font-weight: 900;font-size: 1.7em;">Chiffre_a_remplacer_16 M€</span> consommés par les habitants de Ma_Commune_A_Remplacer au minimum<font style="font-size: 0.65em;">(3)</font> chaque année en produits alimentaires et boissons (alcoolisées et non alcoolisées).</p>
<p style="font-size: 0.7em;font-style: italic;">(3) estimation réalisée à partir des données du budget des familles 2011</p>
<hr noshade style="color: #ff6600;">
</div>




<div class="PointsForts">
<p style="font-weight: 900;margin-bottom: 5px;font-size: 1.4em;color: #ff6600;">Points forts // Points faibles  <a class=info onclick=\'return false\' href="#"><sup style="color: #ff6600;">?</sup><span>Positionnement de Ma_Commune_A_Remplacer vis-à-vis du reste de la France (0 étoile étant le niveau de développement minimum et 5 étoiles le niveau de développement maximum).</span></a> :</p>
<table class="Tab_PtFort">
  <tr>
    <td class="ColGauche" rowspan=3>Production</td>
    <td class="ColMilieu" style="border-bottom-style: none;padding-bottom: 0px;" >La capacité à produire sur Ma_Commune_A_Remplacer (et dans un rayon de 80 kms autour de Ma_Commune_A_Remplacer) est-elle en adéquation avec le besoin de consommer:</td>
    <td class="ColDroite" style="border-bottom-style: none;padding-bottom: 0px;"></td>
  </tr>
  <tr>
    <td class="ColMilieu" style="border-bottom-style: none;border-top-style: none;padding-left: 10%;padding-top: 0px;padding-bottom: 0px;"><li>des produits locaux ?</li></td>
    <td class="ColDroite" style="border-bottom-style: none;border-top-style: none;padding-top: 0px;padding-bottom: 0px;"><input type="hidden" class="rating" readonly="readonly" value="Score_a_remplacer_1"/></td>
  </tr>
  <tr>
    <td class="ColMilieu" style="border-top-style: none;padding-left: 10%;padding-top: 0px;"><li>des produits locaux bio ?</li></td>
    <td class="ColDroite" style="border-top-style: none;padding-top: 0px;"><input type="hidden" class="rating" readonly="readonly" value="Score_a_remplacer_2"/></td>
  </tr>


  <tr>
    <td class="ColGauche" rowspan=2>Distribution</td>
    <td class="ColMilieu" style="border-bottom-style: none;" >Le maillage commercial des points de vente en circuits-courts est-il en mesure de redistribuer efficacement les produits locaux sur Ma_Commune_A_Remplacer (ou dans un rayon de 10 kms) ?</td>
    <td class="ColDroite" style="border-bottom-style: none;"><input type="hidden" class="rating" readonly="readonly" value="Score_a_remplacer_3"/></td>
  </tr>
  <tr>
    <td class="ColMilieu" style="border-bottom-style: none;border-top-style: none;">Le maillage commercial couvre-t-il l\'ensemble des produits alimentaires (boissons alcoolisées et non alcoolisées comprises) ? </td>
    <td class="ColDroite" style="border-bottom-style: none;border-top-style: none;"><input type="hidden" class="rating" readonly="readonly" value="Score_a_remplacer_4"/></td>
  </tr>



  <tr>
    <td class="ColGauche">Consommation<br></td>
    <td class="ColMilieu">Quel est le niveau du potentiel de consommation des habitants de Ma_Commune_A_Remplacer ?</td>
    <td class="ColDroite"><input type="hidden" class="rating" readonly="readonly" value="Score_a_remplacer_5"/></td>
  </tr>
</table>
</div>

</div>
</div>';
		$Partie2='<div class="Boite" style="width: 100%;">
<h2>Quelques repères</h2>
<p>Temps minimum d\'accès à un distributeur de produits alimentaires en circuits courts</p>
<div id="googft-mapCanvas"></div>
</div>';
		$Partie3='<div class="Boite">
<h2>Territoires similaires</h2>
<p>Retouver ci-dessous les communes ayant des problématiques les plus similaires à Ma_Commune_A_Remplacer sur la thématique des circuits courts.<br/>
L\'intérêt est double pour votre collectivité:
<ul>
<li>Se situer par rapport à des collectivités aux problématiques similaires</li>
<li>repérer des collectivités avec lesquelles il pourrait être intéressant de mutualiser une ingénierie pour diminuer les coûts sans pour autant perdre en qualité d\'ingénierie (grâce à la similarité des problématiques)</li>
</ul>
</p>


<table id="TableauProxi" class="display" style="margin-top: 10px;width: 100%;text-align: left;cellspacing:0;cursor: pointer;">
        <thead>
            <tr>
    		<th>Commune</th>
    		<th style="width:200px;">Intercommunalité</th>
    		<th>Département</th>
    		<th>Région</th>
    		<th>Type de commune</th>
    		<th>Depcom</th>
    		<th>LatLong</th>
    		<th>Similarité<a class=info onclick=\'return false\' href="#"><sup style="color: #ff6600;">?</sup><span style="font-size:1em;">Niveau de similarité entre deux territoires en termes de potentiel de consommation, de distribution et de production. Il est compris entre 0% (absence) et 100% (très forte similarité des trois indicateurs entre Ma_Commune_A_Remplacer et les autres territoires).</span></a></th>
<th>Composante1</th>
<th>Composante2</th>
<th>Composante3</th>
<th>Composante4</th>
<th>Composante5</th>
<th>Composante6</th>
<th>Composante7</th>
<th>Composante8</th>
<th>Composante9</th>
<th>Composante10</th>
<th>Composante11</th>
<th>Composante12</th>
<th>Composante13</th>
<th>Composante14</th>
<th>Composante15</th>
<th>Composante16</th>
<th>Composante17</th>
<th>Composante18</th>
<th>Composante19</th>
<th>Composante20</th>
<th>Composante21</th>
<th>Composante22</th>
<th>Composante23</th>
<th>Composante24</th>
<th>Composante25</th>

            </tr>
        </thead>


    </table>

</div>';
		$Partie4='<hr noshade>

<div id="d-sidd_vous_accompagne" class="Boite">
<h2>D-SIDD vous accompagne</h2>
<p>
D-SIDD mesure les attentes des citoyens, recense leurs pratiques et leurs besoins. Cette nouvelle information vient nourrir le processus de décision et permet le partage de la décision.
</p>
<p style="font-size: 0.8em;font-style: italic;">
N\'hesitez pas à nous contacter pour plus d\'informations: <a href="mailto:d.sidd.projet@gmail.com">d.sidd.projet@gmail.com</a>
</p>
</div>';
		$Partie5='<hr noshade>

<div class="Boite">
<h2>Nos sources</h2>
<p style="line-height: 100%; text-align: justify;">
<a href="http://alimentation.gouv.fr">Ministère de l’agriculture, de l’agroalimentaire et de la forêt</a>, 
<a href="http://agreste.agriculture.gouv.fr/">Agreste</a>, 
<a href="http://www.insee.fr/fr/">INSEE</a>, 
<a href="http://www.agencebio.org/">Agence Bio</a>, 
<a href="http://www.reseau-amap.org/">Annuaire National des AMAP</a>, 
<a href="http://www.avenir-bio.fr/">Avenir Bio</a>, 
<a href="http://www.accueil-paysan.com/fr/">Accueil Paysan</a>,
<a href="http://www.bienvenue-a-la-ferme.com/">Bienvenue à la ferme</a>,
<a href="http://www.magasin-de-producteurs.fr/">Magasin de Producteurs</a>,
<a href="http://www.mon-panier-bio.com/">Mon panier bio</a>,
<a href="http://www.h2gis.org">H2Gis-CNRS</a>.
</p>
</div>';
		$Pied_De_Page='<div class="PiedDePage">
</div>
</div>';
		include "scripts/Construction_Fiche_CircuitsCourts_test.php";
	?>


<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {

    $('#TableauProxi').dataTable( {
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        responsive: true,
        "ajax": {
            "url": "scripts/creation_matrice_similarite2.php?fiche=" + fiche + "&Depcom=" + Depcom
        },
        "columnDefs": [
            {
                "targets": [ 4 ],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [ 5 ],
                "visible": true,
                "searchable": false
            },
            {
                "targets": [ 6 ],
                "visible": true,
                "searchable": false
            },
            {
                "targets": [ 7 ],
                "visible": true,
                "searchable": false,
		"render": function ( data, type, row ) {
                    return Math.round(data *100) +'%';
                }
            },
{"targets": [ 8 ], "visible": true, "searchable": false },
{"targets": [ 9 ], "visible": true, "searchable": false },
{"targets": [ 10 ], "visible": true, "searchable": false },
{"targets": [ 11 ], "visible": true, "searchable": false },
{"targets": [ 12 ], "visible": true, "searchable": false },
{"targets": [ 13 ], "visible": true, "searchable": false },
{"targets": [ 14 ], "visible": true, "searchable": false },
{"targets": [ 15 ], "visible": true, "searchable": false },
{"targets": [ 16 ], "visible": true, "searchable": false },
{"targets": [ 17 ], "visible": true, "searchable": false },
{"targets": [ 18 ], "visible": true, "searchable": false },
{"targets": [ 19 ], "visible": true, "searchable": false },
{"targets": [ 20 ], "visible": true, "searchable": false },
{"targets": [ 21 ], "visible": true, "searchable": false },
{"targets": [ 22 ], "visible": true, "searchable": false },
{"targets": [ 23 ], "visible": true, "searchable": false },
{"targets": [ 24 ], "visible": true, "searchable": false },
{"targets": [ 25 ], "visible": true, "searchable": false },
{"targets": [ 26 ], "visible": true, "searchable": false },
{"targets": [ 27 ], "visible": true, "searchable": false },
{"targets": [ 28 ], "visible": true, "searchable": false },
{"targets": [ 29 ], "visible": true, "searchable": false },
{"targets": [ 30 ], "visible": true, "searchable": false },
{"targets": [ 31 ], "visible": true, "searchable": false },
{"targets": [ 32 ], "visible": true, "searchable": false }

        ],
        "order": [[ 7, "desc" ]],
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/1.10.7/i18n/French.json"
        },
"fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
	valeur=Math.sqrt(Math.pow(aData[8]-Comp1_Ter,2) + Math.pow(aData[9]-Comp2_Ter,2) + Math.pow(aData[10]-Comp3_Ter,2) + Math.pow(aData[11]-Comp4_Ter,2) + Math.pow(aData[12]-Comp5_Ter,2) + Math.pow(aData[13]-Comp6_Ter,2) + Math.pow(aData[14]-Comp7_Ter,2) + Math.pow(aData[15]-Comp8_Ter,2) + Math.pow(aData[16]-Comp9_Ter,2) + Math.pow(aData[17]-Comp10_Ter,2) + Math.pow(aData[18]-Comp11_Ter,2) + Math.pow(aData[19]-Comp12_Ter,2) + Math.pow(aData[20]-Comp13_Ter,2) + Math.pow(aData[21]-Comp14_Ter,2) + Math.pow(aData[22]-Comp15_Ter,2) + Math.pow(aData[23]-Comp16_Ter,2) + Math.pow(aData[24]-Comp17_Ter,2) + Math.pow(aData[25]-Comp18_Ter,2) + Math.pow(aData[26]-Comp19_Ter,2) + Math.pow(aData[27]-Comp20_Ter,2) + Math.pow(aData[28]-Comp21_Ter,2) + Math.pow(aData[29]-Comp22_Ter,2) + Math.pow(aData[30]-Comp23_Ter,2) + Math.pow(aData[31]-Comp24_Ter,2) + Math.pow(aData[32]-Comp25_Ter,2));



	valeur=Math.round((1-(valeur - min_simil_Ter)/(Max_simil_Ter - min_simil_Ter))*100);
	$('td:eq(6)', nRow).html(valeur+"%");
},
"fnDrawCallback": function( oSettings ) {
	$('#TableauProxi td:nth-child(5),#TableauProxi th:nth-child(5),#TableauProxi td:nth-child(6),#TableauProxi th:nth-child(6),#TableauProxi td:nth-child(8),#TableauProxi th:nth-child(8),#TableauProxi td:nth-child(9),#TableauProxi th:nth-child(9),#TableauProxi td:nth-child(10),#TableauProxi th:nth-child(10),#TableauProxi td:nth-child(11),#TableauProxi th:nth-child(11),#TableauProxi td:nth-child(12),#TableauProxi th:nth-child(12),#TableauProxi td:nth-child(13),#TableauProxi th:nth-child(13),#TableauProxi td:nth-child(14),#TableauProxi th:nth-child(14),#TableauProxi td:nth-child(15),#TableauProxi th:nth-child(15),#TableauProxi td:nth-child(16),#TableauProxi th:nth-child(16),#TableauProxi td:nth-child(17),#TableauProxi th:nth-child(17),#TableauProxi td:nth-child(18),#TableauProxi th:nth-child(18),#TableauProxi td:nth-child(19),#TableauProxi th:nth-child(19),#TableauProxi td:nth-child(20),#TableauProxi th:nth-child(20),#TableauProxi td:nth-child(21),#TableauProxi th:nth-child(21),#TableauProxi td:nth-child(22),#TableauProxi th:nth-child(22),#TableauProxi td:nth-child(23),#TableauProxi th:nth-child(23),#TableauProxi td:nth-child(24),#TableauProxi th:nth-child(24),#TableauProxi td:nth-child(25),#TableauProxi th:nth-child(25),#TableauProxi td:nth-child(26),#TableauProxi th:nth-child(26),#TableauProxi td:nth-child(27),#TableauProxi th:nth-child(27),#TableauProxi td:nth-child(28),#TableauProxi th:nth-child(28),#TableauProxi td:nth-child(29),#TableauProxi th:nth-child(29),#TableauProxi td:nth-child(30),#TableauProxi th:nth-child(30),#TableauProxi td:nth-child(31),#TableauProxi th:nth-child(31),#TableauProxi td:nth-child(32),#TableauProxi th:nth-child(32)').hide();
    },
    "oSearch": {"sSearch": EPCI_commune}
    } );

    $('#TableauProxi tbody').on('click', 'tr', function () {
	Depcom=$('td', this).eq(4).text();
	Coordonnees=$('td', this).eq(5).text();
	geocodeAddress();
    } );


} );

jQuery(window).load(function(){
	geocodeAddress();
 	 $('#TableauProxi').dataTable().fnSort( [ [7,'desc'] ] );
});


	</script>

</body></html>
