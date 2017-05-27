<?php 
session_start();

// on se connecte à MySQL
$db = mysql_connect('opensustmod2.mysql.db', 'opensustmod2', 'dsidd2015');
// on sélectionne la base
mysql_select_db('opensustmod2',$db);
// on selectionne l'UTF8 pour les accents
mysql_set_charset('utf8', $db);

	if (isset($_GET['liencom'])) 
	{			
		$sql = 'SELECT `code` FROM `Infos_Communes` WHERE `CircuitsCourts_Liens`="'.$_GET['liencom'].'"';
		// on envoie la requête
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		$Id_Ter = mysql_fetch_assoc($req)['code'];
	}else{
		if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
			$Id_Ter=$_SESSION['depcom'];
		}else{
				$sql = 'SELECT user_depcom FROM ds_users WHERE user_name="defaut"';
				// on envoie la requête
				$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
				$Id_Ter = mysql_fetch_assoc($req)['user_depcom'];
		}
	}

$sql='SELECT * FROM '.$fiche.' WHERE code="'.$Id_Ter.'"';

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());


while ($row = mysql_fetch_assoc($req)) {
	$latlong =$row['latlong'];
	$Nom_commune = $row['libéllé'];
	$EPCI_commune = $row['lib_epci'];
	$donnee_1 = round($row['sau_pour_1000_hab_10_80km']);
	$donnee_2 = round($row['sau_pour_1000_hab_10_commune']);
	$donnee_3 = round($row['evo_sau_pour_1000_hab_00_10_80km']*100);
	$donnee_4 = round($row['evo_sau_pour_1000_hab_00_10_commune']*100);
	$donnee_5 = round($row['part_surfbio_14_80km']*100);
	$donnee_6 = round($row['part_surfbio_14_commune']*100);
	$donnee_7 = ($row['etp_agr_pour_1000_hab_10_80km'])*1000;
	$donnee_8 = round($row['part_etp_agr_10_80km']*100);
	$donnee_9 = ($row['etp_agr_pour_1000_hab_10_commune'])*1000;
	$donnee_10 = round($row['part_etp_agr_10_commune']*100);
	$donnee_11 = round($row['evo_etp_agr_00_10_80km']*100);
	$donnee_12 = round($row['evo_etp_agr_00_10_commune']*100);
	$donnee_13 = $row['nb_circuits_courts'];
	$donnee_14 = round($row['temps_cc_plus_proche']);
	$donnee_15 = round($row['part_dc_satisf_10_kms']*100);
	$donnee_16 = round($row['dc_ali_alc_11']/1000000,1);
	$Comp1_Ter = $row['comp1'];
	$Comp2_Ter = $row['comp2'];
	$Comp3_Ter = $row['comp3'];
	$Comp4_Ter = $row['comp4'];
	$Comp5_Ter = $row['comp5'];
	$Comp6_Ter = $row['comp6'];
	$Comp7_Ter = $row['comp7'];
	$Comp8_Ter = $row['comp8'];
	$Comp9_Ter = $row['comp9'];
	$Comp10_Ter = $row['comp10'];
	$Comp11_Ter = $row['comp11'];
	$Comp12_Ter = $row['comp12'];
	$Comp13_Ter = $row['comp13'];
	$Comp14_Ter = $row['comp14'];
	$Comp15_Ter = $row['comp15'];
	$Comp16_Ter = $row['comp16'];
	$Comp17_Ter = $row['comp17'];
	$Comp18_Ter = $row['comp18'];
	$Comp19_Ter = $row['comp19'];
	$Comp20_Ter = $row['comp20'];
	$Comp21_Ter = $row['comp21'];
	$Comp22_Ter = $row['comp22'];
	$Comp23_Ter = $row['comp23'];
	$Comp24_Ter = $row['comp24'];
	$Comp25_Ter = $row['comp25'];
	$Comp26_Ter = $row['comp26'];
}

/*
if (!isset($_GET['liencom'])) {
	if (!isset($_SESSION['id']) && !isset($_SESSION['pseudo'])){
		$Nom_commune='Ma Commune';
	}
}
*/

/*Calcul score*/
$sql='SELECT count(*)*0.25 as Ind_Q1,count(*)*0.75 as Ind_Q3 FROM '.$fiche;
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());


