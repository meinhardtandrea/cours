<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ajout d'une news</title>
    </head>
    <body>
        <header><h1>Ajout d'une news</h1></header>
        <?php
        if(isset($_POST['ajouter'])) {
            var_dump( $_POST);
            $titre= filter_input( INPUT_POST, 'titre', FILTER_SANITIZE_STRING);
            $contenu= filter_input( INPUT_POST, 'contenu', FILTER_SANITIZE_STRING);
            $categorie= filter_input( INPUT_POST, 'categorie', FILTER_SANITIZE_NUMBER_INT);
            if( !empty( $titre) && !empty($contenu) && !empty($categorie)) {
                $bdd = new PDO('mysql:host=localhost;dbname=mesnews', 'mesnews_user', 'secret') ;
                $statement = $bdd->prepare('INSERT INTO t_news (NEWS_TITRE, NEWS_CONTENU, CAT_ID) VALUES(:titre, :contenu, :categorie)') ;
                $statement->bindParam(':titre', $titre) ;
                $statement->bindParam(':contenu', $contenu) ;
                $statement->bindParam(':categorie', $categorie) ;
                $resultat= $statement->execute();
                if( $resultat){
                    echo 'La news a été ajoutée avec succès.' ;
                } else {
                    echo 'Une erreur s\'est produite. Code : ' . $statement->errorCode() . ' ; Message : ' . $statement->errorInfo()[2] ;
                }
            }
        }
        else {
            echo 'Merci de remplir tous les champs. <br><br>' ;
            echo '<a href="ajout.php">Retour à l\'ajout</a> <br>' ;
        }

        ?>
        <br>    
        <a href="index.php">Retour à l'accueil</a>
    </body>
    <footer>MesNews est écrit en PHP.</footer>
</html>