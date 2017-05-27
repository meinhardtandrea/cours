<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        

        <?php
        echo 'Vous venez de saisir:' . '</br>';
        if (isset($_POST['valider'])) {
            foreach ($_POST as $index => $valeur) {
                if ($index!='valider'){
                echo'- ' . $index . ' : ' . $valeur . '</br>';
            }
            }
        }else{
           ?>
        
            <form name="formulaire" method="post" action="tp3.php">
            <p>Entrer votre nom: <input name="nom" type="text"></p>
            <p>Entrer votre prénom: <input name="prenom" type="text"></p>
            <p>Entrer votre âge: <input name="age" type="text"></p>
            <p>Entrer votre ville: <input name="ville" type="text"></p>
            <p>Entrer votre activité: <input name="activite" type="text"></p>
                <p><input name="valider" type="submit" value="valider"></p>
        </form>
            <?php
        }
        
            ?>

    </body>
</html>
