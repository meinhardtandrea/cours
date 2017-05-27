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
        </div>
        <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px">
            <div class="w3-content w3-container w3-padding-64">

                <form method="POST" action="ajout_post.php">
                    <p>
                        <label for="titre" >Titre : </label><br>
                        <input id="titre" type="text" name="titre" size="100" maxlength="100">
                    </p>
                    <p>
                        <label for="contenu">Contenu : </label><br>
                        <textarea cols="100" rows="10" name="contenu"></textarea> 
                    </p>
                    <p>
                       <label for="contenu">Catégorie : </label> 
                       <select name="categorie">
                        <?php
                        $bdd = new PDO('mysql:host=localhost;dbname=mesnews', 'mesnews_user', 'secret');
                        $requete = 'SELECT * FROM t_categorie';
                        $statement = $bdd->prepare($requete);
                        $statement->execute();
                        while ($donnees = $statement->fetch()) {
                            echo '<option value="' . $donnees['CAT_ID'] . '">' . utf8_encode($donnees['CAT_NOM']) . '</option>';
                        }?>
                        </select> 
                    </p>
                    <br><br>
                    <input type="submit" name="ajouter" value="Ajouter" class="w3-button w3-black w3-round-xxlarge">
                </form>

            </div>
        </div>
    </body>
    <footer>MesNews est écrit en PHP.</footer>
</html>
