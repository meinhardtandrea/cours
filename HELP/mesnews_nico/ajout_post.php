<?php
include("inc/conf.ig.php");
include("inc/header.inc.php");
?>
<header>
<h1>Ajouter une news</h1>
<p><a href="index.php" title="Retour">< Retour vers l'accueil</a></p>
</header>
<?php

if(isset($_POST) && !empty($_POST['titre']) && !empty($_POST['contenu']) && !empty($_POST['categorie'])) {

$sql = "INSERT INTO t_news(NEWS_TITRE, NEWS_CONTENU, CAT_ID) VALUES (:titre, :contenu, :categorie)";

$reponse = $bdd->prepare($sql);

$reponse->bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);       
$reponse->bindParam(':contenu', $_POST['contenu'], PDO::PARAM_STR); 
$reponse->bindParam(':categorie', $_POST['categorie'], PDO::PARAM_STR);

$reponse->execute();

echo '<p>La news a été ajoutée avec succès !</p>'."\n";
} else {
echo '<p>Erreur de traitement, merci de remplir de nouveau le formulaire !</p>'."\n";
echo '<p><a href="ajout.php" title="Retour">< Retour</a></p>'."\n";
}
?>
<footer>
<hr/>
<p>MesNews est écrit en <b>PHP</b>.</p>
</footer>
</body>
</html>