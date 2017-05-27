<?php
include("inc/header.inc.php");

echo '<div id="pagecentre">'."\n";
echo '<h1>Statistiques</h1>'."\n";
echo '<p><br/>> <a href="http://d-sidd.com/piwik/" target="_blank">Consulter les statistiques sur Piwik</a><br/><br/></p>'."\n";
echo '<h1>Derniers membres inscrit</h1>'."\n";

$sql = "SELECT * FROM " .$table_users. "  WHERE user_access >= 4 ORDER BY user_inscription DESC, user_heure DESC LIMIT 0,5";
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

if($res){
while($row = mysql_fetch_array($req)) {
$user_id = $row['user_id'];
$user_name = $row['user_name'];
$user_mail = $row['user_mail'];
$user_activation = $row['user_activation'];
$user_access = $row['user_access'];
$user_nom = $row['user_nom'];
$user_prenom = $row['user_prenom'];
$user_inscription = $row['user_inscription'];
$user_heure = $row['user_heure'];
$user_send = $row['user_send'];
$user_type = $row['user_type'];
$user_ville = $row['user_ville'];
$user_depcom = $row['user_depcom'];
$user_tel = $row['user_tel'];

if(!$user_heure){ $user_heure = '00h00'; }

$user_inscription = explode('-', $user_inscription);
if($user_inscription[1] == 1){
$user_inscription[1] = 'janvier';
} elseif ($user_inscription[1] == 2){
$user_inscription[1] = 'février';
} elseif ($user_inscription[1] == 3){
$user_inscription[1] = 'mars';
} elseif ($user_inscription[1] == 4){
$user_inscription[1] = 'avril';
} elseif ($user_inscription[1] == 5){
$user_inscription[1] = 'mai';
} elseif ($user_inscription[1] == 6){
$user_inscription[1] = 'juin';
} elseif ($user_inscription[1] == 7){
$user_inscription[1] = 'juillet';
} elseif ($user_inscription[1] == 8){
$user_inscription[1] = 'août';
} elseif ($user_inscription[1] == 9){
$user_inscription[1] = 'septembre';
} elseif ($user_inscription[1] == 10){
$user_inscription[1] = 'octobre';
} elseif ($user_inscription[1] == 11){
$user_inscription[1] = 'novembre';
} elseif ($user_inscription[1] == 12){
$user_inscription[1] = 'décembre';
}


echo '<div id="users2">'."\n";
echo '<h1>'.$user_name.'</h1>'."\n";
echo '<p align="right">Inscrit le '.$user_inscription[2].' '.$user_inscription[1].' '.$user_inscription[0].' à '.$user_heure.'.</p>'."\n";

echo '<table>'."\n";
echo '<tr>'."\n";
echo '<td valign="top" width="50%">'."\n";
echo '<p>Courriel : <a href="mailto:'.$user_mail.'">'.$user_mail.'</a></p>'."\n";
if($user_type == 2){
echo '<p>Profil : <span class="user_type1">Collectivité (élu)</span></p>'."\n";
} elseif($user_type == 3){
echo '<p>Profil : <span class="user_type1">Collectivité (technicien)</span></p>'."\n";
} elseif($user_type == 4){
echo '<p>Profil : <span class="user_type1">Entreprise</span></p>'."\n";
} elseif($user_type == 5){
echo '<p>Profil : <span class="user_type1">Association</span></p>'."\n";
} elseif($user_type == 6){
echo '<p>Profil : <span class="user_type1">Autre</span></p>'."\n";
} elseif($user_type == 1){
echo '<p>Profil : <span class="user_type1">Citoyen</span></p>'."\n";
} else {
echo '<p>Profil : <span class="user_type1">Citoyen</span></p>'."\n";
}
echo '<p>Ville : <span class="user_type1">'.$user_ville.'</span></p>'."\n";
echo '<p>Depcom : <span class="user_type1">'.$user_depcom.'</span></p>'."\n";
if($user_tel){
echo '<p>Téléphone : <span class="user_type1">'.$user_tel.'</span></p>'."\n";
}

echo '</td>'."\n";
echo '<td valign="top" width="50%">'."\n";

$sqlb = "SELECT * FROM " .$table_log. " WHERE log_user_id = '$user_id' ORDER BY log_date DESC, log_heure DESC LIMIT 0,10 "; 
$reqb = mysql_query($sqlb) or die('Erreur SQL !'.$sqlb.'<br>'.mysql_error());
$resb = mysql_num_rows($reqb);

if($resb){
echo '<p>Dernières connexions :</p>'."\n";
echo '<p>'."\n";
while($rowb = mysql_fetch_array($reqb)) {
$log_date = $rowb['log_date'];
$log_heure = $rowb['log_heure'];

$log_date = explode('-', $log_date);
if($log_date[1] == 1){
$log_date[1] = 'janvier';
} elseif ($log_date[1] == 2){
$log_date[1] = 'février';
} elseif ($log_date[1] == 3){
$log_date[1] = 'mars';
} elseif ($log_date[1] == 4){
$log_date[1] = 'avril';
} elseif ($log_date[1] == 5){
$log_date[1] = 'mai';
} elseif ($log_date[1] == 6){
$log_date[1] = 'juin';
} elseif ($log_date[1] == 7){
$log_date[1] = 'juillet';
} elseif ($log_date[1] == 8){
$log_date[1] = 'août';
} elseif ($log_date[1] == 9){
$log_date[1] = 'septembre';
} elseif ($log_date[1] == 10){
$log_date[1] = 'octobre';
} elseif ($log_date[1] == 11){
$log_date[1] = 'novembre';
} elseif ($log_date[1] == 12){
$log_date[1] = 'décembre';
}

echo '- Le '.$log_date[2].' '.$log_date[1].' '.$log_date[0].' à '.$log_heure.'.<br/>'."\n";
}
echo '</p>'."\n";
} else {
echo '<p>L\'utilisateur ne s\'est jamais connecté.</p>'."\n";
}
echo '</td>'."\n";
echo '</tr>'."\n";
echo '</table>'."\n";
echo '<p align="right">[ <a href="users.php?action=edit&user_id='.$user_id.'&alph='.$alph.'&type='.$type.'">Modifier</a> ] [ <a href="users.php?action=del&user_id='.$user_id.'&alph='.$alph.'&type='.$type.'&confirm=av">Supprimer</a> ]</p>'."\n";
echo '</div>';
}
}
echo '</div>'."\n";

include("inc/footer.inc.php");
?>