while ($row = mysql_fetch_assoc($req)) {
	$Ind_Q1 = round($row['Ind_Q1']);
	$Ind_Q3 = round($row['Ind_Q3']);
}
$formule_1='`sau_pour_1000_hab_10_commune`';
$formule_2='`part_surfbio_14_commune`';
$formule_3='`nb_circuits_courts`';
$formule_4='`part_dc_satisf_10_kms`';
$formule_5='`dc_men_ali_alc_11`';

for ($i = 1; $i <= 5; $i++) {
	for ($j = 1; $j <= 3; $j++) {
		if($j!=2){
			${'sql'.$i.'_'.$j}='SELECT '.${'formule_'.$i}.' as Score_Brut_'.$i.' FROM '.$fiche.' ORDER BY Score_Brut_'.$i.' ASC LIMIT '.${'Ind_Q'.$j}.',1';
		}else{
			${'sql'.$i.'_'.$j}='SELECT '.${'formule_'.$i}.' as Score_Brut_'.$i.' FROM '.$fiche.' WHERE code="'.$Id_Ter.'"' ; 
		}
		${'req'.$i.'_'.$j} = mysql_query(${'sql'.$i.'_'.$j}) or die('Erreur SQL !<br>'.${'sql'.$i.'_'.$j}.'<br>'.mysql_error());
		${'Val'.$i.'_'.$j} = mysql_fetch_assoc(${'req'.$i.'_'.$j})['Score_Brut_'.$i];
	}/*next j*/

	${'Min_'.$i}=${'Val'.$i.'_1'}-(${'Val'.$i.'_3'}-${'Val'.$i.'_1'})*1.5;
	${'Max_'.$i}=${'Val'.$i.'_3'}+(${'Val'.$i.'_3'}-${'Val'.$i.'_1'})*1.5;

	if (${'Val'.$i.'_2'}<${'Min_'.$i}){
		${'Score_'.$i}=0;
	}else if(${'Val'.$i.'_2'}>${'Max_'.$i}){
		${'Score_'.$i}=5;
	}else{
		${'Score_'.$i}=round(((${'Val'.$i.'_2'}-${'Min_'.$i})/(${'Max_'.$i}-${'Min_'.$i}))*5,1);
	}
	$Partie1=str_replace('Score_a_remplacer_'.$i, ${'Score_'.$i}, $Partie1);
}/*next i*/
/*Fin calcul score*/


/*Calcul similarité*/

$sql='SELECT MIN(pow(pow(`comp1`-'.$Comp1_Ter.',2) + pow(`comp2`-'.$Comp2_Ter.',2) + pow(`comp3`-'.$Comp3_Ter.',2) + pow(`comp4`-'.$Comp4_Ter.',2) + pow(`comp5`-'.$Comp5_Ter.',2) + pow(`comp6`-'.$Comp6_Ter.',2) + pow(`comp7`-'.$Comp7_Ter.',2) + pow(`comp8`-'.$Comp8_Ter.',2) + pow(`comp9`-'.$Comp9_Ter.',2) + pow(`comp10`-'.$Comp10_Ter.',2) + pow(`comp11`-'.$Comp11_Ter.',2) + pow(`comp12`-'.$Comp12_Ter.',2) + pow(`comp13`-'.$Comp13_Ter.',2) + pow(`comp14`-'.$Comp14_Ter.',2) + pow(`comp15`-'.$Comp15_Ter.',2) + pow(`comp16`-'.$Comp16_Ter.',2) + pow(`comp17`-'.$Comp17_Ter.',2) + pow(`comp18`-'.$Comp18_Ter.',2) + pow(`comp19`-'.$Comp19_Ter.',2) + pow(`comp20`-'.$Comp20_Ter.',2) + pow(`comp21`-'.$Comp21_Ter.',2) + pow(`comp22`-'.$Comp22_Ter.',2) + pow(`comp23`-'.$Comp23_Ter.',2) + pow(`comp24`-'.$Comp24_Ter.',2) + pow(`comp25`-'.$Comp25_Ter.',2) + pow(`comp26`-'.$Comp26_Ter.',2),0.5)) as min_simil, MAX(pow(pow(`comp1`-'.$Comp1_Ter.',2) + pow(`comp2`-'.$Comp2_Ter.',2) + pow(`comp3`-'.$Comp3_Ter.',2) + pow(`comp4`-'.$Comp4_Ter.',2) + pow(`comp5`-'.$Comp5_Ter.',2) + pow(`comp6`-'.$Comp6_Ter.',2) + pow(`comp7`-'.$Comp7_Ter.',2) + pow(`comp8`-'.$Comp8_Ter.',2) + pow(`comp9`-'.$Comp9_Ter.',2) + pow(`comp10`-'.$Comp10_Ter.',2) + pow(`comp11`-'.$Comp11_Ter.',2) + pow(`comp12`-'.$Comp12_Ter.',2) + pow(`comp13`-'.$Comp13_Ter.',2) + pow(`comp14`-'.$Comp14_Ter.',2) + pow(`comp15`-'.$Comp15_Ter.',2) + pow(`comp16`-'.$Comp16_Ter.',2) + pow(`comp17`-'.$Comp17_Ter.',2) + pow(`comp18`-'.$Comp18_Ter.',2) + pow(`comp19`-'.$Comp19_Ter.',2) + pow(`comp20`-'.$Comp20_Ter.',2) + pow(`comp21`-'.$Comp21_Ter.',2) + pow(`comp22`-'.$Comp22_Ter.',2) + pow(`comp23`-'.$Comp23_Ter.',2) + pow(`comp24`-'.$Comp24_Ter.',2) + pow(`comp25`-'.$Comp25_Ter.',2) + pow(`comp26`-'.$Comp26_Ter.',2),0.5)) as Max_simil FROM '.$fiche;

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
while ($row = mysql_fetch_assoc($req)) {
	$min_simil_Ter = round($row['min_simil']);
	$Max_simil_Ter = round($row['Max_simil']);
}



