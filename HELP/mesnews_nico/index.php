<?php
include("inc/conf.ig.php");
include("inc/header.inc.php");
?>
<header>
<h1>Mes News</h1>
<p><a href="ajout.php" title="Ajouter une news">Ajouter une news</a></p>
</header>
<?php
$sql = 'SELECT * FROM t_news N
				JOIN t_categorie C on C.CAT_ID = N.CAT_ID
				ORDER BY NEWS_ID DESC LIMIT 0,3';

try
{
$req = $bdd->prepare($sql);
$req->execute();
while ($data = $req->fetch()){
echo '<article>'."\n";
echo '<h2>'.$data["NEWS_TITRE"].'</h2>'."\n";
echo '<h3>Catégorie : '.$data["CAT_NOM"].'</h3>'."\n";
echo '<p>'.$data["NEWS_CONTENU"].'</p>'."\n";
echo '</article>'."\n";
}
$req->closeCursor();
}
catch (Exception $e)
{
die('Erreur : '.$e->getMessage());
}
?>
    <footer>
        <hr/>
        <p>MesNews est écrit en <b>PHP</b>.</p>
    </footer>
</body>
</html>