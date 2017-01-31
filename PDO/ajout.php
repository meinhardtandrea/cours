<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ajout d'une news</title>
    </head>
    <body>
        <header><h1>Ajout d'une news</h1></header>
        <form method="POST" action="ajout_post.php">
            Titre : <input type="text" name="titre"><br><br>
            Contenu : <br>
            <textarea cols="28" rows="5" name="contenu"></textarea><br><br>
            Catégorie : 
            <select name="categorie">
                <?php
                $bdd = new PDO('mysql:host=localhost;dbname=mesnews', 'mesnews_user', 'secret') ;
                $requete= 'SELECT * FROM t_categorie';
                $statement = $bdd->prepare($requete) ;
                $statement->execute() ;
                while ($donnees = $statement->fetch()){
                    echo '<option value="' . $donnees['CAT_ID'] . '">' . utf8_encode($donnees['CAT_NOM']) . '</option>' ;
                }
                ?>
            </select>
                <br><br>
            <input type="submit" name="ajouter" value="Ajouter">
        </form>
        <br><br>
    </body>
    <footer>MesNews est écrit en PHP.</footer>
</html>