/*Fin calcul similarité*/

for ($i = 1; $i <= 16; $i++) {
	if($i<10){
		$Partie1=str_replace('Chiffre_a_remplacer_0'.$i, ${'donnee_'.$i}, $Partie1);
		if(strpos($Partie1, 'Evolution_a_remplacer_0'.$i)){
			if(${'donnee_'.$i}<0){
				$Partie1=str_replace('Evolution_a_remplacer_0'.$i, '<span class="icon-Decrease" style="font-size:2.5em;margin-left: 25px;"></span>', $Partie1);
			}else{
				$Partie1=str_replace('Evolution_a_remplacer_0'.$i, '<span class="icon-Increase" style="font-size:2.5em;margin-left: 25px;"></span>', $Partie1);
			}
		}
	}else{
		$Partie1=str_replace('Chiffre_a_remplacer_'.$i, ${'donnee_'.$i}, $Partie1);
		if(strpos($Partie1, 'Evolution_a_remplacer_'.$i)){
			if(${'donnee_'.$i}<0){
				$Partie1=str_replace('Evolution_a_remplacer_'.$i, '<span class="icon-Decrease" style="font-size:2.5em;margin-left: 25px;"></span>', $Partie1);
			}else{
				$Partie1=str_replace('Evolution_a_remplacer_'.$i, '<span class="icon-Increase" style="font-size:2.5em;margin-left: 25px;"></span>', $Partie1);
			}
		}
	}
}

$Message_RechercheTer1='Pour accéder au diagnostic de votre territoire, connectez-vous ou inscrivez-vous sur d-sidd.com<br/> Les diagnostics sont en accès libre.
<div style="position: relative;">
<a href="/inscription.html" class="mybutton" style="margin-top: 20px;">Inscrivez-vous</a>
</div>';
			
$Message_RechercheTer2='Vous êtes déjà connecté à la fiche de Ma_Commune_A_Remplacer.';

$Message_RechercheTer3='Souhaitez-vous quitter la fiche de Ma_Commune_A_Remplacer pour celle de votre commune?
<div style="position: relative;">
<a href="CircuitsCourts_test.php?Afficher_Message_RechercheTer=oui" class="mybutton" style="margin-top: 20px;">Oui</a>
<a href="#"  onclick="javascript:$(\'.DetailsNavigation\').hide();return false;" class="mybutton" style="margin-top: 20px;margin-left: 20px;">Non</a>
</div>';

$Message_RechercheTer4='Vous êtes désormais connecté à la fiche de Ma_Commune_A_Remplacer.';



