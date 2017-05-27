<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html lang="fr">
    <head>
        <title>Mes news 2017 - Ajouter une news</title>
        <meta http-equiv="Content-Language" content="fr">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
        <style>
            body, html {height: 100%}
            h1 {font-family: 'Josefin Slab', cursive ; font-size: 60px}
            h2,h3 {font-family: 'Josefin Slab', cursive ; font-size: 40px}
            p,a, li {font-family: 'Open Sans', sans-serif ; font-weight: lighter ; font-size: 16px}
        </style>
    </head>
    <body>
        <div class="w3-light-grey w3-padding-64 w3-margin-bottom w3-center">
            <h1 class="w3-jumbo">Ajouter une news</h1>
            <p class="w3-center">
                <a href="index.php"><button class="w3-button w3-black w3-round-xxlarge">Retour à l'accueil</button></a>
            </p>
        </div>
        <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px">
            <div class="w3-content w3-container w3-padding-64">
                <?php
                if (isset($_POST['ajouter'])) {
                    $titre = filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_STRING);
                    $contenu = filter_input(INPUT_POST, 'contenu', FILTER_SANITIZE_STRING);
                    $categorie = filter_input(INPUT_POST, 'categorie', FILTER_SANITIZE_NUMBER_INT);

                    if (empty($titre) && empty($contenu)) {
                        echo 'Merci de remplir tous les champs.<br><br>';
                        echo '<a href="ajout.php"><button class="w3-button w3-black w3-round-xxlarge">Recommencer</button></a>';
                    } else {
                        $bdd = new PDO('mysql:host=localhost;dbname=mesnews', 'mesnews_user', 'secret');
                        $statement = $bdd->prepare('INSERT INTO t_news (NEWS_TITRE, NEWS_CONTENU, CAT_ID) VALUES(:titre, :contenu, :categorie)');
                        $statement->bindParam(':titre', $titre);
                        $statement->bindParam(':contenu', $contenu);
                        $statement->bindParam(':categorie', $categorie);
                        $resultat = $statement->execute();
                        if ($resultat) {
                            echo 'La news a été ajoutée avec succès.';
                        } else {
                            echo 'Une erreur s\'est produite. Code : ' . $statement->errorCode() . ' ; Message : ' . $statement->errorInfo()[2];
                        }
                    }
                }
                    ?>
            </div>
        </div>
    </body>
</html>       