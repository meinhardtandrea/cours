<?php
if (isset($_GET["rec"])){
$rec = $_GET["rec"];
$sql = 'SELECT * FROM recette WHERE idRec = :idRec';
$req = $bdd->prepare($sql);
$req->bindParam(':idRec', $rec, PDO::PARAM_STR);
$req->execute();
$data = $req->fetch();
echo '<h1>'.$data['rec_titre'].'</h1>';
echo '<p>'.$data["rec_texte"].'</p>'."\n";
$req->closeCursor();
} else {
$sql = 'SELECT * FROM recette ORDER BY idRec';
try
{
$reponse = $bdd->prepare($sql);
$reponse->execute();
while ($data = $reponse->fetch()){
    echo '<div id="recette">'."\n";
    echo '<h2>'.$data["idRec"].' - '.$data["rec_titre"].' [ <a href="index-'.$page.'-'.$data["idRec"].'.html">voir</a> ]</h2>'."\n";
    echo '<p>'.$data["rec_texte"].'</p>'."\n";
    echo '</div>'."\n";
}
$reponse->closeCursor();
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
}

?>