if (isset($_GET['liencom'])) {			
	if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
		$Message_RechercheTer=$Message_RechercheTer3;
	}else{
		$Message_RechercheTer=$Message_RechercheTer1;
	}
}else{
	if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
		$Message_RechercheTer=$Message_RechercheTer2;
	}else{
		$Message_RechercheTer=$Message_RechercheTer1;
	}
}

if (isset($_GET['Afficher_Message_RechercheTer'])) {
	if ($_GET['Afficher_Message_RechercheTer']=='oui') {
		$html_RechercheTer='<div id="DetailsNavigation_RechercherTer" class="DetailsNavigation" style="display:block;"><a class="fermerBD" href="#"  onclick="javascript:$(\'.DetailsNavigation\').hide();return false;">Fermer</a><br/>'.$Message_RechercheTer4.'</div>';
	}else{
		$html_RechercheTer='<div id="DetailsNavigation_RechercherTer" class="DetailsNavigation" style="display:none;"><a class="fermerBD" href="#"  onclick="javascript:$(\'.DetailsNavigation\').hide();return false;">Fermer</a><br/>'.$Message_RechercheTer.'</div>';
	}
}else{
		$html_RechercheTer='<div id="DetailsNavigation_RechercherTer" class="DetailsNavigation" style="display:none;"><a class="fermerBD" href="#"  onclick="javascript:$(\'.DetailsNavigation\').hide();return false;">Fermer</a><br/>'.$Message_RechercheTer.'</div>';
}

$Partie1=str_replace('Recherche_Ter_A_Remplacer', $html_RechercheTer, $Partie1);

		$sql = 'SELECT `CircuitsCourts_Liens` FROM `Infos_Communes` WHERE `code`="'.$Id_Ter.'"';
		// on envoie la requête
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		
$lien_init='http://d-sidd.com/Fiches/CircuitsCourts.php';

	if (isset($_GET['liencom'])) 
	{			
		$lien = $lien_init.'?liencom='.$_GET['liencom'];
	}else{
		if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
			$lien = $lien_init.'?liencom='.mysql_fetch_assoc($req)['CircuitsCourts_Liens'];
		}else{
			$lien = 'http://d-sidd.com/Fiches/CircuitsCourts.php';
		}
	}
		


$html_Partager='<div id="DetailsNavigation_Partager" class="DetailsNavigation" style="display:none;">
<a class="fermerBD" href="#"  onclick="javascript:$(\'.DetailsNavigation\').hide();return false;">Fermer</a>
<br/>
<div style="position: relative;">
<a href="#"  onclick="javascript:$(\'.BoutonPartager\').removeClass(\'selected\');$(this).addClass(\'selected\'); $(\'.DetailsNavigation_Partager\').hide();$(\'#DetailsNavigation_Partager_lien\').show();$(\'.DetailsNavigation\').addClass(\'Partager_lien\');$(\'.DetailsNavigation\').removeClass(\'Partager_mail\');return false;" class="BoutonPartager selected">Partager</a>
<a href="#"  onclick="javascript:$(\'.BoutonPartager\').removeClass(\'selected\');$(this).addClass(\'selected\'); $(\'.DetailsNavigation_Partager\').hide();$(\'#DetailsNavigation_Partager_mail\').show();$(\'.DetailsNavigation\').addClass(\'Partager_mail\');$(\'.DetailsNavigation\').removeClass(\'Partager_lien\');return false;" class="BoutonPartager" style="margin-left: 20px;">E-mail</a>    
</div>
<div id="DetailsNavigation_Partager_lien" class="DetailsNavigation_Partager" style="margin-top: 20px; float: left;width:100%;display:block;">
<div id="Ensemble_Partage">
<a href="https://twitter.com/home?status=Le%20diagnostic%20des%20circuits%20courts%20sur%20ma%20commune%20avec%20D-SIDD:%0A"'.$lien.' class="twitter-share-button" data-via="DSIDD_DSIDD" data-related="DSIDD_DSIDD" data-count="none" data-hashtags="D-SIDD"><img style="border: medium none;" src="/images/twitter.png" title="Partager cette page avec votre réseau" alt="Partager cette page avec votre réseau" height="35px"></a>
<a href="https://plus.google.com/share?url={'.$lien.'}" ><img style="border: medium none;" src="/images/google_plus.png" title="Partager cette page avec votre réseau" alt="Partager cette page avec votre réseau" height="35px"></a>
<a href="javascript:fbShare(\''.$lien.'\', \'Les circuits courts de Ma_Commune_A_Remplacer\', \'D-SIDD, c’est l’analyse de votre territoire sous l’angle de l’économie collaborative. Des diagnostics flashs sont en accès libre sur d-sidd.com.\' , \'http://d-sidd.com/Fiches/images/Infographie_CircuitCourt_SansChiffres_V4.png\' , 520, 350)"><img style="border: medium none;" src="/images/facebook.png" title="Partager cette page avec votre réseau" alt="Partager cette page avec votre réseau" height="35px"></a>		
</div>
<span><input class="share-panel-url" name="share_url" value="'.$lien.'"  title="Partager le lien"></span>
</div>
<div id="DetailsNavigation_Partager_mail" class="DetailsNavigation_Partager" style="margin-top: 20px; float: left;width:100%;display:none;">

