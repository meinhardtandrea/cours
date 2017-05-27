<?php
include("inc/conf.ig.php");
include("inc/header.inc.php");
?>
<header>
<h1>Ajouter une news</h1>
<p><a href="index.php" title="Retour">< Retour vers l'accueil</a></p>
</header>
<?php
$form = '<form action="ajout_post.php" method="post">'."\n";
$form .=  '<p><input type="text" name="titre" id="titre" maxlength="32" size="32" value="Titre" onblur="if(this.value==\'\') this.value=this.defaultValue" onFocus="if(this.value==this.defaultValue) this.value=\'\'"></p>'."\n";
$form .=  '<p><textarea name="contenu" id="contenu" value="Contenu"></textarea></p>'."\n";

$sql = 'SELECT * FROM t_categorie ORDER BY CAT_NOM ';

$reponse = $bdd->prepare($sql);
$reponse->execute();
$form .= '<select name ="categorie">'."\n";
while ($data = $reponse->fetch()){
$form .=  '<option value="'.$data["CAT_ID"].'">'.$data["CAT_NOM"].'</option>'."\n";
}
$form .= '</select>'."\n";
$form .=  '<p><input type="submit" class="envoy" value="Ajouter" /></p>'."\n";
$form .=  '</form>'."\n";

echo $form;
?>
<footer>
<hr/>
<p>MesNews est écrit en <b>PHP</b>.</p>
</footer>
</body>
</html>