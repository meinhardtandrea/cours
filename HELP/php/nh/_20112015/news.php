<?php
include("inc/header.inc.php");

if (isset($_GET["news_id"])) $news_id = $_GET["news_id"];
else $news_id="";

echo '<div id="page_centre">'."\n";


$sql_t = "SELECT * FROM " .$table_news. "
LEFT JOIN " .$table_users. " ON ".$table_news.".news_author = ".$table_users.".user_id
WHERE news_id = '$news_id' AND news_activation = 'active' ";
$req_t = mysql_query($sql_t) or die('Erreur SQL !'.$sql_t.'<br>'.mysql_error());
$res_t = mysql_num_rows($req_t);
if($res_t){
while($row_t = mysql_fetch_array($req_t)) {

$news_pseudo = $row_t['user_name'];
$news_id = $row_t['news_id'];
$news_rub_id = $row_t['news_rub_id'];
$news_mod_id = $row_t['news_mod_id'];
$news_titre = $row_t['news_titre'];
$news_texte = $row_t['news_texte'];
$news_img = $row_t['news_img'];
$date = $row_t['news_date'];
$news_heure = $row_t['news_heure'];

$news_option1 = $row_t['news_option1'];
$news_option2 = $row_t['news_option2'];
$news_option3 = $row_t['news_option3'];

$date = explode('-', $date);
if($date[1] == 1){
$date[1] = 'janvier';
} elseif ($date[1] == 2){
$date[1] = 'février';
} elseif ($date[1] == 3){
$date[1] = 'mars';
} elseif ($date[1] == 4){
$date[1] = 'avril';
} elseif ($date[1] == 5){
$date[1] = 'mai';
} elseif ($date[1] == 6){
$date[1] = 'juin';
} elseif ($date[1] == 7){
$date[1] = 'juillet';
} elseif ($date[1] == 8){
$date[1] = 'août';
} elseif ($date[1] == 9){
$date[1] = 'septembre';
} elseif ($date[1] == 10){
$date[1] = 'octobre';
} elseif ($date[1] == 11){
$date[1] = 'novembre';
} elseif ($date[1] == 12){
$date[1] = 'décembre';
}

echo '<div id="elements">'."\n";
if($news_img){
echo '<h1>'.$news_titre.'</h1>'."\n";
if($news_option1 == 1 AND $news_option2 == 1){
echo '<p><span class="date">Le '.$date[2].' '.$date[1].' '.$date[0].' à '.$news_heure.' par <b>'.$news_pseudo.'</b>.</span></p>'."\n";
} elseif($news_option1 == 1 AND $news_option2 != 1) {
echo '<p><span class="date">Le '.$date[2].' '.$date[1].' '.$date[0].' à '.$news_heure.'.</span></p>'."\n";
} elseif($news_option1 != 1 AND $news_option2 == 1) {
echo '<p><span class="date">Par <b>'.$news_pseudo.'</b>.</span></p>'."\n";
}
echo '<table>'."\n";
echo '<tr>'."\n";
echo '<td valign="top" width="670">'.$news_texte.'</td>'."\n";
echo '<td align="right" valign="top" width="310"><img src="files/news/'.$news_img.'" width="300"></td>'."\n";
echo '</tr>'."\n";
echo '</table>'."\n";
} else {
echo '<h1>'.$news_titre.'</h1>'."\n";
if($news_option1 == 1 AND $news_option2 == 1){
echo '<p><span class="date">Le '.$date[2].' '.$date[1].' '.$date[0].' à '.$news_heure.' par <b>'.$news_pseudo.'</b>.</span></p>'."\n";
} elseif($news_option1 == 1 AND $news_option2 != 1) {
echo '<p><span class="date">Le '.$date[2].' '.$date[1].' '.$date[0].' à '.$news_heure.'.</span></p>'."\n";
} elseif($news_option1 != 1 AND $news_option2 == 1) {
echo '<p><span class="date">Par <b>'.$news_pseudo.'</b>.</span></p>'."\n";
}
echo '<p>'.$news_texte.'</p>'."\n";
}
echo '</div>'."\n";
}
}
echo '</div>'."\n";




$sql_r = "SELECT * FROM " .$table_news. " WHERE news_id < '$news_id' AND news_activation = 'active' AND news_mod_id = '$news_mod_id' ORDER BY news_id DESC";
$req_r = mysql_query($sql_r) or die('Erreur SQL !'.$sql_r.'<br>'.mysql_error());
$res_r = mysql_num_rows($req_r);
if($res_r){
$row_r = mysql_fetch_array($req_r);

$news_id_r = $row_r['news_id'];
$news_titre = $row_r['news_titre'];

$prev = '<a href="news-'.$page.'-'.$news_id_r.'.html">'.$news_titre.' ></a>';
}


$sql_n = "SELECT * FROM " .$table_news. " WHERE news_id > '$news_id' AND news_activation = 'active' AND news_mod_id = '$news_mod_id' ";
$req_n = mysql_query($sql_n) or die('Erreur SQL !'.$sql_n.'<br>'.mysql_error());
$res_n = mysql_num_rows($req_n);
if($res_n){
$row_n = mysql_fetch_array($req_n);

$news_id_n = $row_n['news_id'];
$news_titre = $row_n['news_titre'];

$next = '<a href="news-'.$page.'-'.$news_id_n.'.html">< '.$news_titre.'</a>';
}

echo '<div id="elements">'."\n";
echo '<h1></h1>'."\n";

echo '<table width="100%">'."\n";
echo '<tr>'."\n";
echo '<td valign="top" width="50%">'.$next.'</td>'."\n";
echo '<td align="right" valign="top" width="50%">'.$prev.'</td>'."\n";
echo '</tr>'."\n";
echo '</table>'."\n";
echo '</div>'."\n";



echo '</div>'."\n";

include("inc/footer.inc.php");
?>