<form method=POST action=formmail.php >
<input type=hidden name=subject value=formmail>
<table style="color:#ffffff;">
<tr><td>Votre Nom:</td>
    <td><input type=text name=realname size=30></td></tr>
<tr><td>Votre Email:</td>
    <td><input type=text name=email size=30></td></tr>
<tr><td>Objet:</td>
    <td><input type=text name=title size=30 value="Les circuits courts de Ma_Commune_A_Remplacer"></td></tr>
<tr><td colspan=2>Commentaires:<br>
  <textarea COLS=50 ROWS=6 style="width:900px;" name=comments>Vous trouverez le diagnostic des circuits courts de Ma_Commune_A_Remplacer sur le lien suivant:'.$lien.'</textarea>
</td></tr>
</table>
<br> <input type=submit value=Envoyer> -
     <input type=reset value=Annuler>
</form>
</div>
</div>
';


$Partie1=str_replace('Partager_A_Remplacer', $html_Partager, $Partie1);


$Partie1=str_replace('Ma_Commune_A_Remplacer', $Nom_commune, $Partie1);
$Partie2=str_replace('Ma_Commune_A_Remplacer', $Nom_commune, $Partie2);
$Partie3=str_replace('Ma_Commune_A_Remplacer', $Nom_commune, $Partie3);


// on ferme la connexion à mysql
mysql_close(); 

$html='<script type="text/javascript" language="javascript">
$(document).ready(function() {
	Comp1_Ter='.$Comp1_Ter.';
	Comp2_Ter='.$Comp2_Ter.';
	Comp3_Ter='.$Comp3_Ter.';
	Comp4_Ter='.$Comp4_Ter.';
	Comp5_Ter='.$Comp5_Ter.';
	Comp6_Ter='.$Comp6_Ter.';
	Comp7_Ter='.$Comp7_Ter.';
	Comp8_Ter='.$Comp8_Ter.';
	Comp9_Ter='.$Comp9_Ter.';
	Comp10_Ter='.$Comp10_Ter.';
	Comp11_Ter='.$Comp11_Ter.';
	Comp12_Ter='.$Comp12_Ter.';
	Comp13_Ter='.$Comp13_Ter.';
	Comp14_Ter='.$Comp14_Ter.';
	Comp15_Ter='.$Comp15_Ter.';
	Comp16_Ter='.$Comp16_Ter.';
	Comp17_Ter='.$Comp17_Ter.';
	Comp18_Ter='.$Comp18_Ter.';
	Comp19_Ter='.$Comp19_Ter.';
	Comp20_Ter='.$Comp20_Ter.';
	Comp21_Ter='.$Comp21_Ter.';
	Comp22_Ter='.$Comp22_Ter.';
	Comp23_Ter='.$Comp23_Ter.';
	Comp24_Ter='.$Comp24_Ter.';
	Comp25_Ter='.$Comp25_Ter.';
	Comp26_Ter='.$Comp26_Ter.';
	min_simil_Ter='.$min_simil_Ter.';
	Max_simil_Ter='.$Max_simil_Ter.';
	fiche="'.$fiche.'";
	Depcom="'.$Id_Ter.'";
	Coordonnees="'.$latlong.'";
	EPCI_commune="'.$EPCI_commune.'";
	requete="'.$sql1_1.'";
});
</script>';

$html.= $en_tete;
$html.=$Partie1;
$html.=$Partie2;
$html.=$Partie3;
$html.=$Partie4;
$html.=$Partie5;
$html.=$Pied_De_Page;
echo $html;
?>

