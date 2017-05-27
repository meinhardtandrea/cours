<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html lang="fr">
    <head>
        <title>Mes news 2017</title>
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
            <h1 class="w3-jumbo">Mes news</h1>
            <p class="w3-center">
                <a href="ajout.php"><button class="w3-button w3-black w3-round-xxlarge">Ajouter une news</button></a>
            </p>
        </div>

        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=mesnews', 'mesnews_user', 'secret');
        $requete = 'SELECT NEWS_TITRE, NEWS_CONTENU';
        $requete .= ' FROM t_news';
        $requete .= ' ORDER BY NEWS_ID DESC;';
        $statement = $bdd->prepare($requete);
        $statement->execute();
        ?>
        <div class="w3-row-padding w3-content" style="max-width:1400px">
           
            <div class="w3-twothird">
                <img src="img_notebook.jpg" alt="Notebook" style="width:100%">
                <?php $donnees_ArtDuJour = $statement->fetch() ?>
                <h2>
                    <?php echo utf8_encode($donnees_ArtDuJour['NEWS_TITRE']); ?>
                </h2>
                <div class="w3-justify">
                    <p>
                        <?php echo utf8_encode($donnees_ArtDuJour['NEWS_CONTENU']); ?>
                    </p>
                </div>
            </div>

            <div class="w3-third">
            <?php while ($donnees_AutresArticles = $statement->fetch()) { ?>
                <div class="w3-container w3-light-grey w3-justify">
                    <h2 style="text-align: left">
                        <?php echo utf8_encode($donnees_AutresArticles['NEWS_TITRE']); ?>
                    </h2>
                    <p class="w3-justify">
                        <?php echo utf8_encode($donnees_AutresArticles['NEWS_CONTENU']); ?>
                    </p>
                </div>
                <br>
            <?php } ?>
            </div>
        </div>
    </body>
    <footer>MesNews est écrit en PHP.</footer>
</html>