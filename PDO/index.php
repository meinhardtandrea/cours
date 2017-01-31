<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mes News</title>
    </head>
    <body>
        <header><h1>Mes News</h1></header>
        <a href="ajout.php">Ajouter une news</a>
        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=mesnews', 'mesnews_user', 'secret') ;
        $requete= 'SELECT NEWS_TITRE, NEWS_CONTENU FROM t_news ORDER BY NEWS_ID DESC';
        $statement = $bdd->prepare($requete) ;
        $statement->execute() ;
        
        while ($donnees = $statement->fetch()) {
            echo '<article>' ;
            echo '<h2>' . utf8_encode($donnees['NEWS_TITRE']) . '</h2>' ;
            echo '<p>' . utf8_encode($donnees['NEWS_CONTENU']) . '<p>' ;
            echo '</article>' ;
        }
        
        ?>
    </body>
    <footer>MesNews est écrit en PHP.</footer>
</html>
