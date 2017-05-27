</div>

<?php
$sql = "SELECT * FROM " .$table_partenaires. " WHERE part_activation = 'active' ORDER BY part_position "; 
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$res = mysql_num_rows($req);

if($res){
echo '<div id="partenaires">'."\n";
echo '<div id="part">'."\n";
echo '<ul id="wrapper">'."\n";
while($row = mysql_fetch_array($req)) {
$part_titre = $row['part_titre'];
$part_img = $row['part_img'];
$part_lien = $row['part_lien'];
echo '<li><a href="'.$part_lien.'" class="bwWrapper" target="_blank"><img src="files/partenaires/'.$part_img.'" title="'.$part_titre.'" alt="'.$part_titre.'"/></a></li>'."\n";
}
echo '</ul>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";
}
?>

<div id="footer">
<p align="center">&copy; Tous droits réservés <b>D-SIDD</b>.</p>
</div>

</div>
<script>
	//init
	$('.bwWrapper').BlackAndWhite({
		hoverEffect:true,
		webworkerPath: 'src/',
		intensity:1,
		onImageReady:function(img){
			$(img).parent().animate({
				opacity:1
			});
		}
	});
</script>
<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//d-sidd.com/piwik/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//d-sidd.com/piwik/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->

</body>
</html>