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
	<script type="text/javascript" language="javascript" src="dist/script_carto.js"></script>
	<link rel="stylesheet" type="text/css" href="dist/fiches.css">
  <meta property="og:image" content="http://www.d-sidd.com/Fiches/images/Infographie_CircuitCourt_SansChiffres_RS.jpg" />
	<?php 
		$fiche='Circuits_Courts';
$en_tete1='
<meta property="og:type" content="website" />
<meta property="og:title" content="Les circuits courts de Ma_Commune_A_Remplacer avec D-SIDD" />
<meta property="og:url" content="Lien_A_Remplacer" />
<meta property="og:description" content="Voici le diagnostic des circuits courts de Ma_Commune_A_Remplacer. Les diagnostics des communes de France sont en accès libre sur www.d-sidd.com. D-SIDD est un projet d\'innovation sociale qui permet d\'analyser votre territoire sous l\'angle de l\'économie collaborative." />

</head>';
$en_tete2='<body dir="ltr" lang="fr-FR" link="#0000ff" id="target">
<script>
    function fbShare(url, title, descr, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open(\'http://www.facebook.com/sharer.php?s=100&p[title]=\' + title + \'&p[summary]=\' + descr + \'&p[url]=\' + url + \'&p[images][0]=\' + image, \'sharer\', \'top=\' + winTop + \',left=\' + winLeft + \',toolbar=0,status=0,width=\' + winWidth + \',height=\' + winHeight);
    }
</script>

	    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, \'script\', \'facebook-jssdk\'));</script>

<div id="EnsembleContenu">
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
		include "scripts/Construction_Fiche_CircuitsCourts.php";
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
{"targets": [ 14 ], "visible": true, "searchable": false }

        ],
        "order": [[ 7, "desc" ]],
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/1.10.7/i18n/French.json"
        },
"fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
	valeur=Math.sqrt(Math.pow(aData[8]-Comp1_Ter,2) + Math.pow(aData[9]-Comp2_Ter,2) + Math.pow(aData[10]-Comp3_Ter,2) + Math.pow(aData[11]-Comp4_Ter,2) + Math.pow(aData[12]-Comp5_Ter,2) + Math.pow(aData[13]-Comp6_Ter,2) + Math.pow(aData[14]-Comp7_Ter,2) );


	if(valeur>Max_simil_Ter){
		valeur=0;
	}else if(valeur<min_simil_Ter){
		valeur=100;
	}else{
		valeur=Math.round((1-(valeur - min_simil_Ter)/(Max_simil_Ter - min_simil_Ter))*100);
	}
	$('td:eq(6)', nRow).html(valeur+"%");
},
"fnDrawCallback": function( oSettings ) {
	$('#TableauProxi td:nth-child(5),#TableauProxi th:nth-child(5),#TableauProxi td:nth-child(6),#TableauProxi th:nth-child(6),#TableauProxi td:nth-child(8),#TableauProxi th:nth-child(8),#TableauProxi td:nth-child(9),#TableauProxi th:nth-child(9),#TableauProxi td:nth-child(10),#TableauProxi th:nth-child(10),#TableauProxi td:nth-child(11),#TableauProxi th:nth-child(11),#TableauProxi td:nth-child(12),#TableauProxi th:nth-child(12),#TableauProxi td:nth-child(13),#TableauProxi th:nth-child(13),#TableauProxi td:nth-child(14),#TableauProxi th:nth-child(14)').hide();
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
